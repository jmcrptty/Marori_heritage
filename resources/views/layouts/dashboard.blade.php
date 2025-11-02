<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard - Suku Marori Wasur')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/marori.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/marori.ico') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    @include('dashboard.partials.styles')

    @stack('styles')
</head>
<body>

    @include('dashboard.partials.sidebar')

    <!-- Main Content -->
    <div class="main-content">
        @include('dashboard.partials.topbar')

        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-body text-center py-5">
                    <div class="mb-4">
                        <div class="success-checkmark mx-auto">
                            <div class="check-icon">
                                <span class="icon-line line-tip"></span>
                                <span class="icon-line line-long"></span>
                                <div class="icon-circle"></div>
                                <div class="icon-fix"></div>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-marori fw-bold mb-2">Berhasil!</h3>
                    <p class="text-muted mb-0" id="successMessage">Operasi berhasil dilakukan</p>
                </div>
                <div class="modal-footer border-0 justify-content-center pb-4">
                    <button type="button" class="btn btn-marori-modal px-4" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <style>
    .success-checkmark {
        width: 80px;
        height: 80px;
        margin: 0 auto;
    }
    .success-checkmark .check-icon {
        width: 80px;
        height: 80px;
        position: relative;
        border-radius: 50%;
        box-sizing: content-box;
        border: 4px solid #1a1a1a;
        background-color: #E9ECEF;
    }
    .success-checkmark .check-icon::before {
        top: 3px;
        left: -2px;
        width: 30px;
        transform-origin: 100% 50%;
        border-radius: 100px 0 0 100px;
    }
    .success-checkmark .check-icon::after {
        top: 0;
        left: 30px;
        width: 60px;
        transform-origin: 0 50%;
        border-radius: 0 100px 100px 0;
        animation: rotate-circle 4.25s ease-in;
    }
    .success-checkmark .icon-line {
        height: 5px;
        background-color: #1a1a1a;
        display: block;
        border-radius: 2px;
        position: absolute;
        z-index: 10;
    }

    .text-marori {
        color: #1a1a1a !important;
    }

    .btn-marori-modal {
        background: #8B0000;
        border: 2px solid #8B0000;
        color: white;
    }

    .btn-marori-modal:hover {
        background: #DC143C;
        border-color: #DC143C;
        color: white;
    }
    .success-checkmark .icon-line.line-tip {
        top: 43px;
        left: 14px;
        width: 25px;
        transform: rotate(45deg);
        animation: icon-line-tip 0.75s;
    }
    .success-checkmark .icon-line.line-long {
        top: 38px;
        right: 8px;
        width: 47px;
        transform: rotate(-45deg);
        animation: icon-line-long 0.75s;
    }
    .success-checkmark .icon-circle {
        top: -4px;
        left: -4px;
        z-index: 10;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        position: absolute;
        box-sizing: content-box;
        border: 4px solid rgba(40, 167, 69, 0.5);
    }
    .success-checkmark .icon-fix {
        top: 8px;
        width: 5px;
        left: 26px;
        z-index: 1;
        height: 85px;
        position: absolute;
        transform: rotate(-45deg);
        background-color: #fff;
    }
    @keyframes icon-line-tip {
        0% {
            width: 0;
            left: 1px;
            top: 19px;
        }
        54% {
            width: 0;
            left: 1px;
            top: 19px;
        }
        70% {
            width: 50px;
            left: -8px;
            top: 37px;
        }
        84% {
            width: 17px;
            left: 21px;
            top: 48px;
        }
        100% {
            width: 25px;
            left: 14px;
            top: 43px;
        }
    }
    @keyframes icon-line-long {
        0% {
            width: 0;
            right: 46px;
            top: 54px;
        }
        65% {
            width: 0;
            right: 46px;
            top: 54px;
        }
        84% {
            width: 55px;
            right: 0px;
            top: 35px;
        }
        100% {
            width: 47px;
            right: 8px;
            top: 38px;
        }
    }
    </style>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @include('dashboard.partials.scripts')

    @stack('scripts')

    <script>
    // Function to show success modal
    function showSuccessModal(message) {
        document.getElementById('successMessage').textContent = message || 'Operasi berhasil dilakukan';
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();

        // Auto close after 3 seconds
        setTimeout(function() {
            successModal.hide();
        }, 3000);
    }

    // Check for success session and show modal
    @if(session('success'))
        document.addEventListener('DOMContentLoaded', function() {
            showSuccessModal('{{ session('success') }}');
        });
    @endif
    </script>
</body>
</html>
