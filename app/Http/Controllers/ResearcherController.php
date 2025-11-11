<?php

namespace App\Http\Controllers;

use App\Models\Researcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ResearcherController extends Controller
{
    /**
     * Display researchers management page
     */
    public function index()
    {
        $researchers = Researcher::ordered()->get();
        return view('dashboard.researchers', compact('researchers'));
    }

    /**
     * Store new researcher
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:200',
            'role' => 'required|string|max:100',
            'institution' => 'required|string|max:200',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:30720',
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('researchers', 'public');
        }

        $validated['order'] = Researcher::max('order') + 1;

        Researcher::create($validated);

        // Return JSON response for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Peneliti berhasil ditambahkan!'
            ]);
        }

        Session::flash('success', 'Peneliti berhasil ditambahkan!');
        return redirect()->route('dashboard.researchers');
    }

    /**
     * Update existing researcher
     */
    public function update(Request $request, $id)
    {
        $researcher = Researcher::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:200',
            'role' => 'required|string|max:100',
            'institution' => 'required|string|max:200',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:30720',
        ]);

        // Update fields
        $researcher->name = $validated['name'];
        $researcher->role = $validated['role'];
        $researcher->institution = $validated['institution'];

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($researcher->photo) {
                Storage::disk('public')->delete($researcher->photo);
            }
            $researcher->photo = $request->file('photo')->store('researchers', 'public');
        }

        $researcher->save();

        // Return JSON response for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Peneliti berhasil diperbarui!'
            ]);
        }

        Session::flash('success', 'Peneliti berhasil diperbarui!');
        return redirect()->route('dashboard.researchers');
    }

    /**
     * Delete researcher
     */
    public function destroy($id)
    {
        $researcher = Researcher::findOrFail($id);

        // Delete photo if exists
        if ($researcher->photo) {
            Storage::disk('public')->delete($researcher->photo);
        }

        $researcher->delete();

        Session::flash('success', 'Peneliti berhasil dihapus!');
        return redirect()->route('dashboard.researchers');
    }
}
