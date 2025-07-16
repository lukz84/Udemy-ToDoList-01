<h1>Kurwa to za proste ale robie po koleji</h1>


<div>
{{-- @if (count($tasks) > 0) --}}
@forelse ($tasks as $task )
<div>
    <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>

</div>
@empty
<div> No task Here </div>

@endforelse

</div>