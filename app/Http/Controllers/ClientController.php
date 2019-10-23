<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Reservation;
use App\Room;
use Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('clients.index',['clients'=>Client::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clients.create');
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
            'name' => 'required|min:6',
            'lastName' => 'required|min:6',
            'address' => 'required',
            'zipCode' => 'required',
            'city' => 'required',
            'password' => 'required|min:6',
            'email' => 'required',

        ]); 
        $client = new Client();
        $client->name = $request->name;
        $client->lastname = $request->lastName;
        $client->address = $request->address;
        $client->zipCode = $request->zipCode;
        $client->city = $request->city;
        $client->password = bcrypt($request->password);
        $client->email = $request->email;
        $client->save();
        return redirect()->route('home')->with(['success'=>'Compte crée avec succés']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $client = Client::findOrFail($id);
        return view('clients.show',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $client = Client::findOrFail($id);
        return view('clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $client = Client::findOrFail($id);
         //
         $this->validate($request,[
            'name' => 'required|min:6',
            'lastName' => 'required|min:6',
            'address' => 'required',
            'zipCode' => 'required',
            'city' => 'required',
        ]); 
        $client->name = $request->name;
        $client->lastname = $request->lastName;
        $client->address = $request->address;
        $client->zipCode = $request->zipCode;
        $client->city = $request->city;
        $client->update();
        return redirect()->route('home')->with(['success'=>'Compte modifié avec succés']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $client = Client::findOrFail($id);
        foreach($client->reservations()->get() as $reservation){
            $room = Room::find($reservation->room_id);
            $room->status = 1;
            if($room->update()){
                $client->reservations()->delete();
                $client->delete();
                return redirect()->route('home')->with(['success'=>'Compte supprimé avec succés']);
            }
        }
        return redirect()->route('clients.index')->with(['fail'=>'Une erreur est survenue veuillez réessayer']);
    }
    public function getLogin(){
        return view('clients.login');
    }
    public function login(Request $request){
        $this->validate($request,[
            'password' => 'required|min:6',
            'email' => 'required',

        ]); 
        if( Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('home');
        }else{
            return redirect()->route('clients.login')->with(['fail'=>'Email ou mot de passe est incorrect']);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
