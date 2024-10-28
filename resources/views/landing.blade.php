@extends('layouts.app')

@section('title', 'متجر ترياق - أفضل الملابس الطبيعية')

@section('content')
<div class="landing-page">
    <section class="hero">
        <div class="container">
            <h1>اكتشف جمال الملابس الطبيعية</h1>
            <p class="lead">في متجر ترياق، نقدم لك أفضل الملابس المصنوعة من مواد طبيعية 100%</p>
            <a href="{{ route('shop.index') }}" class="btn btn-primary btn-lg">تسوق الآن</a>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <div class="feature-grid">
                <div class="feature-item">
                    <i class="fas fa-leaf"></i>
                    <h3>مواد طبيعية</h3>
                    <p>نستخدم فقط أجود المواد الطبيعية لضمان الراحة والجودة</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-tshirt"></i>
                    <h3>تصاميم عصرية</h3>
                    <p>مجموعة متنوعة من الأزياء العصرية لجميع الأذواق</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-shipping-fast"></i>
                    <h3>شحن سريع</h3>
                    <p>نضمن وصول طلبك بسرعة وأمان</p>
                </div>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="container">
            <h2>انضم إلى عائلة ترياق</h2>
            <p>احصل على خصم 10% على أول طلب لك عند الاشتراك في نشرتنا البريدية</p>
            <form class="newsletter-form">
                <input type="email" placeholder="أدخل بريدك الإلكتروني" required>
                <button type="submit" class="btn btn-primary">اشترك الآن</button>
            </form>
        </div>
    </section>
</div>
@endsection

@section('styles')
<style>
    .landing-page {
        font-family: 'Tajawal', sans-serif;
        color: #333;
    }

    .hero {
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset("images/hero-bg.jpg") }}');
        background-size: cover;
        background-position: center;
        color: #fff;
        text-align: center;
        padding: 150px 0;
    }

    .hero h1 {
        font-size: 3.5rem;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }

    .hero .lead {
        font-size: 1.5rem;
        margin-bottom: 30px;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    }

    .btn-primary {
        background-color: #4CAF50;
        border: none;
        padding: 12px 30px;
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #45a049;
        transform: translateY(-2px);
    }

    .features {
        padding: 100px 0;
        background-color: #f9f9f9;
    }

    .feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
    }

    .feature-item {
        text-align: center;
        padding: 30px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .feature-item:hover {
        transform: translateY(-5px);
    }

    .feature-item i {
        font-size: 3rem;
        color: #4CAF50;
        margin-bottom: 20px;
    }

    .cta {
        background-color: #4CAF50;
        color: #fff;
        padding: 100px 0;
        text-align: center;
    }

    .cta h2 {
        font-size: 2.5rem;
        margin-bottom: 20px;
    }

    .newsletter-form {
        display: flex;
        justify-content: center;
        margin-top: 30px;
    }

    .newsletter-form input[type="email"] {
        width: 300px;
        padding: 12px;
        border: none;
        border-radius: 25px 0 0 25px;
        font-size: 1rem;
    }

    .newsletter-form button {
        border-radius: 0 25px 25px 0;
        padding: 12px 30px;
    }
</style>
@endsection