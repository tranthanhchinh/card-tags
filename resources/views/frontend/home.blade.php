@extends('welcome')
@section('content')
    <div class="page-home">
        <!-- MultiStep Form -->
        <div class="row">
            <div class="col-md-3">
                <p>Hôm nay</p>
                <p>100</p>
                <p>Lượt xem</p>
            </div>
            <div class="col-md-3">
                <p>Hôm nay</p>
                <p>10</p>
                <p>Lượt xem</p>
            </div>
            <div class="col-md-3">
                <p>Hôm nay</p>
                <p>10</p>
                <p>Lượt xem</p>
            </div>
            <div class="col-md-3">
                <p>Hôm nay</p>
                <p>10</p>
                <p>Lượt xem</p>
            </div>
        </div>
        <h3>Thẻ của bạn</h3>
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
        <div class="btn-action">
            <a href="/viewer/{{ $cardDetail->slug }}" class="btn btn-primary">Xem thẻ</a>
            <a href="/tags" class="btn btn-primary">Đổi thẻ</a>
        </div>
        <!-- /.MultiStep Form -->
    </div>
@endsection
