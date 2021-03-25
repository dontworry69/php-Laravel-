<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return "Все работает";
});

Route::get('/api/todos', function () {
    return \App\Models\ToDo::all();
});

Route::get('/api/todos/completed', function () {
    $todos = \App\Models\ToDo::all();
    foreach ($todos as $todo) {
        if ($todo->is_done == 1) {
            $result[] = $todo;
        }
    }

    return $result;
});

Route::get('/api/todos/incompleted', function () {
    $todos = \App\Models\ToDo::all();
    foreach ($todos as $todo) {
        if ($todo->is_done == 0) {
            $result[] = $todo;
        }
    }

    return $result;
});

Route::get('/api/todos/add-meow/{id}', function ($id) {
    $todo = \App\Models\ToDo::find($id);
    $todo->title .= ' said meow';
    $todo->save();

    return $todo;
});

Route::get('/api/todos/{id}', function ($id) {
    $todos = \App\Models\ToDo::all();
    foreach ($todos as $todo) {
        if ($todo->id == $id) {
            $result = $todo;
        }
    }

    return $result;
});
