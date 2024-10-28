<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title', 'متجر ترياق - المنتجات الطبيعية')</title>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@400;700&display=swap" rel="stylesheet">
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
                font-family: 'Noto Naskh Arabic', serif;
                background-color: #F0FFF0;
            }
              
            
            
            .navbar {
                padding: 1rem 2rem;
                background-color: white;
            }

            .navbar .container-fluid {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .navbar-brand {
                order: 2;
                margin: 0 !important;
            }

            .nav-icons {
                display: flex;
                gap: 15px;
                order: 1;
            }

            .navbar-brand {
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
            }

            .nav-link {
                color: #000;
                font-size: 0.9rem;
                padding: 0.5rem 1rem;
            }

            .nav-icons a {
                color: #000;
                font-size: 1.2rem;
            }

            @media (max-width: 991.98px) {
                .navbar-brand {
                    position: static;
                    transform: none;
                }
            }

            .shop-now-btn {
                color: #000 !important;
                text-decoration: none;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }
            
            .shop-now-btn::after {
                content: "▼";
                font-size: 0.8rem;
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

            /* أضف هذه الأنماط مع الـ CSS السابق */
            .search-modal {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(255, 255, 255, 0.98);
                z-index: 1000;
                display: none;
            }

            .search-modal.active {
                display: block;
            }

            .search-container {
                position: relative;
                max-width: 600px;
                margin: 100px auto;
                padding: 20px;
            }

            .search-input {
                width: 100%;
                padding: 15px;
                font-size: 1.2rem;
                border: none;
                border-bottom: 2px solid #000;
                background: transparent;
                outline: none;
                text-align: right;
            }

            .close-search {
                position: absolute;
                top: 20px;
                right: 20px;
                font-size: 24px;
                cursor: pointer;
                color: #000;
            }

            .search-results {
                margin-top: 20px;
            }

            .navbar {
                padding: 1rem 2rem;
            }

            .nav-link {
                font-weight: 500;
                text-transform: uppercase;
                letter-spacing: 1px;
            }

            .nav-icons a {
                color: #000;
                font-size: 1.2rem;
            }

            .badge {
                font-size: 0.6rem;
                padding: 0.25em 0.4em;
            }

            /* ستايل القائمة الأساسي */
            .navbar {
                padding: 1rem 2rem;
                background-color: white;
            }

            .navbar .container-fluid {
                justify-content: space-between;
            }

            .navbar-brand {
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
            }

            /* ستايل القائمة في الشاشات الكبيرة */
            @media (min-width: 992px) {
                .navbar-collapse {
                    display: none !important;
                }
                
                .navbar-toggler {
                    display: none;
                }
                
                /* إظهار الروابط أفقياً */
                .nav-links-desktop {
                    display: flex !important;
                    gap: 1rem;
                }
            }

            /* ستايل القائمة في الموبايل */
            @media (max-width: 991.98px) {
                .navbar-brand {
                    position: static;
                    transform: none;
                }
                
                .navbar-collapse {
                    position: absolute;
                    top: 100%;
                    left: 0;
                    right: 0;
                    background-color: white;
                    padding: 1rem;
                    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                }
                
                .navbar-nav {
                    gap: 0.5rem;
                }
                
                .nav-item {
                    border-bottom: 1px solid #eee;
                }
                
                .nav-item:last-child {
                    border-bottom: none;
                }
                
                .nav-link {
                    padding: 0.8rem 0;
                }
            }

            /* ستايل عام للروابط */
            .nav-link {
                color: #000;
                font-size: 0.9rem;
                transition: color 0.3s;
            }

            .nav-link:hover {
                color: var(--primary-color);
            }

            .nav-icons a {
                color: #000;
                font-size: 1.2rem;
            }

            .nav-icons {
                display: flex;
                gap: 15px;
                order: 1;
            }

            .navbar-brand {
                order: 2;
                margin: 0 !important;
            }

            .nav-links {
                display: flex;
                gap: 15px;
                order: 3;
            }

            /* للموبايل */
            @media (max-width: 991.98px) {
                .nav-links {
                    display: none;
                }
                
                .navbar-toggler {
                    order: 3;
                }
            }

            .nav-icons a {
                color: #000;
                font-size: 1.2rem;
                text-decoration: none;
            }

            .nav-link {
                color: #000;
                text-decoration: none;
            }

            .nav-icons {
                display: flex;
                gap: 15px;
            }

            .nav-links {
                display: flex;
                gap: 20px;
            }

            .navbar-brand {
                margin: 0 !important;
            }

            .nav-link {
                color: #000;
                text-decoration: none;
                font-size: 0.9rem;
            }

            .nav-icons a {
                color: #000;
                font-size: 1.2rem;
                text-decoration: none;
            }

            /* ستايل قائمة الموبايل */
            .mobile-nav-links {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }

            .mobile-nav-links .nav-link {
                padding: 10px 0;
                border-bottom: 1px solid #eee;
            }

            .offcanvas {
                width: 250px;
            }

            /* ستايل النافبار */
            .navbar {
                background-color: #000 !important;
                padding: 1rem 2rem;
            }

            /* ستايل الروابط */
            .nav-link {
                color: #fff !important;
                text-decoration: none;
                font-size: 0.9rem;
                transition: all 0.3s ease;
            }

            .nav-link:hover {
                color: #28a745 !important; /* لون أخضر عند الhover */
                transform: translateY(-2px);
            }

            /* ستايل الأيقونات */
            .nav-icons a {
                color: #fff !important;
                font-size: 1.2rem;
                text-decoration: none;
                transition: all 0.3s ease;
            }

            .nav-icons a:hover {
                color: #28a745 !important;
                transform: scale(1.1);
            }

            /* ستايل زر المنيو للموبايل */
            .navbar-toggler {
                border-color: #fff !important;
            }

            .navbar-toggler-icon {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
            }

            /* ستايل قائمة الموبايل */
            .offcanvas {
                background-color: #000;
            }

            .offcanvas-title {
                color: #fff;
            }

            .btn-close {
                filter: invert(1) grayscale(100%) brightness(200%);
            }

            .mobile-nav-links .nav-link {
                padding: 10px 0;
                border-bottom: 1px solid #333;
            }

            /* ستايل البادج (رقم العربة) */
            .badge {
                background-color: #28a745 !important;
            }

            /* ستايل اللوجو */
            .navbar-brand img {
                filter: brightness(0) invert(1); /* لتحويل اللوجو للون الأبيض */
                transition: all 0.3s ease;
            }

            .navbar-brand:hover img {
                transform: scale(1.05);
            }

            /* لخط نوتو */
            body {
                font-family: 'Noto Naskh Arabic', serif;
            }

            /* أو لخط أميري */
            body {
                font-family: 'Amiri', serif;
            }

            .logo {
                color: #ffffff; /* أو يمكنك استخدام white */
                font-family: 'Amiri', serif;
                font-size: 48px; /* يمكنك تعديل حجم الخط حسب الحاجة */
                text-align: center;
            }
        </style>
        @yield('styles')
    </head>
    <body>
        <!-- Header -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <!-- الروابط على اليسار (تظهر فقط في الشاشات الكبيرة) -->
                <div class="nav-links d-none d-lg-flex">
                    <a class="nav-link" href="{{ route('index') }}">الرئيسية</a>
                    <a class="nav-link" href="{{ route('shop.index') }}">المنتجات</a>
                    <a class="nav-link" href="{{ route('socialmedia') }}">تواصل معنا</a>
                    <a class="nav-link" href="{{ route('sizeshart') }}">جدول المقاسات</a>
                </div>

                <!-- زر المنيو للموبايل (يظهر فقط في الشاشات الصغيرة) -->
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- اللوجو في المنتصف -->
                <a class="navbar-brand" href="{{route('shop.index')}}">
                   <b> ترياق</b>
                </a>

                <!-- أيقونات البحث والعربة على اليمين -->
                <div class="nav-icons">
                    <a href="#" onclick="openSearch()" class="search-icon">
                        <i class="fas fa-search"></i>
                    </a>
                    <a href="#" class="cart-icon position-relative">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                            0
                        </span>
                    </a>
                </div>
            </div>
        </nav>

        <!-- قائمة الموبايل المنسدلة -->
        <div class="offcanvas offcanvas-start" id="mobileMenu">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">القائمة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <div class="mobile-nav-links">
                    <a class="nav-link" href="{{ route('index') }}">الرئيسية</a>
                    <a class="nav-link" href="{{ route('shop.index') }}">المنتجات</a>
                    <a class="nav-link" href="{{ route('socialmedia') }}">تواصل معنا</a>
                    <a class="nav-link" href="{{ route('sizeshart') }}">جدول المقاسات</a>
                </div>
            </div>
        </div>

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
                    <p>&copy; 2025متجر تريا. ميع الحقوق محفوظة.</p>
                </div>
            </div>
        </footer>

        <!-- WhatsApp Floating Icon -->
        <a href="https://wa.me/201508092004" class="whatsapp-float" target="_blank">
            <i class="fab fa-whatsapp"></i>
        </a>

        <!-- Search Modal -->
        <div class="search-modal" id="searchModal">
            <div class="close-search" onclick="closeSearch()">
                <i class="fas fa-times"></i>
            </div>
            <div class="search-container">
                <form action="{{ route('shop.index') }}" method="GET">
                    <input type="text" 
                           class="search-input" 
                           placeholder="ابحث عن منتج..." 
                           name="search" 
                           id="searchInput"
                           autocomplete="off">
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        @yield('scripts')

        <script>
            // دالة فتح البحث
            function openSearch() {
                document.getElementById('searchModal').classList.add('active');
                document.getElementById('searchInput').focus();
                document.body.style.overflow = 'hidden';
            }

            // دالة إغلاق البحث
            function closeSearch() {
                document.getElementById('searchModal').classList.remove('active');
                document.body.style.overflow = 'auto';
            }

            // إغلاق البحث عند الضغط على ESC
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    closeSearch();
                }
            });
        </script>
    </body>
</html>
