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
  
     //$questions = Question::all();

    // return $questions;
//return view::make('pages.index',compact('questions'));
    //return Redirect::to('index', compact('questions'));
           //return Redirect::to('/')->with('questions',$questions);
   // return View::make('pages.index',compact('questions'));
      //return View::make('pages.index',compact('questions'));
//return 'get stuff';

    }
    

  public function store (StoreQuestionRequest $request) {
     
  }
  public function show ($id) {

  }  
}
