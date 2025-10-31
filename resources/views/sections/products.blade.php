<!-- Products Section with Slider -->
<section id="produk" class="products-section-slider">
    <div class="products-slider-bg">
        <!-- Abstract Background Shapes -->
        <div class="abstract-shape shape-1"></div>
        <div class="abstract-shape shape-2"></div>
        <div class="abstract-shape shape-3"></div>

        <div class="container-fluid px-4">
            <!-- Header -->
            <div class="products-header">
                <span class="products-label">PRODUK LOKAL</span>
                <h2 class="products-main-title">Karya Tangan Marori</h2>
                <p class="products-subtitle">
                    Produk berkualitas tinggi hasil kerajinan masyarakat Marori, dibuat dengan cinta dan dedikasi untuk pelestarian budaya
                </p>
            </div>

            <!-- Products Slider -->
            <div class="products-slider-wrapper">
                @if(isset($products) && $products->count() > 0)
                <div class="products-slider-container" id="productsSlider">
                    @foreach($products as $product)
                    <div class="product-slide">
                        <div class="product-card-modern">
                            @if($product->image)
                            <div class="product-image-bg" style="background: url('{{ asset('storage/' . $product->image) }}') center/cover;">
                                <div class="product-overlay"></div>
                            </div>
                            @else
                            <div class="product-image-bg" style="background: linear-gradient(135deg, rgba(139, 111, 71, 0.85), rgba(92, 64, 51, 0.85));">
                                <div class="product-overlay">
                                    <i class="bi bi-image product-icon"></i>
                                </div>
                            </div>
                            @endif
                            <div class="product-content-modern">
                                <span class="product-date">{{ strtoupper($product->category) }}</span>
                                <h3 class="product-title-modern">{{ $product->name }}</h3>
                                <p class="product-description-modern">{{ $product->description }}</p>
                                <div class="product-price-modern">{{ $product->price }}</div>
                                @if($product->shopee_link || $product->tokopedia_link)
                                <div class="product-buttons">
                                    @if($product->shopee_link)
                                    <a href="{{ $product->shopee_link }}" target="_blank" rel="noopener" class="product-btn btn-shopee-earth">
                                        <i class="bi bi-bag-check"></i> Shopee
                                    </a>
                                    @endif
                                    @if($product->tokopedia_link)
                                    <a href="{{ $product->tokopedia_link }}" target="_blank" rel="noopener" class="product-btn btn-tokopedia-earth">
                                        <i class="bi bi-cart-check"></i> Tokopedia
                                    </a>
                                    @endif
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-5">
                    <p class="text-white">Belum ada produk untuk ditampilkan.</p>
                </div>
                @endif
            </div>

            <!-- Navigation Buttons - Di bawah cards -->
            <div class="products-navigation">
                <button class="product-nav-btn" id="productPrevBtn">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="product-nav-btn" id="productNextBtn">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Product Detail Modal -->
