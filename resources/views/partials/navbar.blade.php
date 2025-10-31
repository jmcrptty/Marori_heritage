<!-- Navbar Modern -->
<nav class="navbar navbar-expand-lg navbar-modern">
    <div class="container-fluid px-5">
        <!-- Logo Brand - Always visible -->
        <a class="navbar-brand" href="#home">
            <div class="brand-logo">
                <img src="{{ asset('img/marori.png') }}" alt="Marori Logo" class="brand-logo-img">
            </div>
        </a>

        <!-- Desktop Menu -->
        <div class="navbar-collapse-desktop" id="navbarDesktop">
            <!-- Menu Kiri -->
            <ul class="navbar-nav navbar-nav-left">
                <li class="nav-item">
                    <a class="nav-link" href="#produk">PRODUK</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#culture">BUDAYA</a>
                </li>
            </ul>

            <!-- Logo Tengah - Desktop only -->
            <a class="navbar-brand navbar-brand-center" href="#home">
                <div class="brand-logo">
                    <span class="brand-text">MARORI</span>
                </div>
            </a>

            <!-- Menu Kanan -->
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item">
                    <a class="nav-link" href="#home">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#galeri">GALERI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#researchers">TENTANG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">KONTAK</a>
                </li>
            </ul>
        </div>

        <!-- Mobile Menu Button -->
        <button class="navbar-toggler-custom" type="button" id="mobileMenuBtn" aria-label="Open Menu">
            <span class="menu-text">MENU</span>
            <span class="menu-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </button>
    </div>
</nav>

<!-- Mobile Fullscreen Menu -->
<div class="mobile-menu-fullscreen" id="mobileMenu">
    <div class="mobile-menu-container">
        <!-- Header with Logo and Close -->
        <div class="mobile-menu-header">
            <a class="navbar-brand" href="#home">
                <img src="{{ asset('img/marori.png') }}" alt="Marori Logo" class="brand-logo-img">
            </a>
            <button class="mobile-menu-close" id="mobileMenuClose">
                <span class="menu-text">MENU</span>
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <!-- Menu Items - Center -->
        <nav class="mobile-menu-nav">
            <a href="#home" class="mobile-menu-link">HOME</a>
            <a href="#produk" class="mobile-menu-link">PRODUK</a>
            <a href="#culture" class="mobile-menu-link">BUDAYA</a>
            <a href="#galeri" class="mobile-menu-link">GALERI</a>
            <a href="#researchers" class="mobile-menu-link">TENTANG</a>
            <a href="#contact" class="mobile-menu-link">KONTAK</a>
        </nav>
    </div>
</div>

