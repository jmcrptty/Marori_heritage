<!-- Culture Section with Auto Slider -->
<section id="culture" class="culture-section-slider">
    <div class="culture-slider-bg">
        <div class="container-fluid px-4">
            <div class="row align-items-center">
                <!-- Left Side - Sejarah Suku (Static) -->
                <div class="col-lg-4">
                    <div class="culture-info-box">
                        <span class="culture-label">SEJARAH</span>
                        <h2 class="culture-main-title">Sejarah Suku Marori</h2>
                        <p class="culture-description">
                            Suku Marori merupakan salah satu suku asli Papua yang mendiami wilayah Taman Nasional Wasur.
                            Mereka memiliki sejarah panjang dalam menjaga tradisi dan kearifan lokal yang diwariskan turun-temurun.
                        </p>
                        <p class="culture-description">
                            Kehidupan suku Marori sangat erat dengan alam. Mereka memiliki berbagai kesenian dan budaya unik
                            yang mencerminkan harmoni dengan lingkungan sekitar.
                        </p>
                    </div>
                </div>

                <!-- Right Side - Card Slider -->
                <div class="col-lg-8">
                    <!-- Culture Slider Container -->
                    <div class="culture-slider-wrapper">
                        <div class="culture-slider-container" id="cultureSlider">
                    @if(isset($cultureItems) && $cultureItems->count() > 0)
                        @foreach($cultureItems as $culture)
                        <!-- Slide {{ $loop->iteration }} - {{ $culture->title }} -->
                        <div class="culture-slide">
                            <div class="culture-slide-image">
                                @if($culture->image)
                                    <img src="{{ asset($culture->image) }}"
                                         alt="{{ $culture->title }}"
                                         style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <i class="bi bi-palette-fill"></i>
                                @endif
                            </div>
                            <div class="culture-slide-content">
                                <h3>{{ $culture->title }}</h3>
                                <span class="culture-category">{{ $culture->category }}</span>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <!-- Default slides if no data -->
                        <div class="culture-slide">
                            <div class="culture-slide-image">
                                <i class="bi bi-person-arms-up"></i>
                            </div>
                            <div class="culture-slide-content">
                                <h3>Tari Kreasi</h3>
                                <span class="culture-category">Kesenian</span>
                            </div>
                        </div>

                        <div class="culture-slide">
                            <div class="culture-slide-image">
                                <i class="bi bi-music-note-beamed"></i>
                            </div>
                            <div class="culture-slide-content">
                                <h3>Tari Manimbong</h3>
                                <span class="culture-category">Kesenian</span>
                            </div>
                        </div>

                        <div class="culture-slide">
                            <div class="culture-slide-image">
                                <i class="bi bi-house-door"></i>
                            </div>
                            <div class="culture-slide-content">
                                <h3>Ma'badong</h3>
                                <span class="culture-category">Budaya</span>
                            </div>
                        </div>

                        <div class="culture-slide">
                            <div class="culture-slide-image">
                                <i class="bi bi-book"></i>
                            </div>
                            <div class="culture-slide-content">
                                <h3>Baka/Nase</h3>
                                <span class="culture-category">Budaya</span>
                            </div>
                        </div>
                    @endif
                        </div>
                    </div>

                    <!-- Slider Navigation Buttons at Bottom Center -->
                    <div class="culture-nav-controls">
                        <button class="culture-nav-btn culture-prev-btn" id="prevBtn">
                            <i class="bi bi-chevron-left"></i>
                        </button>
                        <button class="culture-nav-btn culture-next-btn" id="nextBtn">
                            <i class="bi bi-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Culture Slider Section */
    .culture-section-slider {
        padding: 0;
        margin: 0;
        position: relative;
        overflow: hidden;
        min-height: 100vh; /* Full screen seperti hero */
        display: flex;
        align-items: center;
    }

    .culture-slider-bg {
        background: linear-gradient(135deg, #3E2723 0%, #5C4033 50%, #4E3629 100%);
        background-image:
            linear-gradient(135deg, rgba(62, 39, 35, 0.95) 0%, rgba(92, 64, 51, 0.95) 50%, rgba(78, 54, 41, 0.95) 100%),
            repeating-linear-gradient(45deg, transparent, transparent 40px, rgba(139, 111, 71, 0.03) 40px, rgba(139, 111, 71, 0.03) 80px);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        min-height: 100vh;
        display: flex;
        align-items: center;
        padding: 80px 0;
    }

    .culture-slider-bg::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 20% 30%, rgba(139, 111, 71, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(166, 138, 100, 0.1) 0%, transparent 50%);
        pointer-events: none;
    }

    .culture-slider-bg .container-fluid {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 100%;
    }

    .culture-slider-bg .row {
        position: relative;
        z-index: 2;
    }

    /* Left Side - Culture Info Box */
    .culture-info-box {
        padding: 60px 40px;
        position: relative;
        z-index: 2;
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-height: 500px;
    }

    .culture-label {
        display: inline-block;
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 3px;
        color: #A68A64;
        text-transform: uppercase;
        margin-bottom: 20px;
        background: rgba(139, 111, 71, 0.2);
        padding: 8px 20px;
        border-radius: 25px;
        align-self: flex-start;
    }

    .culture-main-title {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        color: white;
        margin-bottom: 32px;
        font-weight: 700;
        line-height: 1.2;
        letter-spacing: -1px;
    }

    .culture-description {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1.15rem;
        line-height: 1.9;
        margin-bottom: 24px;
    }

    /* Slider Container */
    .culture-slider-wrapper {
        position: relative;
        overflow: hidden;
        margin: 0 auto;
        max-width: 100%;
    }

    .culture-slider-container {
        display: flex;
        gap: 24px;
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 20px 0;
        width: 100%;
    }

    /* Culture Slide Card */
    .culture-slide {
        flex: 0 0 calc(50% - 12px); /* Exactly 50% width minus half of gap */
        width: calc(50% - 12px);
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
    }

    .culture-slide:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
    }

    .culture-slide-image {
        width: 100%;
        height: 500px;
        background: linear-gradient(135deg, #F5E6D3 0%, #E8D5C4 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .culture-slide-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at center, rgba(139, 111, 71, 0.15) 0%, transparent 70%);
    }

    .culture-slide-image i {
        font-size: 5rem;
        color: var(--secondary-color);
        position: relative;
        z-index: 1;
        transition: transform 0.4s;
    }

    .culture-slide:hover .culture-slide-image i {
        transform: scale(1.2) rotate(5deg);
    }

    .culture-slide-content {
        padding: 32px;
        text-align: center;
        background: white;
    }

    .culture-slide-content h3 {
        font-family: 'Playfair Display', serif;
        color: var(--primary-color);
        font-size: 1.75rem;
        margin-bottom: 12px;
        font-weight: 700;
    }

    .culture-category {
        display: inline-block;
        background: rgba(139, 111, 71, 0.15);
        color: var(--secondary-color);
        padding: 8px 20px;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    /* Navigation Controls at Bottom */
    .culture-nav-controls {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 30px;
        margin-top: 50px;
        position: relative;
        z-index: 2;
    }

    .culture-nav-btn {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: white;
        font-size: 1.8rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .culture-nav-btn:hover {
        background: rgba(255, 255, 255, 0.25);
        border-color: rgba(255, 255, 255, 0.5);
        transform: scale(1.1);
    }

    .culture-nav-btn:active {
        transform: scale(0.95);
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .culture-main-title {
            font-size: 2.8rem;
        }

        .culture-slide-image {
            height: 400px;
        }
    }

    @media (max-width: 991px) {
        .culture-section-slider {
            min-height: auto;
        }

        .culture-info-box {
            padding: 40px 30px;
            margin-bottom: 40px;
            min-height: auto;
        }

        .culture-main-title {
            font-size: 2.2rem;
        }

        .culture-description {
            font-size: 1.05rem;
        }

        .culture-slide-image {
            height: 350px;
        }
    }

    @media (max-width: 768px) {
        .culture-slide {
            flex: 0 0 100%; /* 1 card full width di mobile */
            width: 100%;
        }

        .culture-slide-image {
            height: 280px;
        }

        .culture-nav-controls {
            gap: 20px;
            margin-top: 40px;
        }

        .culture-nav-btn {
            width: 50px;
            height: 50px;
            font-size: 1.5rem;
        }

        .culture-main-title {
            font-size: 1.8rem;
        }

        .culture-description {
            font-size: 1rem;
        }
    }

    @media (max-width: 576px) {
        .culture-info-box {
            padding: 30px 20px;
        }

        .culture-main-title {
            font-size: 1.6rem;
        }

        .culture-description {
            font-size: 0.95rem;
        }

        .culture-slide-image {
            height: 240px;
        }

        .culture-nav-controls {
            gap: 15px;
            margin-top: 30px;
        }

        .culture-nav-btn {
            width: 45px;
            height: 45px;
            font-size: 1.3rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slider = document.getElementById('cultureSlider');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const slides = document.querySelectorAll('.culture-slide');

        let currentIndex = 0;
        let autoSlideInterval;
        const autoSlideDelay = 5000; // 5 seconds

        // Calculate slides per view based on screen size
        function getSlidesPerView() {
            const width = window.innerWidth;
            if (width <= 768) return 1;
            return 2; // Show 2 cards on desktop
        }

        // Update slider position
        function updateSlider() {
            const slideWidth = slides[0].offsetWidth;
            const gap = 24;
            const offset = -(currentIndex * (slideWidth + gap));
            slider.style.transform = `translateX(${offset}px)`;
        }

        // Next slide - move 1 card at a time
        function nextSlide() {
            const slidesPerView = getSlidesPerView();
            const maxIndex = slides.length - slidesPerView;

            currentIndex += 1;
            if (currentIndex > maxIndex) {
                currentIndex = 0; // Loop back to start
            }

            updateSlider();
        }

        // Previous slide - move 1 card at a time
        function prevSlide() {
            const slidesPerView = getSlidesPerView();
            const maxIndex = slides.length - slidesPerView;

            currentIndex -= 1;
            if (currentIndex < 0) {
                currentIndex = maxIndex; // Loop to end
            }

            updateSlider();
        }

        // Start auto slide
        function startAutoSlide() {
            autoSlideInterval = setInterval(nextSlide, autoSlideDelay);
        }

        // Stop auto slide
        function stopAutoSlide() {
            clearInterval(autoSlideInterval);
        }

        // Event listeners
        nextBtn.addEventListener('click', () => {
            stopAutoSlide();
            nextSlide();
            startAutoSlide();
        });

        prevBtn.addEventListener('click', () => {
            stopAutoSlide();
            prevSlide();
            startAutoSlide();
        });

        // Pause on hover
        slider.addEventListener('mouseenter', stopAutoSlide);
        slider.addEventListener('mouseleave', startAutoSlide);

        // Handle window resize
        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                currentIndex = 0; // Reset to start on resize
                updateSlider();
            }, 250);
        });

        // Initialize
        startAutoSlide();
    });
</script>
