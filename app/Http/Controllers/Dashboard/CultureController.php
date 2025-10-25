<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CultureItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CultureController extends Controller
{
    /**
     * Display a listing of culture items
     */
    public function index()
    {
        $cultures = CultureItem::ordered()->get();
        return view('dashboard.culture', compact('cultures'));
    }

    /**
     * Store a newly created culture item
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'category' => 'required|string|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        // Handle image upload to public folder
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/culture'), $imageName);
            $validated['image'] = 'images/culture/' . $imageName;
        }

        CultureItem::create($validated);

        return redirect()->route('dashboard.culture')
            ->with('success', 'Item budaya berhasil ditambahkan!');
    }

    /**
     * Update the specified culture item
     */
    public function update(Request $request, CultureItem $culture)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'category' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($culture->image && file_exists(public_path($culture->image))) {
                unlink(public_path($culture->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/culture'), $imageName);
            $validated['image'] = 'images/culture/' . $imageName;
        }

        $culture->update($validated);

        return redirect()->route('dashboard.culture')
            ->with('success', 'Item budaya berhasil diperbarui!');
    }

    /**
     * Remove the specified culture item
     */
    public function destroy(CultureItem $culture)
    {
        // Delete image if exists
        if ($culture->image && file_exists(public_path($culture->image))) {
            unlink(public_path($culture->image));
        }

        $culture->delete();

        return redirect()->route('dashboard.culture')
            ->with('success', 'Item budaya berhasil dihapus!');
    }
}
