<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::resource('tasks', TaskController::class);
Route::redirect('/', '/tasks'); // Jika akses localhost/task-app/public langsung dilempar ke halaman tugas