@extends('welcome')
@section('content')
    <div class="page-home">
        <!-- MultiStep Form -->
        <div class="row">
            <div class="col-md-3">
                <div class="profile-counter">
                    <span>Hôm nay</span>
                    <strong>100</strong>
                    <small>Lượt xem</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="profile-counter">
                    <span>Hôm nay</span>
                    <strong>100</strong>
                    <small>Lượt xem</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="profile-counter">
                    <span>Hôm nay</span>
                    <strong>100</strong>
                    <small>Lượt xem</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="profile-counter">
                    <span>Hôm nay</span>
                    <strong>100</strong>
                    <small>Lượt xem</small>
                </div>
            </div>
        </div>
        <h1 class="title-page">Thẻ của bạn</h1>
        <div class="box-card">
            @if($cardDetail->avatar)
                <img src="/uploads/{{ $cardDetail->avatar }}" width="50px" height="50px"/>
            @endif
            @if($cardDetail->name)
                <p>{{ $cardDetail->name }}</p>
            @endif
            @if($cardDetail->email)
                <p>{{ $cardDetail->email }}</p>
            @endif
            @if($cardDetail->phone)
                <p>{{ $cardDetail->phone }}</p>
            @endif
            @if($cardDetail->address)
                <p>{{ $cardDetail->address }}</p>
            @endif
            @if($cardDetail->company)
                <p>{{ $cardDetail->company }}</p>
            @endif
            @if($cardDetail->position)
                <p>{{ $cardDetail->position }}</p>
            @endif
            @if($cardDetail->facebook)
                <p>{{ $cardDetail->facebook }}</p>
            @endif

        </div>
        <div class="btn-container"> 
            <a href="/viewer/{{ $cardDetail->slug }}" class="btn-border">Xem thẻ</a>
            <a href="/tags" class="btn-border">Đổi thẻ</a>
        </div>
        <!-- /.MultiStep Form -->
    </div>
@endsection