<div class="product-modal" id="productModal">
    <div class="product-modal-overlay" id="modalOverlay"></div>
    <div class="product-modal-content">
        <button class="product-modal-close" id="modalClose">
            <i class="bi bi-x-lg"></i>
        </button>
        <div class="product-modal-body">
            <div class="product-modal-image">
                <div class="product-modal-image-bg" id="modalImage">
                    <div class="product-overlay">
                        <i class="bi bi-bag product-icon" id="modalIcon"></i>
                    </div>
                </div>
            </div>
            <div class="product-modal-info">
                <span class="product-date" id="modalCategory">KERAJINAN TANGAN</span>
                <h2 class="product-modal-title" id="modalTitle">Nama Produk</h2>
                <p class="product-modal-description" id="modalDescription">Deskripsi produk...</p>
                <div class="product-price-modern product-modal-price" id="modalPrice">Rp 0</div>
                <div class="product-buttons product-modal-buttons">
                    <a href="#" class="product-btn btn-shopee-earth" id="modalShopeeBtn">
                        <i class="bi bi-bag-check"></i> Beli di Shopee
                    </a>
                    <a href="#" class="product-btn btn-tokopedia-earth" id="modalTokopediaBtn">
                        <i class="bi bi-cart-check"></i> Beli di Tokopedia
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Products Slider Section */
    .products-section-slider {
        padding: 0;
        margin: 0;
        position: relative;
        overflow: hidden;
        min-height: 100vh;
        display: flex;
        align-items: center;
    }

    .products-slider-bg {
        background: linear-gradient(135deg, #6D5D4F 0%, #5C4D42 50%, #4A3F35 100%);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        min-height: 100vh;
        display: flex;
        align-items: center;
        padding: 100px 0 60px;
    }

    /* Abstract Background Shapes */
    .abstract-shape {
        position: absolute;
        border-radius: 50%;
        opacity: 0.1;
        filter: blur(80px);
    }

    .shape-1 {
        width: 600px;
        height: 600px;
        background: #F4D03F;
        top: -200px;
        right: -100px;
    }

    .shape-2 {
        width: 400px;
        height: 400px;
        background: #8B6F47;
        bottom: -150px;
        left: -100px;
    }

    .shape-3 {
        width: 500px;
        height: 500px;
        background: #A68A64;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .products-slider-bg .container-fluid {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 100%;
        padding-left: 15px;
        padding-right: 15px;
    }

    /* Header */
    .products-header {
        text-align: center;
        margin-bottom: 30px;
        position: relative;
        z-index: 2;
    }

    .products-label {
        display: inline-block;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 3px;
        color: #F4D03F;
        text-transform: uppercase;
        margin-bottom: 12px;
        background: rgba(244, 208, 63, 0.2);
        padding: 6px 16px;
        border-radius: 20px;
    }

    .products-main-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        color: white;
        margin-bottom: 12px;
        font-weight: 700;
        line-height: 1.2;
        letter-spacing: -1px;
    }

    .products-subtitle {
        color: rgba(255, 255, 255, 0.85);
        font-size: 1rem;
        line-height: 1.5;
        max-width: 650px;
        margin: 0 auto;
    }

    /* Slider Wrapper */
    .products-slider-wrapper {
        position: relative;
        overflow: hidden;
        margin: 0 auto;
        max-width: calc(100% - 120px);
        width: calc(100% - 120px);
    }

    .products-slider-container {
        display: flex;
        gap: 24px;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        width: max-content;
        position: relative;
        z-index: 1;
    }

    /* Product Slide - width will be set by JavaScript */
    .product-slide {
        flex: 0 0 auto;
        min-width: 200px;
    }

    /* Product Card Modern */
    .product-card-modern {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
        min-height: 500px;
        display: flex;
        flex-direction: column;
        opacity: 1;
        visibility: visible;
    }

    .product-card-modern:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
    }

    .product-image-bg {
        height: 240px;
        background-size: cover !important;
        background-position: center !important;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.3s ease;
    }

    .product-card-modern:hover .product-overlay {
        background: rgba(0, 0, 0, 0.3);
    }

    .product-icon {
        font-size: 3.5rem;
        color: white;
        opacity: 0.8;
        transition: all 0.4s ease;
    }

    .product-card-modern:hover .product-icon {
        transform: scale(1.2);
        opacity: 1;
    }

    .product-content-modern {
        padding: 20px;
        background: white;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .product-date {
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        color: #8B6F47;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .product-title-modern {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        color: #3E2723;
        margin-bottom: 10px;
        font-weight: 700;
        line-height: 1.3;
    }

    .product-description-modern {
        color: #5D4037;
        font-size: 0.85rem;
        line-height: 1.5;
        margin-bottom: 12px;
        flex-grow: 1;
    }

    .product-price-modern {
        font-family: 'Playfair Display', serif;
        font-size: 1.1rem;
        color: #8B6F47;
        font-weight: 700;
        margin-bottom: 12px;
    }

    /* Product Buttons Container */
    .product-buttons {
        display: flex;
        gap: 8px;
        margin-top: auto;
    }

    .product-btn {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 10px 16px;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
    }

    .btn-shopee-earth {
        background: linear-gradient(135deg, #8B6F47 0%, #6D5D4F 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(139, 111, 71, 0.3);
    }

    .btn-shopee-earth:hover {
        background: linear-gradient(135deg, #6D5D4F 0%, #5C4D42 100%);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(139, 111, 71, 0.5);
    }

    .btn-tokopedia-earth {
        background: linear-gradient(135deg, #A68A64 0%, #8B6F47 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(166, 138, 100, 0.3);
    }

    .btn-tokopedia-earth:hover {
        background: linear-gradient(135deg, #8B6F47 0%, #6D5D4F 100%);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(166, 138, 100, 0.5);
    }

    .product-btn i {
        font-size: 1rem;
    }

    /* Product Card Clickable */
    .product-card-modern {
        cursor: pointer;
    }

    /* Product Modal */
    .product-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        align-items: center;
        justify-content: center;
    }

    .product-modal.active {
        display: flex;
    }

    .product-modal-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.85);
        backdrop-filter: blur(10px);
    }

    .product-modal-content {
        position: relative;
        z-index: 10000;
        max-width: 900px;
        width: 90%;
        max-height: 90vh;
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 25px 80px rgba(0, 0, 0, 0.5);
        animation: modalSlideUp 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    @keyframes modalSlideUp {
        from {
            opacity: 0;
            transform: translateY(50px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .product-modal-close {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: white;
        font-size: 1.3rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10001;
    }

    .product-modal-close:hover {
        background: rgba(0, 0, 0, 0.7);
        transform: rotate(90deg) scale(1.1);
    }

    .product-modal-body {
        display: flex;
        overflow-y: auto;
        max-height: 90vh;
    }

    .product-modal-image {
        flex: 0 0 50%;
        min-height: 500px;
    }

    .product-modal-image-bg {
        width: 100%;
        height: 100%;
        background-size: cover !important;
        background-position: center !important;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-modal-image-bg .product-icon {
        font-size: 6rem;
        display: none; /* Hide icon in modal */
    }

    .product-modal-image-bg .product-overlay {
        display: none; /* Hide overlay in modal */
    }

    .product-modal-info {
        flex: 1;
        padding: 50px 40px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .product-modal-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        color: #3E2723;
        margin: 0;
        font-weight: 700;
        line-height: 1.2;
    }

    .product-modal-description {
        color: #5D4037;
        font-size: 1.1rem;
        line-height: 1.8;
        margin: 0;
    }

    .product-modal-price {
        font-size: 2rem !important;
        margin: 10px 0 !important;
    }

    .product-modal-buttons {
        margin-top: auto;
    }

    .product-modal-buttons .product-btn {
        padding: 14px 24px;
        font-size: 1rem;
    }

    /* Navigation Buttons - Di bawah cards */
    .products-navigation {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        margin-top: 30px;
        margin-bottom: 20px;
        position: relative;
        z-index: 2;
    }

    .product-nav-btn {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: white;
        font-size: 1.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-nav-btn:hover {
        background: rgba(255, 255, 255, 0.25);
        border-color: rgba(255, 255, 255, 0.5);
        transform: scale(1.1);
    }

    .product-nav-btn:active {
        transform: scale(0.95);
    }

    /* Hapus indicator dots - tidak dipakai lagi */

    /* Responsive */
    @media (max-width: 1400px) {
        .products-slider-wrapper {
            max-width: calc(100% - 120px);
            width: calc(100% - 120px);
        }
    }

    @media (max-width: 1200px) {
        .products-main-title {
            font-size: 2.5rem;
        }

        .products-slider-wrapper {
            max-width: calc(100% - 120px);
            width: calc(100% - 120px);
        }
    }

    @media (max-width: 768px) {
        .products-slider-wrapper {
            max-width: calc(100% - 40px);
            width: calc(100% - 40px);
        }

        .products-navigation {
            margin-top: 40px;
            gap: 15px;
        }

        .product-nav-btn {
            width: 45px;
            height: 45px;
            font-size: 1.3rem;
        }

        .products-main-title {
            font-size: 2rem;
        }

        .product-image-bg {
            height: 220px;
        }

        .product-btn {
            font-size: 0.75rem;
            padding: 8px 12px;
        }

        .product-btn i {
            font-size: 0.9rem;
        }

        .product-modal-body {
            flex-direction: column;
        }

        .product-modal-image {
            flex: 0 0 auto;
            min-height: 350px;
        }

        .product-modal-info {
            padding: 30px 25px;
        }

        .product-modal-title {
            font-size: 2rem;
        }

        .product-modal-description {
            font-size: 1rem;
        }
    }

    @media (max-width: 576px) {
        .products-slider-wrapper {
            max-width: calc(100% - 30px);
            width: calc(100% - 30px);
        }

        .products-navigation {
            margin-top: 30px;
            gap: 12px;
        }

        .product-nav-btn {
            width: 40px;
            height: 40px;
            font-size: 1.2rem;
        }

        .product-buttons {
            flex-direction: column;
            gap: 6px;
        }

        .product-btn {
            font-size: 0.75rem;
            padding: 10px;
        }

        .product-modal-content {
            width: 95%;
            max-height: 95vh;
        }

        .product-modal-image {
            min-height: 250px;
        }

        .product-modal-info {
            padding: 25px 20px;
        }

        .product-modal-title {
            font-size: 1.5rem;
        }

        .product-modal-description {
            font-size: 0.9rem;
        }

        .product-modal-close {
            width: 40px;
            height: 40px;
            top: 15px;
            right: 15px;
        }
    }

    /* Extra small devices */
    @media (max-width: 400px) {
        .products-section-slider {
            min-height: auto;
        }

        .products-slider-bg {
            padding: 80px 0 50px;
        }

        .products-header {
            margin-bottom: 25px;
        }

        .products-label {
            font-size: 0.65rem;
            letter-spacing: 2px;
            padding: 5px 14px;
        }

        .products-main-title {
            font-size: 1.75rem;
            margin-bottom: 10px;
        }

        .products-subtitle {
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .products-slider-wrapper {
            max-width: calc(100% - 20px);
            width: calc(100% - 20px);
        }

        .product-card-modern {
            min-height: 450px;
            border-radius: 16px;
        }

        .product-image-bg {
            height: 200px;
        }

        .product-icon {
            font-size: 3rem;
        }

        .product-content-modern {
            padding: 16px;
        }

        .product-date {
            font-size: 0.65rem;
            letter-spacing: 1px;
        }

        .product-title-modern {
            font-size: 1.15rem;
            margin-bottom: 8px;
        }

        .product-description-modern {
            font-size: 0.8rem;
            line-height: 1.4;
            margin-bottom: 10px;
        }

        .product-price-modern {
            font-size: 1rem;
            margin-bottom: 10px;
        }

        .product-btn {
            font-size: 0.7rem;
            padding: 9px;
        }

        .product-btn i {
            font-size: 0.85rem;
        }

        .products-navigation {
            margin-top: 25px;
            gap: 10px;
        }

        .product-nav-btn {
            width: 38px;
            height: 38px;
            font-size: 1.1rem;
        }

        .product-modal-content {
            width: 98%;
            border-radius: 20px;
        }

        .product-modal-image {
            min-height: 220px;
        }

        .product-modal-image-bg .product-icon {
            font-size: 5rem;
        }

        .product-modal-info {
            padding: 20px 15px;
            gap: 15px;
        }

        .product-modal-title {
            font-size: 1.3rem;
        }

        .product-modal-description {
            font-size: 0.85rem;
            line-height: 1.6;
        }

        .product-modal-price {
            font-size: 1.6rem !important;
        }

        .product-modal-buttons .product-btn {
            padding: 12px 20px;
            font-size: 0.9rem;
        }

        .product-modal-close {
            width: 38px;
            height: 38px;
            top: 12px;
            right: 12px;
            font-size: 1.2rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slider = document.getElementById('productsSlider');
        const prevBtn = document.getElementById('productPrevBtn');
        const nextBtn = document.getElementById('productNextBtn');
        const slides = document.querySelectorAll('.product-slide');

        let currentIndex = 0;

        // Debug: Check if elements are found
        console.log('Slider element:', slider);
        console.log('Total slides found:', slides.length);
        console.log('Slides:', slides);

        // Calculate slides per view based on screen size
        function getSlidesPerView() {
            const width = window.innerWidth;
            if (width <= 576) return 1;
            if (width <= 768) return 2;
            if (width <= 1200) return 3;
            if (width <= 1400) return 4;
            return 5; // Default 5 items
        }

        // Calculate total pages
        function getTotalPages() {
            const slidesPerView = getSlidesPerView();
            return Math.ceil(slides.length / slidesPerView);
        }

        // Set slide widths dynamically
        function setSlideWidths() {
            const wrapper = document.querySelector('.products-slider-wrapper');
            const slidesPerView = getSlidesPerView();
            const gap = 24;
            const wrapperWidth = wrapper.offsetWidth;

            // Calculate slide width: (wrapper width - (gaps between slides)) / slides per view
            const slideWidth = (wrapperWidth - (gap * (slidesPerView - 1))) / slidesPerView;

            console.log('Setting slide widths:', {
                wrapperWidth: wrapperWidth,
                slidesPerView: slidesPerView,
                gap: gap,
                calculatedSlideWidth: slideWidth
            });

            // Set width for all slides
            slides.forEach(slide => {
                slide.style.width = `${slideWidth}px`;
            });
        }

        // Update slider position
        function updateSlider() {
            if (!slides[0]) {
                console.error('No slides found!');
                return;
            }
            const slideWidth = slides[0].offsetWidth;
            const gap = 24;
            const offset = -(currentIndex * (slideWidth + gap));

            console.log('Update slider:', {
                currentIndex: currentIndex,
                slideWidth: slideWidth,
                gap: gap,
                offset: offset,
                transform: `translateX(${offset}px)`
            });

            slider.style.transform = `translateX(${offset}px)`;
        }

        // Next page - ganti 1 halaman penuh (5 cards)
        function nextSlide() {
            const slidesPerView = getSlidesPerView();
            const totalPages = getTotalPages();
            const currentPage = Math.floor(currentIndex / slidesPerView);

            const nextPage = (currentPage + 1) % totalPages;
            currentIndex = nextPage * slidesPerView;

            console.log('Next clicked:', {
                currentPage: currentPage,
                nextPage: nextPage,
                newIndex: currentIndex,
                totalPages: totalPages,
                slidesPerView: slidesPerView
            });

            updateSlider();
        }

        // Previous page - ganti 1 halaman penuh (5 cards)
        function prevSlide() {
            const slidesPerView = getSlidesPerView();
            const totalPages = getTotalPages();
            const currentPage = Math.floor(currentIndex / slidesPerView);

            const prevPage = (currentPage - 1 + totalPages) % totalPages;
            currentIndex = prevPage * slidesPerView;

            console.log('Prev clicked:', {
                currentPage: currentPage,
                prevPage: prevPage,
                newIndex: currentIndex,
                totalPages: totalPages,
                slidesPerView: slidesPerView
            });

            updateSlider();
        }

        // Event listeners - manual navigation only
        nextBtn.addEventListener('click', nextSlide);
        prevBtn.addEventListener('click', prevSlide);

        // Handle window resize
        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                currentIndex = 0;
                setSlideWidths();
                updateSlider();
            }, 250);
        });

        // Initialize
        setSlideWidths();
        updateSlider();

        // ===== MODAL FUNCTIONALITY =====
        const modal = document.getElementById('productModal');
        const modalOverlay = document.getElementById('modalOverlay');
        const modalClose = document.getElementById('modalClose');
        const modalImage = document.getElementById('modalImage');
        const modalIcon = document.getElementById('modalIcon');
        const modalCategory = document.getElementById('modalCategory');
        const modalTitle = document.getElementById('modalTitle');
        const modalDescription = document.getElementById('modalDescription');
        const modalPrice = document.getElementById('modalPrice');

        const productCards = document.querySelectorAll('.product-card-modern');

        // Open modal when clicking on a product card
        productCards.forEach((card, index) => {
            card.addEventListener('click', function(e) {
                // Don't open modal if clicking on buttons
                if (e.target.closest('.product-btn')) {
                    return;
                }

                // Get product data from card
                const productImageBg = card.querySelector('.product-image-bg');
                const productIcon = card.querySelector('.product-icon');
                const category = card.querySelector('.product-date') ? card.querySelector('.product-date').textContent : '';
                const title = card.querySelector('.product-title-modern') ? card.querySelector('.product-title-modern').textContent : '';
                const description = card.querySelector('.product-description-modern') ? card.querySelector('.product-description-modern').textContent : '';
                const price = card.querySelector('.product-price-modern') ? card.querySelector('.product-price-modern').textContent : '';
                const bgStyle = productImageBg ? productImageBg.style.background : '';

                // Get Shopee and Tokopedia links from the card
                const shopeeBtn = card.querySelector('.btn-shopee-earth');
                const tokopediaBtn = card.querySelector('.btn-tokopedia-earth');
                const modalShopeeBtn = document.getElementById('modalShopeeBtn');
                const modalTokopediaBtn = document.getElementById('modalTokopediaBtn');

                // Set modal content
                if (modalImage && bgStyle) {
                    modalImage.style.background = bgStyle;
                }

                // Hide icon in modal (we don't want to show it)
                if (modalIcon) {
                    modalIcon.style.display = 'none';
                }

                if (modalCategory) modalCategory.textContent = category;
                if (modalTitle) modalTitle.textContent = title;
                if (modalDescription) modalDescription.textContent = description;
                if (modalPrice) modalPrice.textContent = price;

                // Update modal buttons
                if (shopeeBtn && modalShopeeBtn) {
                    modalShopeeBtn.href = shopeeBtn.href;
                    modalShopeeBtn.style.display = 'flex';
                } else if (modalShopeeBtn) {
                    modalShopeeBtn.style.display = 'none';
                }

                if (tokopediaBtn && modalTokopediaBtn) {
                    modalTokopediaBtn.href = tokopediaBtn.href;
                    modalTokopediaBtn.style.display = 'flex';
                } else if (modalTokopediaBtn) {
                    modalTokopediaBtn.style.display = 'none';
                }

                // Show modal
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        });

        // Close modal
        function closeModal() {
            modal.classList.remove('active');
            document.body.style.overflow = '';
        }

        modalClose.addEventListener('click', closeModal);
        modalOverlay.addEventListener('click', closeModal);

        // Close modal with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal.classList.contains('active')) {
                closeModal();
            }
        });
    });
</script>
