<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Reservation;
use Auth;
class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rooms = Room::all();
        return view('reservations.book',compact('rooms'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'dateFrom'=>'required|date',
            'dateTo'=>'required|date'
        ]);
        $room = Room::find($request->room_id);
        $reservation = new Reservation();
        $reservation->date_in = $request->dateFrom;
        $reservation->date_out = $request->dateTo;
        $reservation->client_id = Auth::user()->id;
        $reservation->room_id = $request->room_id;
        $reservation->save();
        $room->status = 0;
        $room->update();
        return redirect()->route('reservations.index')->with(['success'=>'Chambre resérvée']);
    }
}
