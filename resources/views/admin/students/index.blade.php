@extends('layouts.app')
@section('content')
<style>
    .title {
        margin-bottom: 5vh;
    }

    .card {
        margin: auto;
        max-width: 950px;
        width: 90%;
        box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 1rem;
        border: transparent;
        margin-top: 2rem;
    }

    .row {
        margin: 0;
    }

    .main {
        margin: 0;
        padding: 2vh 0;
        width: 100%;
    }

    .col-2,
    .col {
        padding: 0 1vh;
    }

    a {
        padding: 0 1vh;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class=col-md-12>
            <div class="card">
                <div class="card-header">{{ __('Student List') }}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a href="{{route('students.create')}}" class="btn btn-success btn sm">Create</a>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-strioe">
                        <thead>
                            <tr>
                                <td>Serial Number</td>
                                <td>Class ID</td>
                                <td>Student ID</td>
                                <td>Name</td>
                                <td>Phone Number</td>
                                <td>Email</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $key => $row)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$row->Class_id}}</td>
                                <td>{{$row->Student_id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->phone}}</td>
                                <td>{{$row->email}}</td>
                                <td>
                                    <a href="{{route('students.edit',$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{route('students.destroy',$row->id)}}" method="Post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
                                        <button type="submit" class="btn btn-sm btn-danger mt-1">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endsection
