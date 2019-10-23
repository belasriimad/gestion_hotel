<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Auth;
use Session;
class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admins.index',['admins'=>Admin::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admins.create');
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
         //
         $this->validate($request,[
            'name' => 'required|min:6',
            'password' => 'required|min:6',
            'email' => 'required',

        ]); 
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->password = bcrypt($request->password);
        $admin->email = $request->email;
        $admin->save();
        return redirect()->route('admins.index')->with(['success'=>'Compte crée avec succés']);
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
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->route('admins.index')->with(['success'=>'Admin Supprimé']);
    }
    public function getLogin(){
        return view('admins.login');
    }
    public function login(Request $request){
        $this->validate($request,[
            'password' => 'required|min:6',
            'email' => 'required',

        ]); 
        if(Auth::guard('admins')->attempt(['email' => $request->email,'password' => $request->password])){
            $_SESSION['admin'] = true;
            return redirect()->route('home');
        }else{
            return redirect()->route('admins.login')->with(['fail'=>'Email ou mot de passe est incorrect']);
        }
    }
    public function logout(){
        Auth::guard('admins')->logout();
        $_SESSION['admin'] = false;
        return redirect()->route('home');
    }
}
