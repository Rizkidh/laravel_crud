<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; // *** PENTING: Import Model Task ***

class TaskController extends Controller
{
    /**
     * Menampilkan daftar semua tugas dan total tugas.
     * Menggunakan: Task::all() dan Task::count()
     */
    public function index()
    {
        // Ambil semua tugas dari database, diurutkan berdasarkan due_date
        $tasks = Task::orderBy('due_date')->get();

        // Hitung total semua tugas
        $totalTasks = Task::count();

        // Kirim data ke view (misalnya: 'tasks.index')
        return view('tasks.tasksall', compact('tasks', 'totalTasks'));
    }

    /**
     * Menghitung dan menampilkan hanya total tugas.
     * Method ini bisa dipanggil secara terpisah, misalnya untuk dashboard.
     */
    public function totaltasks()
    {
        $totalTasks = Task::count();

        // Contoh sederhana mengembalikan nilai, bisa disesuaikan untuk kebutuhan API/Blade
        return view('tasks.total', compact('totalTasks'));
    }

    /**
     * Menampilkan form untuk membuat tugas baru.
     */
    public function create()
    {
        // Kirim ke view form (misalnya: 'tasks.create')
        return view('tasks.create');
    }

    /**
     * Menyimpan tugas baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'priority' => 'required|in:Low,Medium,High', // Pastikan sesuai ENUM di DB
            'status' => 'required|in:Pending,In Progress,Completed', // Pastikan sesuai ENUM di DB
        ]);

        // 2. Simpan data menggunakan Mass Assignment (Lebih Ringkas & Aman)
        Task::create($validatedData);

        // 3. Redirect dengan pesan sukses
        return redirect()->route('tasks.index')->with('success', 'Task berhasil dibuat!');
    }

    public function updateStatus(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|in:Not Started,In Progress,Completed'
        ]);

        $task->status = $request->status;
        $task->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui!');
    }
}
