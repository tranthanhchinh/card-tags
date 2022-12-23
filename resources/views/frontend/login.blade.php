@extends('welcome')
@section('content')
    <div class="page-register shadow-lg p-3 mb-5 bg-white rounded">
        <h1 class="title-page">Đăng nhập</h1>
        
            <form action="/login" method="POST">
                <div class="container-box">
                @csrf

                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                    @if($errors->has('username'))
                        <p class="txt-error">
                            {{ $errors->first('username') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    @if($errors->has('password'))
                        <p class="txt-error">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
                @if(Session::has('error'))
                    <p class="txt-error">
                        {{ Session::get('error')}}
                    </p>
                @endif
                </div>
                <div class="btn-container">           
                    <a class="btn-border" href="/register">Đăng ký</a>
                    <button type="submit" class="btn-border">Đăng nhập</button>
                </div>    
                <a href="/reset-password" class="reset-text">(Quên mật khẩu)</a>
            </form>
        
           
    </div>

@endsection
