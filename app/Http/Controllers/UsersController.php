<?php

namespace Algorithmaths\Http\Controllers;
use Algorithmaths\User;
use Illuminate\Http\Request;

use Algorithmaths\Http\Requests;
use Algorithmaths\Http\Controllers\Controller;

class UsersController extends Controller
{
 public function __construct(){
$this->middleware('auth');
}
public function index()
{
$cred = Input::only('username','password');
var_dump($cred);
if(Auth::attempt($cred)){
return Redirect::intended('index');
}else{
$error = "Username or password is incorrect.";
return Redirect::to('/index');
}
}
public function create()
{
$user = new \App\User;
$user->username = input::get('first_name');
$user->username = input::get('last_name');
$user->username = input::get('username');
$user->email  =   input::get('email');
$user->password = Hash::make(input::get('password'));
$user->save();
return view('index');
}
public function get_new(){
return View::make('user.new')->with('title', 'Add new user');

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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
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
    }
}
