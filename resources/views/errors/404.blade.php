<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan | RS Asa Bunda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --accent-color: #2563eb;
            --accent-color-rgb: 37, 99, 235;
            --heading-color: #1e3a8a;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f8fbff 0%, #e8f4f8 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .error-container {
            text-align: center;
            max-width: 600px;
            width: 100%;
        }

        .error-animation {
            position: relative;
            margin-bottom: 40px;
        }

        .error-code {
            font-size: 150px;
            font-weight: 900;
            color: var(--accent-color);
            line-height: 1;
            margin: 0;
            text-shadow: 0 10px 30px rgba(var(--accent-color-rgb), 0.3);
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .error-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 80px;
            color: rgba(var(--accent-color-rgb), 0.2);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 0.2;
            }
            50% {
                transform: translate(-50%, -50%) scale(1.1);
                opacity: 0.3;
            }
        }

        .error-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--heading-color);
            margin-bottom: 20px;
        }

        .error-message {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .error-actions {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-primary-custom {
            background: var(--accent-color);
            color: #fff;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(var(--accent-color-rgb), 0.3);
            border: none;
        }

        .btn-primary-custom:hover {
            background: color-mix(in srgb, var(--accent-color), black 10%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(var(--accent-color-rgb), 0.4);
            color: #fff;
        }

        .btn-secondary-custom {
            background: #fff;
            color: var(--accent-color);
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            border: 2px solid var(--accent-color);
        }

        .btn-secondary-custom:hover {
            background: var(--accent-color);
            color: #fff;
            transform: translateY(-2px);
        }

        .quick-links {
            margin-top: 50px;
            padding-top: 30px;
            border-top: 1px solid rgba(0,0,0,0.1);
        }

        .quick-links h5 {
            font-size: 1rem;
            color: var(--heading-color);
            margin-bottom: 20px;
            font-weight: 600;
        }

        .quick-links-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
        }

        .quick-link-item {
            background: #fff;
            padding: 15px;
            border-radius: 12px;
            text-decoration: none;
            color: var(--heading-color);
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .quick-link-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            color: var(--accent-color);
        }

        .quick-link-item i {
            font-size: 1.5rem;
            margin-bottom: 8px;
            display: block;
            color: var(--accent-color);
        }

        .quick-link-item span {
            font-size: 0.9rem;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .error-code {
                font-size: 100px;
            }

            .error-title {
                font-size: 1.5rem;
            }

            .error-message {
                font-size: 1rem;
            }

            .error-actions {
                flex-direction: column;
            }

            .btn-primary-custom,
            .btn-secondary-custom {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-animation">
            <h1 class="error-code">404</h1>
            <i class="bi bi-hospital error-icon"></i>
        </div>

        <h2 class="error-title">Halaman Tidak Ditemukan</h2>
        <p class="error-message">
            Maaf, halaman yang Anda cari tidak dapat ditemukan. Halaman mungkin telah dipindahkan atau tidak tersedia.
        </p>

        <div class="error-actions">
            <a href="{{ url('/') }}" class="btn-primary-custom">
                <i class="bi bi-house-fill"></i>
                Kembali ke Beranda
            </a>
            <a href="javascript:history.back()" class="btn-secondary-custom">
                <i class="bi bi-arrow-left"></i>
                Halaman Sebelumnya
            </a>
        </div>

        <div class="quick-links">
            <h5>Atau kunjungi halaman berikut:</h5>
            <div class="quick-links-grid">
                <a href="{{ route('doctor.index') }}" class="quick-link-item">
                    <i class="bi bi-person-heart"></i>
                    <span>Dokter</span>
                </a>
                <a href="{{ route('polyclinic.index') }}" class="quick-link-item">
                    <i class="bi bi-hospital"></i>
                    <span>Poliklinik</span>
                </a>
                <a href="{{ url('/#about') }}" class="quick-link-item">
                    <i class="bi bi-info-circle"></i>
                    <span>Tentang Kami</span>
                </a>
                <a href="{{ url('/#contact') }}" class="quick-link-item">
                    <i class="bi bi-telephone"></i>
                    <span>Kontak</span>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
