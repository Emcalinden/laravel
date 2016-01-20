<?php

namespace Algorithmaths\Http\Controllers;

use Request;

use Algorithmaths\Http\Requests;
use Algorithmaths\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Session;
use View;
use Algorithmaths\User;
use Illuminate\Support\Facades\Input;
use Hash;

class SessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //if (Auth::check()) return redirect::to('session');
        return View::make('sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $username = Input::get('username');
        $pass = Input::get('password');

        //$password = Hash::make($pass);

        $credentials = array(
        'username' => $username,
        'password' => $pass
        );

        if(Auth::attempt($credentials)) {

            \Session::put('flash_message',Auth::user()->username);
            return Redirect::to('index');
        }
        else {
             return 'auth failed';
        }       
    
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Auth::logout();
        Session::flush();
        return Redirect::to('index');
    }
}
