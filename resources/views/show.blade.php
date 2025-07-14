@extends('layouts.app')


<h1>{{ $task->title }}</h1>

<div>{{ $task->description }}

@if($task->long_description)
<div>{{ $task->long_description}}</div>
@endif

<p>{{ $task->created_at }}</p>
<p>{{ $task->updated_at }}</p>