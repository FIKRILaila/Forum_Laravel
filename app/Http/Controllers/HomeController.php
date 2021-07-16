<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use  App\Models\Reponse;
use App\Models\Question;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
    //     $questions = Question::with("reponses")->join('users','users.id','=','questions.user_id')->select('questions.*','users.username')->orderBy('questions.created_at', 'DESC')->get();
    //     return view('home',['data'=>$questions]);
    $questions = Question::with("user")->orderBy('questions.created_at', 'DESC')->get();
    // $reponse = Reponse::with("user")->orderBy('questions.created_at', 'DESC')->get();
    $Res = Reponse::with("user")->orderBy('reponses.created_at', 'DESC')->get();
        // return redirect('/home',['reponses'=>$Res]);
    return view('home',['data'=>$questions,'reponses'=>$Res]);

    }
    
   
}
