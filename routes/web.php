<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;



Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->where('completed',true)->get()
        //'tasks' => App\Models\Task::latest()->get() - od najwowszych
    ]);
})->name('tasks.index');
//
Route::view('tasks/create','create');
//
Route::get('/tasks/{id}', function ($id)  {
    return view('show', ['task'=> Task::findOrFail($id)]);   
})->name('tasks.show');
//
Route::get('/greet/{name}', function ($name) {
    return 'Hello ' . $name . '!';
});

Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',

    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    //dd($request->all());
    return redirect()->route('tasks.show',['id'=>$task->id])
            ->with('success','Task created successfully!');

})->name('tasks.store');


Route::put('/tasks/{id}', function ($id,Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',

    ]);

    $task = Task::findOrFail($id);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    //dd($request->all());
    return redirect()->route('tasks.show',['id'=>$task->id])
            ->with('success','Task edited successfully!');

})->name('tasks.update');


Route::get('/tasks/{id}/edit', function ($id) {
    return view('edit', [
        'task' => Task::findOrFail($id)
    ]);
})->name('tasks.edit');

// Route::fallback(function () {
//     return 'Still got somewhere!';
// });









