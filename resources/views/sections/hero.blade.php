<!-- Hero Section - Background Style -->
<section id="home" class="hero-section-bg">
    <div class="hero-parallax-bg"
        @if($hero && $hero->background_image)
            data-bg-image="{{ asset('storage/' . $hero->background_image) }}"
        @else
            data-bg-image="{{ asset('images/hero-bg.jpg') }}"
        @endif
    ></div>
    <div class="container-fluid px-4">
        <div class="row align-items-center hero-row">
            <!-- Left Content -->
            <div class="col-lg-6 hero-content-left">
                <div class="hero-content-inner">
                    <span class="hero-badge">{{ strtoupper($hero->badge ?? 'MARORI HERITAGE') }}</span>
                    <h1 class="hero-title-modern">
                        {{ $hero->title ?? 'Suku Marori Wasur' }}
                    </h1>
                    <p class="hero-description">
                        {{ $hero->description ?? 'Warisan leluhur dari hutan Wasur untuk Indonesia. Bergabunglah dalam perjalanan kami menjaga tradisi dan memberdayakan masyarakat adat Papua.' }}
                    </p>
                    <div class="hero-buttons">
                        <a href="{{ $hero->btn_primary_link ?? '#produk' }}" class="btn-hero-primary">
                            {{ $hero->btn_primary_text ?? 'Jelajahi Produk' }} <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        <a href="{{ $hero->btn_secondary_link ?? '#tentang' }}" class="btn-hero-outline">
                            {{ $hero->btn_secondary_text ?? 'Kenali Kami' }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Content Area -->
            <div class="col-lg-6 hero-image-right">
                <div class="hero-decorative-circle"></div>
            </div>
        </div>
    </div>

    <!-- Ticker Section -->
    <div class="hero-ticker">
        <div class="ticker-content">
            <span class="ticker-item"><i class="fas fa-leaf me-2"></i> Produk Tradisional</span>
            <span class="ticker-item"><i class="fas fa-globe me-2"></i> Budaya Papua</span>
            <span class="ticker-item"><i class="fas fa-heart me-2"></i> Warisan Leluhur</span>
            <span class="ticker-item"><i class="fas fa-users me-2"></i> Komunitas Adat</span>
        </div>
    </div>
</section>

<style>
    /* Hero Section Background Style */
    .hero-section-bg {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        padding: 120px 0 0;
        overflow: hidden;
        margin: 0;
    }

    .hero-parallax-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 120%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        transform: translate3d(0, 0, 0);
        will-change: transform;
        z-index: 0;
    }

    .hero-row {
        min-height: 600px;
        position: relative;
        z-index: 2;
    }

    .container-fluid {
        position: relative;
        z-index: 2;
    }

    /* Hero Content Left */
    .hero-content-left {
        position: relative;
        z-index: 2;
        padding-left: 60px;
        padding-top: 0;
        margin-top: -40px;
        display: flex;
        align-items: center;
    }

    .hero-content-inner {
        max-width: 750px;
    }

    .hero-badge {
        display: inline-block;
        color: #ffffff;
        background: rgba(255, 255, 255, 0.15);
        font-size: 1.3rem;
        font-weight: 700;
        letter-spacing: 5px;
        padding: 18px 40px;
        border-radius: 50px;
        margin-bottom: 36px;
        text-transform: uppercase;
        border: 2px solid rgba(255, 255, 255, 0.4);
    }

    .hero-title-modern {
        font-size: 5.5rem;
        font-weight: 900;
        color: #ffffff;
        line-height: 1.15;
        margin-bottom: 36px;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        letter-spacing: -3px;
        text-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
        text-transform: none;
        white-space: nowrap;
    }

    .hero-description {
        color: #ffffff;
        font-size: 1.35rem;
        line-height: 1.85;
        margin-bottom: 45px;
        max-width: 580px;
        font-weight: 400;
        text-shadow: 0 1px 10px rgba(0, 0, 0, 0.2);
    }

    .hero-buttons {
        display: flex;
        gap: 15px;
        flex-wrap: nowrap;
        align-items: center;
        justify-content: flex-start;
    }

    .btn-hero-primary {
        background: #1a1a1a;
        color: white;
        padding: 18px 40px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 17px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
        border: 2px solid #1a1a1a;
    }

    .btn-hero-primary:hover {
        background: #8B0000;
        border-color: #8B0000;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(139, 0, 0, 0.4);
        color: white;
    }

    .btn-hero-outline {
        background: transparent;
        color: white;
        padding: 18px 40px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 17px;
        text-decoration: none;
        display: inline-block;
        border: 2px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
    }

    .btn-hero-outline:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.5);
        color: white;
        transform: translateY(-2px);
    }

    /* Hero Image Right */
    .hero-image-right {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 500px;
    }

    .hero-decorative-circle {
        width: 400px;
        height: 400px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(26, 26, 26, 0.15) 0%, transparent 70%);
        filter: blur(80px);
        animation: pulse 4s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% {
            opacity: 0.4;
            transform: scale(1);
        }
        50% {
            opacity: 0.7;
            transform: scale(1.2);
        }
    }

    /* Ticker Section */
    .hero-ticker {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background: #1a1a1a;
        padding: 20px 0;
        overflow: hidden;
        z-index: 2;
    }

    .ticker-content {
        display: flex;
        gap: 80px;
        white-space: nowrap;
        justify-content: center;
        align-items: center;
    }

    .ticker-item {
        color: white;
        font-weight: 600;
        font-size: 16px;
        display: inline-flex;
        align-items: center;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .hero-content-left {
            padding-left: 40px;
            padding-top: 30px;
        }

        .hero-title-modern {
            font-size: 3.5rem;
            letter-spacing: -2px;
        }

        .hero-description {
            font-size: 1.05rem;
        }
    }

    @media (max-width: 991px) {
        .hero-section-bg {
            padding: 130px 0 60px;
        }

        .hero-content-left {
            padding-left: 30px;
            padding-right: 30px;
            padding-top: 60px;
            margin-top: 0;
            margin-bottom: 50px;
        }

        .hero-title-modern {
            font-size: 3rem;
            letter-spacing: -1.5px;
        }

        .hero-description {
            font-size: 1rem;
        }

        .hero-image-right {
            height: 400px;
        }
    }

    @media (max-width: 768px) {
        .hero-section-bg {
            padding: 140px 0 60px;
        }

        .hero-content-left {
            padding-left: 25px;
            padding-right: 25px;
            padding-top: 70px;
            margin-top: 0;
        }

        .hero-badge {
            font-size: 0.7rem;
            padding: 8px 20px;
            margin-bottom: 24px;
        }

        .hero-title-modern {
            font-size: 2.5rem;
            margin-bottom: 28px;
            letter-spacing: -1px;
        }

        .hero-description {
            font-size: 1rem;
            line-height: 1.7;
            margin-bottom: 35px;
        }

        .hero-buttons {
            flex-direction: row;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-hero-primary,
        .btn-hero-outline {
            flex: 1;
            min-width: 140px;
            justify-content: center;
            text-align: center;
        }

        .hero-image-right {
            height: 350px;
        }

        .ticker-item {
            font-size: 14px;
        }
    }

    @media (max-width: 576px) {
        .hero-section-bg {
            padding: 150px 0 60px;
        }

        .hero-content-left {
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 80px;
            margin-top: 0;
        }

        .hero-badge {
            font-size: 0.65rem;
            padding: 7px 18px;
            margin-bottom: 20px;
            letter-spacing: 2px;
        }

        .hero-title-modern {
            font-size: 2rem;
            margin-bottom: 24px;
        }

        .hero-description {
            font-size: 0.95rem;
            margin-bottom: 30px;
            line-height: 1.65;
        }

        .hero-buttons {
            flex-direction: column;
            gap: 12px;
        }

        .btn-hero-primary,
        .btn-hero-outline {
            width: 100%;
            padding: 14px 28px;
            font-size: 14px;
        }

        .ticker-item {
            font-size: 13px;
        }
    }

    /* Extra small devices */
    @media (max-width: 400px) {
        .hero-section-bg {
            padding: 150px 0 50px;
        }

        .hero-content-left {
            padding-left: 18px;
            padding-right: 18px;
            padding-top: 80px;
            margin-top: 0;
        }

        .hero-badge {
            font-size: 0.6rem;
            letter-spacing: 1.5px;
            padding: 6px 16px;
            margin-bottom: 18px;
        }

        .hero-title-modern {
            font-size: 1.75rem;
            letter-spacing: -0.5px;
            margin-bottom: 20px;
        }

        .hero-description {
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .hero-buttons {
            flex-direction: column;
            gap: 10px;
        }

        .btn-hero-primary,
        .btn-hero-outline {
            width: 100%;
            padding: 12px 24px;
            font-size: 13px;
        }

        .hero-image-right {
            height: 300px;
        }

        .ticker-content {
            gap: 50px;
        }

        .ticker-item {
            font-size: 12px;
        }
    }

    /* Fade-in animations */
    .hero-badge,
    .hero-title-modern,
    .hero-description,
    .hero-buttons {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease forwards;
    }

    .hero-badge {
        animation-delay: 0.2s;
    }

    .hero-title-modern {
        animation-delay: 0.4s;
    }

    .hero-description {
        animation-delay: 0.6s;
    }

    .hero-buttons {
        animation-delay: 0.8s;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lazy load hero background image
        const heroParallax = document.querySelector('.hero-parallax-bg');
        if (heroParallax) {
            const bgImage = heroParallax.getAttribute('data-bg-image');
            if (bgImage) {
                // Create new image to preload
                const img = new Image();
                img.onload = function() {
                    heroParallax.style.backgroundImage = `url('${bgImage}')`;
                };
                img.src = bgImage;
            }
        }
    });

    // Parallax effect for hero background
    window.addEventListener('scroll', function() {
        const heroParallax = document.querySelector('.hero-parallax-bg');
        if (heroParallax) {
            const scrolled = window.pageYOffset;
            const heroSection = document.querySelector('.hero-section-bg');

            if (heroSection) {
                const heroHeight = heroSection.offsetHeight;
                // Only apply parallax while in hero section
                if (scrolled < heroHeight) {
                    const parallaxSpeed = 0.5;
                    heroParallax.style.transform = `translate3d(0, ${scrolled * parallaxSpeed}px, 0)`;
                }
            }
        }
    });
</script>
