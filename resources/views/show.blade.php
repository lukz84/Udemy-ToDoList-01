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
    <form method="POST" action="{{ route('tasks.delete', ['task'=>$task->id]) }}">
        @csrf
        @method('DELETE')
    <button type="submit">Delete Task</button>
    
    </form>

</div>

@endsection