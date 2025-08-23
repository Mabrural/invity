<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Invity</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Cinzel:wght@400;700&family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            color: #333;
            background-color: #f8f9fa;
            overflow-x: hidden;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header & Navigation */
        header {
            background-color: #fff;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }

        .logo {
            font-family: 'Cinzel', serif;
            font-size: 28px;
            font-weight: 700;
            color: #d4af37;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .logo i {
            margin-right: 10px;
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #d4af37;
        }

        .auth-buttons {
            display: flex;
            align-items: center;
        }

        .btn-login {
            background: transparent;
            color: #d4af37;
            border: 1px solid #d4af37;
            padding: 10px 20px;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-right: 15px;
            text-decoration: none;
        }

        .btn-login:hover {
            background-color: rgba(212, 175, 55, 0.1);
        }

        .btn-register {
            background: linear-gradient(to right, #d4af37, #f5e9c6);
            color: #0a0a0a;
            border: none;
            padding: 10px 25px;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }

        /* Register Section */
        .register-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 0;
        }

        .register-container {
            background: #fff;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .register-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            color: #0a0a0a;
            margin-bottom: 10px;
        }

        .register-header p {
            color: #666;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            border-color: #d4af37;
            outline: none;
        }

        .form-submit {
            width: 100%;
            padding: 12px;
            background: linear-gradient(to right, #d4af37, #f5e9c6);
            border: none;
            border-radius: 5px;
            color: #0a0a0a;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }

        .form-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }

        .form-footer a {
            color: #d4af37;
            text-decoration: none;
            font-weight: 600;
        }

        .terms {
            margin-top: 15px;
            font-size: 14px;
            color: #666;
        }

        .terms input {
            margin-right: 8px;
        }

        /* Footer */
        footer {
            background-color: #0a0a0a;
            color: #fff;
            padding: 40px 0 20px;
            margin-top: auto;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-column h3 {
            font-size: 20px;
            margin-bottom: 20px;
            color: #d4af37;
        }

        .footer-column p,
        .footer-column a {
            color: #ccc;
            margin-bottom: 10px;
            display: block;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-column a:hover {
            color: #d4af37;
        }

        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-icons a {
            width: 40px;
            height: 40px;
            background: #222;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background 0.3s;
        }

        .social-icons a:hover {
            background: #d4af37;
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #333;
            color: #999;
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .register-container {
                padding: 30px 20px;
            }
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #333;
        }

        @media (max-width: 576px) {
            .mobile-menu-btn {
                display: block;
            }

            .auth-buttons {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- Register Section -->
    <section class="register-section">
        <div class="register-container">
            <div class="register-header">
                <h1>Daftar Akun Baru</h1>
                <p>Bergabunglah dengan Invity dan buat undangan digital elegan untuk acara spesial Anda</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="registerName">Nama Lengkap</label>
                    <input type="text" id="registerName" name="name" placeholder="Nama lengkap Anda" required>
                </div>

                <div class="form-group">
                    <label for="registerEmail">Email</label>
                    <input type="email" id="registerEmail" name="email" placeholder="Alamat email Anda" required>
                </div>

                <div class="form-group">
                    <label for="registerPassword">Password</label>
                    <input type="password" id="registerPassword" name="password"
                        placeholder="Buat password minimal 8 karakter" required>
                </div>

                <div class="form-group">
                    <label for="registerConfirmPassword">Konfirmasi Password</label>
                    <input type="password" id="registerConfirmPassword" name="password_confirmation"
                        placeholder="Ulangi password Anda" required>
                </div>

                <div class="terms">
                    <input type="checkbox" id="agreeTerms" required>
                    <label for="agreeTerms">Saya menyetujui
                        <a href="#">Syarat & Ketentuan</a> dan <a href="#">Kebijakan Privasi</a>
                    </label>
                </div>

                <button type="submit" class="form-submit">Daftar Sekarang</button>

                <div class="form-footer">
                    <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
                </div>
            </form>

        </div>
    </section>

</body>

</html>
