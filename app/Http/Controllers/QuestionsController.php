<?php

namespace Algorithmaths\Http\Controllers;

use Illuminate\Http\Request;
use Algorithmaths\Question;
use Algorithmaths\Http\Requests;
use Algorithmaths\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use View;

class QuestionsController extends Controller
{
      

 public function index () {
     $question = Question::latest()->get();
     return view('pages.index',compact('question'));
 }
    

  public function show ($id) {
      $question = Question::with('answer')->where('id','=',$id)->first();
      return view('pages.index',compact('question'));
  } 

  public function store(Request $request)
    {

      
          return Redirect::to('index');

    }

}
