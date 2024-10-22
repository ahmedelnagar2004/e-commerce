<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title', 'متجر ترياق - المنتجات الطبيعية')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('shop.index') }}">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('products*') ? 'active' : '' }}" href="{{ route('shop.index') }}">المنتجات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">من نحن</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">اتصل بنا</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="{{ route('shop.search') }}" method="GET">
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
                            <li><a href="#" class="text-white">من نحن</a></li>
                            <li><a href="#" class="text-white">اتصل بنا</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5>تواصل معنا</h5>
                        <p><i class="fas fa-envelope me-2"></i>info@teryaq.com</p>
                        <p><i class="fas fa-phone me-2"></i>+20 123 456 7890</p>
                    </div>
                </div>
                <hr class="bg-white">
                <div class="text-center">
                    <p>&copy; 2023 متجر ترياق. جميع الحقوق محفوظة.</p>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        @yield('scripts')
    </body>
</html>
