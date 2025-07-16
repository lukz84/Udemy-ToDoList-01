@extends('layouts.app')
@section('title', isset($task) ? 'Edit Task' : 'Add Task')


@section('content')

{{-- {{ $errors }} --}}
<form method="POST" action="{{ isset($task) ? route('tasks.update', ['task'=>$task->id]) : route('tasks.store')}}">
@csrf
@isset($task)
    @method('PUT')
@endisset
    <div>
        <label for="title">Title </label>
        <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}"></inpt>
        @error('title')
            {{ $message }}
        @enderror
    </div>

    <div>
        <label for="description">Descripption</label>
        <textarea id="description" name="description" rows="5">{{  $task->description ?? old('description') }}</textarea>
        @error('description')
            {{ $message }}
        @enderror
    </div>

    <div>
        <label for="long_description">Long Descripption</label>
        <textarea id="long_description" name="long_description" rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
        @error('long_description')
            {{ $message }}
        @enderror
    </div>

    <div>
    <button type="submit">
    @isset($task)
        Update Task
    @else
        Add Task
    @endisset

    
    </button>
    </div>

</form>

@endsection