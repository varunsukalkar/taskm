<x-app-layout>
    

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Other meta tags and CSS links -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .white-text {
        color: white;
    }
</style>
</head>
 
<body>



    <!-- Your content here -->
    <br>
    <br>
    <div  class="container text-center "  style="color: white;">
        <h1>Task Management System</h1>

        <h2>Task List</h2> @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <!-- Rest of your content -->
    </ div>

    <div class="container" id="key">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td class="white-text">{{ $task->title }}</td>
                <td class="white-text">{{ $task->description }}</td>
                <td class="white-text">{{ $task->priority }}</td>
                <td class="white-text">{{ $task->due_date }}</td>
                <td class="white-text">
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i> Edit
                    </a>

                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this task?')">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                    @if (!$task->completed)
                    <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-warning btn-sm">
                            <i class="fa fa-check"></i> Complete
                        </button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create Task</a>
        <a href="{{ route('taskshow') }}" class="btn btn-secondary mb-3">Show Completed Tasks</a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
   
</x-app-layout>
</html>
