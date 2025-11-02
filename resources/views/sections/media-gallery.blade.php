<!-- Media Gallery Section with Slider -->
<section id="galeri" class="media-gallery-section-slider">
    <div class="media-gallery-slider-bg">
        <div class="container-fluid px-4">
            <!-- Header -->
            <div class="media-gallery-header">
                <span class="media-gallery-label">GALERI MEDIA</span>
                <h2 class="media-gallery-main-title">Jelajahi Kehidupan Marori</h2>
                <p class="media-gallery-subtitle">
                    Saksikan kehidupan dan budaya Suku Marori melalui dokumentasi visual yang menakjubkan
                </p>
            </div>

            <!-- Video Slider -->
            <div class="media-gallery-slider-wrapper">
                @if(isset($videos) && $videos->count() > 0)
                <div class="media-gallery-slider-container" id="mediaGallerySlider">
                    @foreach($videos as $video)
                    @if($video->is_active)
                    <div class="media-slide">
                        <div class="media-card">
                            <div class="media-video-wrapper">
                                <iframe
                                    src="https://www.youtube.com/embed/{{ $video->youtube_id }}"
                                    title="{{ $video->title }}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen>
                                </iframe>
                                <div class="media-overlay">
                                    <div class="media-content">
                                        <span class="media-category">VIDEO</span>
                                        <h3 class="media-title">{{ $video->title }}</h3>
                                        <p class="media-description">{{ $video->description }}</p>
                                        <a href="{{ $video->youtube_url }}" target="_blank" rel="noopener" class="media-btn">
                                            <i class="bi bi-play-circle"></i> WATCH
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                @else
                <div class="text-center py-5">
                    <p class="text-white">Belum ada video untuk ditampilkan.</p>
                </div>
                @endif

                <!-- Navigation Buttons -->
                <button class="media-nav-btn media-prev-btn" id="mediaPrevBtn">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="media-nav-btn media-next-btn" id="mediaNextBtn">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div> <!-- End media-gallery-slider-wrapper -->

            <!-- Photo Gallery Grid -->
            <div class="photo-gallery-section">
                <div class="photo-gallery-header">
                    <span class="photo-gallery-label">GALERI FOTO</span>
                    <h2 class="photo-gallery-title">Momen Berharga Marori</h2>
                    <p class="photo-gallery-subtitle">
                        Koleksi foto-foto memukau yang mengabadikan kehidupan, budaya, dan keindahan alam Suku Marori
                    </p>
                </div>

                @if(isset($photos) && $photos->count() > 0)
                <div class="photo-grid" id="photoGrid">
                    @foreach($photos as $index => $photo)
                    @if($photo->is_active && $photo->image_path)
                    <div class="photo-item" data-index="{{ $index }}" style="{{ $index >= 9 ? 'display: none;' : '' }}">
                        <div class="photo-card" onclick="openLightbox({{ $index }})">
                            <img data-src="{{ asset('storage/' . $photo->image_path) }}" alt="{{ $photo->title }}" loading="lazy" class="lazy-loading photo-img" data-full-src="{{ asset('storage/' . $photo->image_path) }}">
                            <div class="photo-overlay">
                                <div class="photo-content">
                                    <span class="photo-category">FOTO</span>
                                    <h4 class="photo-title">{{ $photo->title }}</h4>
                                    <div class="photo-view-icon">
                                        <i class="bi bi-zoom-in"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>

                @php
                    $activePhotosCount = $photos->filter(fn($p) => $p->is_active && $p->image_path)->count();
                @endphp

                @if($activePhotosCount > 9)
                <div class="load-more-container">
                    <button class="btn-load-more" id="loadMoreBtn" onclick="loadMorePhotos()">
                        <span class="load-more-text">Lihat Lebih Banyak</span>
                        <i class="bi bi-chevron-down"></i>
                    </button>
                    <div class="photos-counter">
                        <span id="photosShown">9</span> dari <span id="photosTotal">{{ $activePhotosCount }}</span> foto
                    </div>
                </div>
                @endif
                @php
                    $activePhotosWithImage = $photos->filter(fn($p) => $p->is_active && $p->image_path)->count();
                @endphp
                @if($activePhotosWithImage == 0)
                <div class="text-center py-5">
                    <p class="text-muted">Belum ada foto untuk ditampilkan. Upload foto melalui dashboard.</p>
                </div>
                @endif
                @else
                <div class="text-center py-5">
                    <p class="text-muted">Belum ada foto untuk ditampilkan.</p>
                </div>
                @endif
            </div> <!-- End photo-gallery-section -->

        </div> <!-- End container-fluid -->
    </div> <!-- End media-gallery-slider-bg -->

    <!-- Lightbox Modal -->
    <div class="photo-lightbox" id="photoLightbox" onclick="closeLightbox(event)">
        <button class="lightbox-close" onclick="closeLightbox(event)">
            <i class="bi bi-x-lg"></i>
        </button>
        <button class="lightbox-nav lightbox-prev" onclick="navigateLightbox(-1, event)">
            <i class="bi bi-chevron-left"></i>
        </button>
        <button class="lightbox-nav lightbox-next" onclick="navigateLightbox(1, event)">
            <i class="bi bi-chevron-right"></i>
        </button>
        <div class="lightbox-content" onclick="event.stopPropagation()">
            <img src="" alt="" id="lightboxImg">
            <div class="lightbox-info">
                <h3 id="lightboxTitle"></h3>
                <div class="lightbox-counter">
                    <span id="lightboxCurrent">1</span> / <span id="lightboxTotal">1</span>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Media Gallery Slider Section */
    .media-gallery-section-slider {
        padding: 0;
        margin: 0;
        position: relative;
        overflow: hidden;
        min-height: 200vh;
        display: flex;
        align-items: flex-start;
    }

    .media-gallery-slider-bg {
        background: #FFFFFF;
        width: 100%;
        min-height: 200vh;
        padding: 80px 0 20px;
        position: relative;
    }

    .media-gallery-slider-bg .container-fluid {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 100%;
        padding-left: 15px;
        padding-right: 15px;
    }

    /* Header */
    .media-gallery-header {
        text-align: center;
        margin-bottom: 40px;
        padding-top: 60px;
        position: relative;
        z-index: 2;
    }

    .media-gallery-label {
        display: inline-block;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 3px;
        color: #FFFFFF;
        text-transform: uppercase;
        margin-bottom: 12px;
        background: rgba(26, 26, 26, 0.8);
        padding: 6px 16px;
        border-radius: 20px;
        border: 2px solid rgba(26, 26, 26, 0.9);
    }

    .media-gallery-main-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        color: #1a1a1a;
        margin-bottom: 12px;
        font-weight: 700;
        line-height: 1.2;
        letter-spacing: -1px;
    }

    .media-gallery-subtitle {
        color: #4a4a4a;
        font-size: 1rem;
        line-height: 1.5;
        max-width: 650px;
        margin: 0 auto;
    }

    /* Slider Wrapper */
    .media-gallery-slider-wrapper {
        position: relative;
        overflow: hidden;
        margin: 0 auto 60px;
        max-width: 100%;
        width: 100%;
        min-height: 70vh;
        display: flex;
        align-items: center;
    }

    .media-gallery-slider-container {
        display: flex;
        gap: 20px;
        transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        width: max-content;
        position: relative;
        z-index: 1;
        padding: 40px 0;
    }

    /* Media Slide - Each takes ~80% of viewport width */
    .media-slide {
        flex: 0 0 auto;
        min-width: 200px;
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        opacity: 0.6;
        filter: brightness(0.7);
        z-index: 1;
        pointer-events: none;
    }

    /* Active/Center slide */
    .media-slide.active {
        opacity: 1;
        filter: brightness(1);
        z-index: 10;
        pointer-events: all;
    }

    /* Media Card */
    .media-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    }

    .media-video-wrapper {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
        height: 0;
        overflow: hidden;
        background: #000;
        border-radius: 24px;
    }

    .media-video-wrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
        border-radius: 24px;
    }

    /* Media Overlay */
    .media-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.6) 50%, transparent 100%);
        padding: 40px 30px 30px;
        opacity: 0;
        transition: opacity 0.4s ease;
        pointer-events: none;
    }

    .media-card:hover .media-overlay {
        opacity: 1;
        pointer-events: all;
    }

    .media-content {
        position: relative;
        z-index: 3;
    }

    .media-category {
        display: inline-block;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 2px;
        color: #FFFFFF;
        text-transform: uppercase;
        margin-bottom: 10px;
        background: rgba(26, 26, 26, 0.2);
        padding: 4px 12px;
        border-radius: 12px;
    }

    .media-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        color: white;
        margin-bottom: 12px;
        font-weight: 700;
        line-height: 1.3;
    }

    .media-description {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .media-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 28px;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50px;
        color: white;
        font-size: 0.9rem;
        font-weight: 700;
        letter-spacing: 1px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .media-btn:hover {
        background: rgba(255, 255, 255, 0.25);
        border-color: rgba(255, 255, 255, 0.5);
        color: white;
        transform: translateY(-2px);
    }

    .media-btn i {
        font-size: 1.2rem;
    }

    /* Navigation Buttons */
    .media-nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: rgba(26, 26, 26, 0.6);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(26, 26, 26, 0.7);
        color: #FFFFFF;
        font-size: 1.8rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 50;
        opacity: 1;
        visibility: visible;
    }

    .media-nav-btn:hover {
        background: rgba(26, 26, 26, 0.8);
        border-color: rgba(26, 26, 26, 0.9);
        transform: translateY(-50%) scale(1.1);
    }

    .media-nav-btn:active {
        transform: translateY(-50%) scale(0.95);
    }

    .media-prev-btn {
        left: 20px;
    }

    .media-next-btn {
        right: 20px;
    }

    /* Photo Gallery Section */
    .photo-gallery-section {
        margin-top: 80px;
        padding: 0 15px 60px;
        position: relative;
        z-index: 2;
    }

    .photo-gallery-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .photo-gallery-label {
        display: inline-block;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 3px;
        color: #FFFFFF;
        text-transform: uppercase;
        margin-bottom: 12px;
        background: rgba(26, 26, 26, 0.8);
        padding: 6px 16px;
        border-radius: 20px;
        border: 2px solid rgba(26, 26, 26, 0.9);
    }

    .photo-gallery-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        color: #1a1a1a;
        margin-bottom: 12px;
        font-weight: 700;
        line-height: 1.2;
        letter-spacing: -1px;
    }

    .photo-gallery-subtitle {
        color: #4a4a4a;
        font-size: 1rem;
        line-height: 1.5;
        max-width: 650px;
        margin: 0 auto;
    }

    /* Photo Grid - 3 columns */
    .photo-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        max-width: 1400px;
        margin: 0 auto;
    }

    .photo-item {
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        transition: transform 0.4s ease;
    }

    .photo-item:hover {
        transform: translateY(-8px);
    }

    .photo-card {
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        background: #000;
        aspect-ratio: 4 / 5;
    }

    .photo-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease, filter 0.4s ease;
    }

    .photo-card:hover img {
        transform: scale(1.1);
        filter: brightness(0.7);
    }

    /* Photo Overlay */
    .photo-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.5) 60%, transparent 100%);
        padding: 30px 25px 25px;
        transform: translateY(100%);
        transition: transform 0.4s ease;
    }

    .photo-card:hover .photo-overlay {
        transform: translateY(0);
    }

    .photo-content {
        position: relative;
        z-index: 3;
    }

    .photo-category {
        display: inline-block;
        font-size: 0.65rem;
        font-weight: 700;
        letter-spacing: 2px;
        color: #FFFFFF;
        text-transform: uppercase;
        margin-bottom: 8px;
        background: rgba(26, 26, 26, 0.2);
        padding: 4px 12px;
        border-radius: 12px;
    }

    .photo-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        color: white;
        margin: 0 0 10px 0;
        font-weight: 700;
        line-height: 1.3;
    }

    .photo-view-icon {
        margin-top: 10px;
        font-size: 1.5rem;
        color: white;
        opacity: 0.9;
    }

    .photo-card {
        cursor: pointer;
    }

    /* Load More Button */
    .load-more-container {
        text-align: center;
        margin-top: 50px;
        padding: 20px 0;
    }

    .btn-load-more {
        background: rgba(26, 26, 26, 0.6);
        border: 2px solid rgba(26, 26, 26, 0.7);
        color: #FFFFFF;
        padding: 16px 40px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
    }

    .btn-load-more:hover {
        background: rgba(26, 26, 26, 0.8);
        border-color: rgba(26, 26, 26, 0.9);
        transform: translateY(-2px);
    }

    .btn-load-more i {
        font-size: 1.2rem;
        transition: transform 0.3s ease;
    }

    .btn-load-more:hover i {
        transform: translateY(3px);
    }

    .photos-counter {
        color: #4a4a4a;
        font-size: 0.95rem;
        font-weight: 500;
    }

    /* Lightbox Modal */
    .photo-lightbox {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.95);
        z-index: 10000;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .photo-lightbox.active {
        display: flex;
        opacity: 1;
    }

    .lightbox-content {
        position: relative;
        max-width: 90%;
        max-height: 90%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .lightbox-content img {
        max-width: 100%;
        max-height: 80vh;
        object-fit: contain;
        border-radius: 12px;
        box-shadow: 0 10px 50px rgba(0, 0, 0, 0.5);
    }

    .lightbox-info {
        margin-top: 20px;
        text-align: center;
        color: white;
    }

    .lightbox-info h3 {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        margin-bottom: 10px;
        font-weight: 700;
    }

    .lightbox-counter {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.7);
        font-weight: 500;
    }

    .lightbox-close {
        position: absolute;
        top: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.1);
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        color: white;
        font-size: 1.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10001;
    }

    .lightbox-close:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: rotate(90deg);
    }

    .lightbox-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.1);
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        color: white;
        font-size: 2rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10001;
    }

    .lightbox-nav:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.5);
    }

    .lightbox-prev {
        left: 30px;
    }

    .lightbox-next {
        right: 30px;
    }

    /* Responsive */
    @media (max-width: 1400px) {
        .media-gallery-slider-wrapper {
            max-width: 100%;
            width: 100%;
        }
    }

    @media (max-width: 1200px) {
        .media-gallery-main-title {
            font-size: 2rem;
        }

        .media-gallery-slider-wrapper {
            max-width: 100%;
            width: 100%;
        }
    }

    @media (max-width: 768px) {
        .media-gallery-section-slider {
            min-height: auto;
        }

        .media-gallery-slider-bg {
            min-height: auto;
            padding: 60px 0 20px;
        }

        .media-gallery-slider-bg .container-fluid {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        .media-gallery-slider-wrapper {
            max-width: 100% !important;
            width: 100% !important;
            min-height: 55vh !important;
            margin-bottom: 40px !important;
            padding: 0 !important;
            position: relative !important;
            overflow: visible !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .media-gallery-slider-container {
            gap: 80vw !important;
            padding: 25px 0 !important;
            justify-content: center !important;
            position: relative !important;
            width: 100% !important;
            display: flex !important;
            align-items: center !important;
        }

        /* Tablet slide */
        .media-slide {
            margin: 0 !important;
            flex-shrink: 0 !important;
            width: 85vw !important;
            max-width: 700px !important;
            min-width: auto !important;
        }

        /* HIDE non-active slides on tablet */
        .media-slide:not(.active) {
            opacity: 0 !important;
            pointer-events: none !important;
            visibility: hidden !important;
        }

        .media-slide.active {
            opacity: 1 !important;
            visibility: visible !important;
            pointer-events: auto !important;
        }

        /* Clean card for tablet */
        .media-card {
            border-radius: 20px;
            overflow: hidden;
            width: 100%;
            height: auto;
        }

        /* Video wrapper with flexible height for tablet */
        .media-video-wrapper {
            width: 100% !important;
            height: auto !important;
            min-height: 250px !important;
            aspect-ratio: 16 / 9 !important;
            overflow: hidden !important;
            background: #000;
            border-radius: 20px;
        }

        .media-video-wrapper iframe {
            width: 100% !important;
            height: 100% !important;
            border: none !important;
            display: block !important;
            object-fit: contain !important;
        }

        .media-overlay {
            background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.4) 50%, transparent 100%);
            padding: 30px 25px 25px;
            justify-content: flex-end;
        }

        .media-content {
            text-align: left;
        }

        .media-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .media-description {
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .media-btn {
            padding: 11px 24px;
            font-size: 0.85rem;
        }

        /* Navigation buttons - optimized for tablet */
        .media-nav-btn {
            width: 48px;
            height: 48px;
            font-size: 1.4rem;
            background: rgba(26, 26, 26, 0.6);
            border-width: 2px;
        }

        .media-prev-btn {
            left: 12px;
        }

        .media-next-btn {
            right: 12px;
        }

        .media-nav-btn:hover {
            background: rgba(26, 26, 26, 0.8);
        }

        .media-gallery-header {
            padding-top: 40px;
            margin-bottom: 30px;
        }

        .media-gallery-main-title {
            font-size: 1.8rem;
        }

        .media-title {
            font-size: 1.4rem;
        }

        .media-description {
            font-size: 0.9rem;
        }

        .media-overlay {
            padding: 30px 20px 20px;
        }

        /* Photo Gallery Responsive - Tablet */
        .photo-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .photo-gallery-title {
            font-size: 2rem;
        }

        .photo-gallery-section {
            margin-top: 60px;
            padding: 0 15px 40px;
        }

        .photo-title {
            font-size: 1.2rem;
        }
    }

    @media (max-width: 576px) {
        .media-gallery-section-slider {
            min-height: auto;
        }

        .media-gallery-slider-bg {
            min-height: auto;
            padding: 40px 0 15px;
        }

        .media-gallery-slider-bg .container-fluid {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        .media-gallery-slider-wrapper {
            max-width: 100% !important;
            width: 100% !important;
            min-height: 45vh !important;
            margin-bottom: 30px !important;
            padding: 0 !important;
            position: relative !important;
            overflow: visible !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .media-gallery-slider-container {
            gap: 0 !important;
            padding: 20px 0 !important;
            justify-content: center !important;
            transform: none !important;
            transition: none !important;
            position: relative !important;
            width: 100% !important;
            display: flex !important;
            align-items: center !important;
        }

        /* Mobile slide - Absolute positioning, stack on top of each other */
        .media-slide {
            position: absolute !important;
            left: 50% !important;
            transform: translateX(-50%) !important;
            margin: 0 !important;
            flex-shrink: 0 !important;
            width: 90vw !important;
            max-width: 500px !important;
            min-width: auto !important;
            transition: opacity 0.4s ease !important;
            opacity: 0 !important;
            visibility: hidden !important;
            pointer-events: none !important;
        }

        /* Only active slide is visible and centered */
        .media-slide.active {
            opacity: 1 !important;
            visibility: visible !important;
            pointer-events: auto !important;
            position: absolute !important;
            left: 50% !important;
            transform: translateX(-50%) !important;
            z-index: 10 !important;
        }

        /* Hide clones on mobile */
        .media-slide.clone {
            display: none !important;
        }

        /* Clean card */
        .media-card {
            border-radius: 18px;
            overflow: hidden;
            width: 100%;
            height: auto;
        }

        /* Video wrapper with flexible height */
        .media-video-wrapper {
            width: 100% !important;
            height: auto !important;
            min-height: 200px !important;
            aspect-ratio: 16 / 9 !important;
            overflow: hidden !important;
            background: #000;
            border-radius: 18px;
        }

        .media-video-wrapper iframe {
            width: 100% !important;
            height: 100% !important;
            border: none !important;
            display: block !important;
            object-fit: contain !important;
        }

        .media-overlay {
            background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.5) 50%, transparent 100%);
            padding: 25px 20px 20px;
            justify-content: flex-end;
        }

        .media-content {
            text-align: left;
        }

        .media-category {
            font-size: 0.7rem;
            padding: 4px 12px;
            margin-bottom: 10px;
        }

        .media-title {
            font-size: 1.3rem;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .media-description {
            font-size: 0.85rem;
            line-height: 1.4;
            margin-bottom: 12px;
        }

        .media-btn {
            padding: 10px 22px;
            font-size: 0.8rem;
        }

        /* Navigation buttons - optimized for mobile */
        .media-nav-btn {
            width: 42px;
            height: 42px;
            font-size: 1.2rem;
            background: rgba(26, 26, 26, 0.6);
            border-width: 2px;
        }

        .media-prev-btn {
            left: 8px;
        }

        .media-next-btn {
            right: 8px;
        }

        .media-nav-btn:hover {
            background: rgba(26, 26, 26, 0.8);
        }

        .media-nav-btn:active {
            transform: translateY(-50%) scale(0.9);
        }

        .media-gallery-header {
            padding-top: 30px;
            margin-bottom: 25px;
        }

        .media-title {
            font-size: 1.2rem;
        }

        .media-description {
            font-size: 0.85rem;
            margin-bottom: 15px;
        }

        .media-btn {
            padding: 10px 20px;
            font-size: 0.85rem;
        }

        /* Photo Gallery Responsive - Mobile */
        .photo-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .photo-gallery-title {
            font-size: 1.8rem;
        }

        .photo-gallery-section {
            margin-top: 40px;
            padding: 0 15px 30px;
        }

        .photo-gallery-header {
            margin-bottom: 30px;
        }

        .photo-title {
            font-size: 1.1rem;
        }

        .photo-overlay {
            padding: 25px 20px 20px;
        }

        /* Lightbox responsive - Mobile */
        .lightbox-close {
            width: 40px;
            height: 40px;
            top: 15px;
            right: 15px;
            font-size: 1.2rem;
        }

        .lightbox-nav {
            width: 45px;
            height: 45px;
            font-size: 1.5rem;
        }

        .lightbox-prev {
            left: 15px;
        }

        .lightbox-next {
            right: 15px;
        }

        .lightbox-info h3 {
            font-size: 1.4rem;
        }

        .lightbox-counter {
            font-size: 0.9rem;
        }

        /* Load More Button - Mobile */
        .btn-load-more {
            padding: 14px 30px;
            font-size: 0.9rem;
        }

        .photos-counter {
            font-size: 0.85rem;
        }
    }

    /* Extra small devices */
    @media (max-width: 400px) {
        .media-gallery-slider-wrapper {
            padding: 0 8px !important;
            overflow: hidden !important;
            min-height: 40vh !important;
            max-width: 100% !important;
            width: 100% !important;
        }

        .media-gallery-slider-container {
            gap: 35vw !important; /* MASSIVE GAP - same as mobile */
            padding: 15px 0 !important;
            justify-content: flex-start !important;
        }

        /* Force slide width on extra small */
        .media-slide {
            flex-shrink: 0 !important;
            width: 96vw !important; /* Same as mobile - 96% */
            max-width: 96vw !important;
            min-width: 96vw !important;
            margin: 0 !important;
        }

        /* Navigation buttons - extra small */
        .media-nav-btn {
            width: 38px;
            height: 38px;
            font-size: 1.1rem;
        }

        .media-prev-btn {
            left: 5px;
        }

        .media-next-btn {
            right: 5px;
        }

        .media-card {
            border-radius: 16px;
        }

        .media-overlay {
            padding: 20px 15px 15px;
        }

        .media-category {
            font-size: 0.65rem;
            padding: 3px 10px;
            margin-bottom: 8px;
        }

        .media-title {
            font-size: 1.15rem;
            margin-bottom: 6px;
        }

        .media-description {
            font-size: 0.8rem;
            line-height: 1.35;
            margin-bottom: 10px;
        }

        .media-btn {
            padding: 8px 20px;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }

        .media-gallery-slider-wrapper .media-nav-btn {
            width: 45px !important;
            height: 45px !important;
            font-size: 1.2rem !important;
        }

        .media-gallery-slider-wrapper .media-prev-btn {
            left: 5px !important;
        }

        .media-gallery-slider-wrapper .media-next-btn {
            right: 5px !important;
        }

        .media-gallery-main-title {
            font-size: 1.6rem;
        }

        .media-gallery-subtitle {
            font-size: 0.9rem;
        }

        /* Lightbox responsive - Extra small */
        .lightbox-close {
            width: 35px;
            height: 35px;
            top: 10px;
            right: 10px;
            font-size: 1rem;
        }

        .lightbox-nav {
            width: 40px;
            height: 40px;
            font-size: 1.3rem;
        }

        .lightbox-prev {
            left: 10px;
        }

        .lightbox-next {
            right: 10px;
        }

        .lightbox-info h3 {
            font-size: 1.2rem;
        }

        .lightbox-counter {
            font-size: 0.85rem;
        }

        .lightbox-content {
            max-width: 95%;
        }

        /* Load More Button - Extra small */
        .btn-load-more {
            padding: 12px 25px;
            font-size: 0.85rem;
        }

        .photos-counter {
            font-size: 0.8rem;
        }

        .load-more-container {
            margin-top: 40px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slider = document.getElementById('mediaGallerySlider');
        const prevBtn = document.getElementById('mediaPrevBtn');
        const nextBtn = document.getElementById('mediaNextBtn');
        const slides = document.querySelectorAll('.media-slide');

        let currentIndex = 0;

        // Debug
        console.log('Media Gallery Slider initialized');
        console.log('Total slides:', slides.length);

        // Set slide widths dynamically (only for desktop)
        function setSlideWidths() {
            const viewportWidth = window.innerWidth;

            // On mobile/tablet, let CSS handle ALL styles
            if (viewportWidth <= 768) {
                slides.forEach(slide => {
                    slide.style.width = '';
                    slide.style.height = '';
                    slide.style.minHeight = '';
                    slide.style.maxHeight = '';
                    slide.style.transform = '';

                    const videoWrapper = slide.querySelector('.media-video-wrapper');
                    if (videoWrapper) {
                        videoWrapper.style.width = '';
                        videoWrapper.style.height = '';
                        videoWrapper.style.paddingTop = '';
                        videoWrapper.style.position = '';
                    }
                });

                // Reset slider transform on mobile
                if (viewportWidth <= 576) {
                    slider.style.transform = 'none';
                }

                console.log('Mobile/Tablet: Using CSS - all inline styles cleared');
                return;
            }

            // Desktop: use JavaScript width calculation
            let widthPercentage = 0.75;
            if (viewportWidth <= 1200) {
                widthPercentage = 0.78;
            }

            const slideWidth = viewportWidth * widthPercentage;

            console.log('Desktop: Setting media slide widths:', {
                viewportWidth: viewportWidth,
                widthPercentage: widthPercentage,
                slideWidth: slideWidth
            });

            slides.forEach(slide => {
                slide.style.width = `${slideWidth}px`;
            });
        }

        // Update active slide for 3D effect
        function updateActiveSlide() {
            slides.forEach((slide, index) => {
                if (index === currentIndex) {
                    slide.classList.add('active');
                } else {
                    slide.classList.remove('active');
                }
            });
        }

        // Load iframe for current and adjacent slides
        function loadVisibleIframes() {
            // All iframes now load immediately with src attribute
            // This function is kept for compatibility but no longer needed
            console.log('All video iframes are loaded directly');
        }

        // Update slider position (with clones)
        function updateSlider(instant = false) {
            const viewportWidth = window.innerWidth;

            // Mobile: CSS-only approach, just update active class
            if (viewportWidth <= 576) {
                updateActiveSlide();
                console.log('Mobile: CSS-only slider, index:', currentIndex);
                return;
            }

            // Tablet/Desktop: Use translateX
            const allSlides = document.querySelectorAll('.media-slide');
            if (!allSlides[0]) {
                console.error('No media slides found!');
                return;
            }
            const slideWidth = allSlides[0].offsetWidth;
            const totalSlides = slides.length;

            // Responsive gap - match CSS
            let gap = 20; // Default gap
            if (viewportWidth <= 768) {
                gap = viewportWidth * 0.80; // 80vw gap on tablet
            }

            // Account for clone at the beginning (+1 offset)
            let displayIndex = currentIndex + 1;

            // Center the current slide in viewport
            const centerOffset = (viewportWidth - slideWidth) / 2;
            const offset = centerOffset - (displayIndex * (slideWidth + gap));

            console.log('Tablet/Desktop media slider:', {
                currentIndex: currentIndex,
                displayIndex: displayIndex,
                viewportWidth: viewportWidth,
                slideWidth: slideWidth,
                centerOffset: centerOffset,
                gap: gap,
                finalOffset: offset,
                instant: instant
            });

            // Apply transition or instant
            if (instant) {
                slider.style.transition = 'none';
                slider.style.transform = `translateX(${offset}px)`;
                // Force reflow
                slider.offsetHeight;
                slider.style.transition = 'transform 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
            } else {
                slider.style.transform = `translateX(${offset}px)`;
            }

            updateActiveSlide();
            loadVisibleIframes(); // Load iframes for visible slides
        }

        // Next slide
        function nextSlide() {
            const totalSlides = slides.length;
            const viewportWidth = window.innerWidth;

            // Mobile: Simple loop through slides
            if (viewportWidth <= 576) {
                currentIndex++;
                if (currentIndex >= totalSlides) {
                    currentIndex = 0;
                }
                updateSlider(false);
                console.log('Mobile next slide:', currentIndex);
                return;
            }

            // Tablet/Desktop: Seamless infinite loop with clones
            currentIndex++;
            updateSlider(false);

            if (currentIndex >= totalSlides) {
                setTimeout(() => {
                    currentIndex = 0;
                    updateSlider(true);
                }, 800);
            }

            console.log('Desktop next slide:', currentIndex);
        }

        // Previous slide
        function prevSlide() {
            const totalSlides = slides.length;
            const viewportWidth = window.innerWidth;

            // Mobile: Simple loop through slides
            if (viewportWidth <= 576) {
                currentIndex--;
                if (currentIndex < 0) {
                    currentIndex = totalSlides - 1;
                }
                updateSlider(false);
                console.log('Mobile prev slide:', currentIndex);
                return;
            }

            // Tablet/Desktop: Seamless infinite loop with clones
            currentIndex--;
            updateSlider(false);

            if (currentIndex < 0) {
                setTimeout(() => {
                    currentIndex = totalSlides - 1;
                    updateSlider(true);
                }, 800);
            }

            console.log('Desktop prev slide:', currentIndex);
        }

        // Event listeners
        nextBtn.addEventListener('click', nextSlide);
        prevBtn.addEventListener('click', prevSlide);

        // Handle window resize
        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                const allSlides = document.querySelectorAll('.media-slide');
                const viewportWidth = window.innerWidth;

                // On mobile/tablet, let CSS handle ALL styles
                if (viewportWidth <= 768) {
                    allSlides.forEach(slide => {
                        slide.style.width = '';
                        slide.style.height = '';
                        slide.style.minHeight = '';
                        slide.style.maxHeight = '';
                        slide.style.transform = '';

                        const videoWrapper = slide.querySelector('.media-video-wrapper');
                        if (videoWrapper) {
                            videoWrapper.style.width = '';
                            videoWrapper.style.height = '';
                            videoWrapper.style.paddingTop = '';
                            videoWrapper.style.position = '';
                        }
                    });

                    // Reset slider transform on mobile
                    if (viewportWidth <= 576) {
                        slider.style.transform = 'none';
                    }
                } else {
                    // Desktop: recalculate width
                    let widthPercentage = 0.75;
                    if (viewportWidth <= 1200) widthPercentage = 0.78;

                    const slideWidth = viewportWidth * widthPercentage;
                    allSlides.forEach(slide => {
                        slide.style.width = `${slideWidth}px`;
                    });
                }

                updateSlider(true);
            }, 250);
        });

        // Clone slides for seamless infinite loop
        function cloneSlidesForLoop() {
            const totalSlides = slides.length;

            // Clone last slide and prepend
            const lastSlideClone = slides[totalSlides - 1].cloneNode(true);
            lastSlideClone.classList.add('clone');
            lastSlideClone.classList.remove('active');
            // Load iframe for last clone
            const lastCloneIframe = lastSlideClone.querySelector('iframe[data-src]');
            if (lastCloneIframe && lastCloneIframe.dataset.src) {
                lastCloneIframe.src = lastCloneIframe.dataset.src;
            }
            slider.insertBefore(lastSlideClone, slides[0]);

            // Clone first slide and append
            const firstSlideClone = slides[0].cloneNode(true);
            firstSlideClone.classList.add('clone');
            firstSlideClone.classList.remove('active');
            // Load iframe for first clone
            const firstCloneIframe = firstSlideClone.querySelector('iframe[data-src]');
            if (firstCloneIframe && firstCloneIframe.dataset.src) {
                firstCloneIframe.src = firstCloneIframe.dataset.src;
            }
            slider.appendChild(firstSlideClone);

            console.log('Cloned slides for seamless loop');
        }

        // Initialize
        cloneSlidesForLoop();

        // Re-query slides after cloning
        const allSlides = document.querySelectorAll('.media-slide');
        console.log('Total slides with clones:', allSlides.length);

        // Set widths for all slides including clones
        const viewportWidth = window.innerWidth;

        // On mobile/tablet, let CSS handle ALL styles
        if (viewportWidth <= 768) {
            allSlides.forEach(slide => {
                slide.style.width = '';
                slide.style.height = '';
                slide.style.minHeight = '';
                slide.style.maxHeight = '';
                slide.style.transform = '';

                const videoWrapper = slide.querySelector('.media-video-wrapper');
                if (videoWrapper) {
                    videoWrapper.style.width = '';
                    videoWrapper.style.height = '';
                    videoWrapper.style.paddingTop = '';
                    videoWrapper.style.position = '';
                }
            });

            // Reset slider transform on mobile
            if (viewportWidth <= 576) {
                slider.style.transform = 'none';
                slider.style.transition = 'none';
            }

            console.log('Initial load: Using CSS for mobile/tablet - all styles cleared');
        } else {
            // Desktop: use JavaScript width calculation
            let widthPercentage = 0.75;
            if (viewportWidth <= 1200) widthPercentage = 0.78;

            const slideWidth = viewportWidth * widthPercentage;
            allSlides.forEach(slide => {
                slide.style.width = `${slideWidth}px`;
            });
            console.log('Initial load: Using JS width for desktop');
        }

        // Start at index 1 (first real slide, after clone)
        currentIndex = 0;
        updateSlider();

        // Set first slide as active on load
        if (slides.length > 0) {
            slides[0].classList.add('active');
        }

        // Load initial iframes
        loadVisibleIframes();

        // Fallback: Load all iframes after 1 second if not loaded
        setTimeout(() => {
            const allIframes = document.querySelectorAll('.media-slide iframe[data-src]');
            allIframes.forEach(iframe => {
                if (iframe.dataset.src && !iframe.src) {
                    iframe.src = iframe.dataset.src;
                    console.log('Fallback loaded iframe:', iframe.dataset.src);
                }
            });
        }, 1000);

        // Keyboard navigation for video slider
        document.addEventListener('keydown', (e) => {
            const lightbox = document.getElementById('photoLightbox');
            const isLightboxActive = lightbox && lightbox.classList.contains('active');

            if (isLightboxActive) {
                // Lightbox keyboard navigation
                if (e.key === 'ArrowLeft') {
                    navigateLightbox(-1, e);
                } else if (e.key === 'ArrowRight') {
                    navigateLightbox(1, e);
                } else if (e.key === 'Escape') {
                    closeLightbox(e);
                }
            } else {
                // Video slider keyboard navigation
                if (e.key === 'ArrowLeft') {
                    prevSlide();
                } else if (e.key === 'ArrowRight') {
                    nextSlide();
                }
            }
        });
    });

    // Photo Gallery Load More & Lightbox Functions
    let photosShown = 9;
    let currentLightboxIndex = 0;
    let allPhotoItems = [];

    // Load More Photos
    function loadMorePhotos() {
        const photoItems = document.querySelectorAll('.photo-item');
        const totalPhotos = photoItems.length;
        const btn = document.getElementById('loadMoreBtn');
        const photosShownEl = document.getElementById('photosShown');

        // Show next 9 photos
        let newShown = photosShown;
        photoItems.forEach((item, index) => {
            if (index >= photosShown && index < photosShown + 9) {
                item.style.display = '';
                item.style.animation = 'fadeInUp 0.6s ease forwards';
                item.style.animationDelay = `${(index - photosShown) * 0.1}s`;
                newShown = index + 1;
            }
        });

        photosShown = newShown;
        photosShownEl.textContent = photosShown;

        // Hide button if all photos are shown
        if (photosShown >= totalPhotos) {
            btn.style.display = 'none';
            document.querySelector('.photos-counter').innerHTML = `Menampilkan semua ${totalPhotos} foto`;
        }
    }

    // Open Lightbox
    function openLightbox(index) {
        const lightbox = document.getElementById('photoLightbox');
        const lightboxImg = document.getElementById('lightboxImg');
        const lightboxTitle = document.getElementById('lightboxTitle');
        const lightboxCurrent = document.getElementById('lightboxCurrent');
        const lightboxTotal = document.getElementById('lightboxTotal');

        // Get all visible photo items
        allPhotoItems = Array.from(document.querySelectorAll('.photo-item')).filter(item => {
            return item.style.display !== 'none';
        });

        // Find the actual index in visible items
        const visibleIndex = allPhotoItems.findIndex(item => item.dataset.index == index);
        if (visibleIndex === -1) return;

        currentLightboxIndex = visibleIndex;

        const photoCard = allPhotoItems[currentLightboxIndex].querySelector('.photo-card');
        const img = photoCard.querySelector('img');
        const title = photoCard.querySelector('.photo-title').textContent;

        lightboxImg.src = img.dataset.fullSrc || img.src;
        lightboxTitle.textContent = title;
        lightboxCurrent.textContent = currentLightboxIndex + 1;
        lightboxTotal.textContent = allPhotoItems.length;

        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    // Close Lightbox
    function closeLightbox(event) {
        event.stopPropagation();
        const lightbox = document.getElementById('photoLightbox');
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
    }

    // Navigate Lightbox
    function navigateLightbox(direction, event) {
        event.stopPropagation();

        currentLightboxIndex += direction;

        // Loop around
        if (currentLightboxIndex < 0) {
            currentLightboxIndex = allPhotoItems.length - 1;
        } else if (currentLightboxIndex >= allPhotoItems.length) {
            currentLightboxIndex = 0;
        }

        const photoCard = allPhotoItems[currentLightboxIndex].querySelector('.photo-card');
        const img = photoCard.querySelector('img');
        const title = photoCard.querySelector('.photo-title').textContent;

        const lightboxImg = document.getElementById('lightboxImg');
        const lightboxTitle = document.getElementById('lightboxTitle');
        const lightboxCurrent = document.getElementById('lightboxCurrent');

        lightboxImg.style.opacity = '0';
        setTimeout(() => {
            lightboxImg.src = img.dataset.fullSrc || img.src;
            lightboxTitle.textContent = title;
            lightboxCurrent.textContent = currentLightboxIndex + 1;
            lightboxImg.style.opacity = '1';
        }, 150);
    }

    // Fade in animation for loaded photos
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .lightbox-content img {
            transition: opacity 0.3s ease;
        }
    `;
    document.head.appendChild(style);
</script>
