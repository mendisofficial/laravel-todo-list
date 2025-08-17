@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
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
@endsection
