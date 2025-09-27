<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('about.index', compact('about'));
    }

  public function edit()
{
    $about = About::first();
    return view('about.edit', compact('about'));
}

public function update(Request $request)
{
    $about = About::firstOrFail();

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'study_program' => 'required|string|max:255',
        'nim' => 'required|string|max:255',
        'creation_date' => 'required|date',
        'photo' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('photos', 'public');
        $validated['photo_path'] = $path;
    }

    $about->update($validated);

    return redirect()->route('about.index')->with('success', 'Data berhasil diperbarui.');
}

}
