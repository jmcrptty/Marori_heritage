<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroSection;
use App\Models\AboutSection;
use App\Models\CultureItem;
use App\Models\Product;
use App\Models\ContactInfo;
use App\Models\GalleryVideo;
use App\Models\GalleryPhoto;
use App\Models\Researcher;

class HomeController extends Controller
{
    /**
     * Display the homepage
     */
    public function index()
    {
        // Check if tables exist before querying
        try {
            $hero = HeroSection::first();
            $about = AboutSection::first();
            $cultureItems = CultureItem::ordered()->get();
            $products = Product::latest()->get();
            $contact = ContactInfo::first();
            $video = GalleryVideo::active()->featured()->first() ?? GalleryVideo::active()->ordered()->first();
            $videos = GalleryVideo::active()->ordered()->get();
            $photos = GalleryPhoto::active()->ordered()->get();
            $researchers = Researcher::ordered()->get();

            return view('main', compact('hero', 'about', 'cultureItems', 'products', 'contact', 'video', 'videos', 'photos', 'researchers'));
        } catch (\Exception $e) {
            // If database not migrated yet, return view without data
            return view('main');
        }
    }
}
