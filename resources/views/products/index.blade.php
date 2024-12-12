<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ترياق - المنتجات الطبيعية</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap');
        
        :root {
            --primary-color: #000000;
            --secondary-color: #ffffff;
            --accent-color: #000000;
        }
        
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #F0FFF0;
        }
        
        .navbar {
            background-color: white;
            padding: 10px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            width: 100%;
        }
        
        .navbar-brand {
            font-size: 2.5rem;
            font-weight: bold;
            color: white !important;
        }
        
        .navbar-dark .navbar-nav .nav-link {
            color: black !important;
        }
        
        .btn-outline-dark {
            padding: 8px 15px;
            font-size: 14px;
            border: 1.5px solid #333;
            border-radius: 4px;
            color: #333;
            background: white;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        
        .btn-outline-dark:hover {
            background-color: #333;
            color: white;
        }
        
        .nav-link {
            color: white !important;
            font-weight: 500;
        }
        
        .btn-success {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }
        
        .card {
            transition: transform 0.2s, box-shadow 0.2s;
            border: none;
            background-color: white;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        
        .footer {
            background-color: #F0FFF0;
            color: rgb(0, 0, 0);
        }
        
        .footer a {
            color: var(--secondary-color) !important;
        }
        
        .nav-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo-container {
            text-align: center;
            flex: 1;
        }

        .logo-image {
            width: 120px;
            height: auto;
            object-fit: contain;
        }

        .nav-button {
            flex: 0 0 200px;
            display: flex;
            justify-content: center;
        }

        /* التجاوب مع الشاشات الصغيرة */
        @media (max-width: 768px) {
            .nav-wrapper {
                flex-direction: row;
                padding: 10px;
            }
            
            .nav-button {
                flex: 0 0 auto;
            }
            
            .btn-outline-dark {
                padding: 6px 12px;
                font-size: 12px;
            }
            
            .logo-image {
                width: 80px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar">
        <div class="container">
            <div class="nav-wrapper">
                <!-- زر إضافة منتج -->
                <div class="nav-button right-button">
                    <a href="{{ route('products.create') }}" class="btn btn-outline-dark">
                        <i class="fas fa-plus me-2"></i>
                        <span>إضافة منتج جديد</span>
                    </a>
                </div>

                <!-- اللوجو -->
                <div class="logo-container">
                    <a class="navbar-brand" href="{{ route('shop.index') }}">
                        <img src="{{ asset('images/WhatsApp Image 2024-11-08 at 20.55.57_4faa0618.jpg') }}" 
                             alt="Teryaq Logo" 
                             class="logo-image">
                    </a>
                </div>

                <!-- زر الطلبات -->
                <div class="nav-button left-button">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-dark">
                        <i class="fas fa-shopping-cart me-2"></i>
                        <span>��لطلبات</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card h-100 shadow">
                        <img src="{{ asset('/storage/' . $product->{'image-1'}) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">السعر قبل التخفيض: {{ number_format($product->{'discount_price'}, 2) }} ج.م</p>
                            <p class="card-text">السعر بعد التخفيض: {{ number_format($product->price, 2) }} ج.م</p>
                            <p class="card-text">المخزون: {{ $product->stock }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-primary" title="عرض">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-secondary" title="تعديل">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="حذف" onclick="return confirm('هل أنت متأكد من حذف هذا المنتج؟')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-5 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Teryaq</h5>
                    <p>We provide the best natural and herbal products for your health and  </p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-phone me-2"></i>123-456-7890</li>
                        <li><i class="fas fa-envelope me-2"></i>info@teryaq.com</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i>Cairo, Egypt</li>
                    </ul>
                </div>
            </div>
            <hr class="mt-4 bg-light">
            <div class="text-center mt-3">
                <p>&copy; 2023 Teryaq. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>