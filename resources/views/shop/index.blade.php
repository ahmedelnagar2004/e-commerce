<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>متجر ترياق - المنتجات الطبيعية</title>
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
        
        .card {
            position: relative;
            overflow: hidden;
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

        .btn-details {
            background-color: var(--primary-color);
            color: white;
            border: 2px solid var(--primary-color);
            border-radius: 25px;
            padding: 8px 20px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-details:hover {
            background-color: white;
            color: var(--primary-color);
        }

        .card-footer {
            background-color: transparent;
            border-top: none;
            padding-top: 0;
        }
        .discounted-price {
    text-decoration: line-through;
    color: red;
}

        .card-img-wrapper {
            position: relative;
        }

        .sale-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #e41e31;
            color: white;
            padding: 5px 10px;
            font-size: 0.9rem;
            font-weight: bold;
            border-radius: 4px;
            z-index: 10;
            transform: rotate(-5deg);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-leaf me-2"></i>متجر ترياق
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('shop.index') }}">المنتجات</a>
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
    <div class="container mt-5">
        <h1 class="text-center mb-4">منتجاتنا الطبيعية</h1>
        <div class="row row-cols-2 row-cols-md-3 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-img-wrapper">
                            <a href="{{ route('shop.show', $product->id) }}">
                                <img src="{{ asset('storage/' . $product->{'image-1'}) }}" class="card-img-top" alt="{{ $product->name }}">
                            </a>
                            @if($product->original_price && $product->original_price > $product->price)
                                @php
                                    $discount = round((($product->original_price - $product->price) / $product->original_price) * 100);
                                @endphp
                                <span class="sale-badge">خصم {{ $discount }}٪</span>
                            @endif
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <b><span style="text-decoration: line-through; color: #b0b0b0;">1000 ج.م</span></b>

                            <p class="card-text fw-bold text-success">{{ number_format($product->price, 2) }} ج.م</p>
                            <b><p>{{$product->description}}</p></b>
                            @if($product->original_price && $product->original_price > $product->price)
                                <p class="card-text">
                                    <span class="discounted-price">{{ number_format($product->original_price, 2) }} ج.م</span>
                                </p>
                            @endif
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
                    <h5><i class="fas fa-leaf me-2"></i>متجر ترياق</h5>
                    <p>نقدم أفضل المنتجات الطبيعية والعشبية لص</p>
                </div>
                <!-- Add more footer content if needed -->
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
