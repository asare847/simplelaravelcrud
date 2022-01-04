@extends('layouts.app')
    <link rel="" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@section('css')
    
@endsection
@section('content')
 
<div class="container">
    <div class="row">
        </div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2> Students  CRUD
                        <a href="{{ url('/students/create') }}" class="btn btn-primary btn-sm float-end">Add Student</a>
                    </h2>
                </div>
                <div class="card-body">
                    <table class="table" id="studentsTable">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>name</th>
                                <th>birth date</th>
                                <th>email</th>
                                <th>course</th>
                                <th>Image</th>
                                <th>view</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td class="">{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{date('l j F Y ',strtotime( $student->birth_date))}}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->course->name }}</td>
                                <td><img  src="{{ Storage::disk('s3')->temporaryUrl('uploads/students/'.$student->profile_image, '+2 minutes') }}" width="80px"></td>
                                <td><a href="{{ url('students/show/'.$student->id) }}" class="btn btn-outline-secondary "><i class="bi bi-eye" alt="edit"></i></a></td>
                                <td><a href="{{ url('students/edit/'.$student->id) }}" class="btn  btn-outline-primary "><i class="bi bi-pencil" alt="edit"></i></a></td>
                                <td><a  onclick="return confirm('Are you sure you want do delete this data?')" href="{{ url('students/delete/'.$student->id) }}" class="btn btn-outline-danger"><i class="bi bi-trash"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
                {{$students->links('pagination::bootstrap-4')}}
            </div>
            
        </div>
    </div>
</div>

@endsection
<!--JQuery Databale for search-->
@push('scripts')
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
          $(document).ready( function () {
             $('#studentsTable').DataTable();
        });
    </script>
    @endpush