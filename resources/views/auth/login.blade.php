@extends('layouts.app')
@section('content')

<div class="row m-5">
    <div class="col-md-3"></div>
    <div class="card col-md-5 mr-3 mt-5">
        <div class="card-body">
            <h2 class="card-title text-center mb-3">Member login</h2>
            <form action="{}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your Email">
                    @error('email')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your Password">
                    @error('password')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                {{-- <a href="{{ url('/') }}" class="btn btn-danger">Back</a> --}}
            </form>
        </div>
    </div>
</div>

@endsection
