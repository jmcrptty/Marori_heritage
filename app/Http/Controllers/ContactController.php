<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    /**
     * Display the contact management page
     */
    public function index()
    {
        $contact = ContactInfo::first();

        return view('dashboard.contact', compact('contact'));
    }

    /**
     * Update contact information
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'whatsapp' => 'required|string|max:50',
            'whatsapp_link' => 'required|url|max:255',
            'email' => 'required|email|max:100',
            'address' => 'required|string',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'shopee_url' => 'nullable|string|max:255',
            'shopee_username' => 'nullable|string|max:100',
            'tokopedia_url' => 'nullable|string|max:255',
            'tokopedia_store_name' => 'nullable|string|max:200',
            'maps_embed_url' => 'nullable|string',
        ]);

        // Handle checkboxes for active status
        $validated['is_instagram_active'] = $request->has('is_instagram_active');
        $validated['is_facebook_active'] = $request->has('is_facebook_active');
        $validated['is_youtube_active'] = $request->has('is_youtube_active');
        $validated['is_tiktok_active'] = $request->has('is_tiktok_active');
        $validated['is_twitter_active'] = $request->has('is_twitter_active');
        $validated['is_shopee_active'] = $request->has('is_shopee_active');
        $validated['is_tokopedia_active'] = $request->has('is_tokopedia_active');
        $validated['is_maps_active'] = $request->has('is_maps_active');

        // Convert empty strings to null
        foreach (['instagram', 'facebook', 'youtube', 'tiktok', 'twitter', 'shopee_url', 'shopee_username', 'tokopedia_url', 'tokopedia_store_name', 'maps_embed_url'] as $field) {
            if (empty($validated[$field])) {
                $validated[$field] = null;
            }
        }

        $contact = ContactInfo::first();

        if ($contact) {
            $contact->update($validated);
            Session::flash('success', 'Informasi kontak berhasil diperbarui!');
        } else {
            ContactInfo::create($validated);
            Session::flash('success', 'Informasi kontak berhasil ditambahkan!');
        }

        return redirect()->route('dashboard.contact');
    }
}
