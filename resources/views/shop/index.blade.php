@extends('layouts.app')

@section('title', 'المنتجات - متجر ترياق')

@section('content')
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
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title product-name">{{ $product->name }}</h5>
                        <p class="card-text fw-bold">{{ number_format($product->price, 2) }} ج.م</p>
                        <p class="card-text discounted-price">{{ number_format($product->{'discount_price'}, 2) }} ج.م</p>
                    </div>
                </div>
            </div>
        @endforeach
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
        border: none;
        background-color: transparent;
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

    .card-body {
        padding: 1rem 0;
    }

    .card-title {
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .card-text {
        color: #000;
        margin-bottom: 0.25rem;
    }

    .original-price {
        color: #888;
        font-size: 0.9em;
    }
    .card-title.product-name {
       font-weight: bold;
       margin-bottom: 0.5rem;
       display: inline-block;
       border-bottom: 3px solid #000000;
       padding-bottom: 2px;
   }
</style>
@endsection
