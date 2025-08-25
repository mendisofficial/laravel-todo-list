<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task as ModelsTask;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('task.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => ModelsTask::latest()->get()
    ]);
})->name('task.index');

Route::view('/tasks/create', 'create')->name('task.create');

Route::get('/tasks/{task}/edit', function (ModelsTask $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('task.edit');

Route::get('/tasks/{task}', function (ModelsTask $task) {
    return view('show', [
        'task' => $task
    ]);
})->name('task.show');

Route::post('/tasks', function (TaskRequest $request) {
    $task = ModelsTask::create($request->validated());

    return redirect()->route('task.show', ['task' => $task->id])
        ->with('success', 'Task created successfully!');
})->name('task.store');

Route::put('/tasks/{task}', function (ModelsTask $task, TaskRequest $request) {
    $task->update($request->validated());

    return redirect()->route('task.show', ['task' => $task->id])
        ->with('success', 'Task edited successfully!');
})->name('task.update');

Route::delete('/tasks/{task}', function (ModelsTask $task) {
    $task->delete();

    return redirect()->route('task.index')
        ->with('success', 'Task deleted successfully!');
})->name('task.destroy');

Route::fallback(function () {
    return "I'm the fallback route";
});
