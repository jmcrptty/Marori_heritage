<!-- Hero Section - Background Style -->
<section id="home" class="hero-section-bg">
    <div class="hero-parallax-bg"
        @if($hero && $hero->background_image)
            style="background-image: url('{{ asset('storage/' . $hero->background_image) }}');"
        @else
            style="background-image: url('{{ asset('images/hero-bg.jpg') }}');"
        @endif
    ></div>
    <div class="container-fluid px-4">
        <div class="row align-items-center hero-row">
            <!-- Left Content -->
            <div class="col-lg-6 hero-content-left">
                <div class="hero-content-inner">
                    <span class="hero-badge">{{ strtoupper($hero->badge ?? 'WARISAN BUDAYA') }}</span>
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
        background: linear-gradient(135deg, #3E2723 0%, #5C4033 50%, #4E3629 100%);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-blend-mode: overlay;
        transform: translate3d(0, 0, 0);
        will-change: transform;
        z-index: 0;
    }

    .hero-parallax-bg::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(62, 39, 35, 0.4) 0%, rgba(92, 64, 51, 0.3) 50%, rgba(78, 54, 41, 0.4) 100%);
        pointer-events: none;
        z-index: 1;
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
        padding-left: 20px;
    }

    .hero-content-inner {
        max-width: 600px;
    }

    .hero-badge {
        display: inline-block;
        color: #A68A64;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 3px;
        margin-bottom: 20px;
        text-transform: uppercase;
    }

    .hero-title-modern {
        font-size: 4rem;
        font-weight: 800;
        color: #ffffff;
        line-height: 1.1;
        margin-bottom: 25px;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        letter-spacing: -2px;
    }

    .hero-description {
        color: rgba(255, 255, 255, 0.8);
        font-size: 1.1rem;
        line-height: 1.8;
        margin-bottom: 35px;
        max-width: 520px;
    }

    .hero-buttons {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .btn-hero-primary {
        background: #8B6F47;
        color: white;
        padding: 16px 35px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 15px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
        border: 2px solid #8B6F47;
    }

    .btn-hero-primary:hover {
        background: #6F4E37;
        border-color: #6F4E37;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(139, 111, 71, 0.4);
        color: white;
    }

    .btn-hero-outline {
        background: transparent;
        color: white;
        padding: 16px 35px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 15px;
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
        background: radial-gradient(circle, rgba(139, 111, 71, 0.15) 0%, transparent 70%);
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
        background: #8B6F47;
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
    @media (max-width: 991px) {
        .hero-section-bg {
            padding: 100px 0 60px;
        }

        .hero-content-left {
            padding-left: 20px;
            margin-bottom: 50px;
        }

        .hero-title-modern {
            font-size: 3rem;
        }

        .hero-image-right {
            height: 400px;
        }
    }

    @media (max-width: 768px) {
        .hero-content-left {
            padding-left: 20px;
        }

        .hero-title-modern {
            font-size: 2.5rem;
        }

        .hero-description {
            font-size: 1rem;
        }

        .hero-buttons {
            flex-direction: column;
        }

        .btn-hero-primary,
        .btn-hero-outline {
            width: 100%;
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
        .hero-title-modern {
            font-size: 2rem;
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
