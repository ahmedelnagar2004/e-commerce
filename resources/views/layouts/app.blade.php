<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title', 'متجر ترياق - المنتجات الطبيعية')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap');
            
            :root {
                --primary-color: #ffffff;
                --text-color: #000000;
                --hover-color: #333333;
            }
            
            body {
                font-family: 'Tajawal', sans-serif;
                background-color: #F0FFF0;
            }
            
            .navbar {
                background-color: var(--primary-color) !important;
                padding: 1rem 0;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }
            
            .navbar-brand {
                font-size: 1.8rem;
                font-weight: bold;
                color: var(--text-color) !important;
            }
            
            .nav-link {
                color: var(--text-color) !important;
                font-weight: 500;
                transition: color 0.3s ease;
                padding: 0.5rem 1rem;
                margin: 0 0.2rem;
            }
            
            .nav-link:hover {
                color: #666666 !important;
            }
            
            .navbar-toggler {
                border-color: var(--text-color);
            }
            
            .btn-outline-light {
                border-color: var(--text-color);
                color: var(--text-color);
            }
            
            .btn-outline-light:hover {
                background-color: var(--text-color);
                color: var(--primary-color);
            }
            
            .footer {
                background-color: var(--primary-color) !important;
                color: var(--text-color) !important;
                padding: 3rem 0 2rem;
                margin-top: 5rem;
            }
            
            .footer h5 {
                font-weight: bold;
                margin-bottom: 1.5rem;
                font-size: 1.2rem;
            }
            
            .footer ul li {
                margin-bottom: 0.8rem;
            }
            
            .footer a {
                color: var(--text-color) !important;
                text-decoration: none;
                transition: color 0.3s ease;
            }
            
            .footer a:hover {
                color: #666666 !important;
            }
            
            .footer hr {
                border-color: rgba(255,255,255,0.1);
                margin: 2rem 0;
            }
            
            .footer .text-center {
                font-size: 0.9rem;
                opacity: 0.8;
            }
            
            @media (max-width: 767px) {
                .navbar-brand {
                    font-size: 1.5rem;
                }
                
                .footer {
                    padding: 2rem 0 1rem;
                    text-align: center;
                }
                
                .footer h5 {
                    margin-top: 1.5rem;
                }
            }
            
            .form-control {
                background-color: white !important;
                border: 1px solid black !important;
                color: black !important;
            }
            
            .form-control::placeholder {
                color: #666666 !important;
            }
            
            .form-control:focus {
                box-shadow: none !important;
                border-color: black !important;
            }
            
            .card {
                transition: transform 0.2s, box-shadow 0.2s;
                border: none;
            }
            
            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            }
            
            .whatsapp-float {
                position: fixed !important;
                bottom: 80px !important;
                right: 30px !important;
                z-index: 9999 !important;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #25D366;
                color: white;
                border-radius: 50%;
                width: 70px;
                height: 70px;
                text-decoration: none;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
                transition: all 0.3s ease;
            }

            .whatsapp-float:hover {
                background-color: #128C7E;
                box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
                transform: translateY(-2px);
            }

            .whatsapp-float i {
                font-size: 36px;
            }

            .whatsapp-float::after {
                content: "";
                position: absolute;
                z-index: -1;
                left: -5px;
                right: -5px;
                bottom: -5px;
                top: -5px;
                background-color: #25D366;
                border-radius: 50%;
                opacity: 0;
                animation: pulse 2s infinite;
            }

            @keyframes pulse {
                0% {
                    transform: scale(0.95);
                    opacity: 0.7;
                }
                70% {
                    transform: scale(1.1);
                    opacity: 0.2;
                }
                100% {
                    transform: scale(0.95);
                    opacity: 0.7;
                }
            }

            @media (max-width: 767px) {
                .whatsapp-float {
                    width: 60px;
                    height: 60px;
                    bottom: 60px !important;
                    right: 20px !important;
                }
                .whatsapp-float i {
                    font-size: 30px;
                }
            }

            /* تنسيق زر البحث */
            .btn-outline-dark {
                background-color: white !important;
                border: 1px solid black !important;
                color: black !important;
            }

            .btn-outline-dark:hover {
                background-color: black !important;
                color: white !important;
            }
        </style>
        @yield('styles')
    </head>
    <body>
        <!-- Header -->
        <nav class="navbar navbar-expand-lg" style="background-color: white !important; box-shadow: 0 2px 4px rgba(0,0,0,.1);">
            <div class="container">
                <a class="navbar-brand" href="{{ route('shop.index') }}" style="color: black !important;">
                    <i class="fas fa-leaf me-2" style="color: black;"></i>متجر ترياق
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
                        style="border-color: black;">
                    <span class="navbar-toggler-icon" style="background-color: black;"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" style="color: black !important;" href="{{ route('index') }}">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black !important;" href="{{ route('shop.index') }}">المنتجات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black !important;" href="{{ route('socialmedia') }}">تواصل معانا </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black !important;" href="{{ route('sizeshart') }}">جدول المقاسات</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="" method="GET">
                        <input class="form-control me-2" type="search" name="query" placeholder="ابحث عن منتج" 
                               style="border-color: black; color: black; background-color: white;" aria-label="Search">
                        <button class="btn btn-outline-dark" type="submit" style="border-color: black; color: black;">بحث</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="container mt-5">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer mt-5 py-4" style="background-color: white !important; color: black !important;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h5 style="color: black;"><i class="fas fa-leaf me-2"></i>متجر ترياق</h5>
                        <p style="color: black;">نقدم أفضل المنتجات الطبيعية والعشبية لصحتك ورفاهيتك.</p>
                    </div>
                    <div class="col-md-4">
                        <h5 style="color: black;">روابط سريعة</h5>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('shop.index') }}" style="color: black !important;">الرئيسية</a></li>
                            <li><a href="{{ route('shop.index') }}" style="color: black !important;">المنتجات</a></li>
                            <li><a href="{{ route('socialmedia') }}" style="color: black !important;">تواصل معانا</a></li>
                            <li><a href="{{ route('sizeshart') }}" style="color: black !important;">جدول المقاسات</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5 style="color: black;">تواصل معنا</h5>
                        <p style="color: black;"><i class="fas fa-envelope me-2"></i>info@teryaq.com</p>
                        <p style="color: black;"><i class="fas fa-phone me-2"></i>01508092004</p>
                    </div>
                </div>
                <hr style="background-color: black;">
                <div class="text-center">
                    <p style="color: black;">&copy; 2025متجر ترياق. جميع الحقوق محفوظة.</p>
                </div>
            </div>
        </footer>

        <!-- WhatsApp Floating Icon -->
        <a href="https://wa.me/201508092004" class="whatsapp-float" target="_blank">
            <i class="fab fa-whatsapp"></i>
        </a>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        @yield('scripts')
    </body>
</html>