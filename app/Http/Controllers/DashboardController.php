<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\HeroSection;
use App\Models\AboutSection;
use App\Models\CultureItem;
use App\Models\Product;
use App\Models\GalleryVideo;
use App\Models\GalleryPhoto;
use App\Models\Researcher;
use App\Models\ContactInfo;

class DashboardController extends Controller
{
    /**
     * Display dashboard overview
     */
    public function index()
    {
        $stats = [
            'hero' => HeroSection::exists() ? 1 : 0,
            'culture_items' => CultureItem::count(),
            'products' => Product::count(),
            'researchers' => Researcher::count(),
            'videos' => GalleryVideo::count(),
            'photos' => GalleryPhoto::count(),
            'total_media' => GalleryVideo::count() + GalleryPhoto::count(),
            'contact' => ContactInfo::exists() ? 1 : 0,
        ];

        return view('dashboard.index', compact('stats'));
    }

    /**
     * Show hero section edit form
     */
    public function hero()
    {
        $hero = HeroSection::first();
        return view('dashboard.hero', compact('hero'));
    }

    /**
     * Update hero section
     */
    public function updateHero(Request $request)
    {
        $validated = $request->validate([
            'badge' => 'required|string|max:100',
            'title' => 'required|string|max:200',
            'subtitle' => 'required|string|max:300',
            'description' => 'required|string',
            'btn_primary_text' => 'required|string|max:100',
            'btn_primary_link' => 'required|string|max:255',
            'btn_secondary_text' => 'required|string|max:100',
            'btn_secondary_link' => 'required|string|max:255',
            'background_image' => 'nullable|image|max:2048'
        ]);

        $hero = HeroSection::first();

        // Handle image upload if exists
        if ($request->hasFile('background_image')) {
            // Delete old image if exists
            if ($hero && $hero->background_image) {
                Storage::disk('public')->delete($hero->background_image);
            }
            $validated['background_image'] = $request->file('background_image')->store('hero', 'public');
        }

        if ($hero) {
            $hero->update($validated);
        } else {
            HeroSection::create($validated);
        }

        // Return JSON response for AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Hero section berhasil diperbarui!'
            ]);
        }

        Session::flash('success', 'Hero section berhasil diperbarui!');
        return redirect()->route('dashboard.hero');
    }

    /**
     * Show about section edit form
     */
    public function about()
    {
        $about = AboutSection::first();
        return view('dashboard.about', compact('about'));
    }

    /**
     * Update about section
     */
    public function updateAbout(Request $request)
    {
        $validated = $request->validate([
            'badge' => 'required|string|max:100',
            'title' => 'required|string|max:200',
            'subtitle' => 'required|string',
            'who_title' => 'required|string|max:200',
            'who_paragraph1' => 'required|string',
            'who_paragraph2' => 'required|string',
            'vision_title' => 'required|string|max:200',
            'vision_text' => 'required|string',
            'mission_text' => 'required|string',
            'stat1_number' => 'required|string|max:20',
            'stat1_label' => 'required|string|max:100',
            'stat2_number' => 'required|string|max:20',
            'stat2_label' => 'required|string|max:100',
            'stat3_number' => 'required|string|max:20',
            'stat3_label' => 'required|string|max:100',
            'about_image' => 'nullable|image|max:2048'
        ]);

        $about = AboutSection::first();

        // Handle image upload
        if ($request->hasFile('about_image')) {
            if ($about && $about->about_image) {
                Storage::disk('public')->delete($about->about_image);
            }
            $validated['about_image'] = $request->file('about_image')->store('about', 'public');
        }

        if ($about) {
            $about->update($validated);
        } else {
            AboutSection::create($validated);
        }

        Session::flash('success', 'Tentang Kami berhasil diperbarui!');
        return redirect()->route('dashboard.about');
    }

    /**
     * Show culture management page
     */
    public function culture()
    {
        $cultureItems = CultureItem::ordered()->get();
        return view('dashboard.culture', compact('cultureItems'));
    }

    /**
     * Update culture items
     */
    public function updateCulture(Request $request)
    {
        $validated = $request->validate([
            'id' => 'nullable|exists:culture_items,id',
            'icon' => 'required|string|max:100',
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'order' => 'required|integer',
            'is_active' => 'nullable|boolean'
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->id) {
            $item = CultureItem::find($request->id);
            $item->update($validated);
            $message = 'Item budaya berhasil diperbarui!';
        } else {
            CultureItem::create($validated);
            $message = 'Item budaya berhasil ditambahkan!';
        }

        Session::flash('success', $message);
        return redirect()->route('dashboard.culture');
    }

    /**
     * Delete culture item
     */
    public function deleteCultureItem($id)
    {
        $item = CultureItem::findOrFail($id);
        $item->delete();

        Session::flash('success', 'Item budaya berhasil dihapus!');
        return redirect()->route('dashboard.culture');
    }

    /**
     * Show media gallery page
     */
    public function media()
    {
        $videos = GalleryVideo::ordered()->get();
        $photos = GalleryPhoto::ordered()->get();
        $hero = HeroSection::first();

        return view('dashboard.media', compact('videos', 'photos', 'hero'));
    }

    /**
     * Update hero video background
     */
    public function updateHeroVideo(Request $request)
    {
        $validated = $request->validate([
            'enable_video_background' => 'nullable|boolean',
            'hero_video_url' => 'required|string|max:255'
        ]);

        // Extract YouTube video ID from URL if needed
        $videoId = $validated['hero_video_url'];
        if (str_contains($videoId, 'youtube.com') || str_contains($videoId, 'youtu.be')) {
            preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]+)/', $videoId, $matches);
            if (isset($matches[1])) {
                $videoId = $matches[1];
            }
        }

        $hero = HeroSection::first();

        if ($hero) {
            $hero->update([
                'enable_video_background' => $request->has('enable_video_background'),
                'video_youtube_id' => $videoId,
            ]);
        } else {
            HeroSection::create([
                'enable_video_background' => $request->has('enable_video_background'),
                'video_youtube_id' => $videoId,
            ]);
        }

        Session::flash('success', 'Pengaturan video hero berhasil diperbarui!');
        return redirect()->route('dashboard.media');
    }

    /**
     * Add new video to gallery
     */
    public function addVideo(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'youtube_url' => 'required|string|max:255',
            'views' => 'nullable|string|max:50',
            'upload_date' => 'nullable|string|max:50',
            'is_featured' => 'nullable|boolean'
        ]);

        // Extract YouTube video ID
        $videoId = $validated['youtube_url'];
        $fullUrl = $validated['youtube_url'];

        if (str_contains($videoId, 'youtube.com') || str_contains($videoId, 'youtu.be')) {
            preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]+)/', $videoId, $matches);
            if (isset($matches[1])) {
                $videoId = $matches[1];
            }
        } else {
            $fullUrl = 'https://www.youtube.com/watch?v=' . $videoId;
        }

        GalleryVideo::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'youtube_id' => $videoId,
            'youtube_url' => $fullUrl,
            'views' => $validated['views'] ?? null,
            'upload_date' => $validated['upload_date'] ?? null,
            'is_featured' => $request->has('is_featured'),
            'order' => GalleryVideo::max('order') + 1,
            'is_active' => true,
        ]);

        Session::flash('success', 'Video "' . $validated['title'] . '" berhasil ditambahkan!');
        return redirect()->route('dashboard.media');
    }

    /**
     * Add new photo to gallery
     */
    public function addPhoto(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'caption' => 'required|string|max:300',
            'photo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        // Handle photo upload
        $imagePath = $request->file('photo')->store('gallery', 'public');

        GalleryPhoto::create([
            'title' => $validated['title'],
            'caption' => $validated['caption'],
            'image_path' => $imagePath,
            'order' => GalleryPhoto::max('order') + 1,
            'is_active' => true,
        ]);

        Session::flash('success', 'Foto "' . $validated['title'] . '" berhasil ditambahkan!');
        return redirect()->route('dashboard.media');
    }

    /**
     * Delete video from gallery
     */
    public function deleteVideo($id)
    {
        $video = GalleryVideo::findOrFail($id);
        $video->delete();

        Session::flash('success', 'Video berhasil dihapus!');
        return redirect()->route('dashboard.media');
    }

    /**
     * Delete photo from gallery
     */
    public function deletePhoto($id)
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
     * Show settings page
     */
    public function settings()
    {
        return view('dashboard.settings');
    }
}
