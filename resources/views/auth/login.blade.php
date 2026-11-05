@extends('layouts.auth')

@section('title', 'Masuk Petugas - SIMPATIK V3.0')

@section('content')
<div class="auth-page-wrapper">
    <!-- Minimalist Top Bar -->
    <header class="auth-top-navbar">
        <a href="{{ route('dashboard') }}" class="auth-brand">
            <img src="{{ asset('assets/img/logo-2.png') }}" alt="SIMPATIK" style="height: 32px; width: auto; object-fit: contain;">
            <div>
                <span class="auth-brand-text">SIMPATIK <span style="font-size: 10px; background: #0284c7; color: #fff; padding: 1px 5px; border-radius: 4px; vertical-align: middle;">V3.0</span></span>
                <span class="auth-brand-sub">Perumda Air Minum Tirta Kepri</span>
            </div>
        </a>
        <div class="auth-top-actions">
            <!-- Theme Toggle Button (Matahari / Bulan Sabit) -->
            <button type="button" class="theme-switch-btn" id="themeToggleBtn" title="Ganti Mode Gelap / Terang" aria-label="Toggle Theme">
                <svg id="themeMoonIcon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                </svg>
                <svg id="themeSunIcon" style="display: none;" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="5"></circle>
                    <line x1="12" y1="1" x2="12" y2="3"></line>
                    <line x1="12" y1="21" x2="12" y2="23"></line>
                    <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                    <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                    <line x1="1" y1="12" x2="3" y2="12"></line>
                    <line x1="21" y1="12" x2="23" y2="12"></line>
                    <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                    <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                </svg>
            </button>
            <!-- Navigation Back Button -->
            <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-secondary d-inline-flex align-items-center" style="font-size: 12px; height: 34px; border-radius: 6px;">
                <i class="la la-arrow-left mr-1"></i> Dashboard Publik
            </a>
        </div>
    </header>

    <!-- Main Card Content -->
    <main class="auth-main-content">
        <div class="auth-card">
            <!-- Card Header with logo-big-2.png -->
            <div class="auth-card-header text-center">
                <div class="mb-3 text-center">
                    <img src="{{ asset('assets/img/logo-big-2.png') }}" alt="SIMPATIK" style="max-height: 52px; max-width: 220px; object-fit: contain;">
                </div>
                <h1 class="auth-title">Masuk ke Sistem</h1>
                <p class="auth-subtitle">SIMPATIK V3.0 &bull; Akses Khusus Petugas</p>
            </div>

            <!-- Flash & Error Alert -->
            @if ($errors->any())
                <div class="alert alert-danger py-2 px-3 small rounded mb-3" role="alert">
                    <i class="la la-exclamation-circle mr-1"></i> {{ $errors->first() }}
                </div>
            @endif

            @if (session('info'))
                <div class="alert alert-info py-2 px-3 small rounded mb-3" role="alert">
                    <i class="la la-info-circle mr-1"></i> {{ session('info') }}
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login.post') }}" id="loginForm">
                @csrf

                <!-- NIK / Username Field with User Icon -->
                <div class="mb-3">
                    <label for="nik" class="form-label-minimal">Nomor Induk Karyawan (NIK)</label>
                    <div class="input-group-minimal">
                        <div class="input-icon-box" title="NIK Pengguna">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <input type="text"
                               id="nik"
                               name="nik"
                               class="form-control form-control-minimal @error('nik') is-invalid @enderror"
                               value="{{ old('nik') }}"
                               placeholder="Masukkan NIK Anda"
                               autocomplete="username"
                               required
                               autofocus>
                    </div>
                </div>

                <!-- Password Field with Lock Icon & Toggle Show/Hide -->
                <div class="mb-3">
                    <label for="password" class="form-label-minimal">Kata Sandi</label>
                    <div class="input-group-minimal">
                        <div class="input-icon-box" title="Kata Sandi">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                        </div>
                        <input type="password"
                               id="password"
                               name="password"
                               class="form-control form-control-minimal @error('password') is-invalid @enderror"
                               placeholder="Masukkan kata sandi"
                               autocomplete="current-password"
                               required>
                        <button type="button" class="input-btn-box" id="togglePasswordBtn" title="Lihat/Sembunyikan Sandi" tabindex="-1" aria-label="Toggle password visibility">
                            <svg id="eyeShowIcon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            <svg id="eyeHideIcon" style="display:none;" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                                <line x1="1" y1="1" x2="23" y2="23"></line>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="d-flex align-items-center mb-3">
                    <label class="d-flex align-items-center m-0" style="font-size: 12.5px; color: var(--text-muted); cursor: pointer;">
                        <input type="checkbox" name="remember" id="remember" class="mr-2" {{ old('remember') ? 'checked' : '' }}>
                        <span>Ingat Saya</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="mb-0">
                    <button type="submit" class="btn-auth-submit" id="btnSubmit">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                            <polyline points="10 17 15 12 10 7"></polyline>
                            <line x1="15" y1="12" x2="3" y2="12"></line>
                        </svg>
                        <span>Masuk ke Sistem</span>
                    </button>
                </div>
            </form>

            <!-- Card Footer Credit (Requested by user) -->
            <div class="auth-card-footer mt-4 pt-3 border-top text-center" style="border-color: var(--border-color) !important;">
                <span style="font-size: 11.5px; color: var(--text-muted); line-height: 1.5; display: block;">
                    Dikembangkan Oleh Pusimpel Perumda Air Minum Tirta Kepri &copy; 2026
                </span>
            </div>
        </div>
    </main>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Theme Toggle Controller
        var currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
        updateThemeIcon(currentTheme);

        $('#themeToggleBtn').on('click', function(e) {
            e.preventDefault();
            var activeTheme = document.documentElement.getAttribute('data-theme') || 'light';
            var targetTheme = (activeTheme === 'dark') ? 'light' : 'dark';

            document.documentElement.setAttribute('data-theme', targetTheme);
            localStorage.setItem('simpatik_theme', targetTheme);
            updateThemeIcon(targetTheme);
        });

        function updateThemeIcon(theme) {
            if (theme === 'dark') {
                $('#themeMoonIcon').hide();
                $('#themeSunIcon').show();
                $('#themeToggleBtn').attr('title', 'Ganti ke Mode Terang');
            } else {
                $('#themeSunIcon').hide();
                $('#themeMoonIcon').show();
                $('#themeToggleBtn').attr('title', 'Ganti ke Mode Gelap');
            }
        }

        // Toggle Password Visibility
        $('#togglePasswordBtn').on('click', function(e) {
            e.preventDefault();
            var passInput = $('#password');
            var showSvg = $('#eyeShowIcon');
            var hideSvg = $('#eyeHideIcon');

            if (passInput.attr('type') === 'password') {
                passInput.attr('type', 'text');
                showSvg.hide();
                hideSvg.show();
            } else {
                passInput.attr('type', 'password');
                showSvg.show();
                hideSvg.hide();
            }
        });
    });
</script>
@endpush
