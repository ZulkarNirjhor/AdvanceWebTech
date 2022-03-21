<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function addcourse()
    {
        return view('teacher.pages.course.addcourse');
    }

    public function addcourseSubmit(Request $request){

        $this->validate(
            $request,
            [
                'name'=>'required',
                'section'=>'required',
                'time'=>'required',
                'capacity'=>'required'
               
                
                
            ],
            [
                'name.required'=>'Name is required',
                'section.required'=>'Section is required',
                'time.required'=>'Time is required',
                'capacity.required'=>'Capacity is required'
              
              
            ]
        );

    

        $cart=[];
        $course=array('name'=>$request->name,'section'=>$request->section,'time'=>$request->time,'capacity'=>$request->capacity);
        $cart[]=(object)$course;
        $jsoncart= json_encode($cart);
        $request->session()->put('course',$jsoncart);

        
        // $entity= Initiator::where('i_email',session()->get('initiator.email'))->first();
                                

     
       
        // $project= new Project();
      

        // $project->p_name = $request->p_name;
        // $project->p_description = $request->p_description;
        // $project->p_amount = $request->p_amount;
        // $project->p_deadline = $request->p_deadline;
        // $project->p_image = $name;
        // $project->i_id = $entity->i_id;
        // $project->p_status = "processing";

        // $project->save();

        return redirect()->route('student.list');
     }



     public function seecourse()
     {
         $data=Course::all();
                         
 
         //return $project;
 
          return view('teacher.pages.course.seecourse')->with('data',$data);
     }


     public function addstudent(Request $req)
     {
        $request=Course::where('id',$req->id)->first();

        $cart=[];
        $course=array('name'=>$request->name,'section'=>$request->section,'time'=>$request->time,'capacity'=>$request->capacity);
        $cart[]=(object)$course;
        $jsoncart= json_encode($cart);
        $req->session()->put('addstudentcart',$jsoncart);

        return redirect()->route('student.list');
     }


     public function student(Request $req)
     {
         $data=Course::find($req->id);

          return view('teacher.pages.course.enrolledstudent')->with('data',$data);

      // return $data;
                       
     }
}
