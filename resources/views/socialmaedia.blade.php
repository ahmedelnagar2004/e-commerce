@extends('layouts.app')

@section('title', 'تواصل معنا - متجر ترياق')

@section('content')
<div class="social-media-page">
    <div class="container">
        <h1 class="text-center mb-5">تواصل معنا</h1>
        <div class="social-grid">
            <div class="social-item instagram">
                <i class="fab fa-instagram"></i>
                <h3>Instagram</h3>
                <p>تابعنا على انستجرام للحصول على أحدث الصور والعروض</p>
                <a href="https://www.instagram.com/your_instagram" target="_blank" class="btn btn-social">@your_instagram</a>
            </div>
            <div class="social-item whatsapp">
                <i class="fab fa-whatsapp"></i>
                <h3>WhatsApp</h3>
                <p>تواصل معنا مباشرة عبر الواتساب للاستفسارات والطلبات</p>
                <a href="https://api.whatsapp.com/send?phone=01508092004&text=hala" target="_blank" class="btn btn-social">اتصل بنا على واتساب</a>
            </div>
            <div class="social-item tiktok">
                <i class="fab fa-tiktok"></i>
                <h3>TikTok</h3>
                <p>شاهد فيديوهاتنا القصيرة والممتعة على تيك توك</p>
                <a href="https://www.tiktok.com/@your_tiktok" target="_blank" class="btn btn-social">@your_tiktok</a>
            </div>
            <div class="social-item email">
                <i class="fas fa-envelope"></i>
                <h3>البريد الإلكتروني</h3>
                <p>راسلنا عبر البريد الإلكتروني لأي استفسارات أو اقتراحات</p>
                <a href="mailto:your_email@example.com" class="btn btn-social">your_email@example.com</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .social-media-page {
        padding: 50px 0;
        background-color: #f8f9fa;
    }

    .social-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
    }

    .social-item {
        background-color: #fff;
        border-radius: 10px;
        padding: 30px;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .social-item:hover {
        transform: translateY(-5px);
    }

    .social-item i {
        font-size: 3rem;
        margin-bottom: 20px;
    }

    .social-item h3 {
        margin-bottom: 15px;
    }

    .social-item p {
        margin-bottom: 20px;
        color: #666;
    }

    .btn-social {
        display: inline-block;
        padding: 10px 20px;
        border-radius: 25px;
        color: #fff;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .instagram {
        background-color: #fcfcfc;
        color: #C13584;
    }
    .instagram .btn-social {
        background-color: #C13584;
    }

    .whatsapp {
        background-color: #fcfcfc;
        color: #25D366;
    }
    .whatsapp .btn-social {
        background-color: #25D366;
    }

    .tiktok {
        background-color: #fcfcfc;
        color: #000000;
    }
    .tiktok .btn-social {
        background-color: #000000;
    }

    .email {
        background-color: #fcfcfc;
        color: #D44638;
    }
    .email .btn-social {
        background-color: #D44638;
    }

    .btn-social:hover {
        opacity: 0.9;
        transform: translateY(-2px);
    }
</style>
@endsection
