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
                background-color: white !important;
                padding: 15px 0;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            }
            
            .nav-wrapper {
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
            }
            
            .navbar-brand {
                color: #333 !important;
                font-size: 24px !important;
                margin: 0 !important;
                padding: 0 !important;
            }
            
            .nav-icons {
                display: flex;
                align-items: center;
                gap: 15px;
            }
            
            .nav-icons button,
            .nav-icons a {
                background: none;
                border: none;
                color: #333 !important;
                font-size: 18px;
                padding: 5px;
            }
            
            .navbar-collapse {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                padding: 15px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                z-index: 1000;
            }
            
            .nav-link {
                color: #333 !important;
                text-align: right;
                padding: 10px 15px;
            }
            
            .search-bar {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                padding: 15px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                z-index: 1000;
            }
            
            .search-bar .form-control {
                border-radius: 20px 0 0 20px;
            }
            
            .search-bar .btn {
                border-radius: 0 20px 20px 0;
                border-color: #2E8B57;
                color: #2E8B57;
            }
            
            .search-bar .btn:hover {
                background-color: #2E8B57;
                color: white;
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

            /* إضافة هذه الأنماط إلى قسم الـ styles */
            /* ستايل زر المنيو */
            .menu-btn {
                background: none;
                border: none;
                padding: 8px;
                cursor: pointer;
                display: flex;
                flex-direction: column;
                gap: 6px;
                width: 35px;
            }

            .menu-btn span {
                display: block;
                width: 100%;
                height: 2px;
                background-color: #333;
                transition: all 0.3s ease;
                border-radius: 2px;
            }

            /* ستايل أيقونات الموبايل */
            .mobile-icons {
                display: flex;
                align-items: center;
                gap: 15px;
            }

            .mobile-icons button,
            .mobile-icons a {
                background: none;
                border: none;
                padding: 5px;
                color: #333;
                font-size: 18px;
            }

            /* ستايل البحث في الموبايل */
            .mobile-search {
                width: 100%;
                padding: 10px 0;
            }

            .mobile-search .form-control {
                border-radius: 20px 0 0 20px;
            }

            .mobile-search .btn {
                border-radius: 0 20px 20px 0;
            }

            /* تنسيق البراند في الموبايل */
            @media (max-width: 991px) {
                .navbar-brand {
                    margin: 0 !important;
                    font-size: 24px !important;
                }

                .mobile-header {
                    padding: 10px 0;
                }

                .navbar {
                    padding: 0 !important;
                }

                #navbarNav {
                    position: absolute;
                    top: 100%;
                    left: 0;
                    right: 0;
                    background: white;
                    padding: 15px;
                    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                    z-index: 1000;
                }

                .nav-item {
                    margin: 10px 0;
                    text-align: right;
                }
            }
        </style>
        @yield('styles')
    </head>
    <body>
        <!-- Header -->
        <nav class="navbar">
            <div class="container">
                <div class="nav-wrapper">
                    <!-- زر المنيو -->
                    <button class="menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <!-- البراند في النص -->
                    <a class="navbar-brand" href="{{ route('shop.index') }}">
                        TRYAQ
                    </a>

                    <!-- أيقونات البحث والسلة -->
                    <div class="nav-icons">
                        <button class="search-toggle">
                            <i class="fas fa-search"></i>
                        </button>
                        <a href="{{ route('shop.index')}}" class="cart-icon">
                            <i class="fas fa-shopping-bag"></i>
                        </a>
                    </div>
                </div>

                <!-- شريط البحث -->
                <div class="search-bar collapse">
                    <form class="d-flex" action="" method="GET">
                        <input class="form-control" type="search" name="query" placeholder="ابحث عن منتج">
                        <button class="btn btn-outline-light" type="submit">بحث</button>
                    </form>
                </div>
            

                <!-- القائمة المنسدلة -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shop.index') }}">PRODUCTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('socialmedia') }}">CONTACT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sizeshart') }}"> SIZES CHART</a>
                        </li>
                    </ul>
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
                        <h5 style="color: black;"><i class="fas fa-leaf me-2"></i>TRYAQ STORE</h5>
                        <p style="color: black;">We offer the best natural and herbal products for your health and well-being.</p>
                    </div>
                    <div class="col-md-4">
                        <h5 style="color: black;"> LINKS</h5>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('shop.index') }}" style="color: black !important;">HOME</a></li>
                            <li><a href="{{ route('shop.index') }}" style="color: black !important;">PRODUCTS</a></li>
                            <li><a href="{{ route('socialmedia') }}" style="color: black !important;">CONTACT US</a></li>
                            <li><a href="{{ route('sizeshart') }}" style="color: black !important;">SIZES CHART</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5 style="color: black;">CONTACT US</h5>
                        <p style="color: black;"><i class="fas fa-envelope me-2"></i>info@teryaq.com</p>
                        <p style="color: black;"><i class="fas fa-phone me-2"></i>01508092004</p>
                    </div>
                </div>
                <hr style="background-color: black;">
                <div class="text-center">
                    <p style="color: black;">&copy; 2025Teryaq Store. All rights reserved.</p>
                </div>
            </div>
        </footer>

        <!-- WhatsApp Floating Icon -->
        <a href="https://wa.me/201508092004" class="whatsapp-float" target="_blank">
            <i class="fab fa-whatsapp"></i>
        </a>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.min.css"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.min.css"></script>
        <script>
            // إضافة الجافاسكربت
document.addEventListener('DOMContentLoaded', function() {
    const searchToggle = document.querySelector('.search-toggle');
    const searchBar = document.querySelector('.search-bar');
    
    if(searchToggle && searchBar) {
        searchToggle.addEventListener('click', function() {
            searchBar.classList.toggle('show');
        });
    }

    // إغلاق القوائم عند النقر خارجها
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.navbar')) {
            searchBar.classList.remove('show');
            document.querySelector('#navbarNav').classList.remove('show');
        }
    });
            });
        </script>
        @yield('scripts')
    </body>
</html>