<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
    <!-- Memuat Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .priority-High {
            @apply bg-red-100 text-red-800;
        }

        .priority-Medium {
            @apply bg-yellow-100 text-yellow-800;
        }

        .priority-Low {
            @apply bg-green-100 text-green-800;
        }

        .status-Completed {
            @apply line-through opacity-60;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-2xl">
        <header class="mb-6 border-b pb-4 flex justify-between items-center">
            <h1 class="text-3xl font-extrabold text-gray-900">Daftar Tugas</h1>
            <a href="{{ route('tasks.create') }}" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition duration-150 shadow-md">
                + Tambah Tugas Baru
            </a>
        </header>

        <!-- Pesan Sukses -->
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif

        <!-- Statistik Total Tugas -->
        <div class="mb-6 p-4 bg-indigo-50 rounded-lg shadow-inner">
            <p class="text-lg font-semibold text-indigo-700">
                Total Tugas Aktif: <span class="text-2xl font-bold">{{ $totalTasks }}</span>
            </p>
        </div>

        <!-- Tabel Daftar Tugas -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prioritas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Batas Waktu</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($tasks as $task)
                    <tr class="{{ $task->status == 'Completed' ? 'status-Completed' : '' }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $task->title }}
                            <p class="text-gray-500 text-xs mt-1 truncate max-w-xs">{{ $task->description }}</p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full priority-{{ $task->priority }}">
                                {{ $task->priority }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $task->due_date ? $task->due_date->format('d M Y') : 'N/A' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <form action="{{ route('tasks.updateStatus', ['task' => $task->id]) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <select name="status"
                                    onchange="this.form.submit()"
                                    class="border rounded px-2 py-1 text-sm">

                                    <option value="Not Started" {{ $task->status == 'Not Started' ? 'selected' : '' }}>Not Started</option>
                                    <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>

                                </select>
                            </form>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500 text-lg">Belum ada tugas yang ditambahkan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
