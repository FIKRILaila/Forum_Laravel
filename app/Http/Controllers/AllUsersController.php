<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use  App\Models\User;

class AllUsersController extends Controller
{
    //
    public function index(){
            $User = User::where('role','normal')->orderBy('users.created_at', 'ASC')->withoutTrashed()->get();
            $Usertrashed = User::where('role','normal')->orderBy('users.created_at', 'ASC')->onlyTrashed()->get();
            return view('allUsers',['users'=>$User,'trashed'=>$Usertrashed]);
        }

    
    public function restore(Request $request, $id){
            $User = User::where('id',$id)->restore();
            return back()->with('success','user restored successfuly');
    }

    public function delete(Request $request, $id)
    {
        $query = User::where('id',$id)->delete();
        if($query){
            return back()->with('success','user deleted successfuly');
        }else{
            return back()->with('fail','Somthing went wrong');
        }
    }
}
