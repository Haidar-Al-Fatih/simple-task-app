<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $tasks = Task::oldest()->get();
        return view('tasks.index', compact('tasks'));
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil ditambahkan!');
    }

    // Menampilkan form edit (mengambil data spesifik)
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Memperbarui data
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil diperbarui!');
    }

    // Menghapus data
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dihapus!');
    }
}