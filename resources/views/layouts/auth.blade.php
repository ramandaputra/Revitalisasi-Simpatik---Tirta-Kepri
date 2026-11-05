<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Login - SIMPATIK V3.0')</title>
    <meta name="description" content="SIMPATIK V3.0 - Sistem Informasi Manajemen Pemantauan & Analisis Kinerja PDAM Tirta Kepri">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Montserrat:400,500,600,700", "Noto+Sans:400,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- Favicon (logo-2.png) -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/logo-2.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/logo-2.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/logo-2.png') }}">

    <!-- Theme Preference Initialization -->
    <script>
        (function() {
            var savedTheme = localStorage.getItem('simpatik_theme') || 'light';
            document.documentElement.setAttribute('data-theme', savedTheme);
        })();
    </script>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/base/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/page-overview/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/icons/lineawesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/icons/themify/css/themify-icons.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- SIMPATIK Biru-Putih & Dark Mode Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/simpatik-theme.css') }}">

    <style>
        html, body {
            min-height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-body);
            transition: background-color 0.25s ease, color 0.25s ease;
        }

        .auth-page-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background: var(--bg-body);
            position: relative;
        }

        /* Minimalist Top Bar on Auth Page */
        .auth-top-navbar {
            padding: 16px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: transparent;
            z-index: 10;
        }

        .auth-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
            gap: 10px;
        }

        .auth-brand-text {
            font-size: 14px;
            font-weight: 700;
            color: var(--text-heading);
            line-height: 1.2;
            letter-spacing: 0.5px;
        }

        .auth-brand-sub {
            font-size: 10.5px;
            color: var(--text-muted);
            display: block;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .auth-top-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        /* Auth Main Container */
        .auth-main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
        }

        .auth-card {
            width: 100%;
            max-width: 410px;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            padding: 32px 28px;
            transition: all 0.25s ease;
        }

        .auth-card-header {
            text-align: center;
            margin-bottom: 24px;
        }

        .auth-avatar-icon {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: var(--color-primary-light);
            border: 1px solid rgba(2, 132, 199, 0.2);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--color-primary);
        }

        .auth-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-heading);
            margin: 0 0 4px 0;
        }

        .auth-subtitle {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin: 0;
        }

        /* Form Controls */
        .form-label-minimal {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.3px;
            color: var(--text-heading);
            margin-bottom: 6px;
            display: flex;
            align-items: center;
        }

        .input-group-minimal {
            display: flex;
            align-items: stretch;
            width: 100%;
            margin-bottom: 16px;
        }

        .input-icon-box {
            background-color: var(--bg-card-alt);
            border: 1px solid var(--border-color);
            border-right: none;
            color: var(--color-primary);
            border-top-left-radius: 6px;
            border-bottom-left-radius: 6px;
            padding: 0 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.15rem;
            width: 42px;
            flex-shrink: 0;
        }

        .form-control-minimal {
            flex: 1 1 auto;
            background-color: var(--bg-card-alt) !important;
            border: 1px solid var(--border-color) !important;
            border-radius: 0 !important;
            color: var(--text-heading) !important;
            padding: 8px 14px !important;
            height: 40px !important;
            font-size: 0.9rem !important;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-control-minimal:focus {
            border-color: var(--color-primary) !important;
            box-shadow: 0 0 0 3px var(--color-primary-light) !important;
            outline: none !important;
        }

        .form-control-minimal:first-child {
            border-top-left-radius: 6px !important;
            border-bottom-left-radius: 6px !important;
        }

        .input-btn-box {
            background-color: var(--bg-card-alt);
            border: 1px solid var(--border-color);
            border-left: none;
            color: var(--text-muted);
            border-top-right-radius: 6px;
            border-bottom-right-radius: 6px;
            padding: 0 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 1.1rem;
            outline: none;
        }

        .input-btn-box:hover {
            color: var(--color-primary);
            background-color: var(--bg-sidebar-active);
        }

        .input-group-minimal .form-control-minimal:last-child {
            border-top-right-radius: 6px !important;
            border-bottom-right-radius: 6px !important;
        }

        /* Login Button - Normalized & Minimalist */
        .btn-auth-submit {
            background: #0284c7 !important;
            border: 1px solid #0284c7 !important;
            color: #ffffff !important;
            font-weight: 600;
            font-size: 0.92rem;
            height: 40px;
            padding: 0 20px;
            border-radius: 6px;
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.2s ease;
            box-shadow: 0 1px 2px rgba(2, 132, 199, 0.2);
            cursor: pointer;
        }

        .btn-auth-submit:hover {
            background: #0369a1 !important;
            border-color: #0369a1 !important;
            transform: translateY(-1px);
            box-shadow: 0 3px 8px rgba(2, 132, 199, 0.3);
            color: #ffffff !important;
            text-decoration: none;
        }

        .btn-auth-back {
            background: transparent;
            border: 1px solid var(--border-color);
            color: var(--text-body) !important;
            font-weight: 500;
            font-size: 0.85rem;
            height: 36px;
            padding: 0 16px;
            border-radius: 6px;
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            transition: all 0.2s ease;
            text-decoration: none !important;
        }

        .btn-auth-back:hover {
            background: var(--bg-card-alt);
            color: var(--color-primary) !important;
            border-color: var(--color-primary);
        }

        /* Card Footer Credit */
        .auth-card-footer {
            margin-top: 20px;
        }

        /* Footer */
        .auth-footer {
            text-align: center;
            padding: 16px;
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        @media (max-width: 575.98px) {
            .auth-card {
                padding: 24px 18px;
                box-shadow: none;
                border: 1px solid var(--border-color);
            }
            .auth-top-navbar {
                padding: 12px 16px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    @yield('content')

    <!-- Vendor Scripts -->
    <script src="{{ asset('assets/vendors/js/base/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/base/core.min.js') }}"></script>

    @stack('scripts')
</body>
</html>
