<!-- Contact Section - Modern Elegant Design -->
<section id="contact" class="contact-section-modern">
    <div class="contact-bg-overlay"></div>

    <div class="container" style="position: relative; z-index: 2;">
        <!-- Header -->
        <div class="contact-header">
            <span class="contact-badge">HUBUNGI KAMI</span>
            <h2 class="contact-main-title">Mari Terhubung Bersama</h2>
            <p class="contact-subtitle">
                Kami siap melayani dan menjawab pertanyaan Anda tentang produk dan budaya Marori
            </p>
        </div>

        <!-- Main Contact Grid -->
        <div class="row g-4 mb-5">
            <!-- WhatsApp -->
            <div class="col-md-6 col-lg-4">
                <div class="contact-card-modern">
                    <div class="contact-icon-modern">
                        <i class="bi bi-whatsapp"></i>
                    </div>
                    <h4 class="contact-card-title">WhatsApp</h4>
                    <p class="contact-card-desc">Chat langsung dengan tim kami</p>
                    <a href="https://wa.me/6281234567890" class="contact-link">
                        <i class="bi bi-arrow-right-circle"></i> +62 812-3456-7890
                    </a>
                </div>
            </div>

            <!-- Email -->
            <div class="col-md-6 col-lg-4">
                <div class="contact-card-modern">
                    <div class="contact-icon-modern">
                        <i class="bi bi-envelope-at"></i>
                    </div>
                    <h4 class="contact-card-title">Email</h4>
                    <p class="contact-card-desc">Untuk pertanyaan detail</p>
                    <a href="mailto:marori@wasur.com" class="contact-link">
                        <i class="bi bi-arrow-right-circle"></i> marori@wasur.com
                    </a>
                </div>
            </div>

            <!-- Location -->
            <div class="col-md-6 col-lg-4">
                <div class="contact-card-modern">
                    <div class="contact-icon-modern">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <h4 class="contact-card-title">Lokasi</h4>
                    <p class="contact-card-desc">Kunjungi kami di</p>
                    <p class="contact-address">
                        Taman Nasional Wasur<br>
                        Merauke, Papua Selatan<br>
                        Indonesia
                    </p>
                </div>
            </div>
        </div>

        <!-- Social Media & Marketplace Section -->
        <div class="row g-4 mb-5">
            <!-- Social Media -->
            <div class="col-lg-6">
                <div class="social-media-card">
                    <div class="social-header">
                        <div class="social-icon-header">
                            <i class="bi bi-share"></i>
                        </div>
                        <div>
                            <h4 class="social-title">Media Sosial</h4>
                            <p class="social-subtitle">Ikuti perjalanan dan cerita kami</p>
                        </div>
                    </div>

                    <div class="social-links-grid">
                        <a href="#" class="social-link-item instagram">
                            <i class="bi bi-instagram"></i>
                            <span>Instagram</span>
                        </a>
                        <a href="#" class="social-link-item facebook">
                            <i class="bi bi-facebook"></i>
                            <span>Facebook</span>
                        </a>
                        <a href="#" class="social-link-item youtube">
                            <i class="bi bi-youtube"></i>
                            <span>YouTube</span>
                        </a>
                        <a href="#" class="social-link-item tiktok">
                            <i class="bi bi-tiktok"></i>
                            <span>TikTok</span>
                        </a>
                        <a href="#" class="social-link-item twitter">
                            <i class="bi bi-twitter-x"></i>
                            <span>Twitter</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- E-commerce Marketplace -->
            <div class="col-lg-6">
                <div class="marketplace-card">
                    <div class="marketplace-header">
                        <div class="marketplace-icon-header">
                            <i class="bi bi-shop"></i>
                        </div>
                        <div>
                            <h4 class="marketplace-title">Belanja Online</h4>
                            <p class="marketplace-subtitle">Tersedia di marketplace favorit Anda</p>
                        </div>
                    </div>

                    <div class="marketplace-links">
                        <a href="#" class="marketplace-link-item shopee">
                            <div class="marketplace-logo">
                                <i class="bi bi-bag-check"></i>
                            </div>
                            <div class="marketplace-info">
                                <h5>Shopee</h5>
                                <p>@marori.official</p>
                            </div>
                            <i class="bi bi-arrow-right"></i>
                        </a>

                        <a href="#" class="marketplace-link-item tokopedia">
                            <div class="marketplace-logo">
                                <i class="bi bi-shop-window"></i>
                            </div>
                            <div class="marketplace-info">
                                <h5>Tokopedia</h5>
                                <p>Marori Wasur Official</p>
                            </div>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Copyright -->
        <div class="footer-bottom">
            <p>&copy; 2025 Suku Marori Wasur. All rights reserved.</p>
            <p>Melestarikan budaya, menghubungkan generasi</p>
        </div>
    </div>
