@extends('layouts.app')

@section('content')
{{-- {{dd($data)}} --}}
    <div class="container d-flex flex-column col-md-6 m-auto bg-light">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary align-self-end" data-toggle="modal" data-target="#exampleModalCenter">
                Ask Question
            </button>
                        @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        @if (Session::get('fail'))
                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                        @endif
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">New Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('newQuestion') }}" method="post">
                            @csrf
                            <div class="form-groupe mb-4">
                                <label for="title">Title</label>
                                <input type="text" class="form-control form-control-lg" name="title" placeholder="title"
                                    value="{{ old('title') }}">
                                <span style="color:red">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-groupe mb-4">
                                <label for="contenu">Your Question</label>
                                <textarea class="form-control form-control-lg" name="contenu"   rows="5" value="{{ old('contenu') }}" placeholder="Your Question"></textarea>
                                <span style="color:red">
                                    @error('contenu')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">SAVE</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            <div>
                <hr>
                @foreach ($data as $item)
                <div class="card mb-4 p-4">
                    <div class="d-flex justify-content-between"> 
                        <h3 class="text-info">{{$item->title}}</h3>
                        @if(Auth::user()->role == "admin" || $item->user_id == Auth::id())
                        <form action={{ route('deleteQuestion') }} method="post" class="align-self-end">
                            @csrf
                            <input hidden value={{$item->id}} name="question_id">
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                        @endif
                    </div>
                    <p style="font-size: 12px">{{$item->user->username}}</p>
                    <p style="font-size: 20px">{{$item->contenu}}</p>
                    <div class="d-flex flex-column">
                            {{-- <a href="getComment/{{$item->id}}"> --}}
                                <button class="btn btn-primary mb-2 align-self-end" type="button" data-toggle="collapse" data-target="#collapseExample{{$item->id}}" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fa fa-chevron-circle-down"></i>
                                </button>
                            {{-- </a> --}}
                        <div class="collapse" id="collapseExample{{$item->id}}">
                        <div class="card card-body">
                            <form action={{route('newResponse')}} class="d-flex mb-3" style="gap:5px;" method="post">
                                @csrf
                                <input type="text" class="form-control" name="contenu" placeholder="Your Answer ...">
                                <input hidden name="question_id" value="{{$item->id}}">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-paper-plane"></i></button>
                            </form>
                            @foreach ($reponses as $r)
                                @if($r->question_id == $item->id )
                                <div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <p class="text-info"><i class="fa fa-user"></i> &nbsp {{$r->user->username}}</p>
                                        @if(Auth::user()->role == "admin" || $r->user_id == Auth::id())
                                            <form action={{ route('deleteResponse') }} method="post">
                                                @csrf
                                                <input hidden value={{$r->id}} name="response_id">
                                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        @endif
                                    </div>
                                    <p class="text-dark">{{$r->contenu}}</p>
                                </div>
                                @endif
                            @endforeach 
                        </div>
                        </div>
                    </div>
                    
                </div>
                @endforeach
            </div>
    </div>
@endsection
