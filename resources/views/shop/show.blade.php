@extends('layouts.app')

@section('title', $product->name . ' - متجر ترياق')

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<style>
    .product-container {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    .swiper-container {
        width: 100%;
        height: 400px;
        border-radius: 10px;
        overflow: hidden;
    }
    .swiper-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .swiper-button-next, .swiper-button-prev {
        color: #28a745;
    }
    .swiper-pagination-bullet-active {
        background-color: #28a745;
    }
    .size-btn {
        border: 2px solid #28a745;
        background-color: white;
        color: #28a745;
        padding: 8px 16px;
        margin: 5px;
        border-radius: 20px;
        transition: all 0.3s ease;
    }
    .size-btn:hover, .size-btn.active {
        background-color: #28a745;
        color: white;
    }
    .btn-add-to-cart {
        background-color: white;
        color: #28a745;
        border: 2px solid #28a745;
        transition: all 0.3s ease;
        padding: 10px 30px;
        border-radius: 25px;
    }
    .btn-add-to-cart:hover {
        background-color: #28a745;
        color: white;
    }
    .shipping-policy {
        background-color: #fff5f5;
        border-radius: 10px;
        padding: 20px;
        margin-top: 30px;
    }
    .shipping-policy h3 {
        color: #333;
        margin-bottom: 15px;
    }
    .shipping-policy p {
        margin-bottom: 10px;
    }
    .shipping-policy ul {
        padding-left: 20px;
    }
    .discounted-price {
    text-decoration: line-through;
    color: rgb(0, 0, 0);
}

</style>
@endsection

@section('content')
<div class="container mt-5">
    <div class="product-container">
        <div class="row">
            <div class="col-md-6">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($product->{'image-'.$i})
                                <div class="swiper-slide">
                                    <img src="{{ asset('storage/' . $product->{'image-'.$i}) }}" alt="{{ $product->name }} - صورة {{ $i }}">
                                </div>
                            @else
                                <div class="swiper-slide">
                                    <img src="{{ asset('images/WhatsApp Image 2024-10-28 at 15.34.12_a27eedb8.jpg') }}" alt="{{ $product->name }} - صورة {{ $i }}">
                                </div>
                            @endif
                        @endfor
                    </div>
                    
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <div class="col-md-6">
               <b> <h1 class="mb-4">{{ $product->name }}</h1></b>
                <b><p class="mb-4">{{ $product->description }}</p></b></b>

                    <p class="fw-bold fs-4 mb-4">السعر: {{ number_format($product->price, 2) }} ج.م</p> 
                    <p class="card-text discounted-price">{{ number_format($product->{'discount_price'}, 2) }} ج.م</p>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">المقاس:</label>
                        <div>
                            @foreach($product->sizes as $size)
                                <input type="radio" name="size" id="size{{ $size->id }}" value="{{ $size->id }}" class="d-none" required>
                                <label for="size{{ $size->id }}" class="size-btn">{{ $size->size }}</label>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="quantity" class="form-label fw-bold">الكمية:</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" required style="max-width: 100px;">
                    </div>
                    
                    <button type="submit" class="btn btn-add-to-cart">أضف إلى السلة</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="product-container">
        // ... المحتوى الموجود ...
    </div>

    <div class="shipping-policy">
        <h3><i class="fas fa-truck"></i> الشحن</h3>
        <p>الطلبات العادية تستغرق من 2-6 أيام عمل</p>
        <p>الطلبات المسبقة تستغرق من 10-15 يوم عمل</p>

        <h3 class="mt-4"><i class="fas fa-shield-alt"></i> السياسة</h3>
        <ul>
            <li>تحقق من أن الطلب يناسبك جيدًا قبل الدفع. إذا لم يكن كذلك، يرجى إرجاعه مع ساعي البريد في الموقع ودفع رسوم الشحن فقط. لا توجد مرتجعات بعد دفع ثمن طلبك، فقط التبادل خلال 14 يومًا من يوم الشراء. ملاحظة: العملاء مسؤولون عن أي تكاليف إضافية.</li>
            <li><strong>سياسة الاسترجاع:</strong> بمجرد مغادرة ساعي البريد، لا يوجد تبادل أو استرداد</li>
            <li><strong>لا توجد مرتجعات أو تبادلات على العناصر المخفضة:</strong> المنتجات المشتراة بأسعار مخفضة لا يمكن إرجاعها أو تبادلها. يمكنك تجربة العنصر أثناء انتظار ساعي البريد، ولكن بمجرد مغادرتهم، لن يكون هناك تبادل أو استرداد متاح.</li>
        </ul>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    document.querySelectorAll('.size-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.size-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>
@endsection