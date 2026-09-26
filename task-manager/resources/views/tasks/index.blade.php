<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personal Task Manager</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff0f6;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0;
            color: #d63384;
        }

        .btn {
            background: #d63384;
            color: white;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 6px;
        }

        .btn:hover {
            background: #b02a6b;
        }

        .success {
            background: #d1fae5;
            color: #065f46;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #d63384;
        }

        .status {
            font-weight: bold;
        }

        .actions a {
            margin-right: 8px;
            color: #2563eb;
            text-decoration: none;
        }

        .delete-btn {
            border: none;
            background: #dc2626;
            color: white;
            padding: 6px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #666;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Personal Task Manager</h1>

        <a href="/tasks/create" class="btn">
            + Add Task
        </a>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if($tasks->count() > 0)

        <table>
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach($tasks as $task)

                    <tr>
                        <td>{{ $task->task_name }}</td>

                        <td>
                            {{ $task->description ?: '—' }}
                        </td>

                        <td>
                            <span class="status">
                                {{ $task->status }}
                            </span>
                        </td>

                        <td>
                            {{ $task->due_date ?: '—' }}
                        </td>

                        <td class="actions">

                            <a href="/tasks/{{ $task->id }}">
                                View
                            </a>

                            <a href="{{ config('app.url') }}/tasks/{{ $task->id }}/edit">Edit</a>

                            <form
                                action="/tasks/{{ $task->id }}"
                                method="POST"
                                style="display:inline;"
                                onsubmit="return confirm('Are you sure you want to delete this task?');"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="delete-btn">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>

                @endforeach

            </tbody>
        </table>

    @else

        <div class="empty">
            <h3>No tasks yet</h3>
            <p>Click "Add Task" to create your first task.</p>
        </div>

    @endif

</div>

</body>
</html>