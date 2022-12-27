@extends('welcome')
@section('content')
    <div class="header">
        <div class="header-info">
        <div class="logo-home"><img src="{{ asset('img/logo-white.png') }}"></div>                  
        </div>
        <div class="header-language">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown button
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#"><img src="{{ asset('img/vi.png') }}"/></a></li>
                    <li><a class="dropdown-item" href="#"><img src="{{ asset('img/en.png') }}"/></a></li>
                </ul>
            </div>
        </div>
    </div> 
    <div class="page-register">       
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
                <div class="remember">
                    <input type="checkbox" id="coding" name="interest" value="coding" checked />
                    <label for="coding">Lưu đăng nhập</label>
                </div>

                @if(Session::has('error'))
                    <p class="txt-error">
                        {{ Session::get('error')}}
                    </p>
                @endif
                </div>
                <div class="btn-container">                            
                    <button type="submit" class="btn-border">Đăng nhập</button>
                </div>    
                <span id="reg-text">Bạn chưa có tài khoản? <a class="reg-text" href="/register">Đăng ký</a></span>
                <a href="/reset-password" class="reset-text">(Quên mật khẩu)</a>
            </form>
        
           
    </div>

@endsection
