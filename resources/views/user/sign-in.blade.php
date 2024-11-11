<x-layout-sign>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100" style="">
            {{-- <span class="mask bg-gradient-dark opacity-6"></span> --}}
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom shadow-dark">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                                </div>
                            </div>
                            @if (Session::has('success'))
                                <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
                            @endif

                            @if (Session::has('error'))
                                <div class="alert alert-danger mt-3"> {{ Session::get('error') }} </div>
                            @endif
                            <div class="card-body">
                                <form method="POST" action="{{ route('auth.login') }}" class="text-start">
                                    @csrf
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>
                                        @error('email')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control @error('email') is-invalid @enderror" name="password" required>
                                        @error('password')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign in</button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">
                                        Don't have an account?
                                        <a href="{{ url('account/sign-up') }}" class="text-primary text-gradient font-weight-bold">Sign up</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout-sign>
