<x-frontend-layout>
    <div class="page-title-area bg-9">
        <div class="container">
            <div class="page-title-content">
                <h2>Register</h2>
                <ul>
                    <li>
                        <a href="index.html">
                            Home
                        </a>
                    </li>
                    <li class="active">Register</li>
                </ul>
            </div>
        </div>
    </div>


    <section class="user-area-style ptb-100">
        <div class="container">
            <div class="contact-form-action">
                <div class="account-title">
                    <h2>Registration</h2>
                </div>
                <form method="post" action="{{ route('register') }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Email address</label>
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input class="form-control" type="password" name="password_confirmation">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-sm-6">
                                    <button class="default-btn register" type="submit">
                                        <span>Register now</span>
                                    </button>
                                </div>
                                <div class="col-lg-6 col-sm-6 text-right">
                                    <input id="remember-1" type="checkbox">
                                    <label>Show password ?</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <p>Have an account? <a href="log-in.html">Login now!</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

</x-frontend-layout>