@extends('layouts.app')
@section('title', 'Edit Task')



@section('content')

{{-- {{ $errors }} --}}
<form method="POST" action="{{ route('tasks.update',['id'=> $task->id])}}">
@csrf
@method('PUT')

    <div>
        <label for="title">Title </label>
        <input type="text" name="title" id="title" value="{{ $task->title }}"></inpt>
        @error('title')
            {{ $message }}
        @enderror
    </div>

    <div>
        <label for="description">Descripption</label>
        <textarea id="description" name="description" rows="5">{{ $task->description }}</textarea>
        @error('description')
            {{ $message }}
        @enderror
    </div>

    <div>
        <label for="long_description">Long Descripption</label>
        <textarea id="long_description" name="long_description" rows="10">{{ $task->long_description }}</textarea>
        @error('long_description')
            {{ $message }}
        @enderror
    </div>

    <div>
    <button type="submit">Edit Task</button>
    </div>

</form>

@endsection