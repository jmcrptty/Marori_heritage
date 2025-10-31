<!-- Researchers Section with Auto Slider -->
<section id="researchers" class="researchers-section-slider">
    <div class="researchers-slider-bg">
        <div class="container">
            <!-- Header Section - Centered Top -->
            <div class="researchers-header">
                <span class="researchers-label">TIM PENELITI</span>
                <h2 class="researchers-main-title">Tim Penelitian Suku Marori</h2>
                <p class="researchers-subtitle">
                    Penelitian tentang Suku Marori Wasur dilakukan oleh tim multidisiplin yang berdedikasi untuk
                    mendokumentasikan dan melestarikan warisan budaya Papua.
                </p>
            </div>

            <!-- Cards Slider -->
            <div class="researchers-slider-section">
                    <!-- Researchers Slider Container -->
                    <div class="researchers-slider-wrapper">
                        <div class="researchers-slider-container" id="researchersSlider">
                    @if(isset($researchers) && $researchers->count() > 0)
                        @foreach($researchers as $researcher)
                        <!-- Slide {{ $loop->iteration }} - {{ $researcher->name }} -->
                        <div class="researcher-card">
                            <div class="researcher-image">
                                @if($researcher->photo)
                                    <img data-src="{{ asset('storage/' . $researcher->photo) }}"
                                         alt="{{ $researcher->name }}"
                                         loading="lazy"
                                         class="lazy-loading">
                                @else
                                    <div class="researcher-avatar">
                                        <i class="bi bi-person-circle"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="researcher-info">
                                <h3 class="researcher-name">{{ $researcher->name }}</h3>
                                <p class="researcher-role">{{ $researcher->role }}</p>
                                <p class="researcher-institution">{{ $researcher->institution }}</p>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <!-- Default slides if no data -->
                        <div class="researcher-card">
                            <div class="researcher-image">
                                <div class="researcher-avatar">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                            </div>
                            <div class="researcher-info">
                                <h3 class="researcher-name">Dr. John Doe</h3>
                                <p class="researcher-role">Antropolog</p>
                                <p class="researcher-institution">Universitas Papua</p>
                            </div>
                        </div>

                        <div class="researcher-card">
                            <div class="researcher-image">
                                <div class="researcher-avatar">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                            </div>
                            <div class="researcher-info">
                                <h3 class="researcher-name">Prof. Jane Smith</h3>
                                <p class="researcher-role">Etnografer</p>
                                <p class="researcher-institution">Institut Penelitian Budaya</p>
                            </div>
                        </div>

                        <div class="researcher-card">
                            <div class="researcher-image">
                                <div class="researcher-avatar">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                            </div>
                            <div class="researcher-info">
                                <h3 class="researcher-name">Michael Johnson</h3>
                                <p class="researcher-role">Peneliti Lapangan</p>
                                <p class="researcher-institution">Lembaga Studi Papua</p>
                            </div>
                        </div>

                        <div class="researcher-card">
                            <div class="researcher-image">
                                <div class="researcher-avatar">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                            </div>
                            <div class="researcher-info">
                                <h3 class="researcher-name">Sarah Williams</h3>
                                <p class="researcher-role">Dokumentator</p>
                                <p class="researcher-institution">Pusat Dokumentasi Budaya</p>
                            </div>
                        </div>

                        <div class="researcher-card">
                            <div class="researcher-image">
                                <div class="researcher-avatar">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                            </div>
                            <div class="researcher-info">
                                <h3 class="researcher-name">Dr. Ahmad Yusuf</h3>
                                <p class="researcher-role">Linguistik</p>
                                <p class="researcher-institution">Universitas Indonesia</p>
                            </div>
                        </div>

                        <div class="researcher-card">
                            <div class="researcher-image">
                                <div class="researcher-avatar">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                            </div>
                            <div class="researcher-info">
                                <h3 class="researcher-name">Lisa Anderson</h3>
                                <p class="researcher-role">Arkeolog</p>
                                <p class="researcher-institution">Institut Arkeologi Papua</p>
                            </div>
                        </div>
                    @endif
                        </div>
                    </div>

                    <!-- Slider Navigation Buttons Below -->
                    <div class="slider-controls">
                        <button class="slider-control-btn prev-btn-bottom" id="prevBtn">
                            <i class="bi bi-chevron-left"></i>
                        </button>
                        <div class="slider-indicators" id="sliderIndicators"></div>
                        <button class="slider-control-btn next-btn-bottom" id="nextBtn">
                            <i class="bi bi-chevron-right"></i>
                        </button>
                    </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Researchers Slider Section */
    .researchers-section-slider {
        padding: 0;
        margin: 0;
        position: relative;
        overflow: hidden;
        min-height: 100vh;
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, #FFFFFF 0%, #F8F8F8 50%, #FAFAFA 100%);
    }

    .researchers-slider-bg {
        background: transparent;
        position: relative;
        width: 100%;
        min-height: 100vh;
        display: flex;
        align-items: center;
        padding: 80px 0;
        margin: 0;
    }

    .researchers-slider-bg::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 20% 30%, rgba(139, 111, 71, 0.03) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(166, 138, 100, 0.02) 0%, transparent 50%);
        pointer-events: none;
    }

    .researchers-slider-bg .container {
        position: relative;
        z-index: 2;
        width: 100%;
    }

    /* Header Section - Centered Top */
    .researchers-header {
        text-align: center;
        margin-bottom: 30px;
        position: relative;
        z-index: 2;
    }

    .researchers-label {
        display: inline-block;
        font-size: 0.65rem;
        font-weight: 700;
        letter-spacing: 2px;
        color: #4A6B5A;
        text-transform: uppercase;
        margin-bottom: 8px;
        background: rgba(74, 107, 90, 0.15);
        padding: 4px 12px;
        border-radius: 20px;
    }

    .researchers-main-title {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        color: #4A6B5A;
        margin-bottom: 10px;
        font-weight: 700;
        line-height: 1.2;
        letter-spacing: -1px;
    }

    .researchers-subtitle {
        color: #4A6B5A;
        font-size: 0.9rem;
        line-height: 1.5;
        max-width: 700px;
        margin: 0 auto;
    }

    /* Slider Section */
    .researchers-slider-section {
        width: 100%;
        position: relative;
    }

    /* Slider Container */
    .researchers-slider-wrapper {
        position: relative;
        overflow: visible;
        margin: 0 auto;
        max-width: 100%;
    }

    .researchers-slider-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: auto;
        gap: 15px;
        transition: opacity 0.5s ease;
        width: 100%;
        min-height: 400px;
    }

    /* Researcher Card - Smaller Design */
    .researcher-card {
        background: #4A6B5A;
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s ease;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(74, 107, 90, 0.3);
        border: 1px solid rgba(74, 107, 90, 0.4);
        display: flex;
        flex-direction: column;
        opacity: 1;
        visibility: visible;
    }

    .researcher-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 25px rgba(74, 107, 90, 0.4);
        border-color: rgba(74, 107, 90, 0.6);
        background: #516F5F;
    }

    .researcher-image {
        width: 100%;
        height: 200px;
        background: linear-gradient(135deg, #5A7365 0%, #667B6F 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .researcher-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at center, rgba(255, 255, 255, 0.08) 0%, transparent 70%);
    }

    .researcher-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .researcher-image img.lazy-loading {
        background: linear-gradient(135deg, #5A7365 0%, #667B6F 100%);
    }

    .researcher-avatar {
        font-size: 3.5rem;
        color: rgba(255, 255, 255, 0.5);
        position: relative;
        z-index: 1;
        transition: transform 0.4s;
    }

    .researcher-card:hover .researcher-avatar {
        transform: scale(1.1);
    }

    .researcher-info {
        padding: 14px;
        text-align: center;
        background: #4A6B5A;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .researcher-name {
        font-family: 'Playfair Display', serif;
        color: #ffffff;
        font-size: 1rem;
        margin-bottom: 6px;
        font-weight: 700;
    }

    .researcher-role {
        display: inline-block;
        background: rgba(255, 255, 255, 0.2);
        color: #ffffff;
        padding: 4px 10px;
        border-radius: 50px;
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        margin-bottom: 5px;
    }

    .researcher-institution {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.75rem;
        margin: 0;
        font-weight: 500;
    }

    /* Slider Controls at Bottom */
    .slider-controls {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 30px;
        margin-top: 30px;
        position: relative;
        z-index: 2;
    }

    .slider-control-btn {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: rgba(139, 111, 71, 0.2);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(139, 111, 71, 0.3);
        color: #5D4037;
        font-size: 1.3rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .slider-control-btn:hover {
        background: rgba(139, 111, 71, 0.35);
        border-color: rgba(139, 111, 71, 0.5);
        transform: scale(1.1);
    }

    /* Slider Indicators */
    .slider-indicators {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .indicator-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(139, 111, 71, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .indicator-dot.active {
        background: #8B6F47;
        width: 30px;
        border-radius: 5px;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .researchers-main-title {
            font-size: 2.5rem;
        }

        .researcher-image {
            height: 250px;
        }
    }

    @media (max-width: 991px) {
        .researchers-section-slider {
            min-height: auto;
        }

        .researchers-slider-bg {
            min-height: auto;
            padding: 60px 0;
        }

        .researchers-slider-container {
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: auto;
            gap: 20px;
            min-height: 500px;
        }

        .researchers-header {
            margin-bottom: 40px;
        }

        .researchers-main-title {
            font-size: 2.2rem;
        }

        .researchers-subtitle {
            font-size: 1.05rem;
        }

        .researcher-image {
            height: 240px;
        }
    }

    @media (max-width: 768px) {
        .researchers-slider-bg {
            padding: 50px 0;
        }

        .researchers-slider-container {
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: auto;
            gap: 20px;
            min-height: 450px;
        }

        .researcher-image {
            height: 220px;
        }

        .researcher-avatar {
            font-size: 4rem;
        }

        .slider-control-btn {
            width: 50px;
            height: 50px;
            font-size: 1.3rem;
        }

        .researchers-main-title {
            font-size: 1.8rem;
        }

        .researchers-subtitle {
            font-size: 1rem;
        }

        .slider-controls {
            gap: 25px;
            margin-top: 40px;
        }
    }

    @media (max-width: 576px) {
        .researchers-slider-bg {
            padding: 40px 0;
        }

        .researchers-slider-container {
            grid-template-columns: 1fr;
            grid-template-rows: auto;
            gap: 20px;
            min-height: auto;
        }

        .researchers-header {
            margin-bottom: 30px;
        }

        .researchers-main-title {
            font-size: 1.6rem;
        }

        .researchers-subtitle {
            font-size: 0.95rem;
        }

        .researcher-image {
            height: 200px;
        }

        .researcher-avatar {
            font-size: 3.5rem;
        }

        .slider-control-btn {
            width: 45px;
            height: 45px;
            font-size: 1.2rem;
        }

        .researcher-name {
            font-size: 1.1rem;
        }

        .researcher-info {
            padding: 16px;
        }

        .slider-controls {
            margin-top: 35px;
        }
    }

    /* Extra small devices */
    @media (max-width: 400px) {
        .researchers-section-slider {
            min-height: auto;
        }

        .researchers-slider-bg {
            padding: 40px 0 50px;
        }

        .researchers-header {
            margin-bottom: 25px;
        }

        .researchers-label {
            font-size: 0.6rem;
            letter-spacing: 1.5px;
            padding: 3px 10px;
        }

        .researchers-main-title {
            font-size: 1.4rem;
            margin-bottom: 8px;
        }

        .researchers-subtitle {
            font-size: 0.85rem;
            line-height: 1.4;
        }

        .researcher-card {
            border-radius: 14px;
        }

        .researcher-image {
            height: 180px;
        }

        .researcher-avatar {
            font-size: 3rem;
        }

        .researcher-info {
            padding: 14px;
        }

        .researcher-name {
            font-size: 1rem;
            margin-bottom: 5px;
        }

        .researcher-role {
            font-size: 0.65rem;
            padding: 3px 8px;
        }

        .researcher-institution {
            font-size: 0.7rem;
        }

        .slider-controls {
            gap: 20px;
            margin-top: 30px;
        }

        .slider-control-btn {
            width: 40px;
            height: 40px;
            font-size: 1.1rem;
        }

        .indicator-dot {
            width: 8px;
            height: 8px;
        }

        .indicator-dot.active {
            width: 24px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slider = document.getElementById('researchersSlider');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const indicators = document.getElementById('sliderIndicators');
        const sliderControls = document.querySelector('.slider-controls');
        const cards = document.querySelectorAll('.researcher-card');

        let currentPage = 0;
        let autoSlideInterval;
        const autoSlideDelay = 5000; // 5 seconds
        const cardsPerPage = 6; // 3 columns × 2 rows
        const totalPages = Math.ceil(cards.length / cardsPerPage);

        // Hide controls if only 6 or fewer cards
        if (cards.length <= 6) {
            if (sliderControls) {
                sliderControls.style.display = 'none';
            }
            return; // Don't initialize slider
        }

        // Show controls if more than 6 cards
        if (sliderControls) {
            sliderControls.style.display = 'flex';
        }

        // Setup cards with data attributes for column position
        cards.forEach((card, index) => {
            const columnIndex = index % 3; // 0, 1, 2 for three columns
            card.setAttribute('data-column', columnIndex);
            card.style.opacity = '0';
            card.style.visibility = 'hidden';
        });

        // Show cards for current page with animation
        function showPage(pageIndex) {
            const startIdx = pageIndex * cardsPerPage;
            const endIdx = Math.min(startIdx + cardsPerPage, cards.length);

            // Hide all cards first
            cards.forEach((card) => {
                card.style.opacity = '0';
                card.style.visibility = 'hidden';
                card.style.transition = 'none';
            });

            // Show cards for current page with column-specific animations
            setTimeout(() => {
                for (let i = startIdx; i < endIdx; i++) {
                    const card = cards[i];
                    const columnIndex = parseInt(card.getAttribute('data-column'));
                    const rowIndex = Math.floor((i - startIdx) / 3); // 0 for top row, 1 for bottom row

                    // Set initial position based on column
                    if (columnIndex === 0) {
                        // Column 1: slide from bottom to top
                        card.style.transform = 'translateY(100%)';
                    } else if (columnIndex === 1) {
                        // Column 2: slide from right to left
                        card.style.transform = 'translateX(100%)';
                    } else if (columnIndex === 2) {
                        // Column 3: slide from top to bottom
                        card.style.transform = 'translateY(-100%)';
                    }

                    card.style.visibility = 'visible';

                    // Trigger animation
                    setTimeout(() => {
                        card.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                        card.style.transform = 'translate(0, 0)';
                        card.style.opacity = '1';
                    }, 50 + (rowIndex * 100)); // Stagger animation by row
                }
            }, 50);

            updateIndicators();
        }

        // Create indicators
        function createIndicators() {
            indicators.innerHTML = '';
            for (let i = 0; i < totalPages; i++) {
                const dot = document.createElement('div');
                dot.classList.add('indicator-dot');
                if (i === 0) dot.classList.add('active');
                dot.addEventListener('click', () => goToPage(i));
                indicators.appendChild(dot);
            }
        }

        // Update indicators
        function updateIndicators() {
            const dots = document.querySelectorAll('.indicator-dot');
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentPage);
            });
        }

        // Go to specific page
        function goToPage(pageIndex) {
            currentPage = pageIndex;
            if (currentPage >= totalPages) currentPage = 0;
            if (currentPage < 0) currentPage = totalPages - 1;
            showPage(currentPage);
        }

        // Next page
        function nextPage() {
            currentPage++;
            if (currentPage >= totalPages) {
                currentPage = 0; // Loop back to start
            }
            showPage(currentPage);
        }

        // Previous page
        function prevPage() {
            currentPage--;
            if (currentPage < 0) {
                currentPage = totalPages - 1; // Loop to end
            }
            showPage(currentPage);
        }

        // Start auto slide
        function startAutoSlide() {
            autoSlideInterval = setInterval(nextPage, autoSlideDelay);
        }

        // Stop auto slide
        function stopAutoSlide() {
            clearInterval(autoSlideInterval);
        }

        // Event listeners
        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                stopAutoSlide();
                prevPage();
                startAutoSlide();
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                stopAutoSlide();
                nextPage();
                startAutoSlide();
            });
        }

        // Pause on hover
        slider.addEventListener('mouseenter', stopAutoSlide);
        slider.addEventListener('mouseleave', startAutoSlide);

        // Initialize
        createIndicators();
        showPage(0);
        startAutoSlide();
    });
</script>
