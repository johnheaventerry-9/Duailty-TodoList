<!DOCTYPE html>
<html>
<head>
    <title>ToDo List</title>C:\xampp\htdocs\john\resources\css\style.css
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <nav>
        <div class="container">
            <h1>ToDo List</h1>
        </div>
    </nav>
    <div id="app" class="container">
        <ul class="todo-list">
            @foreach ($todos as $todo)
                <li class="{{ $todo->completed ? 'completed' : 'pending' }}">
                    <span>{{ $todo->task }}</span>
                    <div class="actions">
                        <form action="{{ route('todos.update', $todo->id) }}" method="POST" class="form-inline">
                            @csrf
                            @method('PUT')
                            <input type="checkbox" name="completed" {{ $todo->completed ? 'checked' : '' }} onChange="this.form.submit()">
                        </form>
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="form-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
        <form action="{{ route('todos.store') }}" method="POST" class="new-task-form">
            @csrf
            <input type="text" name="task" placeholder="New Task" required>
            <button type="submit" class="btn-add">Add Task</button>
        </form>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
