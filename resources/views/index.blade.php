<!DOCTYPE html>
<html>
<head>
    <title>ToDo List</title>
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
</head>
<body>
    <div id="app">
        <h1>ToDo List</h1>
        <ul>
            @foreach ($todos as $todo)
                <li>
                    {{ $todo->task }} - {{ $todo->completed ? 'Completed' : 'Pending' }}
                    <form action="{{ route('todos.update', $todo->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <input type="checkbox" name="completed" {{ $todo->completed ? 'checked' : '' }} onChange="this.form.submit()">
                    </form>
                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <form action="{{ route('todos.store') }}" method="POST">
            @csrf
            <input type="text" name="task" placeholder="New Task">
            <button type="submit">Add Task</button>
        </form>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
