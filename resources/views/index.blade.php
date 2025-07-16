<h1>Kurwa to za proste ale robie po koleji</h1>


<div>
{{-- @if (count($tasks) > 0) --}}
@forelse ($tasks as $task )
<div style="display: flex; align-items: center; gap: 10px;">
    <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
    <form method="POST" action="{{ route('tasks.delete', ['task' => $task->id]) }}" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
</div>
@empty
<div> No task Here </div>

@endforelse

</div>