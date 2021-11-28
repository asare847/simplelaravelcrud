@extends('layouts.app')
@section('content')
 
<div class="container">
    <div class="row">
        </div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2> course Details
                        <a href="{{ url('/courses') }}" class="btn btn-success btn-sm float-end" style="margin-left:5px;">View course</a>
                        <a href="{{ url('/courses/create') }}" class="btn btn-primary btn-sm float-end"style="margin-left:5px;">Add course</a>
                        <a href="{{ url('/courses/edit/'.$course->id) }}" class="btn btn-warning btn-sm float-end">Edit Details</a>
                    </h2>
                </div>
                <div class="card-body">
                    <table  class="table table-striped table-bordered">
                        <tr>
                          <th>ID</th>
                          <td>{{ $course->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $course->name }}</td>
                        </tr>
                        <tr>
                            <th>description</th>
                            <td>{{ $course->description }}</td>
                        </tr>
                        <tr>
                            <th>Course</th>
                            <td>{{ $course->course }}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td><img src="{{ asset('uploads/courses/'.$course->profile_image) }}" width="200px"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection