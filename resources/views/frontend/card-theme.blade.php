@extends('welcome')
@section('content')
    <div class="page-card">
        <h1 class="title-page">Chọn thẻ của bạn</h1>
        <form action="/tags" method="POST"/>
        @csrf
        <div class="box-card">
            <div class="row">
                <div class="col-md-6">
                    <img src="https://www.softwaretestingo.com/wp-content/uploads/2020/06/Credit-Card-Application-Processing-Test-Case.png" width="100%" data-theme="1" class="theme @if($theme==1) {{ 'theme-active' }} @endif"/>
                </div>
                <div class="col-md-6">
                    <img src="https://www.softwaretestingo.com/wp-content/uploads/2020/06/Credit-Card-Application-Processing-Test-Case.png" width="100%" data-theme="2" class="theme @if($theme==2) {{ 'theme-active' }} @endif"/>
                </div>
                <div class="col-md-6">
                    <img src="https://www.softwaretestingo.com/wp-content/uploads/2020/06/Credit-Card-Application-Processing-Test-Case.png" width="100%" data-theme="3" class="theme @if($theme==3) {{ 'theme-active' }} @endif"/>
                </div>
                <div class="col-md-6">
                    <img src="https://www.softwaretestingo.com/wp-content/uploads/2020/06/Credit-Card-Application-Processing-Test-Case.png" width="100%" data-theme="4" class="theme @if($theme==4) {{ 'theme-active' }} @endif"/>
                </div>
            </div>
            <input type="hidden" name="theme_id" value="{{ $theme }}">
        </div>
        <div class="btn-container action">
            <a href="/" class="btn-border">Hủy bỏ</a>
            <button type="submit" class="btn-border">Cập nhật</button>
        </div>
        </form>
    </div>
@endsection
