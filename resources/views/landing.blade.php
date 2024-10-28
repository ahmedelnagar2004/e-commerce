@extends('layouts.app')

@section('content')
    {{-- اطبع المسار للتحقق --}}
   

    <div>
        {{-- جرب الطرق المختلفة لعرض الصورة --}}
        
        {{-- الطريقة 1 --}}
        <img src="/images/WhatsApp Image 2024-10-28 at 15.34.12_a27eedb8.jpg" alt="logo">
        
        {{-- الطريقة 2 --}}
        <img src="{{ URL::asset('images/WhatsApp Image 2024-10-28 at 15.34.12_a27eedb8.jpg') }}" alt="logo">
        
        {{-- الطريقة 3 --}}
        <img src="{{ url('images/WhatsApp Image 2024-10-28 at 15.34.12_a27eedb8.jpg') }}" alt="logo">
    </div>
@endsection
