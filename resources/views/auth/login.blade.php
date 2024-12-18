<x-auth-layout>
    @section('title', 'Login App')
    <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
        <div
            class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                    Sign In
                </h2>
                <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">
                    Beberapa langkah untuk masuk ke dalam aplikasi
                </div>
                <div class="intro-x mt-8">
                    <input type="text" name="email"
                        class="intro-x login__input form-control py-3 px-4 block @error('email') border border-danger @enderror"
                        placeholder="Email">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="intro-x mt-2">
                    <input type="password" name="password"
                        class="intro-x login__input form-control py-3 px-4 block @error('password') border border-danger @enderror"
                        placeholder="password">

                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                    <div class="flex items-center mr-auto">
                        <input id="remember-me" name="remember" type="checkbox" class="form-check-input border mr-2">

                        <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                    </div>
                    <a href="#">Forgot Password?</a>
                </div>
                <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                    <button type="submit"
                        class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>
                    {{-- <button
                        class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Register</button> --}}
                </div>
                <div class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left"> By
                    signin up, you agree to our <a class="text-primary dark:text-slate-200" href="#">Terms and
                        Conditions</a> & <a class="text-primary dark:text-slate-200" href="#">Privacy Policy</a>
                </div>
            </form>
        </div>
    </div>

    @push('custom_js')
        @if (session('clearLocalStorage'))
            <script>
                localStorage.clear();
            </script>
        @endif
    @endpush
</x-auth-layout>
