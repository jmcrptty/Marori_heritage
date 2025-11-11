<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display products management page
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('dashboard.products', compact('products'));
    }

    /**
     * Store new product
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:200',
            'category' => 'required|string|max:100',
            'description' => 'required|string|max:500',
            'price' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:30720',
            'shopee_link' => 'nullable|url|max:255',
            'tokopedia_link' => 'nullable|url|max:255',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validated);

        // Return JSON response for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil ditambahkan!'
            ]);
        }

        Session::flash('success', 'Produk berhasil ditambahkan!');
        return redirect()->route('dashboard.products');
    }

    /**
     * Update existing product
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:200',
            'category' => 'required|string|max:100',
            'description' => 'required|string|max:500',
            'price' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:30720',
            'shopee_link' => 'nullable|url|max:255',
            'tokopedia_link' => 'nullable|url|max:255',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        // Return JSON response for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil diperbarui!'
            ]);
        }

        Session::flash('success', 'Produk berhasil diperbarui!');
        return redirect()->route('dashboard.products');
    }

    /**
     * Delete product
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete image if exists
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        Session::flash('success', 'Produk berhasil dihapus!');
        return redirect()->route('dashboard.products');
    }
}
