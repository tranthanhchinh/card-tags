@extends('welcome')
@section('content')
    <div class="page-register shadow-lg p-3 mb-5 bg-white rounded">
        <h1 class="title-page">Đăng ký</h1>

        <form id="msform" action="/register" method="POST" enctype="multipart/form-data" >
            @csrf
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Tài khoản</li>
                <li>Thông tin thẻ</li>
                <li>Chọn mẫu thẻ</li>
                <li>Hoàn thành</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Tài khoản</h2>
                <h3 class="fs-subtitle">Vui lòng điền thông tin để tạo tài khoản</h3>
                <input type="text" name="name" class="form-control" id="name" placeholder="Họ tên*" required>
                @if($errors->has('name'))
                    <p class="txt-error">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <input type="email" name="email" class="form-control"  placeholder="Email*" required>
                <input type="text" name="username" class="form-control" placeholder="Username*" required>
                <input type="password" name="password" class="form-control" placeholder="Password*" required>
                <input type="button" name="next" class="next action-button" id="nextstep-one" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Thông tin thẻ</h2>
                <h3 class="fs-subtitle">Vui lòng điền thông tin thẻ</h3>
                <input type="text" name="card_name" placeholder="Tên trên thẻ"/>
                <input type="text" name="card_email" placeholder="Email"/>
                <input type="text" name="card_phone" placeholder="Phone"/>
                <input type="text" name="address" placeholder="Address"/>
                <input type="text" name="company" placeholder="Company"/>
                <input type="text" name="position" placeholder="Position"/>
                <input type="text" name="facebook" placeholder="Facebook"/>
                <input type="text" name="instagram" placeholder="Instagram"/>
                <input type="text" name="twitter" placeholder="Twitter"/>
                <input type="text" name="youtube" placeholder="Youtube"/>
                <img id="view-avatar" width="100%"/>
                <input type="file" name="avatar" placeholder="Avatar" onchange="loadFile(event)"/>

                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button test2" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Card Themes</h2>
                <h3 class="fs-subtitle">Your presence on the card themes</h3>
                <div class="row">
                    <div class="col-md-12">
                        <img src="https://www.softwaretestingo.com/wp-content/uploads/2020/06/Credit-Card-Application-Processing-Test-Case.png" width="100%" data-theme="1" class="theme theme-active"/>
                    </div>
                    <div class="col-md-12">
                        <img src="https://www.softwaretestingo.com/wp-content/uploads/2020/06/Credit-Card-Application-Processing-Test-Case.png" width="100%" data-theme="2" class="theme"/>
                    </div>
                    <div class="col-md-12">
                        <img src="https://www.softwaretestingo.com/wp-content/uploads/2020/06/Credit-Card-Application-Processing-Test-Case.png" width="100%" data-theme="3" class="theme"/>
                    </div>

                </div>
                <input type="hidden" name="theme_id" value="1">
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Demo</h2>
                <h3 class="fs-subtitle">Fill in your credentials</h3>
                <div class="demo-card">
                    <img src="">
                    <p>Nguyễn Văn A</p>
                    <p>info@gmail.com</p>
                    <p><i class="fa fa-phone" aria-hidden="true"></i>
                         0398716564</p>
                    <p>Tứ Kỳ - Hải Dương</p>
                    <p>fb.com/chinhtran</p>
                </div>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="submit" name="submit" class="submit action-button" value="Submit"/>
            </fieldset>
        </form>
    </div>

@endsection
