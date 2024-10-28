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
                --primary-color: #2E8B57;
                --secondary-color: #98FB98;
                --accent-color: #006400;
            }
            
            body {
                font-family: 'Tajawal', sans-serif;
                background-color: #F0FFF0;
            }
            
            .navbar {
                background-color: var(--primary-color);
            }
            
            .navbar-brand {
                font-size: 2rem;
                font-weight: bold;
                color: white !important;
            }
            
            .nav-link {
                color: white !important;
                font-weight: 500;
            }
            
            .card {
                transition: transform 0.2s, box-shadow 0.2s;
                border: none;
            }
            
            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            }
            
            .footer {
                background-color: var(--primary-color);
                color: white;
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
        </style>
        @yield('styles')
    </head>
    <body>
        <!-- Header -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('shop.index') }}">
                    <i class="fas fa-leaf me-2"></i>متجر ترياق
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('index') }}">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('products*') ? 'active' : '' }}" href="{{ route('shop.index') }}">المنتجات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('socialmedia') }}">تواصل معانا </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sizeshart') }}">جدول المقاسات</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="" method="GET">
                        <input class="form-control me-2" type="search" name="query" placeholder="ابحث عن منتج" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">بحث</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="container mt-5">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer mt-5 py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h5><i class="fas fa-leaf me-2"></i>متجر ترياق</h5>
                        <p>نقدم أفضل المنتجات الطبيعية والعشبية لصحتك ورفاهيتك.</p>
                    </div>
                    <div class="col-md-4">
                        <h5>روابط سريعة</h5>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('shop.index') }}" class="text-white">الرئيسية</a></li>
                            <li><a href="{{ route('shop.index') }}" class="text-white">المنتجات</a></li>
                            <li><a href="{{ route('socialmedia') }}" class="text-white">تواصل معانا</a></li>
                            <li><a href="{{ route('sizeshart') }}" class="text-white">جدول المقاسات</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5>تواصل معنا</h5>
                        <p><i class="fas fa-envelope me-2"></i>info@teryaq.com</p>
                        <p><i class="fas fa-phone me-2"></i>01508092004</p>
                    </div>
                </div>
                <hr class="bg-white">
                <div class="text-center">
                    <p>&copy; 2025متجر ترياق. جميع الحقوق محفوظة.</p>
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