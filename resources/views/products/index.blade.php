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
            font-size: 2.5rem;
            font-weight: bold;
            color: white !important;
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
            background-color: var(--primary-color);
            color: white;
        }
        
        .footer a {
            color: var(--secondary-color) !important;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-leaf me-2"></i>ترياق
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="{{ route('products.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> إضافة منتج جديد
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">
                            <i class="fas fa-shopping-cart"></i> الطلبات
                        </a>
                    </li>
                </ul>
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
                            <p class="card-text">السعر: {{ number_format($product->price, 2) }} ج.م</p>
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
                    <h5><i class="fas fa-leaf me-2"></i>ترياق</h5>
                    <p>نقدم أفضل المنتجات الطبيعية والعشبية لصحتك ورفاهيتك.</p>
                </div>
                <div class="col-md-4">
                    <h5>روابط سريعة</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">الرئيسية</a></li>
                        <li><a href="#">المنتجات</a></li>
                        <li><a href="#">من نحن</a></li>
                        <li><a href="#">اتصل بنا</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>تواصل معنا</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-phone me-2"></i>123-456-7890</li>
                        <li><i class="fas fa-envelope me-2"></i>info@teryaq.com</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i>القاهرة، مصر</li>
                    </ul>
                </div>
            </div>
            <hr class="mt-4 bg-light">
            <div class="text-center mt-3">
                <p>&copy; 2023 ترياق. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>