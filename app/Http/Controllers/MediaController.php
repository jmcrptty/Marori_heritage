<?php

namespace App\Http\Controllers;

use App\Models\GalleryVideo;
use App\Models\GalleryPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Display media management page
     */
    public function index()
    {
        $videos = GalleryVideo::orderBy('order')->get();
        $photos = GalleryPhoto::orderBy('order')->get();

        return view('dashboard.media', compact('videos', 'photos'));
    }

    /**
     * Store new video
     */
    public function storeVideo(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'youtube_url' => 'required|url',
        ]);

        // Extract YouTube ID from URL
        $youtubeId = $this->extractYouTubeId($validated['youtube_url']);

        if (!$youtubeId) {
            Session::flash('error', 'URL YouTube tidak valid!');
            return redirect()->route('dashboard.media');
        }

        $validated['youtube_id'] = $youtubeId;
        $validated['is_featured'] = false; // Default bukan featured
        $validated['is_active'] = true; // Default aktif
        $validated['order'] = GalleryVideo::max('order') + 1;

        GalleryVideo::create($validated);

        Session::flash('success', 'Video berhasil ditambahkan!');
        return redirect()->route('dashboard.media');
    }

    /**
     * Update existing video
     */
    public function updateVideo(Request $request, $id)
    {
        $video = GalleryVideo::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'youtube_url' => 'required|url',
        ]);

        // Extract YouTube ID from URL
        $youtubeId = $this->extractYouTubeId($validated['youtube_url']);

        if (!$youtubeId) {
            Session::flash('error', 'URL YouTube tidak valid!');
            return redirect()->route('dashboard.media');
        }

        // Update fields manually
        $video->title = $validated['title'];
        $video->description = $validated['description'];
        $video->youtube_url = $validated['youtube_url'];
        $video->youtube_id = $youtubeId;
        // is_featured dan is_active tidak diubah dari sini

        $video->save();

        Session::flash('success', 'Video berhasil diperbarui!');
        return redirect()->route('dashboard.media');
    }

    /**
     * Delete video
     */
    public function destroyVideo($id)
    {
        $video = GalleryVideo::findOrFail($id);
        $video->delete();

        Session::flash('success', 'Video berhasil dihapus!');
        return redirect()->route('dashboard.media');
    }

    /**
     * Store new photo
     */
    public function storePhoto(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'caption' => 'required|string',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:30720',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('gallery/photos', 'public');
        }

        $validated['is_active'] = true;
        $validated['order'] = GalleryPhoto::max('order') + 1;

        GalleryPhoto::create($validated);

        Session::flash('success', 'Foto berhasil ditambahkan!');
        return redirect()->route('dashboard.media');
    }

    /**
     * Update existing photo
     */
    public function updatePhoto(Request $request, $id)
    {
        $photo = GalleryPhoto::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'caption' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:30720',
        ]);

        // Update title and caption
        $photo->title = $validated['title'];
        $photo->caption = $validated['caption'];
        $photo->is_active = $request->has('is_active');

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($photo->image_path) {
                Storage::disk('public')->delete($photo->image_path);
            }
            $photo->image_path = $request->file('image')->store('gallery/photos', 'public');
        }

        $photo->save();

        Session::flash('success', 'Foto berhasil diperbarui!');
        return redirect()->route('dashboard.media');
    }

    /**
     * Delete photo
     */
    public function destroyPhoto($id)
    {
        $photo = GalleryPhoto::findOrFail($id);

        // Delete image file
        if ($photo->image_path) {
            Storage::disk('public')->delete($photo->image_path);
        }

        $photo->delete();

        Session::flash('success', 'Foto berhasil dihapus!');
        return redirect()->route('dashboard.media');
    }

    /**
     * Extract YouTube ID from URL
     */
    private function extractYouTubeId($url)
    {
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i';

        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }

        return null;
    }
}
