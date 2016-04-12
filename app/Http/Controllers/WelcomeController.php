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
use Algorithmaths\UserAnswer;
use Illuminate\Support\Facades\Input;
use Hash;

class WelcomeController extends Controller
{

   public function index()
    { 
       
        $questions = Question::limit(10)->with('answer')->get();
//dd($questions);
        Session::put('key', $questions);
        $answers = Answer::with('question')->orderBy(\DB::raw('RAND()'))->get();
        $dataArray=[];
        $labelArray=[];
        if(Auth::check()){
        $userResult = User::with('result')->where('id',Auth::user()->id)->get();
        $useranswer = UserAnswer::limit(5)->orderBy('user_answer_id','DESC')->get();

        foreach($userResult as $res){
        foreach($res->result as $all){
        $dataArray[] = (int)$all->result;
        $labelArray[] = $all->result_id;
        }
    }

        $useranswer = UserAnswer::limit(5)->orderBy('user_answer_id','DESC')->get();
        $userquestion = [];
        $userAnswer = [];
         foreach($useranswer as $answers){
            //$userquestion[] = Question::where('question_id',$answers->question_id)->get();
            $userAnswer[] = Answer::with('question')->where('answer_id',$answers->answer_id)->get();
         }

    return View::make('pages.index',compact('title','text','questions','answers','userResult','dataArray','labelArray','userAnswer','userquestion'));
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
