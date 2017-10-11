<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Task;


class TaskController extends Controller
{
	public function tasks()
    {
        $tasks = Task::paginate(10);

        return View('tasks', array('tasks'=>$tasks));
    }

    public function add()
    {
        return View('add');
    }

    public function addPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            
            return redirect('task/add')->withErrors($validator)->withInput();

        }else{
            $task = new Task;            
            $task->name = $request->post('name');
            $task->description = $request->post('description');
            $task->dateCreated = date("Y-m-d");
            $task->save();

            return redirect('/tasks')->with('message','Task Added!');

        }
    }

    public function edit($id=null)
    {

        $task = Task::find($id);
        return View('edit',array('task'=>$task));

    }

    public function editPost($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if(!is_null($id)){

            if($validator->fails()){
                
                return redirect('/task/edit/'.$id)->withErrors($validator)->withInput();

            }else{
                
                $task = Task::find($id);
                $task->name = $request->post('name');
                $task->description = $request->post('description');
                $task->dateUpdated = date("Y-m-d");
                $task->save();

                return redirect('/tasks')->with('message','Task Updated!');
            }
        }

    }

    public function delete($id=null)
    {
        if(!is_null($id)){
            $task = Task::find($id);
            $task->delete();

            return redirect('/tasks')->with('message','Task Deleted!');
        }
    }

}