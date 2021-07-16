<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Reponses;
use Illuminate\Support\Facades\DB;
use  App\Models\Reponse;
use Illuminate\Http\Request;

class ReponsesController extends Controller
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
    // public function getAll(Request $request, $id){
    //     $Res = Reponse::where('id',$id)->with("user")->orderBy('reponses.created_at', 'DESC')->get();
    //     return redirect('/home',['reponses'=>$Res]);
    //     // view('home',['reponses'=>$Res]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
            $request->validate([
                'contenu' => 'required',
            ]);
            $query = DB::table('reponses')->insert([
                'contenu'=>$request->input('contenu'),
                'user_id'=>Auth::id(),
                'question_id'=>$request->input('question_id')
            ]);
            if($query){
                return back()->with('success','Data has been succesfuly inserted');
            }else{
                return back()->with('fail','Somthing went wrong');
            }
    }
    public function delete(Request $request){
        $id = $request->input('response_id');
        $query = DB::table('reponses')->delete($id);
        if($query){
            return back()->with('success','Data has been succesfuly deleted');
        }else{
            return back()->with('fail','Somthing went wrong');
        }
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
     * @param  \App\Models\Reponses  $reponses
     * @return \Illuminate\Http\Response
     */
    public function show(Reponses $reponses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reponses  $reponses
     * @return \Illuminate\Http\Response
     */
    public function edit(Reponses $reponses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reponses  $reponses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reponses $reponses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reponses  $reponses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reponses $reponses)
    {
        //
    }
}
