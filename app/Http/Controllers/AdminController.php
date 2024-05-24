<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Tasks;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function redirect()
    {
        $projects = Project::all();
        return view('tasks.index', compact('projects'));
    }

    public function add_task()
    {
        return view('tasks.addTask');
    }

    public function create_task(Request $request)
    {
        $task = new Tasks();

        $task->name = $request->name;

        $task->priority = $request->priority;

        $task->project_id = $request->project_id;

        $task->save();

        return redirect()->back()->with('message', 'Task Created Successfully');
    }

    public function view_tasks()
    {
        $tasks = Tasks::all();
        return view('tasks.allTasks', compact('tasks'));
    }

    public function edit_task($id)
    {
        $tasks = Tasks::find($id);

        return view('tasks.editTask', compact('tasks'));
    }

    public function update_task(Request $request, $id)
    {
        $task = Tasks::find($id);

        $task->name = $request->name;

        $task->priority = $request->priority;

        $task->project_id = $request->project_id;

        $task->save();

        return redirect()->back()->with('message', 'Task Updated Successfully');
    }

    public function delete_task($id)
    {
        $task = Tasks::find($id);
        $task->delete();
        return redirect()->back()->with('message', 'Task Deleted Successfully');
    }

    public function sorted_tasks()
    {
        $tasks = Tasks::orderBy('priority')->get();
        return view('tasks.sortedTasks', compact('tasks'));
    }

    public function projects()
    {
        return view('tasks.projects');
    }

    public function create_project(Request $request)
    {
        $data = new Project();

        $data->name = $request->name;

        $data->save();
        return redirect()->back()->with('message', 'Project added Successfully');
    }

    public function view_projects()
    {
        $projects = Project::all();
        return view('tasks.allProjects', compact('projects'));
    }

}
