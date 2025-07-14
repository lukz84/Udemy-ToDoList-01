@extends('layouts.app')
@section('title', $task->title)


@section('content')
<div>{{ $task->title }}</div>


<div>{{ $task->description }}

@if($task->long_description)
<div>{{ $task->long_description}}</div>
@endif

<p>{{ $task->created_at }}</p>
<p>{{ $task->updated_at }}</p>

@endsection