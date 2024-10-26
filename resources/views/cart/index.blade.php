@extends('layouts.app')

@section('title', 'العربة - متجر ترياق')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">العربة</h1>
    @if(count($cartItems) > 0)
        <div class="row">
            <div class="col-md-8">
                @foreach($cartItems as $id => $details)
                    <div class="card mb-3 shadow-sm" data-id="{{ $id }}">
                        <div class="row g-0">
                            <div class="col-md-3">
                                @if(isset($details['image']))
                                    <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" class="img-fluid rounded-start" style="height: 100%; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/placeholder.jpg') }}" alt="صورة افتراضية" class="img-fluid rounded-start" style="height: 100%; object-fit: cover;">
                                @endif
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $details['name'] }}</h5>
                                    <p class="card-text">المقاس: {{ $details['size'] }}</p>
                                    <p class="card-text">الكمية: {{ $details['quantity'] }}</p>
                                    <p class="card-text">السعر: {{ number_format($details['price'], 2) }} ج.م</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <button class="btn btn-outline-danger remove-from-cart">
                                            <i class="fas fa-trash-alt me-2"></i> إزالة
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">ملخص الطلب</h5>
                        @php
                            $subtotal = array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cartItems));
                            $shipping = 100;
                            $total = $subtotal + $shipping;
                        @endphp
                        <p class="card-text">إجمالي المنتجات: <strong>{{ number_format($subtotal, 2) }} ج.م</strong></p>
                        <p class="card-text">رسوم التوصيل: <strong>{{ number_format($shipping, 2) }} ج.م</strong></p>
                        <hr>
                        <p class="card-text"><b>المجموع الكلي: <strong>{{ number_format($total, 2) }} ج.م</strong></b></p>
                        <a href="{{ route('shop.index') }}" class="btn btn-primary w-100 mb-2">
                            <i class="fas fa-shopping-bag me-2"></i>متابعة التسوق
                        </a>
                        <button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#checkoutModal">
                            <i class="fas fa-credit-card me-2"></i>إتمام الشراء
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info text-center">
            <h4>العربة فارغة</h4>
            <p>لم تقم بإضافة أي منتجات إلى العربة بعد.</p>
            <a href="{{ route('shop.index') }}" class="btn btn-primary mt-3">
                <i class="fas fa-shopping-bag me-2"></i>تسوق الآن
            </a>
        </div>
    @endif
</div>

<!-- Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkoutModalLabel">إتمام الشراء</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="orderForm">
                    <form id="checkoutForm">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">الاسم</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">البريد الإلكتروني</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">رقم الهاتف</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">العنوان</label>
                            <textarea class="form-control" id="address" name="address" required></textarea>
                        </div>
                    </form>
                </div>
                <div id="orderSuccess" style="display: none;">
                    <div class="text-center">
                        <i class="fas fa-check-circle text-success" style="font-size: 5rem;"></i>
                        <h4 class="mt-3">تم تأكيد الطلب بنجاح</h4>
                        <p>سيتم تنفيذ الطلب خلال 2 إلى 7 أيام</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                <button type="button" class="btn btn-primary" id="submitOrder">تأكيد الطلب</button>
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
            <li>تحق من أن الطلب يناسبك جيدًا قبل الدفع. إذا لم يكن كذلك، يرجى إرجاعه مع ساعي البريد في الموقع ودفع رسوم الشحن فقط. لا توجد مرتجعات بعد دفع ثمن طلبك، فقط التبادل خلال 14 يومًا من يوم الشراء. ملاحظة: العملاء مسؤولون عن أي تكاليف إضافية.</li>
            <li><strong>سياسة الاسترجاع :</strong> بمجرد مغادرة ساعي البريد، لا يوجد تبادل أو استرداد</li>
            <li><strong>لا توجد مرتجعات أو تبادلات على العناصر المخفضة:</strong> المنتجات المشتراة بأسعار مخفضة لا يمكن إرجاعها أو تبادلها. يمكنك تجربة العنصر أثناء انتظار ساعي البريد، ولكن بمجرد مغادرتهم، لن يكون هناك تبادل أو استرداد متاح.</li>
        </ul>
    </div>
</div>

<!-- Modal for Delete Confirmation -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">تأكيد الحذف</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-exclamation-triangle text-warning" style="font-size: 3rem;"></i>
                <p class="mt-3">هل أنت متأكد أنك تريد حذف هذا المنتج من العربة؟</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">تأكيد الحذف</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Order Confirmation -->
