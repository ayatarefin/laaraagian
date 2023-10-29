@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-6">
                <div class="form-container p-4 border rounded">
                    <div class="card-header">{{ __('Add Students') }}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                        <a href="{{route('students.index')}}" class="btn btn-success btn sm">View Students</a>
                        <p>Only who support Real Madrid!</p>
                    </div>
                    <form action="{{ route('students.store') }}" method="post">
                        <div class="form-group">
                            <select class="form-control" type="text" name="class_id" placeholder="Class Name" required>
                            @foreach ($classes as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        @csrf
                        @error('student_id')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                        <div class="form-group">
                            <input class="form-control" type="text" name="student_id" placeholder="Enter Student ID" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" placeholder="Enter Student's Name" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="phone" placeholder="Enter Student's Phone Number" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="email" name="email" placeholder="Enter Student's email address" required>
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
