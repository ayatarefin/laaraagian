@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-6">
                <div class="form-container p-4 border rounded">
                    <div class="card-header">{{ __('Add Classes') }}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                            <a href="{{route('classes.index')}}" class="btn btn-success btn sm">View Classes</a>
                        </div>
                    <form action="{{ route('classes.store') }}" method="post">
                        @csrf
                        @error('class_id')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                        <div class="form-group">
                            <input class="form-control @error('class_id') is-invalid @enderror" placeholder="Class ID already added" type="text" name="class_id" placeholder="Class ID" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" placeholder="Class Name" required>
                        </div>
                        <div class="form-group mt-3">
                            <button id="submit" type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
