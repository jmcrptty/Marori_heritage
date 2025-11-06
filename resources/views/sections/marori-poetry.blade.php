<!-- Marori Poetry Section -->
<section id="puisi-marori" class="marori-poetry-section">
    <div class="container">
        <!-- Header -->
        <div class="poetry-header">
            <span class="poetry-label">BAHASA MARORI</span>
            <h2 class="poetry-title">Puisi Tradisional Marori</h2>
            <p class="poetry-subtitle">
                Dengarkan keindahan bahasa dan sastra tradisional Suku Marori yang diwariskan turun-temurun
            </p>
        </div>

        <!-- Poetry Slider Wrapper -->
        <div class="poetry-slider-wrapper">
            @if(isset($poetries) && $poetries->count() > 0)
            <div class="poetry-slider-container" id="poetrySlider">
                @foreach($poetries as $index => $poetry)
                <div class="poetry-slide" data-index="{{ $index }}">
                    <!-- Poetry Title -->
                    @if($poetry->title)
                    <div class="poetry-title-display">
                        <h3 class="poetry-slide-title">{{ $poetry->title }}</h3>
                    </div>
                    @endif

                    <!-- Poetry Content - 2 Columns -->
                    <div class="poetry-columns">
                        <!-- Left: Original Marori -->
                        <div class="poetry-column poetry-original">
                            <div class="column-label">
                                <i class="bi bi-book"></i>
                                <span>Bahasa Marori</span>
                            </div>
                            <div class="poetry-text">
                                <div class="poetry-lines">
                                    @php
                                    $content = $poetry->content ?? 'Konten puisi akan ditampilkan di sini...';
                                    $stanzas = preg_split('/\n\s*\n/', $content);
                                    @endphp
                                    @foreach($stanzas as $stanzaIndex => $stanza)
                                        @if($stanzaIndex > 0)<span class="stanza-break"></span>@endif
                                        {!! nl2br(e(trim($stanza))) !!}
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Right: Translation -->
                        <div class="poetry-column poetry-translation">
                            <div class="column-label">
                                <i class="bi bi-translate"></i>
                                <span>Terjemahan</span>
                            </div>
                            <div class="poetry-text">
                                <div class="poetry-lines">
                                    @php
                                    $translation = $poetry->translation ?? 'Terjemahan akan ditampilkan di sini...';
                                    $stanzas = preg_split('/\n\s*\n/', $translation);
                                    @endphp
                                    @foreach($stanzas as $stanzaIndex => $stanza)
                                        @if($stanzaIndex > 0)<span class="stanza-break"></span>@endif
                                        {!! nl2br(e(trim($stanza))) !!}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Audio Player -->
                    <div class="poetry-audio-container">
                        @if($poetry->audio_file)
                        @php
                            $audioPath = asset('storage/' . $poetry->audio_file);
                            $extension = strtolower(pathinfo($poetry->audio_file, PATHINFO_EXTENSION));
                            $mimeType = match($extension) {
                                'mp3' => 'audio/mpeg',
                                'wav' => 'audio/wav',
                                'ogg' => 'audio/ogg',
                                default => 'audio/mpeg'
                            };
                        @endphp
                        <audio class="poetry-audio-element" data-audio-index="{{ $index }}" preload="metadata" src="{{ $audioPath }}" type="{{ $mimeType }}">
                            Browser Anda tidak mendukung audio player.
                        </audio>
                        @endif

                        <div class="audio-controls">
                            <button class="play-pause-btn" data-btn-index="{{ $index }}" data-has-audio="{{ $poetry->audio_file ? 'yes' : 'no' }}">
                                <i class="bi bi-play-fill play-icon"></i>
                                <i class="bi bi-pause-fill pause-icon" style="display: none;"></i>
                                <span class="btn-text">{{ $poetry->audio_file ? 'Putar Puisi' : 'Belum Ada' }}</span>
                            </button>

                            <div class="audio-progress">
                                <div class="progress-bar" data-bar-index="{{ $index }}">
                                    <div class="progress-fill"></div>
                                </div>
                                <div class="time-display">
                                    <span class="current-time">0:00</span>
                                    <span class="duration">0:00</span>
                                </div>
                            </div>

                            <div class="volume-control">
                                <i class="bi bi-volume-up-fill"></i>
                                <input type="range" class="volume-slider" min="0" max="100" value="100" data-volume-index="{{ $index }}">
                            </div>
                        </div>
                    </div>

                    <!-- Poetry Info -->
                    <div class="poetry-info">
                        <div class="info-item">
                            <i class="bi bi-person-fill"></i>
                            <span>{{ $poetry->author ?? 'Anonim' }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="poetry-empty">
                <i class="bi bi-book"></i>
                <p>Belum ada puisi untuk ditampilkan.</p>
            </div>
            @endif

            <!-- Navigation Buttons -->
            @if(isset($poetries) && $poetries->count() > 1)
            <div class="poetry-navigation">
                <button class="poetry-nav-btn" id="poetryPrevBtn">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <div class="poetry-counter">
                    <span id="currentPoetry">1</span> / <span id="totalPoetries">{{ $poetries->count() }}</span>
                </div>
                <button class="poetry-nav-btn" id="poetryNextBtn">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
            @endif
        </div>
    </div>
</section>

<style>
    /* Marori Poetry Section */
    .marori-poetry-section {
        background: #FFFFFF;
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }

    .marori-poetry-section .container {
        max-width: 100%;
        margin: 0 auto;
        padding: 0 50px;
    }

    /* Header */
    .poetry-header {
        text-align: center;
        margin-bottom: 35px;
    }

    .poetry-label {
        display: inline-block;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 2px;
        color: #8B0000;
        text-transform: uppercase;
        margin-bottom: 10px;
        background: rgba(139, 0, 0, 0.1);
        padding: 6px 18px;
        border-radius: 25px;
    }

    .poetry-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        color: #1a1a1a;
        margin-bottom: 10px;
        font-weight: 700;
        line-height: 1.2;
    }

    .poetry-subtitle {
        color: #4a4a4a;
        font-size: 0.95rem;
        line-height: 1.5;
        max-width: 700px;
        margin: 0 auto;
    }

    /* Poetry Slider Wrapper */
    .poetry-slider-wrapper {
        position: relative;
        overflow: hidden;
    }

    .poetry-slider-container {
        display: flex;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .poetry-slide {
        min-width: 100%;
        flex-shrink: 0;
    }

    /* Poetry Title Display */
    .poetry-title-display {
        text-align: center;
        margin-bottom: 20px;
    }

    .poetry-slide-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.6rem;
        color: #8B0000;
        font-weight: 700;
        margin: 0;
        line-height: 1.3;
    }

    /* Poetry Columns - 2 Column Layout */
    .poetry-columns {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
        margin-bottom: 25px;
    }

    .poetry-column {
        background: #F8F8F8;
        border-radius: 15px;
        padding: 20px 18px;
        min-height: 420px;
        display: flex;
        flex-direction: column;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .column-label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.85rem;
        font-weight: 700;
        color: #8B0000;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 12px;
        padding-bottom: 10px;
        border-bottom: 2px solid rgba(139, 0, 0, 0.2);
    }

    .column-label i {
        font-size: 1.1rem;
    }

    .poetry-text {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .poetry-lines {
        font-family: 'Playfair Display', serif;
        font-size: 1.1rem;
        line-height: 1.3;
        color: #2a2a2a;
        white-space: pre-line;
        word-wrap: break-word;
        text-align: center;
        width: 100%;
        overflow-wrap: break-word;
        max-width: 100%;
    }

    .poetry-lines .stanza-break {
        display: block;
        height: 0.7rem;
    }

    /* Audio Player */
    .poetry-audio-container {
        margin-top: 30px;
        margin-bottom: 20px;
    }

    .audio-controls {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    /* Play/Pause Button */
    .play-pause-btn {
        background: linear-gradient(135deg, #8B0000 0%, #A52A2A 100%) !important;
        color: white !important;
        border: none !important;
        border-radius: 60px;
        padding: 22px 50px;
        font-size: 1.2rem;
        font-weight: 700;
        cursor: pointer !important;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        box-shadow: 0 8px 25px rgba(139, 0, 0, 0.4) !important;
        align-self: center;
        min-width: 250px;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        overflow: hidden;
        opacity: 1 !important;
    }

    .play-pause-btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .play-pause-btn:hover::before {
        width: 300px;
        height: 300px;
    }

    .play-pause-btn:hover {
        background: linear-gradient(135deg, #A52A2A 0%, #B22222 100%) !important;
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 12px 35px rgba(139, 0, 0, 0.6) !important;
    }

    .play-pause-btn:active {
        transform: translateY(-1px) scale(1.02);
        box-shadow: 0 6px 20px rgba(139, 0, 0, 0.5) !important;
    }

    .play-pause-btn i {
        font-size: 1.5rem;
        position: relative;
        z-index: 1;
    }

    .play-pause-btn .btn-text {
        position: relative;
        z-index: 1;
    }

    /* Audio Progress */
    .audio-progress {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .progress-bar {
        width: 100%;
        height: 8px;
        background: #E0E0E0;
        border-radius: 10px;
        cursor: pointer;
        overflow: hidden;
        position: relative;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #8B0000, #A52A2A);
        width: 0%;
        transition: width 0.1s linear;
        border-radius: 10px;
    }

    .time-display {
        display: flex;
        justify-content: space-between;
        font-size: 0.9rem;
        color: #666;
        font-weight: 500;
    }

    /* Volume Control */
    .volume-control {
        display: flex;
        align-items: center;
        gap: 15px;
        justify-content: center;
    }

    .volume-control i {
        color: #DC143C;
        font-size: 1.2rem;
    }

    .volume-slider {
        width: 150px;
        height: 6px;
        border-radius: 10px;
        outline: none;
        -webkit-appearance: none;
        background: #E0E0E0;
    }

    .volume-slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: #DC143C;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .volume-slider::-webkit-slider-thumb:hover {
        transform: scale(1.2);
    }

    .volume-slider::-moz-range-thumb {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: #DC143C;
        cursor: pointer;
        border: none;
        transition: all 0.3s ease;
    }

    .volume-slider::-moz-range-thumb:hover {
        transform: scale(1.2);
    }

    /* Poetry Info */
    .poetry-info {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
        margin-top: 25px;
    }

    .info-item {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #4a4a4a;
        font-size: 0.95rem;
    }

    .info-item i {
        color: #DC143C;
        font-size: 1rem;
    }

    /* Poetry Navigation */
    .poetry-navigation {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 15px;
        margin-top: 30px;
    }

    .poetry-nav-btn {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #DC143C;
        border: none;
        color: white;
        font-size: 1.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(220, 20, 60, 0.3);
    }

    .poetry-nav-btn:hover {
        background: #C41E3A;
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(220, 20, 60, 0.5);
    }

    .poetry-nav-btn:active {
        transform: scale(0.95);
    }

    .poetry-counter {
        font-size: 1.1rem;
        color: #1a1a1a;
        font-weight: 600;
        min-width: 80px;
        text-align: center;
    }

    #currentPoetry {
        color: #DC143C;
        font-size: 1.3rem;
        font-weight: 700;
    }

    /* Empty State */
    .poetry-empty {
        text-align: center;
        padding: 80px 20px;
        color: #999;
    }

    .poetry-empty i {
        font-size: 4rem;
        margin-bottom: 20px;
        display: block;
        color: #DDD;
    }

    .poetry-empty p {
        font-size: 1.1rem;
        margin: 0;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .marori-poetry-section .container {
            padding: 0 40px;
        }

        .poetry-columns {
            grid-template-columns: 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .poetry-column {
            min-height: 380px;
            padding: 20px 18px;
        }

        .poetry-lines {
            font-size: 1.05rem;
            line-height: 1.3;
        }

        .column-label {
            font-size: 0.8rem;
            margin-bottom: 10px;
            padding-bottom: 8px;
        }
    }

    @media (max-width: 768px) {
        .marori-poetry-section {
            padding: 70px 0;
        }

        .marori-poetry-section .container {
            padding: 0 30px;
        }

        .poetry-header {
            margin-bottom: 35px;
        }

        .poetry-title {
            font-size: 2rem;
        }

        .poetry-slide-title {
            font-size: 1.4rem;
        }

        .poetry-title-display {
            margin-bottom: 20px;
        }

        .poetry-subtitle {
            font-size: 0.95rem;
        }

        .poetry-columns {
            gap: 15px;
            margin-bottom: 25px;
        }

        .poetry-column {
            padding: 18px 15px;
            min-height: 350px;
        }

        .column-label {
            font-size: 0.75rem;
            margin-bottom: 8px;
            padding-bottom: 8px;
            gap: 6px;
        }

        .column-label i {
            font-size: 1rem;
        }

        .poetry-lines {
            font-size: 1rem;
            line-height: 1.3;
        }

        .poetry-audio-container {
            margin-bottom: 20px;
        }

        .play-pause-btn {
            padding: 16px 35px;
            font-size: 1rem;
            min-width: 200px;
        }

        .play-pause-btn i {
            font-size: 1.2rem;
        }

        .volume-slider {
            width: 120px;
        }

        .poetry-nav-btn {
            width: 45px;
            height: 45px;
            font-size: 1.3rem;
        }

        .poetry-counter {
            font-size: 0.95rem;
        }

        #currentPoetry {
            font-size: 1.15rem;
        }
    }

    @media (max-width: 576px) {
        .marori-poetry-section {
            padding: 50px 0;
        }

        .marori-poetry-section .container {
            padding: 0 20px;
        }

        .poetry-header {
            margin-bottom: 25px;
        }

        .poetry-title {
            font-size: 1.5rem;
        }

        .poetry-slide-title {
            font-size: 1.2rem;
        }

        .poetry-title-display {
            margin-bottom: 15px;
        }

        .poetry-subtitle {
            font-size: 0.85rem;
        }

        .poetry-columns {
            gap: 12px;
            margin-bottom: 20px;
        }

        .poetry-column {
            padding: 15px 12px;
            min-height: 320px;
            border-radius: 12px;
        }

        .column-label {
            font-size: 0.7rem;
            margin-bottom: 8px;
            padding-bottom: 6px;
            gap: 5px;
            letter-spacing: 0.5px;
        }

        .column-label i {
            font-size: 0.9rem;
        }

        .poetry-lines {
            font-size: 0.85rem;
            line-height: 1.25;
        }

        .poetry-audio-container {
            margin-bottom: 15px;
        }

        .play-pause-btn {
            padding: 14px 30px;
            font-size: 0.9rem;
            min-width: 180px;
        }

        .play-pause-btn i {
            font-size: 1.1rem;
        }

        .volume-control {
            gap: 8px;
        }

        .volume-control i {
            font-size: 1rem;
        }

        .volume-slider {
            width: 140px;
        }

        .poetry-info {
            gap: 12px;
        }

        .info-item {
            font-size: 0.8rem;
        }

        .poetry-nav-btn {
            width: 38px;
            height: 38px;
            font-size: 1.1rem;
        }

        .poetry-counter {
            font-size: 0.85rem;
            min-width: 60px;
        }

        #currentPoetry {
            font-size: 1rem;
        }

        .poetry-navigation {
            margin-top: 25px;
            gap: 12px;
        }

        .audio-controls {
            gap: 15px;
        }

        .audio-progress {
            gap: 8px;
        }

        .time-display {
            font-size: 0.8rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Poetry Slider Navigation
        const slider = document.getElementById('poetrySlider');
        const prevBtn = document.getElementById('poetryPrevBtn');
        const nextBtn = document.getElementById('poetryNextBtn');
        const slides = document.querySelectorAll('.poetry-slide');
        const currentPoetryDisplay = document.getElementById('currentPoetry');

        let currentIndex = 0;
        let currentPlayingAudio = null;
        let currentPlayingBtn = null;

        // Pause all audio players and reset buttons
        function pauseAllAudio() {
            const allAudios = document.querySelectorAll('.poetry-audio-element');
            allAudios.forEach(audio => {
                if (!audio.paused) {
                    audio.pause();
                    audio.currentTime = 0;
                }
            });

            // Reset all buttons to play state
            const allBtns = document.querySelectorAll('.play-pause-btn');
            allBtns.forEach(btn => {
                const playIcon = btn.querySelector('.play-icon');
                const pauseIcon = btn.querySelector('.pause-icon');
                const btnText = btn.querySelector('.btn-text');
                const hasAudio = btn.dataset.hasAudio === 'yes';

                if (playIcon) playIcon.style.display = 'inline';
                if (pauseIcon) pauseIcon.style.display = 'none';
                if (btnText && hasAudio) btnText.textContent = 'Putar Puisi';
            });

            currentPlayingAudio = null;
            currentPlayingBtn = null;
        }

        // Slider functions
        function updateSlider() {
            if (!slider) return;

            // Pause all audio when changing slides
            pauseAllAudio();

            const offset = -(currentIndex * 100);
            slider.style.transform = `translateX(${offset}%)`;

            if (currentPoetryDisplay) {
                currentPoetryDisplay.textContent = currentIndex + 1;
            }
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            updateSlider();
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            updateSlider();
        }

        if (nextBtn) nextBtn.addEventListener('click', nextSlide);
        if (prevBtn) prevBtn.addEventListener('click', prevSlide);

        // Format time helper
        function formatTime(seconds) {
            if (isNaN(seconds)) return '0:00';
            const mins = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60);
            return `${mins}:${secs.toString().padStart(2, '0')}`;
        }

        // Setup audio players for each slide
        slides.forEach((slide, index) => {
            const audio = slide.querySelector(`.poetry-audio-element[data-audio-index="${index}"]`);
            const playPauseBtn = slide.querySelector(`.play-pause-btn[data-btn-index="${index}"]`);
            const playIcon = playPauseBtn?.querySelector('.play-icon');
            const pauseIcon = playPauseBtn?.querySelector('.pause-icon');
            const btnText = playPauseBtn?.querySelector('.btn-text');
            const progressBar = slide.querySelector(`.progress-bar[data-bar-index="${index}"]`);
            const progressFill = progressBar?.querySelector('.progress-fill');
            const currentTimeDisplay = slide.querySelector('.current-time');
            const durationDisplay = slide.querySelector('.duration');
            const volumeSlider = slide.querySelector(`.volume-slider[data-volume-index="${index}"]`);

            const hasAudio = playPauseBtn?.dataset?.hasAudio === 'yes';

            // Check if audio exists
            if (!audio || !hasAudio) {
                if (playPauseBtn) {
                    playPauseBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                    });
                }
                return;
            }

            // Audio error handling
            audio.addEventListener('error', function(e) {
                if (btnText) {
                    btnText.textContent = 'Belum Ada';
                }
            });

            // Play/Pause toggle
            if (playPauseBtn) {
                playPauseBtn.addEventListener('click', function() {
                    // If clicking the same button while playing, pause it
                    if (currentPlayingAudio === audio && !audio.paused) {
                        audio.pause();
                        if (playIcon) playIcon.style.display = 'inline';
                        if (pauseIcon) pauseIcon.style.display = 'none';
                        if (btnText) btnText.textContent = 'Putar Puisi';
                        currentPlayingAudio = null;
                        currentPlayingBtn = null;
                        return;
                    }

                    // Pause all other audio
                    pauseAllAudio();

                    // Play this audio
                    const playPromise = audio.play();
                    if (playPromise !== undefined) {
                        playPromise
                            .then(() => {
                                currentPlayingAudio = audio;
                                currentPlayingBtn = playPauseBtn;
                                if (playIcon) playIcon.style.display = 'none';
                                if (pauseIcon) pauseIcon.style.display = 'inline';
                                if (btnText) btnText.textContent = 'Jeda';
                            })
                            .catch(error => {
                                console.error('Playback error:', error);
                                alert('Tidak dapat memutar audio. Silakan coba lagi.');
                            });
                    }
                });
            }

            // Update progress bar and time
            audio.addEventListener('timeupdate', function() {
                const progress = (audio.currentTime / audio.duration) * 100;
                if (progressFill) progressFill.style.width = progress + '%';
                if (currentTimeDisplay) currentTimeDisplay.textContent = formatTime(audio.currentTime);
            });

            // Set duration when loaded
            audio.addEventListener('loadedmetadata', function() {
                if (durationDisplay) durationDisplay.textContent = formatTime(audio.duration);
            });

            // Click on progress bar to seek
            if (progressBar) {
                progressBar.addEventListener('click', function(e) {
                    const rect = progressBar.getBoundingClientRect();
                    const clickX = e.clientX - rect.left;
                    const percentage = clickX / rect.width;
                    audio.currentTime = percentage * audio.duration;
                });
            }

            // Volume control
            if (volumeSlider) {
                volumeSlider.addEventListener('input', function() {
                    audio.volume = this.value / 100;
                });
            }

            // Reset when audio ends
            audio.addEventListener('ended', function() {
                if (playIcon) playIcon.style.display = 'inline';
                if (pauseIcon) pauseIcon.style.display = 'none';
                if (btnText) btnText.textContent = 'Putar Puisi';
                if (progressFill) progressFill.style.width = '0%';
                audio.currentTime = 0;
            });
        });

        // Initialize
        updateSlider();
    });
</script>
