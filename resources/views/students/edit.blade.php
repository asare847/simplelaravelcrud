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
                        <a href="{{ url('/') }}" class="btn btn-success btn-sm float-end"> View Students</a>
                    </h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('students/update/'.$student->id) }}"enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="name">Fullname</label>
                          <input type="text" class="form-control" value="{{$student->name }}"name="name" id="name" placeholder="full name" required>
                                @error('name')
                                <span class="alert alert-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group ">
                            <label for="" class="col-md-4 col-form-label text-md-right">Birth Date</label>
                            <div class="">
                                <input id="birth_date" type="text" class="form-control datepicker  @error('date_birth') is-invalid @enderror" name="birth_date" required autocomplete="birth_date" value="{{$student->birth_date}}" placeholder="--select-">
                                 
                            </div>
                            
                        <div class="form-group">
                            <label for="email">Student Email </label>
                            <input type="email" class="form-control" name="email" value="{{$student->email }}" id="exampleFormControlInput1" placeholder="name@example.com">
                            @error('email')
                            <span class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                        </div>
                         <tr>
                                 <th>Select Course</th>
                                          <td>
                                            <select name="rt_id" class="form-control">
                                              <option value="0">--select--</option>
                                              @foreach($courses as $course)
                                                <option @if($student->course_id ==$course->id) selected @endif value="{{$course->id}}">{{$course->name}}</option>

                                              @endforeach
                                            </select>
                                          </td>
                             </tr>
                        <div class="form-group">
                            <label for="photo">Photo </label>
                            <input type="file" class="form-control" name="profile_image" id="poto" >
                        </div>
                        <div class="form-group">
                        <img  src="{{ Storage::disk('s3')->temporaryUrl('uploads/students/'.$student->profile_image, '+2 minutes') }}" width="300px">
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