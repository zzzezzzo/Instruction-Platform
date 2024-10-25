<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lessons;

class LessonController extends Controller
{
    //
    public function store(Request $req, $id){
        // code to store data in the database
        
        $less = new Lessons;
        $less->title = request('title');
        $less->description = request('description');
        $less->course_id = $id;
        $video =$req->file('content');
        $ext = $video->getClientOriginalExtension();
        $location = 'public/videos/';
        $videoName = date('Y-m-d-h-i-s').'.'. $ext;
        $video->move($location, $videoName);
        $less->content = $videoName;
        $less->save();
        return redirect()->route('courses.show', $id);
    }
    public function index(){
        // code to get all lessons from the database
        $lessons = Lessons::all();
        return view('courses.show', ['lessons' => $lessons]);
    }
}
