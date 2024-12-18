@extends('layouts.app')

@section('title', 'المنتجات - متجر ترياق')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4"> COLLECTION</h1>
    <div class="row row-cols-2 row-cols-md-3 g-4">
        @if ($products->count() > 0)
            
       
        @foreach ($products as $product)
            <div class="col">
                <div class="card h-100">
                    <div class="card-img-wrapper">
                        <!-- Description Badge (replacing sale badge) -->
                        <div class="description-badge">{{ $product->description }}</div>
                        
                        <a href="{{ route('shop.show', $product->id) }}">
                            <img src="{{ Storage::url($product['image-1']) }}" class="card-img-top" alt="{{ $product->name }}">
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <!-- Product Name -->
                        <h5 class="card-title product-name">{{ $product->name }}</h5>
                        
                        <!-- Current Price -->
                        <p class="card-text fw-bold">{{ number_format($product->price, 2) }}L.E</p>
                        
                        <!-- Original Price -->
                        <p class="card-text discounted-price">{{ number_format($product['discount_price'], 2) }}L.E</p>
                    </div>
                </div>
            </div>
        @endforeach
        @else
        <div class="col" style="display: flex; justify-content: center; align-items: center; height: 100%;">
            <div class="card h-100" style="display: flex; justify-content: center; align-items: center; height: 100%;">
                <div class="card-body text-center" style="display: flex; justify-content: center; align-items: center; height: 100%;">
                    <h5 class="card-title" style="text-align: center;">NO PRODUCTS FOUND</h5>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap');
    
    :root {
        --primary-color: #2E8B57;
        --secondary-color: #98FB98;
        --accent-color: #006400;
    }
    
    body {
        font-family: 'Tajawal', sans-serif;
        background-color: #fafafa;
    }
    
    .navbar {
        background-color: var(--primary-color);
    }
    
    .navbar-brand {
        font-size: 24px !important;
        font-weight: bold !important;
        color: #333 !important; /* لون أسود للنص */
        margin: 0 !important;
        padding: 0 !important;
        display: block !important; /* تأكيد الظهور */
        visibility: visible !important; /* تأكيد الرؤية */
        opacity: 1 !important; /* تأكيد الشفافية */
        z-index: 1000 !important; /* تأكيد أنه فوق العناصر الأخرى */
    }
    
    .card {
        border: none;
        background-color: white;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    
    .card-img-top {
        height: 300px;
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
        color: #999; /* لون رمادي خفيف */
        font-size: 0.9em; /* حجم خط أصغر قليلاً */
    }

    .card-img-wrapper {
        position: relative;
        overflow: hidden;
    }

    .description-badge {
        position: absolute;
        top: 20px;
        left: -60px;
        background: rgba(0, 0, 0, 0.9);
        color: #ffffff;
        width: 200px;
        padding: 5px 0;
        text-align: center;
        transform: rotate(-45deg);
        transform-origin: center;
        font-size: 0.85rem;
        font-weight: 600;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        animation: fadeInRotateLeft 0.5s ease-out;
    }

    @keyframes fadeInRotateLeft {
        from {
            opacity: 0;
            transform: rotate(-45deg) translateY(-100px);
        }
        to {
            opacity: 1;
            transform: rotate(-45deg) translateY(0);
        }
    }

    .card-body {
        padding: 1rem 0;
    }

    .card-title {
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .card-text {
        background-color: #000;
        color: #fff;
        padding: 8px;
        border-radius: 5px;
        margin: 10px 0;
    }

    .card-text.fw-bold,
    .card-text.discounted-price {
        background-color: transparent;
        color: #000;
    }

    .p.card-text:not(.fw-bold):not(.discounted-price) {
        background-color: #000;
        color: #fff;
        padding: 8px;
        border-radius: 5px;
        margin: 10px 0;
    }

    .original-price {
        color: #888;
        font-size: 0.9em;
    }
    .card-title.product-name {
       font-weight: bold;
       margin-bottom: 0.5rem;
       display: inline-block;
       border-bottom: 1px solid #999999;
       padding-bottom: 2px;
   }

    /* تأكيد أن الحاوية الرئيسية للناف بار تعرض العناصر بشكل صحيح */
    .nav-wrapper {
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        width: 100% !important;
    }

    .description-text {
        background-color: #000;
        color: #fff;
        padding: 5px 15px;
        border-radius: 20px;
        margin: 5px auto 15px;  /* تعديل الهوامش */
        display: inline-block;
        font-size: 0.9rem;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        max-width: 80%;
    }
</style>
@endsection