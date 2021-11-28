<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\File;
class StudentController extends Controller
{
    public function index(){
        //fetching all students from the database
        $students = Student::orderBy('created_at','desc')->paginate(10);
        //passing the $students data to index.blade.php file
        return view('index',['students'=>$students]);
    }

    //
    public function create(){
         $thecourse = Course::all();
        return view('students.create',compact('thecourse'));
    }

    public function store(Request $request){
        /* field validation*/
        $this->validate($request,[
            'name' => 'required |string|max:255',
            'birth_date'=> ['required', 'string'],
            'email' => 'required|string|email|max:255'
        ]);

        /* Creating instance of Student*/
       $student = new Student;
       $student->name = $request->input('name');
       $student->birth_date = $request->input('birth_date');
       $student->email = $request->input('email');
       $student->course_id  = $request->rt_id;  
       /*Handling the image*/
       if ($request->hasfile('profile_image')) {
            $file = $request->file('profile_image'); 
            $extention = $file->getClientOriginalExtension(); // getting the extention of image jpg,png etc
            $filename = time().'.'.$extention; 
            $file->move('uploads/students/',$filename); //move image to this path 
            $student->profile_image = $filename; 
       }
        $student->save(); // save it into database
       return redirect()->back()->with('status','student created succesfully'); // redirecting
    }

    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show')->with('student',$student);
    }

    public function edit($id){
        $courses = Course::all();
        $student = Student::findOrFail($id);
        return view('students.edit',['student'=>$student,'courses'=>$courses]);
    }

    public function update(Request $request,$id){

        $student =  Student::findOrFail($id); // findOrFail method outputs 404 when unsucessful
        //feching input from the form
        /* field validation*/
        $this->validate($request,[
            'name' => 'required |string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->course_id  = $request->rt_id;
        /*Handling the image*/
        if ($request->hasfile('profile_image')) {
            $destination = 'uploads/students/'.$student->profile_image;
           if (File::exists($destination)) {
               File::delete($destination);
           }
             $file = $request->file('profile_image');
             //getting the image extention e.g .jpg,png
             $extention = $file->getClientOriginalExtension();
             //appending the image extention to the image file
             $filename = time().'.'.$extention; 
             //file path the images would be stored in 
             $file->move('uploads/students/',$filename);
             $student->profile_image = $filename;
        }
        $student->update(); // updates the students information in the database
        return redirect()->back()->with('status','student updated succesfully');
     }

     public function destroy($id)
     {
         //fetching the student using id
         $student = Student::find($id);

         $destination = 'uploads/students/'.$student->profile_image;
         if (File::exists($destination)) {
            File::delete($destination);
        }
         $student->delete();
         return redirect()->back()->with('status','Student Image Deleted');
     }
}
