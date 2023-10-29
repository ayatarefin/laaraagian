@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-6">
                <div class="form-container p-4 border rounded">
                    <div class="card-header">{{ __('Update Student') }}
                        <a href="{{route('students.index')}}" class="btn btn-success btn sm">View Students</a>
                        <p>Update Student Information carefully!</p>
                    </div>
                    <form action="{{ route('students.update',$student->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="form-group">
                            <select class="form-control" name="class_id" placeholder="Class Name" required>
                            @foreach ($classes as $row)
                                <option value="{{$row->id}}" @if($row->id==$student->Class_id) selected @endif>{{$row->name}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="text" name="student_id" value="{{$student->Student_id}}" placeholder="Enter Student ID" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" value="{{$student->name}}" placeholder="Enter Student's Name" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="phone" value="{{$student->phone}}" placeholder="Enter Student's Phone Number" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="email" name="email" {{$student->email}} placeholder="Enter Student's email address" required>
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
