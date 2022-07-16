<?php

namespace App\Http\Controllers\Dapur;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use App\Models\Table;

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
        $tables = Table::all();
        return view('dapur.reservations.create', compact('reservation', 'tables'));
    }

    public function store(ReservationRequest $request)
    {
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
        $reservation->update($request->validated());
        return to_route('dapur.reservations.index')->with('success', 'Reservation updated successfully');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return back()->with('success', 'Reservation deleted successfully');
    }
}
