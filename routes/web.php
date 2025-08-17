<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

// This is how you define a class in PHP
class Task
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at
    ) {}
}

$tasks = [
    new Task(
        1,
        'Buy groceries',
        'Task 1 description',
        'Task 1 long description',
        false,
        '2025-03-01 12:00:00',
        '2025-03-01 12:00:00'
    ),
    new Task(
        2,
        'Sell old stuff',
        'Task 2 description',
        null,
        false,
        '2025-03-02 12:00:00',
        '2025-03-02 12:00:00'
    ),
    new Task(
        3,
        'Learn programming',
        'Task 3 description',
        'Task 3 long description',
        true,
        '2025-03-03 12:00:00',
        '2025-03-03 12:00:00'
    ),
    new Task(
        4,
        'Take dogs for a walk',
        'Task 4 description',
        null,
        false,
        '2025-03-04 12:00:00',
        '2025-03-04 12:00:00'
    ),
];

Route::get('/', function () {
    return redirect()->route('task.index');
});

// This route displays the welcome page with a view
Route::get('/tasks', function () use ($tasks) {
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('task.index');

Route::get('/tasks/{id}', function ($id) use ($tasks) {
    $task = collect($tasks)->firstWhere('id', $id);
    if (!$task) {
        abort(Response::HTTP_NOT_FOUND);
    }
    return view('show', ['task' => $task]);
})->name('task.show');

// This route returns a simple string response
// Route::get('/hello', function () {
//     return 'Hello, World!';
// })->name('hello');

// This route redirects to the hello route
// Route::get('hallo', function () {
//     return redirect()->route('hello');
// });

// This is how dynamic route parameters work
// Route::get('greet/{name}', function ($name) {
//     return 'Hello, ' . $name . '!';
// });

// This is how fallback routes work
Route::fallback(function () {
    return "I'm the fallback route";
});

// To view all the routes
// php artisan route:list
