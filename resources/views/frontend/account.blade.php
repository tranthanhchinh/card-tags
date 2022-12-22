@extends('welcome')
@section('content')
    <div class="page-card">
        <h3>Hồ sơ của bạn</h3>
        <form action="/account" method="POST" />
        @csrf
        <div class="box-card">
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{ $memberDetail->name }}" placeholder="Họ tên"/>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" value="{{ $memberDetail->email }}"  placeholder="Email"/>
            </div>
            <div class="form-group">
                <input type="text" name="username" class="form-control" value="{{ $memberDetail->username }}"  placeholder="Username" disabled/>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" value=""  placeholder="Password News"/>
            </div>

        </div>
        <div class="action">
            <a href="/" class="btn btn-primary">Hủy bỏ</a>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
        </form>
    </div>
@endsection
