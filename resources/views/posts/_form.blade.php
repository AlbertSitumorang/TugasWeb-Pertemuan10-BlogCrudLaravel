{{-- Dipakai bersama oleh create.blade.php dan edit.blade.php --}}
<div>
    <label for="title" class="block text-sm font-semibold text-slate-700 mb-1.5">Judul</label>
    <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}"
           placeholder="Tulis judul yang menarik..."
           class="block w-full border-slate-200 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('title') border-red-400 ring-1 ring-red-200 @enderror">
    @error('title')
        <p class="text-red-600 text-sm mt-1.5 flex items-center gap-1">⚠️ {{ $message }}</p>
    @enderror
</div>

<div class="mt-5">
    <label for="body" class="block text-sm font-semibold text-slate-700 mb-1.5">Isi Post</label>
    <textarea id="body" name="body" rows="8" placeholder="Tulis isi post di sini..."
              class="block w-full border-slate-200 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('body') border-red-400 ring-1 ring-red-200 @enderror">{{ old('body', $post->body) }}</textarea>
    @error('body')
        <p class="text-red-600 text-sm mt-1.5 flex items-center gap-1">⚠️ {{ $message }}</p>
    @enderror
</div>

<div class="mt-5">
    <label for="image" class="block text-sm font-semibold text-slate-700 mb-1.5">Gambar (opsional)</label>
    <input type="file" id="image" name="image" accept="image/*"
           class="block w-full text-sm text-slate-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-indigo-50 file:text-indigo-700 file:font-medium hover:file:bg-indigo-100">
    @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" class="mt-3 w-28 h-28 object-cover rounded-xl ring-1 ring-slate-100">
    @endif
    @error('image')
        <p class="text-red-600 text-sm mt-1.5 flex items-center gap-1">⚠️ {{ $message }}</p>
    @enderror
</div>

<button type="submit"
        class="mt-7 px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-sm font-semibold shadow-sm shadow-indigo-200 transition">
    💾 Simpan
</button>
