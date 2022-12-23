@extends('welcome')
@section('content')
    <div class="page-card">
        <h1 class="title-page">Thông tin thẻ</h1>
        <form action="/card" method="POST" enctype="multipart/form-data"/>
        @csrf
        <div class="box-card">
            <div class="form-group">
                <input type="text" name="card_name" class="form-control" value="{{ $cardDetail->name }}" placeholder="Tên trên thẻ"/>
            </div>
            <div class="form-group">
                <input type="text" name="card_email" class="form-control" value="{{ $cardDetail->email }}"  placeholder="Email"/>
            </div>
            <div class="form-group">
                <input type="text" name="card_phone" class="form-control" value="{{ $cardDetail->phone }}"  placeholder="Phone"/>
            </div>
            <div class="form-group">
                <input type="text" name="address" class="form-control" value="{{ $cardDetail->address }}"  placeholder="Address"/>
            </div>
            <div class="form-group">
                <input type="text" name="company" class="form-control" value="{{ $cardDetail->company }}"  placeholder="Company"/>
            </div>
            <div class="form-group">
                <input type="text" name="position" class="form-control" value="{{ $cardDetail->position }}"  placeholder="Position"/>
            </div>
            <div class="form-group">
                <input type="text" name="facebook" class="form-control" value="{{ $cardDetail->facebook }}"  placeholder="Facebook"/>
            </div>
            <div class="form-group">
                <input type="text" name="instagram" class="form-control" value="{{ $cardDetail->instagram }}"  placeholder="Instagram"/>
            </div>
            <div class="form-group">
                <input type="text" name="twitter" class="form-control" value="{{ $cardDetail->twitter }}"  placeholder="Twitter"/>
            </div>
            <div class="form-group">
                <input type="text" name="youtube" class="form-control"  value="{{ $cardDetail->youtube }}"  placeholder="Youtube"/>
            </div>
            <div class="form-group">
                <input id="imgInp" type="file" name="avatar" class="form-control" value="{{ $cardDetail->name }}" accept="image/*"  placeholder="Avatar" onchange="loadFile(event)"/>
                <img id="view-avatar" src="/uploads/{{ $cardDetail->avatar }}" width="80px" height="80px"/>
            </div>
        </div>
        <div class="btn-container action">
            <a href="/" class="btn-border">Hủy bỏ</a>
            <button type="submit" class="btn-border">Cập nhật</button>
        </div>
        </form>
    </div>
@endsection
