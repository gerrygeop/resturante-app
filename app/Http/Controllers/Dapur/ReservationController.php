<?php

namespace App\Http\Controllers\Dapur;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('dapur.reservations.index', compact('reservations'));
    }

    public function create()
    {
        $reservation = new Reservation;
        $tables = Table::where('status', TableStatus::AVAILABLE)->get();
        return view('dapur.reservations.create', compact('reservation', 'tables'));
    }

    public function store(ReservationRequest $request)
    {
        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'Please choose the table base on guests');
        }

        $request_date = Carbon::parse($request->reservation_date);
        foreach ($table->reservations as $res) {
            if ($res->reservation_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning', 'This table is reserved for this date.');
            }
        }

        Reservation::create($request->validated());
        return to_route('dapur.reservations.index')->with('success', 'Reservation added successfully');
    }

    public function show(Reservation $reservation)
    {
        //
    }

    public function edit(Reservation $reservation)
    {
        $tables = Table::all();
        return view('dapur.reservations.edit', compact('reservation', 'tables'));
    }

    public function update(ReservationRequest $request, Reservation $reservation)
    {
        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number) {
            return back()->with('warning', 'Please choose the table base on guests');
        }

        $request_date = Carbon::parse($request->reservation_date);

        if ($reservation->table_id != $request->table_id) {
            foreach ($table->reservations as $res) {
                if ($res->reservation_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
                    return back()->with('warning', 'This table is reserved for this date.');
                }
            }
        }

        $reservation->update($request->validated());
        return to_route('dapur.reservations.index')->with('success', 'Reservation updated successfully');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return back()->with('success', 'Reservation deleted successfully');
    }
}
