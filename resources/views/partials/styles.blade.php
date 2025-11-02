<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;900&family=Inter:wght@300;400;500;600;700&display=swap');

    :root {
        /* Tema Marori: Merah Gelap, Hitam, Putih */
        --primary-color: #8B0000;          /* Dark Red / Maroon - Merah utama tidak menyala */
        --secondary-color: #B22222;         /* Firebrick - Merah medium untuk variation */
        --accent-color: #DC143C;            /* Crimson - Merah lebih cerah untuk accent */
        --accent-light: #FF6B6B;            /* Coral Red - Merah muda untuk highlight */
        --dark-bg: #1a0000;                 /* Hitam kemerahan - Background gelap */
        --light-bg: #FFFFFF;                /* Putih - Background terang */
        --cream: #F8F8F8;                   /* Off-white - Alternatif putih */
        --maroon-dark: #660000;             /* Maroon gelap */
        --maroon-medium: #800000;           /* Maroon medium */
        --maroon-light: #A52A2A;            /* Maroon terang */
        --text-primary: #1a1a1a;            /* Hitam untuk text utama */
        --text-secondary: #4a4a4a;          /* Abu gelap untuk text secondary */
        --border-color: rgba(139, 0, 0, 0.15);  /* Border merah transparan */
        --tokopedia-green: #42B549;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        scroll-behavior: smooth;
        color: var(--text-primary);
        line-height: 1.7;
        overflow-x: hidden;
        margin: 0;
        padding: 0;
    }

    /* Remove all gaps between sections */
    section {
        margin: 0 !important;
        display: block;
    }

    section + section {
        margin-top: 0 !important;
    }

    /* Navbar Modern Elegant */
    .navbar {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(20px);
        padding: 1.2rem 0;
        border-bottom: 1px solid var(--border-color);
        box-shadow: 0 2px 20px rgba(0,0,0,0.03);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 1000;
    }

    .navbar.scrolled {
        padding: 0.8rem 0;
        box-shadow: 0 4px 30px rgba(0,0,0,0.08);
    }

    .navbar-brand {
        font-family: 'Playfair Display', serif;
        font-weight: 600;
        font-size: 1.5rem;
        color: var(--primary-color) !important;
        letter-spacing: 0.5px;
        transition: all 0.3s;
    }

    .navbar-brand:hover {
        color: var(--secondary-color) !important;
    }

    .navbar-nav .nav-link {
        color: var(--text-primary) !important;
        margin: 0 1.2rem;
        font-weight: 500;
        font-size: 0.95rem;
        position: relative;
        transition: color 0.3s;
    }

    .navbar-nav .nav-link::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 0;
        height: 2px;
        background: var(--secondary-color);
        transition: width 0.3s ease;
    }

    .navbar-nav .nav-link:hover::after {
        width: 100%;
    }

    .navbar-nav .nav-link:hover {
        color: var(--secondary-color) !important;
    }

    /* Hero Section Modern Elegant */
    .hero-section {
        position: relative;
        min-height: 90vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: linear-gradient(135deg, #FFFFFF 0%, #F8F8F8 50%, #F0F0F0 100%);
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 20% 50%, rgba(139, 0, 0, 0.05) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(220, 20, 60, 0.04) 0%, transparent 50%);
        pointer-events: none;
    }

    .hero-content {
        text-align: center;
        max-width: 900px;
        padding: 0 30px;
        position: relative;
        z-index: 2;
        animation: fadeInUp 1s ease-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .hero-badge {
        display: inline-block;
        background: rgba(139, 0, 0, 0.1);
        color: var(--primary-color);
        padding: 8px 24px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 2rem;
        border: 1px solid rgba(139, 0, 0, 0.3);
    }

    .hero-section h1 {
        font-family: 'Playfair Display', serif;
        font-size: 4.5rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        color: var(--primary-color);
        letter-spacing: -1.5px;
        line-height: 1.1;
    }

    .hero-section .hero-subtitle {
        font-size: 1.4rem;
        margin-bottom: 1rem;
        color: var(--text-secondary);
        font-weight: 400;
    }

    .hero-section .hero-description {
        font-size: 1.1rem;
        margin-bottom: 3rem;
        color: var(--text-secondary);
        font-weight: 300;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .hero-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn-hero {
        padding: 16px 48px;
        font-size: 1rem;
        border-radius: 50px;
        font-weight: 500;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
        text-decoration: none;
        display: inline-block;
        position: relative;
        overflow: hidden;
    }

    .btn-hero-primary {
        background: var(--primary-color);
        color: white;
        box-shadow: 0 4px 15px rgba(139, 0, 0, 0.3);
    }

    .btn-hero-primary:hover {
        background: var(--maroon-dark);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(139, 0, 0, 0.5);
    }

    .btn-hero-secondary {
        background: transparent;
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
    }

    .btn-hero-secondary:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(139, 0, 0, 0.35);
    }

    .scroll-indicator {
        position: absolute;
        bottom: 40px;
        left: 50%;
        transform: translateX(-50%);
        animation: bounce 2s infinite;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateX(-50%) translateY(0);
        }
        40% {
            transform: translateX(-50%) translateY(-10px);
        }
        60% {
            transform: translateX(-50%) translateY(-5px);
        }
    }

    /* Section Styling Modern - Removed to prevent conflicts */

    .section-header {
        text-align: center;
        max-width: 700px;
        margin: 0 auto 70px;
    }

    .section-badge {
        display: inline-block;
        background: rgba(139, 0, 0, 0.08);
        color: var(--primary-color);
        padding: 6px 20px;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 1rem;
        border: 1px solid rgba(139, 0, 0, 0.25);
    }

    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        color: var(--primary-color);
        margin-bottom: 1rem;
        font-weight: 600;
        letter-spacing: -1px;
        line-height: 1.2;
    }

    .section-subtitle {
        color: var(--text-secondary);
        font-size: 1.15rem;
        margin-bottom: 0;
        font-weight: 400;
        line-height: 1.7;
    }

    /* About Section Enhanced */
    .about-section {
        background: white;
        padding: 100px 0;
        margin: 0;
    }

    .about-content h3 {
        font-family: 'Playfair Display', serif;
        color: var(--primary-color);
        font-weight: 600;
        font-size: 2rem;
        margin-bottom: 1.5rem;
    }

    .about-content h4 {
        font-family: 'Playfair Display', serif;
        color: var(--accent-color);
        font-weight: 600;
        font-size: 1.5rem;
        margin-bottom: 1rem;
        margin-top: 2rem;
    }

    .about-content p {
        color: var(--text-secondary);
        line-height: 1.9;
        font-size: 1.05rem;
        margin-bottom: 1.5rem;
    }

    .about-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }

    .stat-item {
        text-align: center;
        padding: 1.5rem;
        background: #FAFAFA;
        border-radius: 12px;
        transition: transform 0.3s;
        border: 1px solid rgba(139, 0, 0, 0.1);
    }

    .stat-item:hover {
        transform: translateY(-5px);
        border-color: var(--primary-color);
        background: rgba(139, 0, 0, 0.02);
    }

    .stat-number {
        font-family: 'Playfair Display', serif;
        font-size: 2.5rem;
        color: var(--primary-color);
        font-weight: 600;
        display: block;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        color: var(--text-secondary);
        font-size: 0.9rem;
        font-weight: 500;
    }

    .about-image-placeholder {
        background: linear-gradient(135deg, #FAFAFA 0%, #F0F0F0 100%);
        border-radius: 20px;
        height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid var(--border-color);
        box-shadow: 0 10px 40px rgba(139, 0, 0, 0.08);
        position: relative;
        overflow: hidden;
    }

    .about-image-placeholder::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(139, 0, 0, 0.08) 0%, transparent 70%);
    }

    /* Culture Section Modern Grid */
    .culture-section {
        background: #FAFAFA;
        padding: 100px 0;
        margin: 0;
    }

    .culture-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 2rem;
    }

    .culture-item {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid rgba(139, 0, 0, 0.12);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 20px rgba(0,0,0,0.04);
    }

    .culture-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(139, 0, 0, 0.15);
        border-color: var(--primary-color);
    }

    .culture-image {
        width: 100%;
        height: 240px;
        background: linear-gradient(135deg, #F8F8F8 0%, #EFEFEF 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .culture-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at center, rgba(139, 0, 0, 0.08) 0%, transparent 70%);
    }

    .culture-image i {
        font-size: 4rem;
        color: var(--primary-color);
        position: relative;
        z-index: 1;
        transition: transform 0.4s;
    }

    .culture-item:hover .culture-image i {
        transform: scale(1.1);
        color: var(--accent-color);
    }

    .culture-content {
        padding: 2rem;
    }

    .culture-content h3 {
        font-family: 'Playfair Display', serif;
        color: var(--primary-color);
        font-size: 1.5rem;
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .culture-content p {
        color: var(--text-secondary);
        font-size: 1rem;
        line-height: 1.7;
        margin: 0;
    }

    /* Product Cards Premium - Moved to products.blade.php */

    /* Contact Section Premium */
    .contact-section {
        background: linear-gradient(135deg, var(--dark-bg) 0%, var(--maroon-dark) 50%, var(--primary-color) 100%);
        color: white;
        position: relative;
        overflow: hidden;
        padding: 100px 0;
        margin: 0;
    }

    .contact-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.05) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(220, 20, 60, 0.08) 0%, transparent 50%);
        pointer-events: none;
    }

    .contact-card {
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        padding: 2.5rem 2rem;
        text-align: center;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        height: 100%;
        border: 1px solid rgba(255,255,255,0.15);
        position: relative;
        overflow: hidden;
    }

    .contact-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, transparent 100%);
        opacity: 0;
        transition: opacity 0.4s;
    }

    .contact-card:hover::before {
        opacity: 1;
    }

    .contact-card:hover {
        background: rgba(255,255,255,0.15);
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.2);
    }

    .contact-icon {
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
        filter: drop-shadow(0 4px 8px rgba(0,0,0,0.1));
    }

    .contact-card h4 {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .contact-card a {
        color: white;
        text-decoration: none;
        opacity: 0.95;
        font-size: 1rem;
        transition: opacity 0.3s;
    }

    .contact-card a:hover {
        opacity: 1;
    }

    .social-btn {
        background: white;
        color: var(--primary-color);
        padding: 10px 24px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 500;
        display: inline-block;
        margin: 6px 4px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        font-size: 0.9rem;
    }

    .social-btn:hover {
        transform: translateY(-3px);
        background: var(--accent-light);
        color: white;
        box-shadow: 0 6px 20px rgba(255,255,255,0.3);
    }

    /* Footer Premium */
    footer {
        background: var(--dark-bg);
        color: rgba(255,255,255,0.75);
        padding: 80px 0 40px;
        position: relative;
    }

    .footer-main {
        border-bottom: 1px solid rgba(255,255,255,0.1);
        padding-bottom: 50px;
        margin-bottom: 40px;
    }

    .footer-brand {
        margin-bottom: 40px;
    }

    .footer-logo {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        font-weight: 600;
        color: white;
        margin-bottom: 1rem;
    }

    .footer-tagline {
        font-size: 1rem;
        color: rgba(255,255,255,0.65);
        margin-bottom: 24px;
        line-height: 1.7;
    }

    .footer-social {
        display: flex;
        gap: 16px;
        margin-top: 24px;
    }

    .footer-social-link {
        width: 48px;
        height: 48px;
        background: rgba(255,255,255,0.08);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        font-size: 1.2rem;
        border: 1px solid rgba(255,255,255,0.1);
    }

    .footer-social-link:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-4px);
        box-shadow: 0 6px 20px rgba(139, 0, 0, 0.4);
    }

    .footer-section-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.15rem;
        font-weight: 600;
        color: white;
        margin-bottom: 20px;
    }

    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 14px;
    }

    .footer-links a {
        color: rgba(255,255,255,0.7);
        text-decoration: none;
        font-size: 0.95rem;
        transition: all 0.3s;
        display: inline-block;
    }

    .footer-links a:hover {
        color: var(--accent-light);
        transform: translateX(5px);
    }

    .footer-contact-item {
        display: flex;
        align-items: start;
        margin-bottom: 16px;
        font-size: 0.95rem;
    }

    .footer-contact-item i {
        margin-right: 12px;
        margin-top: 2px;
        color: var(--accent-color);
    }

    .footer-bottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .footer-copyright {
        font-size: 0.9rem;
        color: rgba(255,255,255,0.6);
        margin: 0;
    }

    .footer-bottom-links {
        display: flex;
        gap: 24px;
        flex-wrap: wrap;
    }

    .footer-bottom-links a {
        font-size: 0.9rem;
        color: rgba(255,255,255,0.6);
        text-decoration: none;
        transition: color 0.3s;
    }

    .footer-bottom-links a:hover {
        color: var(--accent-light);
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .hero-section h1 {
            font-size: 3.5rem;
        }

        .section-title {
            font-size: 2.5rem;
        }

        .culture-grid {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }
    }

    @media (max-width: 768px) {
        footer {
            padding: 60px 0 30px;
        }

        .footer-main {
            padding-bottom: 40px;
            margin-bottom: 30px;
        }

        .footer-brand {
            text-align: center;
        }

        .footer-social {
            justify-content: center;
        }

        .footer-bottom {
            flex-direction: column;
            text-align: center;
        }

        .footer-bottom-links {
            justify-content: center;
        }

        .hero-section {
            min-height: 80vh;
            padding: 80px 0 60px;
        }

        .hero-section h1 {
            font-size: 2.8rem;
        }

        .hero-section .hero-subtitle {
            font-size: 1.2rem;
        }

        .hero-section .hero-description {
            font-size: 1rem;
        }

        .section-title {
            font-size: 2rem;
        }

        .section-subtitle {
            font-size: 1rem;
        }

        .culture-item {
            margin-bottom: 1.5rem;
        }

        section {
            padding: 70px 0;
        }

        .about-stats {
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .btn-hero {
            padding: 14px 36px;
            font-size: 0.95rem;
        }
    }

    /* Loading Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.8s ease-out;
    }

    /* ============================================ */
    /* SPECTRAL TEMPLATE STYLES - BROWN THEME     */
    /* ============================================ */

    /* Wrapper Styles */
    .wrapper {
        padding: 6em 0 4em 0;
    }

    .wrapper.alt {
        background-color: #FAFAFA;
    }

    .wrapper.style1 {
        background-color: var(--primary-color);
        color: #ffffff;
    }

    .wrapper.style2 {
        background-color: var(--light-bg);
    }

    .wrapper.style3 {
        background-color: var(--maroon-dark);
        color: #ffffff;
    }

    .wrapper.special {
        text-align: center;
    }

    .wrapper .inner {
        margin: 0 auto;
        width: 55em;
        max-width: calc(100% - 4em);
    }

    /* Major Headers */
    header.major {
        margin-bottom: 3em;
        text-align: center;
    }

    header.major h2 {
        border-bottom: solid 2px var(--primary-color);
        display: inline-block;
        font-size: 2em;
        font-weight: 900;
        letter-spacing: 0.225em;
        margin: 0 0 1em 0;
        padding: 0 0 0.5em 0;
        text-transform: uppercase;
        color: inherit;
    }

    header.major p {
        font-size: 1em;
        letter-spacing: 0.025em;
        margin: 0;
        text-transform: none;
        color: inherit;
        opacity: 0.75;
        line-height: 1.75;
    }

    /* Icons Major */
    ul.icons.major {
        list-style: none;
        padding-left: 0;
        display: flex;
        justify-content: center;
        gap: 3em;
        margin: 3em 0;
    }

    ul.icons.major li {
        display: inline-block;
        padding-left: 0;
    }

    .icon.major {
        border-radius: 100%;
        border: solid 2px rgba(255, 255, 255, 0.125);
        display: inline-block;
        font-size: 2em;
        height: 3.25em;
        line-height: 3.25em;
        text-align: center;
        width: 3.25em;
    }

    .icon.major.style1 {
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    .icon.major.style2 {
        border-color: var(--accent-color);
        color: var(--accent-color);
    }

    .icon.major.style3 {
        border-color: var(--accent-light);
        color: var(--accent-light);
    }

    /* Spotlight Sections */
    .spotlight {
        display: flex;
        align-items: center;
        margin: 0 0 2em 0;
    }

    .spotlight .image {
        border-radius: 100%;
        margin: 0 3em 2em 0;
        width: 22em;
        overflow: hidden;
        box-shadow: 0 0 0 0.5em rgba(139, 0, 0, 0.08);
    }

    .spotlight .image img {
        border-radius: 100%;
        display: block;
        width: 100%;
        height: auto;
    }

    .spotlight .content {
        flex: 1;
    }

    .spotlight .content h2 {
        color: var(--primary-color);
        font-family: 'Playfair Display', serif;
        font-size: 1.75em;
        font-weight: 700;
        margin: 0 0 1em 0;
    }

    .spotlight .content p {
        color: var(--text-secondary);
        line-height: 1.75;
        margin: 0;
    }

    .spotlight:nth-child(2n) {
        flex-direction: row-reverse;
    }

    .spotlight:nth-child(2n) .image {
        margin: 0 0 2em 3em;
    }

    /* Responsive */
    @media (max-width: 980px) {
        .wrapper {
            padding: 4em 0 2em 0;
        }

        header.major h2 {
            font-size: 1.5em;
        }

        .spotlight {
            display: block;
            text-align: center;
        }

        .spotlight .image {
            margin: 0 auto 2em auto !important;
            width: 18em;
        }

        ul.icons.major {
            gap: 2em;
        }

        .icon.major {
            font-size: 1.5em;
        }
    }

    @media (max-width: 736px) {
        .wrapper {
            padding: 3em 0 1em 0;
        }

        .wrapper .inner {
            max-width: calc(100% - 2em);
        }

        header.major h2 {
            font-size: 1.25em;
            letter-spacing: 0.175em;
        }

        .spotlight .image {
            width: 15em;
        }

        ul.icons.major {
            gap: 1.5em;
            flex-wrap: wrap;
        }
    }

    /* Footer Spectral Style */
    #footer {
        background-color: var(--primary-color);
        color: rgba(255, 255, 255, 0.75);
        padding: 6em 0 4em 0;
    }

    #footer .section-header {
        text-align: center;
        margin-bottom: 3em;
    }

    #footer .copyright {
        border-top: solid 1px rgba(255, 255, 255, 0.125);
        font-size: 0.8em;
        list-style: none;
        margin-top: 3em;
        padding: 3em 0 0 0;
        text-align: center;
        color: rgba(255, 255, 255, 0.5);
    }

    #footer .copyright li {
        border-left: solid 1px rgba(255, 255, 255, 0.125);
        display: inline-block;
        line-height: 1;
        margin-left: 1em;
        padding-left: 1em;
    }

    #footer .copyright li:first-child {
        border-left: 0;
        margin-left: 0;
        padding-left: 0;
    }

    @media (max-width: 736px) {
        #footer {
            padding: 4em 0 2em 0;
        }

        #footer .copyright li {
            border: 0;
            display: block;
            margin: 1em 0 0 0;
            padding: 0;
        }
    }
</style>
