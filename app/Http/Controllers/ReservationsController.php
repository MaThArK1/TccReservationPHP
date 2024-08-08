<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();

        return view('reservations.index', ['reservations' => $reservations]);
    }

    public function create()
    {
        $clients = Client::all();

        return view('reservations.create', ['clients' => $clients]);
    }

    public function store(Request $request)
    {
        $initDate = $request->initDate;
        $endDate = $request->endDate;

        self::verifyIfReservationOverlaps($initDate, $endDate);

        Reservation::create($request->all());

        return redirect()->route('reservations-index');
    }

    public function edit($id)
    {
        $clients = Client::all();

        $selectedReservation = Reservation::where('id', $id)->first();
        if (empty(!$selectedReservation)) {
            return view('reservations.edit', ['reservation' => $selectedReservation, 'clients' => $clients]);
        } else {
            return redirect()->route('reservations-index');
        }
    }

    public function update(Request $request, $id)
    {
        $initDate = $request->initDate;
        $endDate = $request->endDate;

        self::verifyIfReservationOverlaps($initDate, $endDate, $id);

        $data = [
            'client_id' => $request->client_id,
            'initDate' => $request->initDate,
            'endDate' => $request->endDate,
            'value' => $request->value
        ];

        Reservation::where('id', $id)->update($data);
        return redirect()->route('reservations-index');
    }

    public function destroy($id)
    {
        Reservation::where('id', $id)->delete();
        return redirect()->route('reservations-index');
    }

    private function verifyIfReservationOverlaps ($initDate, $endDate, $id=null) 
    {
        $initDateYMD = date('Y-m-d', strtotime($initDate));
        $endDateYMD = date('Y-m-d', strtotime($endDate));

        $initDateTimestamp = date(strtotime($initDate));
        $endDateTimestamp = date(strtotime($endDate));

        $reservationsOnTheDates = Reservation::whereDate('initDate', '>=', $initDateYMD)
        ->whereDate('endDate', '<=', $endDateYMD)
        ->when(isset($id), function ($query) use ($id) {
            return $query->where('id', '!=', $id);
        })->get();


        foreach ($reservationsOnTheDates as $reservation) {
            $reservationsInitDateTimestamp = strtotime($reservation->initDate);
            $reservationsEndDateTimestamp = strtotime($reservation->endDate);

            $isInitDateOverlap = $initDateTimestamp >= $reservationsInitDateTimestamp 
            && $initDateTimestamp <= $reservationsEndDateTimestamp;

            $isEndDateOverlap = $endDateTimestamp > $reservationsInitDateTimestamp 
            && $endDateTimestamp < $reservationsEndDateTimestamp;

            if ($isInitDateOverlap || $isEndDateOverlap) {
                return back()->withErrors(['error' => 'Já existe uma reserva na data selecionada.'])
                ->withInput();
            }
        }
    }
}
