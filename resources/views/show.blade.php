@extends('layouts.app')
@section('title', $task->title)


@section('content')
<div>{{ $task->title }}</div>


<div>{{ $task->description }}</div>

@if($task->long_description)
<div>{{ $task->long_description}}</div>
@endif

<p>{{ $task->created_at }}</p>
<p>{{ $task->updated_at }}</p>

<div>
    <a href="{{ route('tasks.edit', ['task'=>$task->id]) }}">Edit Task</a>
</div>

<div>
    <form method="POST" action='{{ route('tasks.toggle', ['task' => $task]) }}'>
    @csrf
    @method('PUT')
    <button type='submit'>
        Mark as {{ $task->completed ? 'not completed' : 'completed' }}
    </button>

    </form>
</div>




<div>
    <form method="POST" action="{{ route('tasks.delete', ['task'=>$task->id]) }}">
        @csrf
        @method('DELETE')
    <button type="submit">Delete Task</button>
    
    </form>

</div>

@endsection