<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class QuestionsController extends Controller
{
    function add(Request $request){
        $request->validate([
            'title' => 'required',
            'contenu' => 'required',
        ]);
        $query = DB::table('questions')->insert([
            'title'=>$request->input('title'),
            'contenu'=>$request->input('contenu'),
            'user_id'=>Auth::id()
        ]);
        if($query){
            return back()->with('success','Data has been succesfuly inserted');
        }else{
            return back()->with('fail','Somthing went wrong');
        }

    }
    function delete(Request $request){
        $id = $request->input('question_id');
        $query = DB::table('questions')->delete($id);
        if($query){
            return back()->with('success','Data has been succesfuly deleted');
        }else{
            return back()->with('fail','Somthing went wrong');
        }

    }

}
