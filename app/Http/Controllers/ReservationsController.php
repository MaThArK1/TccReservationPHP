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
        $initDate = date('Y-m-d', strtotime($request->initDate));
        $endDate = date('Y-m-d', strtotime($request->endDate));

        $initDateTimestamp = date(strtotime($request->initDate));
        $endDateTimestamp = date(strtotime($request->endDate));
    
        $reservationsOnTheSameInitDate = Reservation::whereDate('initDate', $initDate)->get();
               // $reservationsOnTheSameEndDate = Reservation::whereDate('endDate', [$endDate])->get();

        foreach ($reservationsOnTheSameInitDate as $reservationOnSameDate){
            $reservationsInitDateTimestamp = strtotime($reservationOnSameDate->initDate);
            $reservationsEndDateTimestamp = strtotime($reservationOnSameDate->endDate);

            if ($initDateTimestamp > $reservationsInitDateTimestamp && $initDateTimestamp < $reservationsEndDateTimestamp
            || $endDateTimestamp > $reservationsInitDateTimestamp && $endDateTimestamp < $reservationsEndDateTimestamp ) {
               return back()->withErrors(['error' => 'Já existe uma reserva na data selecionada.'])->withInput();
           }
        }


 

        Reservation::create($request->all());
    
        return redirect()->route('reservations-index');
    }

    public function edit($id) 
    {
        $clients = Client::all();

       $selectedReservation = Reservation::where('id', $id)->first();
       if(empty(!$selectedReservation)) {
        return view('reservations.edit', ['reservation'=> $selectedReservation, 'clients' => $clients]);
       } else {
        return redirect()->route('reservations-index');
       }
    }

    public function update(Request $request, $id)
    {
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
}
