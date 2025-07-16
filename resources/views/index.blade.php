@extends('layouts.app')

@section('content')

<nav class="mb-4">
    <a href="{{ route('tasks.create') }}" class="font-medium text-gray-700 underline decoration-pink-500">New Task</a>
</nav>

{{-- @if (count($tasks) > 0) --}}
@forelse ($tasks as $task )
<div>
    <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
    @class(['font-bold','line-through' => $task->completed])
    >{{ $task->title }}</a>
    <form method="POST" action="{{ route('tasks.delete', ['task' => $task->id]) }}" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
</div>
@empty
<div> No task Here </div>

@endforelse

@if($tasks->count())
<nav class="mt-4">
    {{ $tasks->links() }}
</nav>
@endif

@endsection