<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Task Details</title>

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

        .detail {
            margin-bottom: 20px;
        }

        .label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }

        .value {
            color: #333;
        }

        .status {
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            margin-right: 8px;
        }

        .back {
            color: #555;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Task Details</h1>

    <div class="detail">
        <div class="label">Task Name</div>
        <div class="value">
            {{ $task->task_name }}
        </div>
    </div>

    <div class="detail">
        <div class="label">Description</div>
        <div class="value">
            {{ $task->description ?: 'No description provided.' }}
        </div>
    </div>

    <div class="detail">
        <div class="label">Status</div>
        <div class="value status">
            {{ $task->status }}
        </div>
    </div>

    <div class="detail">
        <div class="label">Due Date</div>
        <div class="value">
            {{ $task->due_date ?: 'No due date.' }}
        </div>
    </div>

    <a href="{{ config('app.url') }}/tasks/{{ $task->id }}/edit" class="btn">
        Edit Task
    </a>

    <a href="/tasks" class="back">
        Back to Tasks
    </a>

</div>

</body>
</html>