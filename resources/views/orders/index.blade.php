@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">الطلبات</h1>
    
    @if($orders->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>رقم الطلب</th>
                    <th>اسم العميل</th>
                    <th>البريد الإلكتروني</th>
                    <th>رقم الهاتف</th>
                    <th>العنوان</th>
                    <th>إجمالي المبلغ</th>
                    
                    <th>التفاصيل</th>
                    <th>حذف الطلب</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ number_format($order->total_amount, 2) }} ج.م</td>

                    <td>

                        <span class="status-icon" id="status-icon-{{ $order->id }}">
                            @if($order->status == 'pending')
                                <i class="fas fa-clock text-warning"></i>
                            @elseif($order->status == 'processing')
                                <i class="fas fa-cog text-primary fa-spin"></i>
                            @elseif($order->status == 'shipped')
                                <i class="fas fa-truck text-info"></i>
                            @elseif($order->status == 'delivered')
                                <i class="fas fa-check-circle text-success"></i>
                            @elseif($order->status == 'cancelled')
                                <i class="fas fa-times-circle text-danger"></i>
                            @endif
                        </span>
                        <span id="status-text-{{ $order->id }}">{{ ucfirst($order->status) }}</span>
                    </td>
                    <td>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#orderModal{{ $order->id }}">
                            عرض التفاصيل
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
                                    <th>الصورة</th>
                                    <th>اسم المنتج</th>
                                    <th>الكمية</th>
                                    <th>السعر</th>
                                    <th>المقاس</th>
                                    <th>الإجمالي</th>
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
                        <p><strong>الإجمالي الكلي: {{ number_format($order->total_amount, 2) }} ج.م</strong></p>
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
