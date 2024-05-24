<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Tasks;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $projectId = $request->input('project_id');
        $projects = Project::all();

        $tasks = Tasks::where('project_id', $projectId)
            ->orderBy('priority')
            ->get();

        return view('tasks.index', compact('tasks', 'projects', 'projectId'));
    }

    public function reorder(Request $request)
    {
        $tasks = $request->input('tasks');

        foreach ($tasks as $index => $taskId) {
            $task = Tasks::find($taskId);
            $task->priority = $index + 1;
            $task->save();
        }

        return response()->json(['status' => 'success']);
    }
}
