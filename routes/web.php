<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;


Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks'=> Task::latest()->paginate(10)
        //'tasks' => Task::latest()->where('completed',true)->get()
        //'tasks' => App\Models\Task::latest()->get() - od najwowszych
    ]);
})->name('tasks.index');
//
Route::view('tasks/create','create')->name('tasks.create');
//
Route::get('/tasks/{task}', function (Task $task)  {
    return view('show', ['task'=> $task]);   
})->name('tasks.show');
//
Route::get('/greet/{name}', function ($name) {
    return 'Hello ' . $name . '!';
});

Route::post('/tasks', function (TaskRequest $request) {

    // $data = $request->validated();
    // $task = new Task;
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();
    $task = Task::create($request->validated());

    //dd($request->all());
    return redirect()->route('tasks.show',['task'=>$task->id])
            ->with('success','Task created successfully!');

})->name('tasks.store');


Route::put('/tasks/{task}', function (Task $task,TaskRequest $request) {
    
    $task->update($request->validated());

    //dd($request->all());
    return redirect()->route('tasks.show',['task'=>$task->id])
            ->with('success','Task edited successfully!');

})->name('tasks.update');


Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task,
    ]);
})->name('tasks.edit');


Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('tasks.index')->with('success','Task deleted successfull');        
})->name('tasks.delete');


Route::put('tasks/{task}/toggle-complete', function(Task $task) {
 $task->toggleComplete();
 return redirect()->route('tasks.index')->with('success', 'Task Update status successfully !');
})->name('tasks.toggle');

// Route::fallback(function () {
//     return 'Still got somewhere!';
// });









