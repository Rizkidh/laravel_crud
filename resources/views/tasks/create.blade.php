<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Tugas Baru</title>
    <!-- Memuat Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-lg bg-white p-8 rounded-xl shadow-2xl">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-6 border-b pb-3">Buat Tugas Baru</h1>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf <!-- Token CSRF wajib di Laravel -->

            <div class="space-y-5">
                <!-- Field Judul -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Tugas <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('title') border-red-500 @enderror" value="{{ old('title') }}" required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Field Deskripsi -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="description" id="description" rows="3" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex space-x-4">
                    <!-- Field Batas Waktu -->
                    <div class="flex-1">
                        <label for="due_date" class="block text-sm font-medium text-gray-700 mb-1">Batas Waktu</label>
                        <input type="date" name="due_date" id="due_date" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('due_date') border-red-500 @enderror" value="{{ old('due_date') }}">
                        @error('due_date')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Field Prioritas -->
                    <div class="flex-1">
                        <label for="priority" class="block text-sm font-medium text-gray-700 mb-1">Prioritas <span class="text-red-500">*</span></label>
                        <select name="priority" id="priority" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('priority') border-red-500 @enderror" required>
                            <option value="Low" {{ old('priority') == 'Low' ? 'selected' : '' }}>Low</option>
                            <option value="Medium" {{ old('priority') == 'Medium' ? 'selected' : '' }}>Medium</option>
                            <option value="High" {{ old('priority') == 'High' ? 'selected' : '' }}>High</option>
                        </select>
                        @error('priority')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Field Status (Awal) -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status Awal <span class="text-red-500">*</span></label>
                    <select name="status" id="status" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('status') border-red-500 @enderror" required>
                        <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="In Progress" {{ old('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="mt-8 flex justify-end space-x-3">
                <a href="{{ route('tasks.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition duration-150">Batal</a>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition duration-150 shadow-md">
                    Simpan Tugas
                </button>
            </div>
        </form>
    </div>
</body>
</html>
