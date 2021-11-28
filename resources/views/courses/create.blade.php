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
                    <h2> Add Course
                        <a href="{{ url('/courses') }}" class="btn btn-success btn-sm float-end"> View Courses</a>
                    </h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/courses/store') }}">
                        @csrf
                        <div class="form-group">
                          <label for="name">Course Name</label>
                          <input type="text" class="form-control" name="name" id="name" placeholder="course name" required>
                               @error('name')
                                    <span class="alert alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group ">
                            <label for="" class="col-md-4 col-form-label text-md-right">Course Description</label>
                            <div class="">
                                <textarea id="description"  name="description" class="form-control rounded-0" required>
                                    
                                </textarea>  
                                 
                            </div>
                            
                             @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                           
                        </div>
                    
                            <button type="submit" class="btn btn-primary btn-md" style="margin-top: 10px">Save Details</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection