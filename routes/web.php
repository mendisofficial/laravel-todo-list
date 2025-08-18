<?php

use App\Models\Task as ModelsTask;
use Illuminate\Http\Request;
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

Route::get('/tasks/{id}', function ($id) {
    return view('show', [
        'task' => ModelsTask::findOrFail($id)
    ]);
})->name('task.show');

Route::post('/tasks', function (Request $request) {
    dd($request->all());
})->name('task.store');

Route::fallback(function () {
    return "I'm the fallback route";
});
