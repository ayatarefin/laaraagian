@extends('layouts.app')
@section('content')

<div class="row m-5">
    <div class="col-md-3"></div>
    <div class="card col-md-5 mr-3 mt-5">
        <div class="card-body">
            <h2 class="card-title text-center mb-3">Welcome, {{ Auth::user()->name }}</h2>
            <div class="row">
            <a class="mr-2 mt-2"><strong> See all the</strong></a>
            <a href="{{route('students.index')}}" class="btn btn-danger btn sm">Students</a>
            </div>
            <div class="row mt-3">
                <a class="mr-2 mt-2"><strong> See all the</strong></a>
                <a href="{{route('classes.index')}}" class="btn btn-warning btn sm">Classes</a>
            </div>
        </div>
    </div>
</div>

@endsection
