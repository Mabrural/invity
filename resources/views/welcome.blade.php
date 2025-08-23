<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invity - Platform Undangan Digital Elegant</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Cinzel:wght@400;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
        }
        
        /* Header & Navigation */
        header {
            background-color: #fff;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            position: fixed;
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
        
        /* Hero Section */
        .hero {
            padding: 150px 0 100px;
            background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), url('https://images.unsplash.com/photo-1519225421980-715cb0215aed?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80') no-repeat center center/cover;
            text-align: center;
        }
        
        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            color: #0a0a0a;
            margin-bottom: 20px;
        }
        
        .hero h1 span {
            color: #d4af37;
        }
        
        .hero p {
            font-size: 20px;
            color: #555;
            max-width: 700px;
            margin: 0 auto 40px;
        }
        
        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }
        
        .btn-primary {
            background: linear-gradient(to right, #d4af37, #f5e9c6);
            color: #0a0a0a;
            border: none;
            padding: 15px 40px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(212, 175, 55, 0.5);
        }
        
        .btn-secondary {
            background: transparent;
            color: #0a0a0a;
            border: 2px solid #0a0a0a;
            padding: 15px 40px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-secondary:hover {
            background-color: #0a0a0a;
            color: #fff;
        }
        
        /* Features Section */
        .features {
            padding: 80px 0;
            background-color: #fff;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .section-title h2 {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            color: #0a0a0a;
            margin-bottom: 15px;
        }
        
        .section-title p {
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }
        
        .feature-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 25px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            border-top: 4px solid #d4af37;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(to right, #d4af37, #f5e9c6);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 15px;
            font-size: 24px;
            color: #0a0a0a;
        }
        
        .feature-card h3 {
            font-size: 20px;
            margin-bottom: 12px;
            color: #0a0a0a;
        }
        
        .feature-card p {
            color: #666;
            font-size: 15px;
        }
        
        /* How It Works */
        .how-it-works {
            padding: 80px 0;
            background-color: #f8f9fa;
        }
        
        .steps {
            display: flex;
            justify-content: space-between;
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .step {
            text-align: center;
            flex: 1;
            padding: 0 15px;
        }
        
        .step-number {
            width: 50px;
            height: 50px;
            background: linear-gradient(to right, #d4af37, #f5e9c6);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            font-weight: 700;
            margin: 0 auto 15px;
            color: #0a0a0a;
        }
        
        .step h3 {
            font-size: 20px;
            margin-bottom: 12px;
            color: #0a0a0a;
        }
        
        .step p {
            color: #666;
            font-size: 15px;
        }
        
        /* CTA Section */
        .cta {
            padding: 80px 0;
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80') no-repeat center center/cover;
            color: #fff;
            text-align: center;
        }
        
        .cta h2 {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            margin-bottom: 20px;
        }
        
        .cta p {
            font-size: 18px;
            max-width: 700px;
            margin: 0 auto 40px;
            color: #f5e9c6;
        }
        
        /* Footer */
        footer {
            background-color: #0a0a0a;
            color: #fff;
            padding: 50px 0 20px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .footer-column h3 {
            font-size: 18px;
            margin-bottom: 15px;
            color: #d4af37;
        }
        
        .footer-column p, .footer-column a {
            color: #ccc;
            margin-bottom: 8px;
            display: block;
            text-decoration: none;
            transition: color 0.3s;
            font-size: 14px;
        }
        
        .footer-column a:hover {
            color: #d4af37;
        }
        
        .social-icons {
            display: flex;
            gap: 12px;
            margin-top: 15px;
        }
        
        .social-icons a {
            width: 35px;
            height: 35px;
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
        @media (max-width: 992px) {
            .steps {
                flex-direction: column;
                gap: 30px;
            }
            
            .hero h1 {
                font-size: 36px;
            }
            
            .hero p {
                font-size: 18px;
            }
        }
        
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .hero-buttons {
                flex-direction: column;
                gap: 15px;
            }
            
            .hero {
                padding: 120px 0 80px;
            }
            
            .features, .how-it-works, .cta {
                padding: 60px 0;
            }
            
            .feature-card {
                padding: 20px;
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
            
            .hero h1 {
                font-size: 32px;
            }
            
            .cta h2 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <!-- Header & Navigation -->
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="index.html" class="logo">
                    <i class="fas fa-envelope-open-text"></i> INVITY
                </a>
                
                <ul class="nav-links">
                    <li><a href="index.html">Beranda</a></li>
                    <li><a href="#features">Fitur</a></li>
                    <li><a href="#how-it-works">Cara Kerja</a></li>
                    <li><a href="#contact">Kontak</a></li>
                </ul>
                
                <div class="auth-buttons">
                    <a href="/login" class="btn-login">Masuk</a>
                    <a href="/register" class="btn-register">Daftar</a>
                </div>
                
                <button class="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </button>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Buat Undangan Digital <span>Elegan</span> dengan Mudah</h1>
            <p>Invity membantu Anda membuat undangan digital yang memukau untuk berbagai acara spesial. Tanpa perlu keahlian desain, hasilkan undangan profesional dalam hitungan menit.</p>
            
            <div class="hero-buttons">
                <a href="/login" class="btn-primary">Buat Undangan Sekarang</a>
                <button class="btn-secondary">Lihat Demo</button>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-title">
                <h2>Mengapa Memilih Invity?</h2>
                <p>Platform undangan digital dengan fitur-fitur penting yang Anda butuhkan</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3>Desain Elegan</h3>
                    <p>Template profesional dengan gaya yang elegan dan klasik</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Responsif</h3>
                    <p>Tampilan sempurna di semua perangkat</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <h3>Kirim Mudah</h3>
                    <p>Bagikan undangan melalui WhatsApp dengan satu klik</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h3>Privasi Terjaga</h3>
                    <p>Data dan informasi acara Anda aman dan terlindungi</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works" id="how-it-works">
        <div class="container">
            <div class="section-title">
                <h2>Cara Kerja Invity</h2>
                <p>Hanya perlu 3 langkah mudah untuk membuat undangan digital profesional</p>
            </div>
            
            <div class="steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Daftar & Pilih Template</h3>
                    <p>Buat akun dan pilih template undangan yang sesuai</p>
                </div>
                
                <div class="step">
                    <div class="step-number">2</div>
                    <h3>Kustomisasi Undangan</h3>
                    <p>Edit detail acara dan tambahkan foto</p>
                </div>
                
                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Bagikan Undangan</h3>
                    <p>Kirim undangan ke tamu melalui WhatsApp</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2>Siap Membuat Undangan Digital Anda?</h2>
            <p>Bergabung dengan pengguna yang telah mempercayakan undangan spesial mereka pada Invity</p>
            <a href="/register" class="btn-primary">Daftar Sekarang - Gratis!</a>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>INVITY</h3>
                    <p>Platform undangan digital yang membantu Anda membuat undangan elegan untuk setiap acara spesial.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3>Perusahaan</h3>
                    <a href="#">Tentang Kami</a>
                    <a href="#">Blog</a>
                    <a href="#">Partner Kami</a>
                </div>
                
                <div class="footer-column">
                    <h3>Dukungan</h3>
                    <a href="#">Pusat Bantuan</a>
                    <a href="#">FAQ</a>
                    <a href="#">Kontak</a>
                </div>
                
                <div class="footer-column">
                    <h3>Kontak</h3>
                    <p><i class="fas fa-map-marker-alt"></i> Jakarta, Indonesia</p>
                    <p><i class="fas fa-envelope"></i> info@invity.com</p>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2023 Invity. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Simple script for mobile menu toggle (can be expanded later)
        document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
            alert('Menu navigasi akan ditampilkan di sini (dalam pengembangan)');
        });
        
        // Demo button action
        document.querySelector('.btn-secondary').addEventListener('click', function() {
            alert('Demo undangan akan ditampilkan di sini (dalam pengembangan)');
        });
    </script>
</body>
</html>