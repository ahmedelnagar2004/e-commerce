@extends('layouts.app')
 @section('content')
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Carousel Template · Bootstrap v5.0</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    

    <!-- Bootstrap core CSS -->
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<meta name="theme-color" content="#7952b3">

    <!-- إضافة خط عربي من Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@700&display=swap" rel="stylesheet">

    <!-- إضافة CSS مخصص -->
    <style>
        .brand-arabic {
            font-family: 'Noto Naskh Arabic', serif;
            font-size: 2rem;
            font-weight: 700;
            color: white;
            text-decoration: none;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .brand-arabic:hover {
            color: #f8f9fa;
        }

        /* تعديل موضع زر القائمة المنسدلة */
        .navbar-toggler {
            order: -1;
        }

        /* تعديل موضع عربة التسوق */
        .btn-outline-light {
            margin-left: auto;
        }

        @media (max-width: 767.98px) {
            .brand-arabic {
                font-size: 1.5rem;
            }
        }
    </style>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
    
<header>


<main>

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('images/WhatsApp Image 2024-10-28 at 15.34.12_a27eedb8.jpg') }}" class="bd-placeholder-img w-100" style="object-fit: cover; height: 100vh;" alt="First slide">

        <div class="container">
          <div class="carousel-caption text-start">
            <h1>WELCOME TO OUR STORE</h1>
            <p>PURCHASE THE BEST QUALITY PRODUCTS</p>
            <p><a class="btn btn-lg btn-primary" href="{{ route('shop.index') }}">START SHOPPING</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/WhatsApp Image 2024-10-28 at 15.34.12_a27eedb8.jpg') }}" class="bd-placeholder-img w-100" style="object-fit: cover; height: 100vh;" alt="Second slide">

        <div class="container">
          <div class="carousel-caption">
            <h1>START JOURNEY WITH US</h1>
            <p>PURCHASE THE BEST STARTING PRODUCTS</p>
            <p><a class="btn btn-lg btn-primary" href="{{ route('shop.index') }}">START SHOPPING</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/WhatsApp Image 2024-10-28 at 15.34.12_a27eedb8.jpg') }}" class="bd-placeholder-img w-100" style="object-fit: cover; height: 100vh;" alt="Third slide">

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>BEST QUALITY PRODUCTS</h1>
            <p>PURCHASE THE BEST QUALITY PRODUCTS</p>
            <p><a class="btn btn-lg btn-primary" href="{{ route('shop.index') }}">START SHOPPING</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

<!-- شريط الأخبار المتحرك -->
<div class="news-ticker">
    <div class="ticker-wrap">
        <div class="ticker">
            <div class="ticker-item">🔥DISCOUNT 20% ON ALL NEW PRODUCTS</div>
            <div class="ticker-item">🚚 FREE SHIPPING ON ORDERS OVER 500 SAR</div>
            <div class="ticker-item">⚡ EXCLUSIVE OFFERS FOR MEMBERS</div>
            <div class="ticker-item">📦 NEW COLLECTION ARRIVALS</div>
            <div class="ticker-item">🔥DISCOUNT 20% ON ALL NEW PRODUCTS</div>
            <div class="ticker-item">🚚 FREE SHIPPING ON ORDERS OVER 500 SAR</div>
            <div class="ticker-item">⚡ EXCLUSIVE OFFERS FOR MEMBERS</div>
            <div class="ticker-item">📦 NEW COLLECTION ARRIVALS</div>
        </div>
    </div>
</div>

<!-- أضف هذا CSS في قسم styles -->
<style>
    .news-ticker {
        background-color: #000;
        color: white;
        padding: 10px 0;
        position: relative;
        overflow: hidden;
    }

    .ticker-wrap {
        width: 100%;
        overflow: hidden;
    }

    .ticker {
        display: inline-flex;
        white-space: nowrap;
        animation: ticker 30s linear infinite;
    }

    .ticker-item {
        padding: 0 2rem;
        font-weight: bold;
    }

    @keyframes ticker {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }

    /* لإيقاف الحركة عند تمرير الماوس */
    .ticker:hover {
        animation-play-state: paused;
    }
