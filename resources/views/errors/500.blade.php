<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Terjadi Kesalahan Server | RS Asa Bunda</title>
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
            max-width: 700px;
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
            animation: shake 5s ease-in-out infinite;
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            10%, 30%, 50%, 70%, 90% {
                transform: translateX(-5px);
            }
            20%, 40%, 60%, 80% {
                transform: translateX(5px);
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

        .support-info {
            margin-top: 50px;
            padding: 25px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .support-info h5 {
            font-size: 1rem;
            color: var(--heading-color);
            margin-bottom: 15px;
            font-weight: 600;
        }

        .support-info p {
            color: #666;
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        .contact-items {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .contact-item {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 500;
            padding: 10px 20px;
            background: rgba(var(--accent-color-rgb), 0.1);
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            background: var(--accent-color);
            color: #fff;
            transform: translateY(-2px);
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

            .contact-items {
                flex-direction: column;
                gap: 10px;
            }

            .contact-item {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-animation">
            <h1 class="error-code">500</h1>
            <i class="bi bi-exclamation-triangle error-icon"></i>
        </div>

        <h2 class="error-title">Terjadi Kesalahan Server</h2>
        <p class="error-message">
            Maaf, terjadi kesalahan pada server kami. Tim teknis kami telah diberitahu dan sedang menangani masalah ini. Silakan coba lagi dalam beberapa saat.
        </p>

        <div class="error-actions">
            <a href="{{ url('/') }}" class="btn-primary-custom">
                <i class="bi bi-house-fill"></i>
                Kembali ke Beranda
            </a>
            <a href="javascript:location.reload()" class="btn-secondary-custom">
                <i class="bi bi-arrow-clockwise"></i>
                Muat Ulang Halaman
            </a>
        </div>

        <div class="support-info">
            <h5>Butuh Bantuan Segera?</h5>
            <p>Jika masalah ini terus berlanjut, silakan hubungi kami:</p>
            <div class="contact-items">
                <a href="tel:{{ optional($settings ?? null)->emergency_phone }}" class="contact-item">
                    <i class="bi bi-telephone-fill"></i>
                    <span>Hubungi Kami</span>
                </a>
                <a href="mailto:{{ optional($settings ?? null)->email }}" class="contact-item">
                    <i class="bi bi-envelope-fill"></i>
                    <span>Email Kami</span>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
