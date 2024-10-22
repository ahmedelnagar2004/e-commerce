<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>سلة المشتريات</title>
</head>
<body>
    <h1>سلة المشتريات</h1>
    @foreach ($carts as $cart)
        <p>{{ $cart->product->name }}</p>
        <p>{{ $cart->quantity }}</p>
        <p>{{ $cart->size->name }}</p>
        <p>{{ $cart->product->price }}</p>
        <p>{{ $cart->product->price * $cart->quantity }}</p>
        <a href="{{ route('cart.destroy', $cart->id) }}" class="btn btn-danger">حذف</a>
        <hr>
    @endforeach
    
</body>
</html>