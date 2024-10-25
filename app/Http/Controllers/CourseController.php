<?php

namespace App\Models\Courses;
namespace App\Models\Category;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Courses;
use App\Models\Lessons;

class CourseController extends Controller
{
    public function index(){
        $courses = Courses::all();
        return view('courses.list',[
            'courses' => $courses
        ]);
    }
    public function index_trash(){
        $courses = Courses::onlyTrashed()->get();
        return view('courses.list_trash',[
            'courses' => $courses
        ]);
    }
    public function create(){
        $categories = Category::all();
        return view('courses.new', ['categories'=>$categories]);
    }
    public function store(Request $request){
        $course = new Courses;
        $course->name = request('name');
        $course->description = request('description');
        $course->price = request('price');
        $course->category_id = request('category_id');
        $Pimage = $request->file('image');
        $ext = $Pimage->getClientOriginalExtension();
        $location = 'public/courses/';
        $filename = $course->id."-". date("Y-m-d-h-i-s").".".$ext;
        $Pimage->move($location,$filename);
        $course->image = $filename;
        $course->save();
        return redirect()->route('courses.index')->with('success', 'Course added successfully!');
    }
    // to show the course single
    public function show($id){
        $course = Courses::find($id);
        $lessons = Lessons::where('course_id',$id)->get();
        return view('courses.show',[
            'course'=> $course,
            'lessons'=>$lessons
        ]);
    }
    public function delete_forEver($id){
        $course = Courses::onlyTrashed()->find($id);
        $course->forceDelete();
        return redirect()->route('courses.index_trash');

    }
    public function restore($id){
        $course = Courses::onlyTrashed()->find($id);
        $course->restore();
        return redirect()->route('courses.index_trash');

    }
    public function destroy($id){
        $course = Courses::find($id);
        $course->delete();
        return redirect()->route('courses.index');
    }

}
