<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class CastController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $casts = Cast::latest()->paginate(5);

        //render view with casts$casts
        return view('casts.index', compact('casts'));
    }

    public function create() : View
    {
        return view('casts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'bio' => 'required',
        ]);

        // Create a new Cast instance with validated data
        $cast = new Cast();
        $cast->nama = $validatedData['nama'];
        $cast->umur = $validatedData['umur'];
        $cast->bio = $validatedData['bio'];

        // Save the new cast entry
        $cast->save();

        // Redirect to a relevant page after successful creation
        return redirect()->route('casts.index')->with('success', 'Cast member created successfully!');
    }

    public function show(string $id): View
    {
        $cast = Cast::findOrFail($id);

        return view('casts.show', compact('cast'));
    }

    public function edit(string $id): View
    {
        $cast = Cast::findOrFail($id);

        return view('casts.edit', compact('cast'));
    }

    public function update(Request $request, Cast $cast): RedirectResponse
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'bio' => 'required',
        ]);

        // Update the cast instance with validated data
        $cast->nama = $validatedData['nama'];
        $cast->umur = $validatedData['umur'];
        $cast->bio = $validatedData['bio'];

        // Save the updated cast entry
        $cast->save();

        // Redirect to a relevant page after successful update
        return redirect()->route('casts.index')->with('success', 'Cast member updated successfully!');
    }

    public function destroy(Cast $cast): RedirectResponse
    {
        // Delete the cast
        $cast->delete();

        // Redirect to a relevant page after successful deletion
        return redirect()->route('casts.index')->with('success', 'Cast member deleted successfully!');
    }
}
