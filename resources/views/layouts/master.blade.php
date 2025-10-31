<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta name="description" content="Suku Marori Wasur - Melestarikan Budaya Papua melalui kerajinan tangan berkualitas tinggi dan pemberdayaan masyarakat adat">
    <meta name="theme-color" content="#2C4A3E">
    <title>@yield('title', 'Suku Marori Wasur - Melestarikan Budaya Papua')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/marori.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/marori.ico') }}">

    <!-- Preconnect untuk CDN -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>

    <!-- Preload Critical CSS -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" as="style">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    @include('partials.styles')

    @stack('styles')

    <!-- Performance optimization -->
    <style>
        /* Prevent layout shift */
        img, iframe {
            max-width: 100%;
            height: auto;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Loading state */
        .lazy-loading {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
    </style>
</head>
<body>

    @include('partials.navbar')

    @yield('content')

    <!-- Bootstrap JS Bundle - Deferred -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>

    @include('partials.scripts')

    @stack('scripts')

    <!-- Lazy Loading Script -->
    <script>
        // Intersection Observer for Lazy Loading
        document.addEventListener('DOMContentLoaded', function() {
            // Lazy load images
            const lazyImages = document.querySelectorAll('img[loading="lazy"]');

            if ('loading' in HTMLImageElement.prototype) {
                // Browser supports native lazy loading
                lazyImages.forEach(img => {
                    img.src = img.dataset.src || img.src;
                });
            } else {
                // Fallback for browsers that don't support lazy loading
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.src = img.dataset.src || img.src;
                            img.classList.remove('lazy-loading');
                            observer.unobserve(img);
                        }
                    });
                });

                lazyImages.forEach(img => {
                    img.classList.add('lazy-loading');
                    imageObserver.observe(img);
                });
            }

            // Lazy load YouTube iframes with better detection
            const lazyIframes = document.querySelectorAll('iframe[data-src]');
            const iframeObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const iframe = entry.target;
                        if (iframe.dataset.src) {
                            iframe.src = iframe.dataset.src;
                            console.log('Iframe loaded:', iframe.dataset.src);
                        }
                        observer.unobserve(iframe);
                    }
                });
            }, {
                rootMargin: '50px', // Load when within 50px of viewport
                threshold: 0.1
            });

            lazyIframes.forEach(iframe => {
                iframeObserver.observe(iframe);
            });

            // Force load visible iframes immediately (for sliders)
            setTimeout(() => {
                lazyIframes.forEach(iframe => {
                    const rect = iframe.getBoundingClientRect();
                    if (rect.top < window.innerHeight && rect.bottom > 0) {
                        if (iframe.dataset.src && !iframe.src) {
                            iframe.src = iframe.dataset.src;
                            console.log('Force loaded visible iframe:', iframe.dataset.src);
                        }
                    }
                });
            }, 500);
        });
    </script>
</body>
</html>
