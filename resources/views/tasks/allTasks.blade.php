<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
            {{--                <button type="button" class="close" style="float: right;" data-dismiss="alert" aria-hidden="true">X</button>--}}
            <button type="button" class="btn-close" aria-label="Close" style="float: right;"></button>
        </div>
    @endif
    <h1 class="mx-auto" style="width: 200px; font-size: 30px">All Tasks</h1>

    <table class="table">
        <tr class="bg-info">
            <td class="text-dark">#</td>
            <td class="text-dark">Task Name</td>
            <td class="text-dark">Priority</td>
            <td class="text-dark">Created At</td>
            <td class="text-dark">Actions</td>
        </tr>

        @foreach($tasks as $task)

            <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->name}}</td>
                <td>{{$task->priority}}</td>
                <td>{{$task->created_at}}</td>
                <td>
                    <a href="{{ url('edit_task',$task->id) }}" class="btn btn-success">Edit</a>
                </td>
                <td>
                    <a onclick="return confirm('Are you sure you want to delete the topic?')" href="{{ url('delete_task',$task->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>

        @endforeach

    </table>

    <div style="margin-top: 20px; display: grid">
        <a href="{{ url('redirect') }}">Home</a>
        <a href="{{ url('add_task') }}">Add Task</a>
        <a href="{{ url('view_tasks') }}">Edit Tasks</a>
        <a href="{{ url('projects') }}">Add Project</a>
        <a href="{{ url('view_projects') }}">View Projects</a>
        <a href="{{ url('sorted_tasks') }}">View All Tasks</a>
    </div>

</body>
</html>