</style>

  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing py-5">
    <div class="row g-4">
        <!-- العنصر الأول -->
        <div class="col-12 col-md-4">
            <div class="feature-card text-center">
                <div class="image-wrapper mx-auto mb-4">
                    <img src="{{ asset('images/WhatsApp Image 2024-10-28 at 15.34.12_a27eedb8.jpg') }}" class="rounded-circle shadow" alt="ترياق">
                </div>
                <h3 class="title-arabic mb-3">TRTAQ</h3>
                <p class="text-muted">DESCRIPTION OF THE PRODUCT HERE. YOU CAN ADD DETAILS ABOUT THE PRODUCT AND ITS FEATURES.</p>
                <a href="{{ route('shop.index') }}" class="btn btn-outline-dark px-4">
                    VIEW DETAILS
                </a>
            </div>
        </div>

        <!-- العنصر الثاني -->
        <div class="col-12 col-md-4">
            <div class="feature-card text-center">
                <div class="image-wrapper mx-auto mb-4">
                    <img src="{{ asset("images/WhatsApp Image 2024-10-28 at 15.34.12_a27eedb8.jpg") }}" class="rounded-circle shadow" alt="ترياق">
                </div>
                <h3 class="title-arabic mb-3">TRTAQ</h3>
                <p class="text-muted">DESCRIPTION OF THE PRODUCT HERE. YOU CAN ADD DETAILS ABOUT THE PRODUCT AND ITS FEATURES.</p>
                <a href="{{ route('shop.index') }}" class="btn btn-outline-dark px-4">
                    VIEW DETAILS
                </a>
            </div>
        </div>

        <!-- العنصر الثالث -->
        <div class="col-12 col-md-4">
            <div class="feature-card text-center">
                <div class="image-wrapper mx-auto mb-4">
                    <img src="{{ asset('images/WhatsApp Image 2024-10-28 at 15.34.12_a27eedb8.jpg') }}" class="rounded-circle shadow" alt="ترياق">
                </div>
                <h3 class="title-arabic mb-3">TRTAQ</h3>
                  <p class="text-muted">DESCRIPTION OF THE PRODUCT HERE. YOU CAN ADD DETAILS ABOUT THE PRODUCT AND ITS FEATURES.</p>
                <a href="{{ route('shop.index') }}" class="btn btn-outline-dark px-4">
                    VIEW DETAILS
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .feature-card {
        padding: 2rem;
        transition: transform 0.3s ease;
    }

    .feature-card:hover {
        transform: translateY(-5px);
    }

    .image-wrapper {
        width: 200px;
        height: 200px;
        overflow: hidden;
    }

    .image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .feature-card:hover .image-wrapper img {
        transform: scale(1.05);
    }

    .title-arabic {
        font-family: 'Noto Naskh Arabic', serif;
        font-weight: 700;
        color: #333;
    }

    .btn-outline-dark {
        border-width: 2px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-outline-dark:hover {
        background-color: #333;
        color: white;
        transform: translateY(-2px);
    }

    /* تحسينات للموبايل */
    @media (max-width: 767.98px) {
        .image-wrapper {
            width: 150px;
            height: 150px;
        }

        .feature-card {
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
    }

    /* تنسيق زر السلايدر */
    .carousel-caption .btn-primary {
        background-color: #ffffff;  /* خلفية بيضاء */
        border-color: #ffffff;      /* حدود بيضاء */
        color: #000000;             /* نص أسود */
        padding: 10px 25px;         
        transition: all 0.3s ease;   
    }

    /* تأثير التحويم على الزر */
    .carousel-caption .btn-primary:hover {
        background-color: transparent;  /* خلفية شفافة */
        border-color: #ffffff;          /* حدود بيضاء */
        color: #ffffff;                 /* نص أبيض */
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(255,255,255,0.2);
    }

    /* عند الضغط على الزر */
    .carousel-caption .btn-primary:active {
        transform: translateY(-1px);
    }
</style>

  <!-- FOOTER -->
  

    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      
  </body>
</html>
@endsection
