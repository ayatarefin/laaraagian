@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-6">
                <div class="form-container p-4 border rounded">
                    <div class="card-header">{{ __('Update Classes') }}
                            <a href="{{route('classes.index')}}" class="btn btn-success btn sm">View Classes</a>
                            <p>Update Information Carefully!</p>
                        </div>
                    <form action="{{ route('classes.update',$classes->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="form-group">
                            <input class="form-control @error('class_id') is-invalid @enderror" value="{{$classes->class_id}}" placeholder="Class ID already added" type="text" name="class_id" placeholder="Class ID" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" value="{{$classes->name}}" placeholder="Class Name" required>
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