<style>
    /* Navbar Modern */
    .navbar-modern {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        width: calc(100% - 40px);
        max-width: 96%;
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(20px);
        padding: 0.75rem 0;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
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
        padding: 0.75rem 0;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        background: rgba(255, 255, 255, 0.98);
    }

    /* Container navbar */
    .navbar-modern .container-fluid {
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
    }

    /* Desktop Menu Layout */
    .navbar-collapse-desktop {
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
        list-style: none;
    }

    /* Logo Tengah - Absolute Center - Desktop only */
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
        list-style: none;
    }

    .brand-logo {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .brand-logo-img {
        height: 45px;
        width: auto;
        object-fit: contain;
    }

    .brand-text {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        font-weight: 800;
        font-size: 1.5rem;
        color: #000000;
        letter-spacing: 0.1em;
        text-decoration: none;
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
        text-decoration: none;
    }

    .navbar-modern .nav-link:hover {
        color: #8B6F47;
    }

    /* Mobile Menu Button - Hidden on desktop */
    .navbar-toggler-custom {
        display: none;
    }

    /* Mobile Fullscreen Menu - Hidden on desktop */
    .mobile-menu-fullscreen {
        display: none !important;
    }

    /* ========== LARGE DESKTOP ========== */
    @media (min-width: 1400px) {
        .navbar-nav-left,
        .navbar-nav-right {
            gap: 3rem;
        }

        .navbar-modern .nav-link {
            font-size: 0.9rem;
        }
    }

    /* ========== MEDIUM DESKTOP (prevent overlap) ========== */
    @media (max-width: 1399px) and (min-width: 1201px) {
        /* Hide left logo, only show center logo */
        .navbar-brand:not(.navbar-brand-center) {
            opacity: 0;
            pointer-events: none;
        }

        .navbar-nav-left {
            gap: 1.5rem;
            padding-left: 0.5rem;
            padding-right: 3rem;
        }

        .navbar-nav-right {
            gap: 1.5rem;
            padding-left: 3rem;
            padding-right: 0.5rem;
        }

        .navbar-modern .nav-link {
            font-size: 0.75rem;
        }

        .brand-text {
            font-size: 1.3rem;
        }

        .brand-logo-img {
            height: 40px;
        }
    }

    /* ========== TABLET & MOBILE RESPONSIVE ========== */
    @media (max-width: 1200px) {
        /* Hide desktop menu on tablet and mobile */
        .navbar-collapse-desktop {
            display: none !important;
        }

        /* Show mobile menu button on tablet and mobile */
        .navbar-toggler-custom {
            display: flex !important;
            align-items: center;
            gap: 10px;
            background: rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 50px;
            padding: 8px 18px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            z-index: 100;
        }

        .navbar-toggler-custom:hover {
            background: rgba(0, 0, 0, 0.08);
        }

        .navbar-toggler-custom:active {
            transform: scale(0.98);
        }

        .navbar-toggler-custom .menu-text {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 0.1em;
            color: #000;
            text-transform: uppercase;
        }

        .navbar-toggler-custom .menu-icon {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .navbar-toggler-custom .menu-icon span {
            width: 18px;
            height: 2px;
            background: #000;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        /* Navbar adjustments */
        .navbar-modern {
            top: 15px;
            width: calc(100% - 30px);
            border-radius: 50px;
            padding: 0.6rem 0;
        }

        .navbar-modern.scrolled {
            top: 0;
            width: 100%;
            border-radius: 0;
            padding: 0.7rem 0;
        }

        .brand-text {
            font-size: 1.2rem;
        }

        .brand-logo-img {
            height: 38px;
        }

        /* Mobile Fullscreen Menu */
        .mobile-menu-fullscreen {
            display: block !important;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: #FFFFFF;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .mobile-menu-fullscreen.active {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        .mobile-menu-container {
            height: 100%;
            display: flex;
            flex-direction: column;
            padding: 0;
        }

        /* Mobile Menu Header */
        .mobile-menu-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 2rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.08);
        }

        .mobile-menu-header .brand-text {
            font-size: 1.3rem;
            color: #000;
        }

        .mobile-menu-header .brand-logo-img {
            height: 40px;
        }

        .mobile-menu-close {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 50px;
            padding: 8px 18px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .mobile-menu-close:hover {
            background: rgba(0, 0, 0, 0.08);
        }

        .mobile-menu-close .menu-text {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 0.1em;
            color: #000;
            text-transform: uppercase;
        }

        .mobile-menu-close i {
            font-size: 1.2rem;
            color: #000;
        }

        /* Mobile Menu Nav - Center */
        .mobile-menu-nav {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 0;
            padding: 2rem;
        }

        .mobile-menu-link {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            font-size: 1.5rem;
            letter-spacing: 0.05em;
            color: #000;
            text-transform: uppercase;
            text-decoration: none;
            padding: 1.2rem 0;
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(20px);
        }

        .mobile-menu-fullscreen.active .mobile-menu-link {
            opacity: 1;
            transform: translateY(0);
        }

        .mobile-menu-link:nth-child(1) { transition-delay: 0.1s; }
        .mobile-menu-link:nth-child(2) { transition-delay: 0.15s; }
        .mobile-menu-link:nth-child(3) { transition-delay: 0.2s; }
        .mobile-menu-link:nth-child(4) { transition-delay: 0.25s; }
        .mobile-menu-link:nth-child(5) { transition-delay: 0.3s; }
        .mobile-menu-link:nth-child(6) { transition-delay: 0.35s; }
        .mobile-menu-link:nth-child(7) { transition-delay: 0.4s; }

        .mobile-menu-link:hover {
            color: #8B6F47;
        }
    }

    /* Tablet adjustments (better sizing for tablets) */
    @media (max-width: 991px) {
        .navbar-modern {
            top: 15px;
            padding: 0.6rem 0;
        }

        .brand-text {
            font-size: 1.3rem;
        }

        .brand-logo-img {
            height: 40px;
        }

        .mobile-menu-link {
            font-size: 1.6rem;
            padding: 1.3rem 0;
        }

        .navbar-toggler-custom .menu-text,
        .mobile-menu-close .menu-text {
            font-size: 0.85rem;
        }
    }

    @media (max-width: 768px) {
        .navbar-modern {
            top: 12px;
            padding: 0.5rem 0;
        }

        .brand-text {
            font-size: 1.1rem;
        }

        .brand-logo-img {
            height: 35px;
        }

        .mobile-menu-link {
            font-size: 1.3rem;
            padding: 1rem 0;
        }

        .navbar-toggler-custom .menu-text,
        .mobile-menu-close .menu-text {
            font-size: 0.8rem;
        }
    }

    @media (max-width: 576px) {
        .navbar-modern {
            top: 10px;
            width: calc(100% - 24px);
            padding: 0.5rem 0;
        }

        .navbar-modern .container-fluid {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .brand-text {
            font-size: 1rem;
        }

        .brand-logo-img {
            height: 32px;
        }

        .mobile-menu-header {
            padding: 1.2rem 1.5rem;
        }

        .mobile-menu-link {
            font-size: 1.2rem;
            padding: 0.9rem 0;
        }

        .navbar-toggler-custom,
        .mobile-menu-close {
            padding: 7px 15px;
        }
    }

    @media (max-width: 400px) {
        .navbar-modern {
            top: 8px;
            width: calc(100% - 20px);
            padding: 0.45rem 0;
        }

        .navbar-modern .container-fluid {
            padding-left: 1.2rem;
            padding-right: 1.2rem;
        }

        .brand-text {
            font-size: 0.95rem;
            letter-spacing: 0.08em;
        }

        .brand-logo-img {
            height: 30px;
        }

        .mobile-menu-header {
            padding: 1rem 1.2rem;
        }

        .mobile-menu-link {
            font-size: 1.1rem;
            padding: 0.8rem 0;
        }

        .navbar-toggler-custom .menu-text,
        .mobile-menu-close .menu-text {
            font-size: 0.75rem;
        }

        .navbar-toggler-custom .menu-icon span {
            width: 16px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Navbar scroll effect
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

        // Mobile menu functionality
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenuClose = document.getElementById('mobileMenuClose');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileMenuLinks = document.querySelectorAll('.mobile-menu-link');

        console.log('Mobile Menu Elements:', {
            btn: mobileMenuBtn,
            close: mobileMenuClose,
            menu: mobileMenu,
            links: mobileMenuLinks.length
        });

        // Open mobile menu
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                console.log('Menu button clicked!');
                if (mobileMenu) {
                    setTimeout(() => {
                        mobileMenu.classList.add('active');
                    }, 10);
                    document.body.style.overflow = 'hidden';
                }
            });
        } else {
            console.error('Mobile menu button not found!');
        }

        // Close mobile menu
        if (mobileMenuClose) {
            mobileMenuClose.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                console.log('Close button clicked!');
                if (mobileMenu) {
                    mobileMenu.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
        }

        // Close menu when clicking on a link
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (mobileMenu) {
                    mobileMenu.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
        });

        // Close menu when pressing ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mobileMenu && mobileMenu.classList.contains('active')) {
                mobileMenu.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    });
</script>
