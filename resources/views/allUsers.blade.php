@extends('layouts.app')
@section('content')
    <div class="container">
        @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        @if (Session::get('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif
        <h2 class="text-center mb-4 ">All Users</h2>
        <table class="table table-hover mb-4 bg-white">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                <tr>
                    <th scope="row">{{$u->id}}</th>
                    <td>{{$u->username}}</td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->role}}</td>
                    <td>
                        {{-- <form action={{ route('deleteUser') }} method="post">
                            @csrf --}}
                            {{-- <input hidden value={{$u->id}} name="user_id"> --}}
                            <a href="deleteuser/{{$u->id}}" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        {{-- </form> --}}
                    </td>
                </tr>
                @endforeach
            
            </tbody>
        </table>
        <h2 class="text-center mb-4">Deleted Users</h2>
        <table class="table table-hover mb-4 bg-white">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($trashed as $t)
                <tr>
                    <th scope="row">{{$t->id}}</th>
                    <td>{{$t->username}}</td>
                    <td>{{$t->email}}</td>
                    <td>{{$t->role}}</td>
                    <td>
                        {{-- <form action={{ route('deleteUser') }} method="post">
                            @csrf --}}
                            {{-- <input hidden value={{$u->id}} name="user_id"> --}}
                            <a href="restoreUser/{{$t->id}}" type="submit" class="btn btn-danger">Restore</button>
                        {{-- </form> --}}
                    </td>
                </tr>
                @endforeach
            
            </tbody>
        </table>
    </div>
    
@endsection