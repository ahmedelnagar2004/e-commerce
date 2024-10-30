@extends('layouts.app')

@section('title', 'العربة - متجر ترياق')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">CART</h1>
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
                                    <p class="card-text">SIZE: {{ $details['size'] }}</p>
                                    <p class="card-text">QUANTITY: {{ $details['quantity'] }}</p>
                                    <p class="card-text">PRICE: {{ number_format($details['price'], 2) }} L.E</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <button class="btn btn-outline-danger remove-from-cart">
                                            <i class="fas fa-trash-alt me-2"></i> REMOVE
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
                        <h5 class="card-title"> SUMMARY </h5>
                        @php
                            $subtotal = array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cartItems));
                            $shipping = 100;
                            $total = $subtotal + $shipping;
                        @endphp
                        <p class="card-text">PRODUCTS TOTAL: <strong>{{ number_format($subtotal, 2) }} L.E</strong></p>
                        <p class="card-text">SHIPPING COST: <strong>{{ number_format($shipping, 2) }} L.E</strong></p>
                        <hr>
                        <p class="card-text"><b>TOTAL: <strong>{{ number_format($total, 2) }} L.E</strong></b></p>
                        <a href="{{ route('shop.index') }}" class="btn btn-primary w-100 mb-2">
                            <i class="fas fa-shopping-bag me-2"></i>CONTINUE SHOPPING
                        </a>
                        <button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#checkoutModal">
                            <i class="fas fa-credit-card me-2"></i>CONFIRM ORDER
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info text-center">
            <h4> EMPTY CART</h4>
            <p>You haven't added any products to the cart yet.</p>
            <a href="{{ route('shop.index') }}" class="btn btn-primary mt-3">
                <i class="fas fa-shopping-bag me-2"></i>SHOP NOW
            </a>
        </div>
    @endif
</div>

<!-- Modal -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkoutModalLabel">CLIENT DETAILS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="orderForm">
                    <form id="checkoutForm">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">NAME</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">EMAIL</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">PHONE</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">ADDRESS</label>
                            <textarea class="form-control" id="address" name="address" required></textarea>
                        </div>
                    </form>
                </div>
                <div id="orderSuccess" style="display: none;">
                    <div class="text-center">
                        <i class="fas fa-check-circle text-success" style="font-size: 5rem;"></i>
                        <h4 class="mt-3">ORDER CONFIRMED SUCCESSFULLY</h4>
                        <p>The order will be processed within 2 to 7 days</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                <button type="button" class="btn btn-primary" id="submitOrder">CONFIRM ORDER</button>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="product-container">
        // ... المحتوى الموجود ...
    </div>

    <div class="shipping-policy">
        <h3><i class="fas fa-truck"></i> SHIPPING</h3>
        <p>Regular orders take 2-6 business days</p>
        <p>Pre-orders take 10-15 business days</p>

        <h3 class="mt-4"><i class="fas fa-shield-alt"></i> RETURN & REFUND POLICY</h3>
        <ul>
            <li>Make sure the order suits you before payment. If not, please return it with the mailer at the site and pay only the shipping cost. There are no returns after payment, only exchange within 14 days of purchase. Note: Customers are responsible for any additional costs.</li>
            <li><strong>RETURN & REFUND POLICY :</strong> Once the mailer leaves, there is no exchange or refund</li>
            <li><strong>No returns or exchanges on discounted items:</strong> Items purchased at reduced prices cannot be returned or exchanged. You can try the item while waiting for the mailer, but once they leave, there will be no exchange or refund available.</li>
        </ul>
    </div>
</div>

<!-- Modal for Delete Confirmation -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">DELETE CONFIRMATION</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-exclamation-triangle text-warning" style="font-size: 3rem;"></i>
                <p class="mt-3">Are you sure you want to delete this product from the cart?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">CONFIRM DELETE</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Order Confirmation -->
<div class="modal fade" id="orderConfirmationModal" tabindex="-1" aria-labelledby="orderConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="orderConfirmationModalLabel">ORDER CONFIRMED</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                <h4 class="mt-3">ORDER CONFIRMED SUCCESSFULLY!</h4>
                <p class="lead">ORDER NUMBER: <strong id="orderNumber"></strong></p>
                <p>Your order will be processed as soon as possible. Thank you for shopping with us!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                <a href="{{ route('shop.index') }}" class="btn btn-primary">CONTINUE SHOPPING</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        background-color: #fafafa;
    }

    /* تنسيق البطاقات */
    .card {
        border: none;
        border-radius: 15px;
        background-color: white;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    /* تنسيق الأزرار الرئيسية */
    .btn-primary, .btn-success {
        background-color: #333;
        border-color: #333;
        border-radius: 25px;
        padding: 10px 20px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover, .btn-success:hover {
        background-color: #000;
        border-color: #000;
        transform: translateY(-2px);
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    /* تنسيق زر الحذف */
    .btn-outline-danger.remove-from-cart {
        border: 2px solid #333;
        color: #333;
        background-color: white;
        border-radius: 20px;
        padding: 8px 15px;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .btn-outline-danger.remove-from-cart:hover {
        background-color: #333;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    /* تنسيق قسم سياسة الشحن */
    .shipping-policy {
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        margin-top: 30px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .shipping-policy h3 {
        color: #333;
        margin-bottom: 15px;
        border-bottom: 3px solid #333;
        display: inline-block;
        padding-bottom: 5px;
    }

    /* تنسيق النوافذ المنبثقة */
    .modal-content {
        border: none;
        border-radius: 15px;
    }

    .modal-header {
        background-color: #333 !important;
        color: white !important;
        border-radius: 15px 15px 0 0;
    }

    /* تنسيق أيقونات النوافذ المنبثقة */
    #orderConfirmationModal .fa-check-circle {
        color: #333 !important;
    }

    .fa-exclamation-triangle {
        color: #333 !important;
    }

    /* تنسيق أزرار النوافذ المنبثقة */
    .modal .btn-secondary {
        background-color: #666;
        border-color: #666;
        border-radius: 25px;
    }

    .modal .btn-danger {
        background-color: #333;
        border-color: #333;
        border-radius: 25px;
    }

    /* تنسيق العناوين */
    h1, h5.card-title {
        color: #333;
    }

    /* تنسيق النصوص */
    .card-text {
        color: #333;
    }

    /* تنسيق الإطار عند العربة الفارغة */
    .alert-info {
        background-color: white;
        border: none;
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        color: #333;
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
