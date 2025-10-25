<!-- Statistics Section -->
<section class="stats-section">
    <div class="container">
        <div class="row g-4">
            <!-- Stat 1 -->
            <div class="col-md-4">
                <div class="stat-box">
                    <div class="stat-icon-circle">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="stat-info">
                        <h3 class="stat-count">12k+</h3>
                        <p class="stat-description">Pelanggan Puas di Seluruh Indonesia</p>
                    </div>
                </div>
            </div>

            <!-- Stat 2 -->
            <div class="col-md-4">
                <div class="stat-box">
                    <div class="stat-icon-circle">
                        <i class="bi bi-award-fill"></i>
                    </div>
                    <div class="stat-info">
                        <h3 class="stat-count">10+ Tahun</h3>
                        <p class="stat-description">Pengalaman dalam Industri Kerajinan Lokal</p>
                    </div>
                </div>
            </div>

            <!-- Stat 3 -->
            <div class="col-md-4">
                <div class="stat-box">
                    <div class="stat-icon-circle">
                        <i class="bi bi-globe2"></i>
                    </div>
                    <div class="stat-info">
                        <h3 class="stat-count">50+</h3>
                        <p class="stat-description">Pengrajin dan Destinasi Terpercaya</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .stats-section {
        padding: 80px 0;
        margin: 0;
        background: linear-gradient(135deg, #FFFBF0 0%, #FFF8E7 100%);
    }

    .stat-box {
        text-align: center;
        padding: 2rem 1.5rem;
    }

    .stat-icon-circle {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        box-shadow: 0 5px 20px rgba(92, 64, 51, 0.1);
    }

    .stat-icon-circle i {
        font-size: 2.2rem;
        color: var(--primary-color);
    }

    .stat-info {
        margin-top: 1rem;
    }

    .stat-count {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
    }

    .stat-description {
        font-size: 0.95rem;
        color: var(--text-secondary);
        line-height: 1.5;
        margin: 0;
    }

    @media (max-width: 768px) {
        .stats-section {
            padding: 60px 0;
        }

        .stat-icon-circle {
            width: 70px;
            height: 70px;
        }

        .stat-icon-circle i {
            font-size: 1.8rem;
        }

        .stat-count {
            font-size: 2rem;
        }

        .stat-description {
            font-size: 0.9rem;
        }
    }
</style>
