@extends('layouts.app')
@section('content')
 
<div class="container">
    <div class="row">
        </div class="col-md-12">
        @if (session('status'))
            <p class="alert alert-success">{{ session('status') }}</p>
        @endif
            <div class="card">
                <div class="card-header">
                    <h2> Add Student with Image
                        <a href="{{ url('/courses') }}" class="btn btn-success btn-sm float-end"> View Students</a>
                    </h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{url('courses/update/'.$course->id)}}" >
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="name">Course</label>
                          <input type="text" class="form-control" value="{{$course->name }}" name="name" id="name" placeholder="name" required>
                                @error('name')
                                <span class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Course Details </label>
                            <textarea  name="description" class="form-control" >{{$course->description}}</textarea>
                            
                            @error('description')
                            <span class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                        </div>
                      

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-md"  style="margin-top: 5px">Update Details</button>
                        </div>

                      </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection