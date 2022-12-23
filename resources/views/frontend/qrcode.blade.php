@extends('welcome')
@section('content')
    <div class="page-qr">
        <!-- MultiStep Form -->
        <h1 class="title-page">Mã QR của bạn</h1>
        {!! QrCode::size(200)->generate($link); !!}
    </div>
    <div class="btn-container"> 
            <a href="/" class="btn-border">Gửi mail</a>
            <button type="submit" class="btn-border">Lưu về máy</button>
    </div>
@endsection
