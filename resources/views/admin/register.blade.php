<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.partials.head')
</head>

<body class="animsition">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">REGISTER</div>
                    <div class="login-form">
                        <form id="registerForm" action="{{ route('admin.register_handle') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input class="au-input au-input--full" type="email" name="email" placeholder="Email"
                                    required>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input id="password" class="au-input au-input--full" type="password" name="password"
                                            placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <input id="retypePassword" class="au-input au-input--full" type="password"
                                            placeholder="Retype your Password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="au-input au-input--full" type="text" name="fullname"
                                    placeholder="Full name" required>
                            </div>
                            <div class="form-group">
                                <input class="au-input au-input--full" type="text" name="phone" placeholder="Phone"
                                    required>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="button" onclick="onSubmit(event)">Register</button>
                            {{ session('error_mess_register') }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin_assets/js/admin-register.js') }}"></script>
    @include('admin.partials.footer-scripts')
</body>

</html>
