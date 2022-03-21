<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class StudentController extends Controller
{
    //

    public function list()
    {
        $data=Student::all();
                        

        //return $project;

         return view('teacher.pages.student.list')->with('data',$data);
    }

    public function addtocart(Request $req)
    {
         $id=$req->id;
         $cart=[];
         $student=array('id'=>$id);

         if($req->session()->has('studentcart')){
             $cart=json_decode($req->session()->get('studentcart'));
            
             
             foreach ($cart as $compare) {
                if (  $compare->id == $id) {

                    return redirect()->route('student.list');
                }
            }
         }
         

         $cart[]=(object)$student;
         $jsoncart= json_encode($cart);
         $req->session()->put('studentcart',$jsoncart);

        

         return redirect()->route('student.list');
    }

    public function showcart()
    {
        if(session()->has('studentcart'))
        {
        $data=[];
        $cart= json_decode(session()->get('studentcart'));

        foreach ($cart as $compare) {
            $data[]=Student::where('id',$compare->id)->first();
            }

        return view('teacher.pages.student.showcart')->with('data',$data);
        }

        else{
            return "No student is selected";
        }
    }

    public function deletecart(Request $req)
    { if(session()->has('studentcart')){

        $cart=json_decode($req->session()->get('studentcart'));


        foreach($cart as $key => $value){
            

            if($value->id== $req->id)
            {
                unset($cart[$key]);
                
            }
        }
        $cart = array_values($cart);
           
          

    }

    $jsoncart= json_encode($cart);
    $req->session()->put('studentcart',$jsoncart);
    return redirect()->route('student.showcart');
    

    }

    public function createcourse()
    {
         

        $coursename="";
         
         if(session()->has('course')){

            $coursecart=json_decode(session()->get('course'));
       

        foreach($coursecart as $item){
           
            $coursename=$item->name;

            $course = new Course();
            $course->name= $item->name;
            $course->section= $item->section;
            $course->capacity= $item->capacity;
            $course->time= $item->time;
            $course->fillup= 0;
            $course->save();
           

            
        }
    }


    if(session()->has('addstudentcart')){

        $coursecart=json_decode(session()->get('addstudentcart'));
       

    foreach($coursecart as $item){
       
        $coursename=$item->name;
       
        
    }
}





        $studentcart=json_decode(session()->get('studentcart'));


         


        foreach($studentcart as $item){
           
           
            $entity =Course::where('name',$coursename)->first();

            $entity->students()->attach($item);
             
            $sum=(int)$entity->fillup;
            $sum= $sum+1;


            Course::where('name',$coursename)
                                ->update(['fillup'=> $sum]);

            

        }
        
        session()->flash('course');
        session()->flash('studentcart');
        session()->flash('addstudentcart');
        

        return redirect()->route('teacher.dashboard');
    }


    public function searchstudent()
    {
        $search_text= $_GET['search'];
         
      
      

      $data=Student::where('name','LIKE','%'.$search_text.'%')->get();

      return view('teacher.pages.student.searchstudent')->with('data',$data);

      
    }
}

