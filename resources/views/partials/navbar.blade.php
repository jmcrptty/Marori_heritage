<!-- Navbar Modern -->
<nav class="navbar navbar-expand-lg navbar-modern">
    <div class="container-fluid px-5">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Menu Kiri -->
            <ul class="navbar-nav navbar-nav-left">
                <li class="nav-item">
                    <a class="nav-link" href="#products">PRODUK</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#culture">BUDAYA</a>
                </li>
            </ul>

            <!-- Logo Tengah -->
            <a class="navbar-brand navbar-brand-center" href="#home">
                <div class="brand-logo">
                    <span class="brand-text">MARORI</span>
                </div>
            </a>

            <!-- Menu Kanan -->
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item">
                    <a class="nav-link" href="#about">TENTANG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#features">FITUR</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gallery">GALERI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">KONTAK</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-modern {
        position: fixed;
        top: 25px;
        left: 50%;
        transform: translateX(-50%);
        width: calc(100% - 40px);
        max-width: 96%;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(15px);
        padding: 0.5rem 0;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        border-bottom: none;
        border-radius: 50px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 1000;
    }

    .navbar-modern.scrolled {
        top: 0;
        width: 100%;
        max-width: 100%;
        border-radius: 0;
        padding: 0.5rem 0;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.15);
        background: rgba(255, 255, 255, 0.98);
    }

    /* Container navbar */
    .navbar-modern .container-fluid {
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
    }

    .navbar-modern .navbar-collapse {
        display: flex !important;
        align-items: center;
        justify-content: space-between;
        flex-grow: 1;
    }

    /* Menu Kiri */
    .navbar-nav-left {
        display: flex;
        gap: 2.5rem;
        margin: 0;
        padding-left: 1rem;
    }

    /* Logo Tengah - Absolute Center */
    .navbar-brand-center {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
    }

    /* Menu Kanan */
    .navbar-nav-right {
        display: flex;
        gap: 2.5rem;
        margin-left: auto;
        padding-right: 1rem;
    }

    .brand-logo {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .brand-text {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        font-weight: 800;
        font-size: 1.5rem;
        color: #000000;
        letter-spacing: 0.1em;
    }

    .navbar-modern .navbar-nav {
        display: flex;
        align-items: center;
    }

    .navbar-modern .nav-item {
        margin: 0;
    }

    .navbar-modern .nav-link {
        color: #000000;
        font-weight: 500;
        font-size: 0.875rem;
        padding: 0.75rem 0;
        position: relative;
        transition: all 0.3s ease;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        letter-spacing: 0.05em;
        white-space: nowrap;
        text-transform: uppercase;
    }

    .navbar-modern .nav-link:hover {
        color: #666666;
    }

    @media (max-width: 991px) {
        .navbar-modern {
            top: 15px;
            width: calc(100% - 30px);
            border-radius: 12px;
            background: rgba(92, 64, 51, 0.95);
            backdrop-filter: blur(20px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
        }

        .navbar-modern.scrolled {
            top: 0;
            width: 100%;
            border-radius: 0;
        }

        .navbar-modern .navbar-collapse {
            background: white;
            margin-top: 0.75rem;
            padding: 0;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .navbar-modern .navbar-nav {
            gap: 0;
            padding: 0.5rem 0;
        }

        .navbar-modern .nav-link {
            padding: 0.75rem 1rem 0.75rem 0;
            border-bottom: 1px solid #f5f5f5;
            font-size: 0.95rem;
            color: #2c3e50;
            transition: all 0.2s ease;
            text-align: left;
        }

        .navbar-modern .nav-link:hover {
            background: transparent;
            color: var(--primary-color);
            padding-left: 0.25rem;
        }

        .navbar-modern .nav-item:last-child .nav-link {
            border-bottom: none;
        }

        .brand-text {
            font-size: 1.15rem;
        }

        .navbar-toggler {
            border: none;
            padding: 0.5rem;
            border-radius: 8px;
            background: #f5f5f5;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }
    }

    @media (max-width: 768px) {
        .navbar-modern {
            padding: 0.35rem 0;
        }

        .navbar-modern .nav-link {
            font-size: 0.92rem;
            padding: 0.7rem 1rem 0.7rem 0;
        }

        .brand-text {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 576px) {
        .navbar-modern .navbar-collapse {
            margin-top: 0.65rem;
        }

        .navbar-modern .nav-link {
            padding: 0.65rem 1rem 0.65rem 0;
            font-size: 0.9rem;
        }

        .brand-text {
            font-size: 1rem;
        }
    }
</style>

<script>
    // Navbar scroll effect - simple sticky behavior
    const navbar = document.querySelector('.navbar-modern');

    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        // Add scrolled class (sticky to top) after 50px scroll
        if (scrollTop > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }, false);
</script>
