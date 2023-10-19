@extends('layouts.app')
@section('content')

<div class="row m-5">
    <div class="col-md-3"></div>
    <div class="card col-md-5 mr-3 mt-5">
        <div class="card-body">
            <h2 class="card-title text-center mb-3">Welcome, {{ Auth::user()->name }}</h2>
            <h6>Hala Madrid</h6>
        </div>
    </div>
</div>

@endsection
