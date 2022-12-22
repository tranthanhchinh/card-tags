@extends('welcome')
@section('content')
    <div class="page-register shadow-lg p-3 mb-5 bg-white rounded">
        <h3>Login</h3>
        <form action="/login" method="POST">
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
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p><a href="/register">Registers</a> </p>
    </div>

@endsection
