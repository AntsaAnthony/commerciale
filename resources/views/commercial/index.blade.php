@extends('commercial.base')

@section('content')
    <style>
        .footer{
            display : none;
        }
    </style>
    <p style="padding : 35px 35px 0px 35px; font-size : 64px;">Welcome back {{Auth::user()->name}} !</p>

        @error('error')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
        @enderror

@endsection