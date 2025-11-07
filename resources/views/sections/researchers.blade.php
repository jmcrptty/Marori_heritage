<!-- Researchers Section -->
<section id="researchers" class="researchers-section">
    <div class="researchers-bg">
        <div class="container">
            <!-- Header Section - Centered Top -->
            <div class="researchers-header">
                <span class="researchers-label">Suku Marori</span>
                <h2 class="researchers-main-title">Kelompok Penjaga Warisan Budaya Marori</h2>
                <p class="researchers-subtitle">
                    Tetua adat dan generasi muda Marori yang berdedikasi menjaga, mendokumentasikan, dan melestarikan
                    warisan budaya Suku Marori untuk generasi mendatang.
                </p>
            </div>

            <!-- Cards Grid -->
            <div class="researchers-grid-container" id="researchersGrid">
                @if(isset($researchers) && $researchers->count() > 0)
                    @foreach($researchers as $index => $researcher)
                    <div class="researcher-card {{ $index >= 6 ? 'hidden-card' : '' }}" data-index="{{ $index }}">
                        <div class="researcher-image">
                            @if($researcher->photo)
                                <img src="{{ asset('storage/' . $researcher->photo) }}"
                                     alt="{{ $researcher->name }}"
                                     loading="lazy">
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
                    <!-- Default cards if no data -->
                    <div class="researcher-card" data-index="0">
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

                    <div class="researcher-card" data-index="1">
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

                    <div class="researcher-card" data-index="2">
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

                    <div class="researcher-card" data-index="3">
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

                    <div class="researcher-card" data-index="4">
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

                    <div class="researcher-card" data-index="5">
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

            <!-- Load More Button -->
            <div class="load-more-container" id="loadMoreContainer" style="display: none;">
                <button class="load-more-btn" id="loadMoreBtn">
                    <span>Lihat Lebih Banyak</span>
                    <i class="bi bi-chevron-down"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<style>
    /* Researchers Section */
    .researchers-section {
        padding: 80px 0;
        margin: 0;
        position: relative;
        background: #FFFFFF;
    }

    .researchers-bg {
        background: transparent;
        position: relative;
        width: 100%;
    }

    .researchers-bg .container {
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
        color: #1a1a1a;
        text-transform: uppercase;
        margin-bottom: 8px;
        background: rgba(26, 26, 26, 0.1);
        padding: 4px 12px;
        border-radius: 20px;
    }

    .researchers-main-title {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        color: #1a1a1a;
        margin-bottom: 10px;
        font-weight: 700;
        line-height: 1.2;
        letter-spacing: -1px;
    }

    .researchers-subtitle {
        color: #4a4a4a;
        font-size: 0.9rem;
        line-height: 1.5;
        max-width: 700px;
        margin: 0 auto;
    }

    /* Grid Container */
    .researchers-grid-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        width: 100%;
        margin-top: 40px;
    }

    /* Hidden Cards */
    .researcher-card.hidden-card {
        display: none;
    }

    /* Researcher Card - Smaller Design */
    .researcher-card {
        background: #1a1a1a;
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s ease;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(0, 0, 0, 0.4);
        display: flex;
        flex-direction: column;
        opacity: 1;
        visibility: visible;
    }

    .researcher-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
        border-color: rgba(0, 0, 0, 0.7);
        background: #000000;
    }

    .researcher-image {
        width: 100%;
        height: 380px;
        background: #2a2a2a;
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
        background: transparent;
    }

    .researcher-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .researcher-image img.lazy-loading {
        background: #2a2a2a;
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
        background: #1a1a1a;
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

    /* Load More Button */
    .load-more-container {
        margin-top: 50px;
        text-align: center;
    }

    .load-more-btn {
        background: #1a1a1a;
        color: white;
        border: 2px solid #1a1a1a;
        padding: 14px 40px;
        border-radius: 50px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .load-more-btn:hover {
        background: #8B0000;
        border-color: #8B0000;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(139, 0, 0, 0.3);
    }

    .load-more-btn i {
        transition: transform 0.3s ease;
    }

    .load-more-btn:hover i {
        transform: translateY(3px);
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .researchers-main-title {
            font-size: 2.5rem;
        }

        .researcher-image {
            height: 400px;
        }
    }

    @media (max-width: 991px) {
        .researchers-section {
            padding: 60px 0;
        }

        .researchers-grid-container {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
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
            height: 380px;
        }
    }

    @media (max-width: 768px) {
        .researchers-section {
            padding: 50px 0;
        }

        .researchers-grid-container {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .researcher-image {
            height: 360px;
        }

        .researcher-avatar {
            font-size: 4rem;
        }

        .researchers-main-title {
            font-size: 1.8rem;
        }

        .researchers-subtitle {
            font-size: 1rem;
        }
    }

    @media (max-width: 576px) {
        .researchers-section {
            padding: 40px 0;
        }

        .researchers-grid-container {
            grid-template-columns: 1fr;
            gap: 20px;
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
            height: 380px;
        }

        .researcher-avatar {
            font-size: 3.5rem;
        }

        .researcher-name {
            font-size: 1.1rem;
        }

        .researcher-info {
            padding: 16px;
        }
    }

    /* Extra small devices */
    @media (max-width: 400px) {
        .researchers-section {
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
            height: 360px;
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
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loadMoreBtn = document.getElementById('loadMoreBtn');
        const loadMoreContainer = document.getElementById('loadMoreContainer');
        const cards = document.querySelectorAll('.researcher-card');
        const totalCards = cards.length;
        const initialShow = 6;
        let currentlyShown = initialShow;

        // Show load more button if there are more than 6 cards
        if (totalCards > initialShow) {
            loadMoreContainer.style.display = 'block';
        }

        // Load more functionality
        if (loadMoreBtn) {
            loadMoreBtn.addEventListener('click', function() {
                const hiddenCards = document.querySelectorAll('.researcher-card.hidden-card');

                // Show all remaining cards with animation
                hiddenCards.forEach((card, index) => {
                    setTimeout(() => {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(20px)';
                        card.classList.remove('hidden-card');

                        // Trigger animation
                        setTimeout(() => {
                            card.style.transition = 'all 0.5s ease';
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, 50);
                    }, index * 100);
                });

                // Hide the button after showing all
                setTimeout(() => {
                    loadMoreContainer.style.display = 'none';
                }, hiddenCards.length * 100 + 300);
            });
        }
    });
</script>
