<?php

namespace Algorithmaths\Http\Controllers;

use Illuminate\Http\Request;
use Algorithmaths\Question;
use Algorithmaths\Http\Requests;
use Algorithmaths\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use View;
use Auth;
use Session;
use Algorithmaths\User;
use Algorithmaths\Answer;
use Algorithmaths\Result;
use Illuminate\Support\Facades\Input;


class QuestionsController extends Controller
{   

 public function index () {
     //$question = Question::latest()->get();
     //return view('pages.index',compact('question'));

//Redirect::to('index')->with('userResult',$userResult);

 }
    

  public function show ($id) {
      $question = Question::with('answer')->where('id','=',$id)->first();
      return view('pages.index',compact('question'));
  } 

  public function store(Request $request)
    {
$length;
foreach($_POST as $key => $val){
    if(substr($key, 0, 8) == 'question'){
        $array[] = $val;
$length  = count( array_keys( $array, 1 ));
    }
}
    $result = new Result;
    $result -> user_id = Auth::user()->id;
    $result -> result = $length;
    $result -> save();


    return Redirect::to('index')->with('success', true)->with('length',$length);

       //return Redirect::to('index')->with('success', true)->with('length',$length);
}



    

}
