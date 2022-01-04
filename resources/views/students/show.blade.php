@extends('layouts.app')
@section('content')
 
<div class="container">
    <div class="row">
        </div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2> Student Details
                        <a href="{{ url('/') }}" class="btn btn-success btn-sm float-end" style="margin-left:5px;">View Student</a>
                        <a href="{{ url('/students/create') }}" class="btn btn-primary btn-sm float-end"style="margin-left:5px;">Add Student</a>
                        <a href="{{ url('/students/edit/'.$student->id) }}" class="btn btn-warning btn-sm float-end">Edit Details</a>
                    </h2>
                </div>
                <div class="card-body">
                    <table  class="table table-striped table-bordered">
                        <tr>
                          <th>ID</th>
                          <td>{{ $student->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $student->name }}</td>
                        </tr>
                        <tr>
                            <th>Date of Birth</th>
                            <td>{{date('l j F Y ',strtotime( $student->birth_date))}}</td>
                        </tr>
                       
                        <tr>
                            <th>Email</th>
                            <td>{{ $student->email }}</td>
                        </tr>
                        <tr>
                            <th>Course</th>
                            <td>{{ $student->course->name }}</td>
                        </tr>
                        <tr>
                            <th>Course Details</th>
                            <td>{{ $student->course->description }}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td><img  src="{{ Storage::disk('s3')->temporaryUrl('uploads/students/'.$student->profile_image, '+2 minutes') }}" width="200px"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection