<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --primary-color: #5C4033;
        --secondary-color: #8B6F47;
        --accent-color: #4A7C59;
        --accent-light: #6B9B7F;
        --sidebar-bg: #2C1810;
        --sidebar-hover: #3E2723;
        --topbar-bg: #FFFFFF;
        --content-bg: #F8F9FA;
        --text-primary: #2C1810;
        --text-secondary: #6D5D4F;
        --border-color: #E5E7EB;
        --success: #4A7C59;
        --danger: #DC3545;
        --warning: #FFC107;
        --info: #17A2B8;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        background: var(--content-bg);
        overflow-x: hidden;
    }

    /* Sidebar Styles */
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 260px;
        height: 100vh;
        background: var(--sidebar-bg);
        color: white;
        transition: all 0.3s ease;
        z-index: 1000;
        overflow-y: auto;
    }

    .sidebar::-webkit-scrollbar {
        width: 6px;
    }

    .sidebar::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.05);
    }

    .sidebar::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 3px;
    }

    .sidebar-header {
        padding: 1.5rem 1.25rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .sidebar-brand {
        font-size: 1.25rem;
        font-weight: 600;
        color: white;
        text-decoration: none;
        display: block;
    }

    .sidebar-brand:hover {
        color: var(--accent-light);
    }

    .sidebar-subtitle {
        font-size: 0.75rem;
        color: rgba(255, 255, 255, 0.6);
        margin-top: 0.25rem;
    }

    .sidebar-menu {
        padding: 1rem 0;
    }

    .menu-section-title {
        padding: 0.75rem 1.25rem;
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: rgba(255, 255, 255, 0.5);
        font-weight: 600;
    }

    .menu-item {
        display: flex;
        align-items: center;
        padding: 0.75rem 1.25rem;
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        transition: all 0.2s ease;
        position: relative;
    }

    .menu-item:hover {
        background: var(--sidebar-hover);
        color: white;
    }

    .menu-item.active {
        background: var(--sidebar-hover);
        color: white;
    }

    .menu-item.active::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 3px;
        background: var(--accent-color);
    }

    .menu-item i {
        width: 20px;
        margin-right: 0.75rem;
        font-size: 1.1rem;
    }

    .menu-item-text {
        font-size: 0.9rem;
        font-weight: 500;
    }

    /* Main Content */
    .main-content {
        margin-left: 260px;
        min-height: 100vh;
        transition: all 0.3s ease;
    }

    /* Topbar */
    .topbar {
        background: var(--topbar-bg);
        border-bottom: 1px solid var(--border-color);
        padding: 1rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: sticky;
        top: 0;
        z-index: 999;
    }

    .topbar-left h1 {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--text-primary);
        margin: 0;
    }

    .breadcrumb {
        font-size: 0.85rem;
        color: var(--text-secondary);
        margin: 0;
        background: none;
        padding: 0;
    }

    .topbar-right {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .topbar-btn {
        background: white;
        border: 1px solid var(--border-color);
        padding: 0.5rem 1rem;
        border-radius: 6px;
        color: var(--text-primary);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
        transition: all 0.2s;
    }

    .topbar-btn:hover {
        background: var(--content-bg);
        color: var(--text-primary);
    }

    .topbar-btn-primary {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
    }

    .topbar-btn-primary:hover {
        background: var(--secondary-color);
        color: white;
    }

    /* Content Wrapper */
    .content-wrapper {
        padding: 2rem;
    }

    /* Cards */
    .card {
        background: white;
        border-radius: 12px;
        border: 1px solid var(--border-color);
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        margin-bottom: 1.5rem;
    }

    .card-header {
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: var(--text-primary);
        margin: 0;
    }

    .card-body {
        padding: 1.5rem;
    }

    /* Form Styles */
    .form-label {
        font-weight: 500;
        color: var(--text-primary);
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .form-control, .form-select {
        border-radius: 8px;
        border: 1px solid var(--border-color);
        padding: 0.625rem 0.875rem;
        font-size: 0.9rem;
        transition: all 0.2s;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 3px rgba(74, 124, 89, 0.1);
    }

    textarea.form-control {
        min-height: 120px;
    }

    /* Buttons */
    .btn {
        padding: 0.625rem 1.25rem;
        border-radius: 8px;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.2s;
    }

    .btn-primary {
        background: var(--primary-color);
        border-color: var(--primary-color);
    }

    .btn-primary:hover {
        background: var(--secondary-color);
        border-color: var(--secondary-color);
    }

    .btn-success {
        background: var(--accent-color);
        border-color: var(--accent-color);
    }

    .btn-success:hover {
        background: var(--accent-light);
        border-color: var(--accent-light);
    }

    .btn-outline-secondary {
        border-color: var(--border-color);
        color: var(--text-secondary);
    }

    .btn-outline-secondary:hover {
        background: var(--content-bg);
        border-color: var(--border-color);
        color: var(--text-primary);
    }

    /* Stats Cards */
    .stats-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        border: 1px solid var(--border-color);
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: all 0.2s;
    }

    .stats-card:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transform: translateY(-2px);
    }

    .stats-icon {
        width: 56px;
        height: 56px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .stats-icon.primary {
        background: rgba(92, 64, 51, 0.1);
        color: var(--primary-color);
    }

    .stats-icon.success {
        background: rgba(74, 124, 89, 0.1);
        color: var(--accent-color);
    }

    .stats-icon.warning {
        background: rgba(255, 193, 7, 0.1);
        color: var(--warning);
    }

    .stats-icon.info {
        background: rgba(23, 162, 184, 0.1);
        color: var(--info);
    }

    .stats-content h3 {
        font-size: 1.75rem;
        font-weight: 600;
        color: var(--text-primary);
        margin: 0;
    }

    .stats-content p {
        font-size: 0.85rem;
        color: var(--text-secondary);
        margin: 0;
    }

    /* Table */
    .table {
        font-size: 0.9rem;
    }

    .table thead th {
        background: var(--content-bg);
        border-bottom: 2px solid var(--border-color);
        font-weight: 600;
        color: var(--text-primary);
        padding: 0.875rem;
    }

    .table tbody td {
        padding: 0.875rem;
        vertical-align: middle;
    }

    /* Badge */
    .badge {
        padding: 0.35em 0.65em;
        font-weight: 500;
        font-size: 0.75rem;
    }

    /* Alert */
    .alert {
        border-radius: 8px;
        border: none;
        padding: 1rem 1.25rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .sidebar {
            transform: translateX(-100%);
        }

        .sidebar.show {
            transform: translateX(0);
        }

        .main-content {
            margin-left: 0;
        }

        .topbar {
            padding: 1rem;
        }

        .content-wrapper {
            padding: 1rem;
        }
    }
</style>