<div class="modal fade" id="orderConfirmationModal" tabindex="-1" aria-labelledby="orderConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="orderConfirmationModalLabel">تم تأكيد الطلب</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                <h4 class="mt-3">تم إنشاء طلبك بنجاح!</h4>
                <p class="lead">رقم الطلب: <strong id="orderNumber"></strong></p>
                <p>سيتم معالجة طلبك في أقرب وقت ممكن. شكراً لتسوقك معنا!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                <a href="{{ route('shop.index') }}" class="btn btn-primary">متابعة التسوق</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .card {
        border: none;
        border-radius: 15px;
    }
    .btn-primary, .btn-success {
        border-radius: 25px;
        padding: 10px 20px;
    }
    .quantity-input {
        max-width: 60px;
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

    #orderConfirmationModal .modal-content {
        border: none;
        border-radius: 15px;
    }

    #orderConfirmationModal .modal-header {
        border-radius: 15px 15px 0 0;
    }

    #orderConfirmationModal .btn {
        border-radius: 25px;
        padding: 10px 20px;
    }

    #orderConfirmationModal .fa-check-circle {
        color: #28a745;
    }

    .btn-outline-danger.remove-from-cart {
        border-radius: 20px;
        padding: 8px 15px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .btn-outline-danger.remove-from-cart:hover {
        background-color: #ffffff;
        color: rgb(0, 0, 0);
        transform: translateY(-2px);
        box-shadow: 0 2px 5px rgba(1, 1, 1, 0.3);
    }

    .btn-outline-danger.remove-from-cart .fas {
        transition: transform 0.3s ease;
    }

    .btn-outline-danger.remove-from-cart:hover .fas {
        transform: rotate(20deg);
    }
</style>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    let productToDelete = null;

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
        productToDelete = $(this).closest(".card");
        $('#deleteConfirmationModal').modal('show');
    });

    $("#confirmDelete").click(function() {
        if (productToDelete) {
            let productId = productToDelete.data("id");
            $.ajax({
                url: '{{ route('cart.remove') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: productId
                },
                success: function (response) {
                    productToDelete.remove();
                    updateCartSummary();
                    $('#deleteConfirmationModal').modal('hide');
                    
                    // إذا كانت العربة فارغة، قم بتحديث الصفحة
                    if($(".card").length === 0) {
                        location.reload();
                    }
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                    alert("حدث خطأ أثناء حذف المنتج. الرجاء المحاولة مرة أخرى.");
                }
            });
        }
    });

    // دالة لتحديث ملخص العربة
    function updateCartSummary() {
        $.ajax({
            url: '{{ route('cart.summary') }}',
            method: 'GET',
            success: function(response) {
                
                $(".card-text:contains('الإجمالي الكلي')").html('الإجمالي الكلي: <strong>' + response.total + ' ج.م</strong>');
            }
        });
    }

    // إضافة معالج حدث النقر لزر تأكيد الطلب
    $("#submitOrder").click(function(e) {
        e.preventDefault();

        var formData = $("#checkoutForm").serialize();

        $.ajax({
            url: '{{ route('order.store') }}',
            method: 'POST',
            data: formData,
            success: function(response) {
                if(response.success) {
                    // عرض النافذة المنبثقة الجديدة
                    $('#orderNumber').text(response.order_id);
                    $('#orderConfirmationModal').modal('show');
                    
                    // إفراغ العربة (اختياري)
                    // $.ajax({
                    //     url: '{{ route('cart.clear') }}',
                    //     method: 'POST',
                    //     data: {_token: '{{ csrf_token() }}'},
                    //     success: function() {
                    //         console.log('تم إفراغ العربة');
                    //     }
                    // });
                } else {
                    alert('حدث خطأ: ' + response.message);
                }
            },
            error: function() {
                alert('حدث خطأ أثناء إرسال الطلب. يرجى المحاولة مرة أخرى.');
            }
        });
    });

    // إغلاق النافذة المنبثقة وإعادة التوجيه عند النقر على "متابعة التسوق"
    $('#orderConfirmationModal').on('hidden.bs.modal', function () {
        window.location.href = '{{ route('shop.index') }}';
    });
});
</script>
@endsection
