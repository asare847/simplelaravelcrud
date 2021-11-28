<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\File;
class CourseController extends Controller
{
    public function index(){
        //fetching all courses from the database
        //$courses = course::orderBy('created_at','desc')->get();
        $courses = Course::orderBy('created_at','desc')->paginate(10);
        //passing the $courses data to index.blade.php file
        return view('courses.index',compact('courses'));
    }

    //
    public function create(){
        return view('courses.create');
    }

    public function store(Request $request){
        /* field validation*/

         $this->validate($request,[
            'name' => 'required',
            'description' => 'required'
        ]);

        $data = new Course;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();
                //auth()->user()->post()->create($attribute);
        
       return redirect()->back()->with('status','course created succesfully'); // redirecting
    }

    public function show($id)
    {
        $course = Course::find($id);
        return view('courses.show')->with('course',$course);
    }

    public function edit($id){
        $course = Course::findOrFail($id);
        return view('courses.edit',compact('course'));
    }

    public function update(Request $request,$id){

        $course =  Course::findOrFail($id); // findOrFail method outputs 404 when unsucessful
        //feching input from the form
        /* field validation*/
        $attributes = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
                //for laravel 5.4 upwards;
        Course::where('id', $id)->update($attributes);
        return redirect()->back()->with('status','course updated succesfully');

     }

     public function destroy($id)
     {
         //fetching the course using id
         $course = Course::where('id',$id);
         $course->delete();
         return redirect()->back()->with('status','course Image Deleted');
     }
}
