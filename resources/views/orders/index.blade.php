@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4" style="text-align: center;">Orders</h1>
    
    @if($orders->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Instagram Username</th>
                    <th>Total Amount</th>
                    <th>Order Date</th>
                    <th>Details</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td data-label="رقم الطلب">{{ $order->id }}</td>
                    <td data-label="اسم العميل">{{ $order->name }}</td>
                    <td data-label="البريد الإلكتروني">{{ $order->email }}</td>
                    <td data-label="رقم الهاتف">{{ $order->phone }}</td>
                    <td data-label="العنوان">{{ $order->address }}</td>
                    <td data-label="إسم المستخدم في الانستقرام">{{ $order->instagram_username }}</td>
                    <td data-label="إجمالي المبلغ">{{ number_format($order->total_amount, 2) }} ج.م</td>
                    <td data-label="تاريخ الطلب">{{ $order->created_at->format('Y-m-d') }}</td>
                    <td data-label="التفاصيل">
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#orderModal{{ $order->id }}">
                            View Details
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @foreach($orders as $order)
        <!-- Modal for each order -->
        <div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1" aria-labelledby="orderModalLabel{{ $order->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderModalLabel{{ $order->id }}">تفاصيل الطلب رقم {{ $order->id }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>المنتجات:</h6>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Size</th>
                                    <th> Total Price WITHOUT SHIPPING</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                <tr>
                                    <td>
                                        @if(isset($item['image']))
                                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('images/placeholder.jpg') }}" alt="صورة افتراضية" style="width: 50px; height: 50px; object-fit: cover;">
                                        @endif
                                    </td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td>{{ number_format($item['price'], 2) }} ج.م</td>
                                    <td>{{ $item['size'] ?? 'غير محدد' }}</td>
                                    <td>{{ number_format($item['price'] * $item['quantity'], 2) }} ج.م</td>
                                </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                        <p><strong>Total Price WITHOUT SHIPPING: {{ number_format($order->total_amount, 2) }} ج.م</strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    @else
        <p>لا توجد طلبات حالياً.</p>
    @endif
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.status-select').change(function() {
        var orderId = $(this).data('order-id');
        var newStatus = $(this).val();
        var notes = prompt("أدخل ملاحظات حول تغيير الحالة (اختياري):");
        var token = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            url: '/admin/orders/' + orderId + '/update-status',
            method: 'POST',
            data: {
                _token: token,
                status: newStatus,
                notes: notes
            },
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    updateStatusIcon(orderId, response.newStatus);
                    alert(response.message);
                } else {
                    alert('حدث خطأ: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('حدث خطأ أثناء الاتصال بالخادم: ' + error);
            }
        });
    });

    function updateStatusIcon(orderId, status) {
        var iconElement = $('#status-icon-' + orderId);
        var textElement = $('#status-text-' + orderId);
        
        iconElement.removeClass().addClass('status-icon');
        
        switch(status) {
            case 'pending':
                iconElement.html('<i class="fas fa-clock text-warning"></i>');
                break;
            case 'processing':
                iconElement.html('<i class="fas fa-cog text-primary fa-spin"></i>');
                break;
            case 'shipped':
                iconElement.html('<i class="fas fa-truck text-info"></i>');
                break;
            case 'delivered':
                iconElement.html('<i class="fas fa-check-circle text-success"></i>');
                break;
            case 'cancelled':
                iconElement.html('<i class="fas fa-times-circle text-danger"></i>');
                break;
        }

        textElement.text(status.charAt(0).toUpperCase() + status.slice(1));
    }

    $('.delete-order').click(function() {
        var orderId = $(this).data('order-id');
        var token = $('meta[name="csrf-token"]').attr('content');
        
        if (confirm('هل أنت متأكد من رغبتك في حذف هذا الطلب؟ هذا الإجراء لا يمكن التراجع عنه.')) {
            $.ajax({
                url: '/admin/orders/' + orderId,
                method: 'DELETE',
                data: {
                    _token: token
                },
                dataType: 'json',
                success: function(response) {
                    if(response.success) {
                        alert(response.message);
                        // قم بإزالة صف الطلب من الجدول
                        $('tr[data-order-id="' + orderId + '"]').remove();
                    } else {
                        alert('حدث خطأ: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('حدث خطأ أثناء الاتصال بالخادم: ' + error);
                }
            });
        }
    });
});
</script>
@endsection

@section('styles')
<style>
    /* تنسيق الجدول */
    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        margin-bottom: 1rem;
        background-color: white;
        box-shadow: 0 0 15px rgba(0,0,0,0.05);
    }

    /* تنسيق رأس الجدول */
    .table thead th {
        background-color: #f8f9fa;
        border-bottom: 2px solid #dee2e6;
        border-right: 1px solid #dee2e6;
        padding: 15px;
        font-weight: 600;
        text-align: center;
        color: #333;
    }

    /* تنسيق خلايا الجدول */
    .table td {
        border-bottom: 1px solid #dee2e6;
        border-right: 1px solid #dee2e6;
        padding: 15px;
        text-align: center;
        vertical-align: middle;
    }

    /* إزالة الحدود اليمنى للعمود الأخير */
    .table th:last-child,
    .table td:last-child {
        border-right: none;
    }

    /* تنسيق الصفوف عند المرور عليها */
    .table tbody tr:hover {
        background-color: #f8f9fa;
    }

    /* إزالة الحد السفلي للصف الأخير */
    .table tbody tr:last-child td {
        border-bottom: none;
    }

    /* تنسيق الصور */
    .table img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 4px;
    }

    /* تنسيق الأزرار */
    .btn {
        background-color: white !important;
        color: #333 !important;
        border: 2px solid #333 !important;
        border-radius: 25px !important;
        padding: 8px 20px !important;
        transition: all 0.3s ease !important;
        font-weight: 500 !important;
    }

    .btn:hover {
        background-color: #333 !important;
        color: white !important;
        transform: translateY(-2px);
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    /* تنسيق خاص لأزرار الجدول */
    .table .btn {
        padding: 5px 15px !important;
        font-size: 0.9rem !important;
    }

    /* تنسيق زر الإغلاق في المودال */
    .modal .btn-secondary {
        background-color: white !important;
        color: #333 !important;
        border: 2px solid #333 !important;
    }

    .modal .btn-secondary:hover {
        background-color: #333 !important;
        color: white !important;
    }

    /* تنسيقات خاصة للموبايل */
    @media screen and (max-width: 768px) {
        .table thead {
            display: none;
        }

        .table tbody tr {
            display: block;
            border: 1px solid #dee2e6;
            margin-bottom: 1rem;
            border-radius: 8px;
        }

        .table td {
            display: block;
            text-align: right;
            padding: 10px;
            border-right: none;
            border-bottom: 1px solid #dee2e6;
        }

        .table td:before {
            content: attr(data-label);
            float: left;
            font-weight: bold;
            color: #333;
        }

        .table td:last-child {
            border-bottom: none;
        }
    }
</style>
@endsection
