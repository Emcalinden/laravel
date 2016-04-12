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
       $password=Input::get('password');
        $data = array(
        'username' => Input::get('username'),
        'first_name' => Input::get('first_name'),
        'last_name' => Input::get('last_name'),
        'password' => Input::get('password')
        );              
        $rules = array(
            'first_name' => 'required|min:1',
            'last_name' => 'required|min:1',
            'username' => 'required|unique:user|min:3',
            'password' => 'required|min:5'
        );
        $validator = Validator::make($data, $rules);        
        if ($validator->fails()) {
            return Redirect::to('index')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $user = new User;  
            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
            $user->username = Input::get('username');
            $user->password = Hash::make(Input::get('password'));
            $user->save();

            Session::flash('message', 'Successfully created account! Log in to try out the Test!');
            return Redirect::to('index');
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
