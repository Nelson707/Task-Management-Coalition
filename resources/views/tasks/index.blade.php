<!DOCTYPE html>
<html>
<head>
    <title>Task Reorder</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        body{
            padding: 50px;
        }
        .task-reorder{
            display: flex;
            justify-content: space-around;
        }
        ul li{
            list-style: none;
        }
    </style>

</head>
<body>
<h1>Projects</h1>
    <form method="GET" action="/tasks">
    <select name="project_id" onchange="this.form.submit()" class="btn btn-secondary dropdown-toggle">
        <option value="">Select a Project</option>
        @foreach($projects as $project)
            <option value="{{ $project->id }}" {{ isset($projectId) && $project->id == $projectId ? 'selected' : '' }}>
                {{ $project->name }}
            </option>
        @endforeach
    </select>
</form>

    @if(isset($projectId))
    <ul id="task-list" class="list-group">
        @foreach($tasks as $task)
            <li data-id="{{ $task->id }}" class="list-group-item">
                <div class="task-reorder">
                    <div>{{ $task->name }}</div>
                    <div>{{ $task->priority }}</div>
                </div>
            </li>
        @endforeach
    </ul>
@endif

    <div style="margin-top: 20px; display: grid">
    <a href="{{ url('redirect') }}">Home</a>
    <a href="{{ url('add_task') }}">Add Task</a>
    <a href="{{ url('view_tasks') }}">Edit Tasks</a>
    <a href="{{ url('projects') }}">Add Project</a>
    <a href="{{ url('view_projects') }}">View Projects</a>
    <a href="{{ url('sorted_tasks') }}">View All Tasks</a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        $('#task-list').sortable({
            update: function(event, ui) {
                var taskOrder = $(this).sortable('toArray', { attribute: 'data-id' });
                $.ajax({
                    url: '{{ url('/tasks/reorder') }}',
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        tasks: taskOrder
                    },
                    success: function(response) {
                        console.log(response);
                    }
                });
            }
        });
    });
</script>
</body>
</html>
