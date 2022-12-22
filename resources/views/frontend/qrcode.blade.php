@extends('welcome')
@section('content')
    <div class="page-qr">
        <!-- MultiStep Form -->
        <h3>Mã QR của bạn</h3>
        {!! QrCode::size(200)->generate($link); !!}
    </div>
@endsection
