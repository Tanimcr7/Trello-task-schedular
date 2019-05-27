<?php

namespace App\Http\Controllers;
use App\Todolist;
use App\Inwork;
use App\Done;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //

    public function todo_task()
    {
        $todo = Todolist::get();
        $inwork = Inwork::get();
        $done = Done::get();

        $data = [
            'todo'  => $todo,
            'inwork'   => $inwork,
            'done' => $done
        ];
        return $data;
        //return $todo;
//        return view('todo', compact("todo"));


    }
    public function ret_todo()
    {
       // $temp = Student::get();
        //return $temp;
        return view('todo');
    }
    
    public function save_todo(Request $request)
    {
        
        //dd($request->input('po'));
        //dd($request->input('company'));
        $todo = new Todolist();
       $todo->name = $request->input('po');
       $todo->description = $request->input('company');
  
       //    $todo->description = $company;
    
       $todo->save();

       return view('todo');

    }

    public function save_todo_update(Request $request)
    {
        //dd($request->input('po'));
        $todo =$request->input('todo');
        $inwork =$request->input('inwork');
        $done =$request->input('done');
        //dd($done);

        Todolist::truncate();
        Inwork::truncate();
        Done::truncate();

        foreach ($todo as $key => $val)
        {
            //echo "$key => $val \n";
            $parts = explode(" - ", $val);
            $name =  $parts[0] ;
            $description =  $parts[1] ;
            //echo $name;
            //echo $description;
            $td = new Todolist();
            $td->name =$name;
            $td->description = $description;
            $td->save();
        }

        foreach ($inwork as $key => $val)
        {
            //echo "$key => $val \n";
            $parts = explode(" - ", $val);
            $name =  $parts[0] ;
            $description =  $parts[1] ;
            //echo $name;
            //echo $description;
            $iw = new Inwork();
            $iw->name =$name;
            $iw->description = $description;
            $iw->save();
        }

        foreach ($done as $key => $val)
        {
            //echo "$key => $val \n";
            $parts = explode(" - ", $val);
            $name =  $parts[0] ;
            $description =  $parts[1] ;
            //echo $name;
            //echo $description;
            $do = new Done();
            $do->name =$name;
            $do->description = $description;
            $do->save();
        }
        
        return view('todo');

    }
    public function save_inwork(Request $request)
    {
        
        //dd($request->input('po'));
        //dd($request->input('company'));
        $inwork = new Inwork();
        $inwork->name = $request->input('po');
        $inwork->description = $request->input('company');
  
       //    $todo->description = $company;
    
       $inwork->save();

       return view('todo');

    }
    public function save_done(Request $request)
    {
        
        //dd($request->input('po'));
        //dd($request->input('company'));
        $done = new Done();
        $done->name = $request->input('po');
        $done->description = $request->input('company');
  
       //    $todo->description = $company;
    
       $done->save();

       return view('todo');

    }
}
