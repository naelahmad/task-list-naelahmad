<?php

namespace App\Http\Controllers;
use App\Task;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }    
    public function index(){
    //    $tasks = DB::table('tasks')->get();
    $tasks = Task::all();
        return view('master',compact('tasks'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        $task= new Task;
        $task->name = $request->name;
        $task->save();
    //    DB::table('tasks')->insert([
    //      'name'=>$request->name,
    //      'created_at'=>now(),
    //       'updated_at'=>now()
    //       ]);

            return redirect('/');
    }

    public function destroy($id){
    //    DB::table('tasks')->where('id','=',$id)->delete();
    Task::find($id)->delete();
        return redirect ('/');
    }
}
