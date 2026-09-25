<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Task</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 650px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        h1 {
            color: #333;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        .btn {
            background: #2563eb;
            color: white;
            border: none;
            padding: 11px 18px;
            border-radius: 6px;
            cursor: pointer;
        }

        .cancel {
            margin-left: 10px;
            color: #555;
            text-decoration: none;
        }

        .errors {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Edit Task</h1>

    @if ($errors->any())
        <div class="errors">
            <strong>Please fix the following:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/tasks/{{ $task->id }}" method="POST">

        @csrf
        @method('PUT')

        <label for="task_name">Task Name</label>

        <input
            type="text"
            id="task_name"
            name="task_name"
            value="{{ old('task_name', $task->task_name) }}"
            required
        >

        <label for="description">Description</label>

        <textarea
            id="description"
            name="description"
        >{{ old('description', $task->description) }}</textarea>

        <label for="status">Status</label>

        <select id="status" name="status" required>

            <option value="Pending"
                {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="Completed"
                {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>
                Completed
            </option>

        </select>

        <label for="due_date">Due Date</label>

        <input
            type="date"
            id="due_date"
            name="due_date"
            value="{{ old('due_date', $task->due_date) }}"
        >

        <button type="submit" class="btn">
            Update Task
        </button>

        <a href="{{ route('tasks.index') }}" class="cancel">
            Cancel
        </a>

    </form>

</div>

</body>
</html>