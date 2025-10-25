<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h2 class="features-title">Mengapa Memilih<br><strong>Produk Suku Marori Wasur?</strong></h2>
                <p class="features-description">
                    Dari kerajinan tangan yang autentik hingga produk kuliner khas Papua, kami menyediakan pengalaman berbelanja yang unik dengan dukungan langsung kepada masyarakat adat dan layanan terpercaya.
                </p>
                <div class="social-links mt-4">
                    <a href="#" class="social-icon" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="social-icon" aria-label="Twitter">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="#" class="social-icon" aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="features-cards">
                    <!-- Local Expertise Card -->
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Keahlian Lokal</h3>
                            <p>Produk kami dibuat oleh pengrajin ahli dengan pengetahuan unik dan mendalam tentang budaya Papua.</p>
                        </div>
                    </div>

                    <!-- All-in-One Shopping Card -->
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-bag-check-fill"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Belanja Mudah</h3>
                            <p>Pesan semua produk dalam satu platform. Pengiriman cepat dan layanan pelanggan terpercaya.</p>
                        </div>
                    </div>

                    <!-- 24/7 Support Card -->
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Layanan 24/7</h3>
                            <p>Kami siap membantu kapan saja. Dapatkan bantuan real-time kapanpun Anda membutuhkannya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .features-section {
        padding: 100px 0;
        background: #ffffff;
    }

    .features-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        color: var(--text-primary);
        margin-bottom: 1.5rem;
        line-height: 1.3;
    }

    .features-title strong {
        font-weight: 700;
    }

    .features-description {
        font-size: 1.05rem;
        color: var(--text-secondary);
        line-height: 1.8;
        margin-bottom: 2rem;
    }

    .social-links {
        display: flex;
        gap: 1rem;
    }

    .social-icon {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: var(--light-bg);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        font-size: 1.2rem;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .social-icon:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-3px);
    }

    .features-cards {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .feature-card {
        background: #F8F9FA;
        border-radius: 16px;
        padding: 2rem;
        display: flex;
        gap: 1.5rem;
        align-items: flex-start;
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }

    .feature-card:hover {
        background: #ffffff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border-color: var(--secondary-color);
        transform: translateX(10px);
    }

    .feature-icon {
        width: 65px;
        height: 65px;
        border-radius: 16px;
        background: var(--primary-color);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.8rem;
        flex-shrink: 0;
    }

    .feature-content h3 {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
        font-weight: 600;
    }

    .feature-content p {
        font-size: 0.95rem;
        color: var(--text-secondary);
        line-height: 1.6;
        margin: 0;
    }

    @media (max-width: 768px) {
        .features-section {
            padding: 70px 0;
        }

        .features-title {
            font-size: 2rem;
        }

        .feature-card {
            padding: 1.5rem;
            gap: 1rem;
        }

        .feature-icon {
            width: 55px;
            height: 55px;
            font-size: 1.5rem;
        }

        .feature-content h3 {
            font-size: 1.1rem;
        }

        .feature-content p {
            font-size: 0.9rem;
        }
    }
</style>
