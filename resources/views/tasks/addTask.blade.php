<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <style>
        body{
            padding: 50px;
        }
        .tasks-body{
            width: 500px;
            height: 250px;
            margin: 50px auto;
            padding-top: 100px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

    </style>

    <title>Document</title>
</head>
<body>
<div class="tasks-body">
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
            <button type="button" class="btn-close" aria-label="Close" style="float: right;"></button>
        </div>
    @endif

    <h1>Add task</h1>

    <form action="{{ url('create_task') }}" method="post">

        @csrf

        <div class="mb-3">
            <label>Task Name</label>
            <input class="form-control text-dark" type="text"  placeholder="Task Name..." name="name"  required>
        </div>

        <div class="mb-3">
            <label>Task Priority</label>
            <input class="form-control text-dark" type="text"  placeholder="Task Priority 1,2,3" name="priority"  required>
        </div>

        <div class="mb-3">
            <label>Project Id</label>
            <input class="form-control text-dark" type="text"  placeholder="Project ID" name="project_id"  required>
        </div>


        <button type="submit" class="btn btn-primary mb-3 btn-lg btn-block">Add Task</button>
    </form>

        <div style="margin-top: 20px; display: grid">
            <a href="{{ url('redirect') }}">Home</a>
            <a href="{{ url('add_task') }}">Add Task</a>
            <a href="{{ url('view_tasks') }}">Edit Tasks</a>
            <a href="{{ url('projects') }}">Add Project</a>
            <a href="{{ url('view_projects') }}">View Projects</a>
            <a href="{{ url('sorted_tasks') }}">View All Tasks</a>
        </div>

</div>
</body>
</html>