</section>

<style>
    /* Contact Section Modern */
    .contact-section-modern {
        background: linear-gradient(to bottom,
            #FFFFFF 0%,
            #FFFEF9 20%,
            #FFF9F0 40%,
            #FFF4E6 60%,
            #FFEBCC 80%,
            #F5E6D3 100%);
        position: relative;
        padding: 40px 0 40px;
        overflow: hidden;
    }

    .contact-bg-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background:
            radial-gradient(circle at 20% 30%, rgba(127, 182, 133, 0.08) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(93, 64, 55, 0.08) 0%, transparent 50%);
        z-index: 1;
    }

    /* Header */
    .contact-header {
        text-align: center;
        margin-bottom: 50px;
        padding-top: 20px;
        position: relative;
        z-index: 2;
    }

    .contact-badge {
        display: inline-block;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 3px;
        color: #2C4A3E;
        text-transform: uppercase;
        margin-bottom: 15px;
        background: rgba(44, 74, 62, 0.1);
        padding: 8px 20px;
        border-radius: 25px;
        border: 1px solid rgba(44, 74, 62, 0.2);
    }

    .contact-main-title {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        color: #2C4A3E;
        margin-bottom: 15px;
        font-weight: 700;
        line-height: 1.2;
        letter-spacing: -1px;
    }

    .contact-subtitle {
        color: #5D4037;
        font-size: 1.1rem;
        line-height: 1.6;
        max-width: 700px;
        margin: 0 auto;
    }

    /* Contact Cards */
    .contact-card-modern {
        background: rgba(44, 74, 62, 0.85);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(44, 74, 62, 0.3);
        border-radius: 24px;
        padding: 40px 30px;
        text-align: center;
        transition: all 0.4s ease;
        height: 100%;
        box-shadow: 0 4px 20px rgba(44, 74, 62, 0.2);
    }

    .contact-card-modern:hover {
        background: rgba(44, 74, 62, 0.95);
        border-color: rgba(127, 182, 133, 0.5);
        transform: translateY(-8px);
        box-shadow: 0 8px 30px rgba(44, 74, 62, 0.3);
    }

    .contact-icon-modern {
        width: 70px;
        height: 70px;
        background: rgba(127, 182, 133, 0.25);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 2rem;
        color: #A5D6A7;
        transition: all 0.4s ease;
        border: 2px solid rgba(127, 182, 133, 0.4);
    }

    .contact-card-modern:hover .contact-icon-modern {
        background: rgba(127, 182, 133, 0.35);
        border-color: #7FB685;
        transform: scale(1.1);
    }

    .contact-card-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        color: white;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .contact-card-desc {
        color: rgba(255, 255, 255, 0.85);
        font-size: 0.95rem;
        margin-bottom: 20px;
    }

    .contact-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #A5D6A7;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .contact-link:hover {
        color: #C8E6C9;
        gap: 12px;
    }

    .contact-address {
        color: white;
        font-size: 1rem;
        line-height: 1.8;
        margin: 0;
        font-weight: 500;
    }

    /* Social Media Card */
    .social-media-card {
        background: rgba(44, 74, 62, 0.85);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(44, 74, 62, 0.3);
        border-radius: 24px;
        padding: 40px;
        height: 100%;
        transition: all 0.4s ease;
        box-shadow: 0 4px 20px rgba(44, 74, 62, 0.2);
    }

    .social-media-card:hover {
        background: rgba(44, 74, 62, 0.95);
        border-color: rgba(127, 182, 133, 0.5);
        box-shadow: 0 8px 30px rgba(44, 74, 62, 0.3);
    }

    .social-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
    }

    .social-icon-header {
        width: 60px;
        height: 60px;
        background: rgba(127, 182, 133, 0.25);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        color: #A5D6A7;
        flex-shrink: 0;
        border: 2px solid rgba(127, 182, 133, 0.4);
    }

    .social-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.6rem;
        color: white;
        margin: 0 0 5px 0;
        font-weight: 600;
    }

    .social-subtitle {
        color: rgba(255, 255, 255, 0.85);
        font-size: 0.95rem;
        margin: 0;
    }

    .social-links-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }

    .social-link-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 15px 20px;
        background: rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 15px;
        color: white;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .social-link-item i {
        font-size: 1.5rem;
    }

    .social-link-item.instagram:hover {
        background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
        border-color: transparent;
        transform: translateY(-3px);
    }

    .social-link-item.facebook:hover {
        background: #1877F2;
        border-color: transparent;
        transform: translateY(-3px);
    }

    .social-link-item.youtube:hover {
        background: #FF0000;
        border-color: transparent;
        transform: translateY(-3px);
    }

    .social-link-item.tiktok:hover {
        background: #000000;
        border-color: transparent;
        transform: translateY(-3px);
    }

    .social-link-item.twitter:hover {
        background: #1DA1F2;
        border-color: transparent;
        transform: translateY(-3px);
    }

    /* Marketplace Card */
    .marketplace-card {
        background: rgba(44, 74, 62, 0.85);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(44, 74, 62, 0.3);
        border-radius: 24px;
        padding: 40px;
        height: 100%;
        transition: all 0.4s ease;
        box-shadow: 0 4px 20px rgba(44, 74, 62, 0.2);
    }

    .marketplace-card:hover {
        background: rgba(44, 74, 62, 0.95);
        border-color: rgba(127, 182, 133, 0.5);
        box-shadow: 0 8px 30px rgba(44, 74, 62, 0.3);
    }

    .marketplace-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
    }

    .marketplace-icon-header {
        width: 60px;
        height: 60px;
        background: rgba(127, 182, 133, 0.25);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        color: #A5D6A7;
        flex-shrink: 0;
        border: 2px solid rgba(127, 182, 133, 0.4);
    }

    .marketplace-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.6rem;
        color: white;
        margin: 0 0 5px 0;
        font-weight: 600;
    }

    .marketplace-subtitle {
        color: rgba(255, 255, 255, 0.85);
        font-size: 0.95rem;
        margin: 0;
    }

    .marketplace-links {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .marketplace-link-item {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 20px 25px;
        background: rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 18px;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .marketplace-link-item:hover {
        transform: translateX(8px);
    }

    .marketplace-link-item.shopee:hover {
        background: linear-gradient(135deg, #EE4D2D 0%, #FF6B35 100%);
        border-color: transparent;
    }

    .marketplace-link-item.tokopedia:hover {
        background: linear-gradient(135deg, #42B549 0%, #5EC962 100%);
        border-color: transparent;
    }

    .marketplace-logo {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .marketplace-info {
        flex: 1;
    }

    .marketplace-info h5 {
        margin: 0 0 3px 0;
        font-size: 1.2rem;
        font-weight: 700;
        color: white;
    }

    .marketplace-info p {
        margin: 0;
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.7);
    }

    .marketplace-link-item > i:last-child {
        font-size: 1.5rem;
        opacity: 0.7;
    }

    /* Footer Bottom */
    .footer-bottom {
        text-align: center;
        margin-top: 40px;
        padding: 30px 20px;
        background: rgba(44, 74, 62, 0.85);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(44, 74, 62, 0.3);
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(44, 74, 62, 0.2);
    }

    .footer-bottom p {
        color: rgba(255, 255, 255, 0.85);
        margin: 5px 0;
        font-size: 0.95rem;
    }

    .footer-bottom p:first-child {
        font-weight: 600;
        color: white;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .contact-main-title {
            font-size: 2.5rem;
        }

        .social-links-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .contact-section-modern {
            padding: 30px 0 30px;
        }

        .contact-main-title {
            font-size: 2rem;
        }

        .contact-header {
            margin-bottom: 40px;
            padding-top: 10px;
        }

        .social-media-card,
        .marketplace-card {
            padding: 30px;
        }
    }

    @media (max-width: 576px) {
        .contact-section-modern {
            padding: 20px 0 20px;
        }

        .contact-header {
            padding-top: 10px;
        }

        .contact-card-modern {
            padding: 30px 20px;
        }

        .marketplace-link-item {
            padding: 18px 20px;
        }

        .marketplace-info h5 {
            font-size: 1.1rem;
        }

        .social-link-item {
            padding: 12px 15px;
            font-size: 0.95rem;
        }
    }
</style>
