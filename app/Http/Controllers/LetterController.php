<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LetterController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $letters = Letter::with('category')
            ->when($search, function($query) use ($search) {
                return $query->where(function($q) use ($search) {
                    $q->where('letter_number', 'like', "%{$search}%")
                      ->orWhere('title', 'like', "%{$search}%")
                      ->orWhereHas('category', function($cat) use ($search) {
                          $cat->where('name', 'like', "%{$search}%");
                      });
                });
            })
            ->orderBy('upload_date', 'desc')
            ->get();
            
        return view('letters.index', compact('letters', 'search'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('letters.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // ✅ Validasi hanya PDF maksimal 2MB
        $request->validate([
            'letter_number' => 'required|string|max:50',
            'category_id'   => 'required|exists:categories,id',
            'title'         => 'required|string|max:255',
            'file'          => 'required|mimes:pdf|max:2048', // hanya PDF max 2MB
        ], [
            'file.mimes' => 'File harus berupa PDF.',
            'file.max'   => 'Ukuran file maksimal 2MB.',
        ]);

        try {
            // Simpan file
            $filePath = $request->file('file')->store('letters', 'public');

            // Simpan data ke database
            Letter::create([
                'letter_number' => $request->letter_number,
                'category_id'   => $request->category_id,
                'title'         => $request->title,
                'file_path'     => $filePath,
                'upload_date'   => now()
            ]);

            return redirect()->route('letters.index')
                ->with('success', 'Data berhasil disimpan');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi error: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show(Letter $letter)
    {
        return view('letters.show', compact('letter'));
    }

    public function edit($id)
    {
        $letter = Letter::findOrFail($id);
        $categories = Category::all();

        return view('letters.edit', compact('letter', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $letter = Letter::findOrFail($id);

        // ✅ Validasi hanya PDF maksimal 2MB
        $validated = $request->validate([
            'letter_number' => 'required|string|max:50',
            'category_id'   => 'required|exists:categories,id',
            'title'         => 'required|string|max:255',
            'file'          => 'nullable|mimes:pdf|max:2048', // hanya PDF max 2MB
        ], [
            'file.mimes' => 'File harus berupa PDF.',
            'file.max'   => 'Ukuran file maksimal 2MB.',
        ]);

        // Update metadata
        $letter->letter_number = $validated['letter_number'];
        $letter->category_id   = $validated['category_id'];
        $letter->title         = $validated['title'];

        // Kalau ada file baru, hapus file lama lalu simpan file baru
        if ($request->hasFile('file')) {
            if ($letter->file_path && Storage::disk('public')->exists($letter->file_path)) {
                Storage::disk('public')->delete($letter->file_path);
            }
            $path = $request->file('file')->store('letters', 'public');
            $letter->file_path = $path;
        }

        // Update waktu unggah otomatis jika ada perubahan
        if ($letter->isDirty()) {
            $letter->upload_date = now();
        }

        $letter->save();

        return redirect()->route('letters.show', $letter->id)
                         ->with('success', 'Surat berhasil diperbarui.');
    }

    public function destroy(Letter $letter)
    {
        Storage::disk('public')->delete($letter->file_path);
        $letter->delete();
        
        return redirect()->route('letters.index')
            ->with('success', 'Surat berhasil dihapus');
    }

    public function download(Letter $letter)
    {
        return Storage::disk('public')->download($letter->file_path);
    }
}
