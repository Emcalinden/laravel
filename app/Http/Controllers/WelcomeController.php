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

class WelcomeController extends Controller
{

   public function index()
    { 
                    //dd(Auth::user());
        $title = 'Algorithmaths';
    
        //$questions = Question::all();
        //$question_id = Question::get()->lists('question_id');

        $questions = Question::limit(10)->with('answer')->get();
        //dd($questions); 
         //return collect($array)->unique('id')->all();
        $answers = Answer::with('question')->first()->get();
        $feedback = Feedback::limit(5)->get();
        $text = 'This site aims to guide you in learning recurrence relations
        and proof by mathematical induction. You can learn the recurrence relations 
        and proof by mathematical induction as a non-registered user although
        if you decide to register you can test yourself on the subject from a beginner
        level right up to a more difficult level. ';
        $dataArray=[];
        $labelArray=[];
        if(Auth::check()){
        $userResult = User::with('result')->where('id',Auth::user()->id)->get();
        foreach($userResult as $res){
        foreach($res->result as $all){
        // dd($res->result-?firstname);
        $dataArray[] = (int)$all->result;
        $labelArray[] = $all->result_id;

        }
    }
    return View::make('pages.index',compact('title','text','questions','answers','userResult','dataArray','labelArray','feedback'));
    }
    else
    {
    return View::make('pages.index',compact('title', 'text','questions','answers'));
    }
}
     public function show ($id) {
      $question = Question::with('answer')->where('question_id','=',$id)->first();
      return view('index',compact('question'));
  }  

    public function create()
    {
    }
	
    public function store(Request $request)
    {
    
 $password=Input::get('password');
        $data = array(
        'username'           => Input::get('username'),
        'first_name'       => Input::get('first_name'),
        'last_name'        => Input::get('last_name'),
        'password'        => Input::get('password')
        );              
        $rules = array(
            'first_name'       => 'required',
            'last_name'        => 'required',
            'username'           => 'unique:user',
            'password'        => 'required'
        );
        $validator = Validator::make($data, $rules);        

        // process the registration
        if ($validator->fails()) {
            Session::flash('message', 'This email is already registered, please choose another one.');
            return Redirect::to('index')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $user = new User;  
            $user->first_name       = Input::get('first_name');
            $user->last_name        = Input::get('last_name');
            $user->username           = Input::get('username');
            $user->password        = Hash::make(Input::get('password'));
            $user->save();

            // redirect
            Session::flash('message', 'Successfully created account! Please login to submit your ad.');
            return Redirect::to('index');
        }

        $input = Request::all();
		$user = new User;
		$user -> first_name = $input['first_name'];
		$user -> last_name = $input['last_name'];
		$user -> username = $input['username'];
		$user -> password = $input['password'];
		$user -> save();
		return redirect('index');
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
