<h1>The list of tasks</h1>

<div>
    {{-- @if (count($tasks)) --}}
    @forelse ($tasks as $task)
        <div>
            <div>
                <a href="{{ route('task.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
            </div>
        </div>
    @empty
        <div>No tasks found</div>
    @endforelse
    {{-- @endif --}}
</div>
