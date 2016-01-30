<?php

namespace Algorithmaths\Http\Controllers;

use Illuminate\Http\Request;

use Algorithmaths\Http\Requests;
use Algorithmaths\Http\Controllers\Controller;

class QuestionsController extends Controller
{
       public function __construct(){
        $this->middleware('auth',['only'=>'create']);
    }
 public function index () {
     $question = Question::latest()->get();
     return view('index',compact('question'));
 }
    

  public function store (StoreQuestionRequest $request) {
      $question = new Question($request->all());
      Auth::user()->questions()->save($question);
      return redirect('/');
  }
  public function show ($id) {
      $question = Question::where('id','=',$id)->first();
      return view('index',compact('question'));
  }  
}
