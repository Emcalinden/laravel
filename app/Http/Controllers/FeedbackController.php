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
use Algorithmaths\Question;
use Algorithmaths\Answer;
use Algorithmaths\Result;
use Algorithmaths\Feedback;
use Illuminate\Support\Facades\Input;
use Hash;


class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
     $feedback = Feedback::with('user');
    return Redirect::to('pages.index')->with('feedback',$feedback);


    }
    public function create()
    {
    
    $review=Input::get('feedback');
    $user_id = Auth::user()->id;
            // store
    $feedback = new Feedback;
    $feedback->review = Input::get('feedback');
    $feedback->user_id = $user_id;
    $feedback->save();


            // redirect
            Session::flash('message', 'Successfully left Feedback');
            return Redirect::to('index');
        
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
    }
}
