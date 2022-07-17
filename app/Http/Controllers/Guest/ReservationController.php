<?php

namespace App\Http\Controllers\Guest;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Table;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function stepOne(Request $request)
    {
        $reservation = $request->session()->get('reservation');
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();

        return view('guest.reservation.step-one', compact('reservation', 'min_date', 'max_date'));
    }

    public function storeStepOne(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'telp' => ['required'],
            'reservation_date' => ['required', 'date', new DateBetween, new TimeBetween],
            'guest_number' => ['required'],
        ]);

        if (empty($request->session()->get('reservation'))) {
            $reservation = new Reservation();
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);
        } else {
            $reservation = $request->session()->get('reservation');
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);
        }

        return to_route('guest.reservations.step.two');
    }

    public function stepTwo(Request $request)
    {
        $reservation = $request->session()->get('reservation');
        $reservation_table_id = Reservation::orderBy('reservation_date')->get()->filter(function ($value) use ($reservation) {
            return $value->reservation_date->format('Y-m-d') == $reservation->reservation_date->format('Y-m-d');
        })->pluck('table_id');

        $tables = Table::where('status', TableStatus::AVAILABLE)
            ->where('guest_number', '>=', $reservation->guest_number)
            ->whereNotIn('id', $reservation_table_id)
            ->get();

        return view('guest.reservation.step-two', compact('reservation', 'tables'));
    }

    public function storeStepTwo(Request $request)
    {
        $validated = $request->validate([
            'table_id' => ['required']
        ]);

        $reservation = $request->session()->get('reservation');
        $reservation->fill($validated);
        $reservation->save();
        $request->session()->forget('reservation');

        return to_route('guest.reservations.success');
    }

    public function success()
    {
        return view('guest.reservation.success');
    }
}
