<x-auth-layout>
    @section('title','Login App')

    <div class="card">
        <div class="row">
            <div class="col-md-4 pr-md-0">
                <div class="auth-left-wrapper">
                </div>
            </div>
            <div class="col-md-8 pl-md-0">
                <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo d-block mb-2">Noble<span>UI</span></a>
                    <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>
                    <form class="forms-sample" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control 
                            @error('email')
                            border border-danger
                            @enderror" id="email" placeholder="Email" name="email">
                            @error('email')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control
                            @error('password')
                            border border-danger
                            @enderror
                            " id="password" autocomplete="current-password" placeholder="Password" name="password">
                            @error('password')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="remember" value="1">
                                Remember me
                            </label>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Login</button>
                        </div>
                        <a href="{{ url('register') }}" class="d-block mt-3 text-muted">Not a user? Sign up</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-auth-layout>