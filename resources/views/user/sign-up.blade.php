<x-layout-sign>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                                style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                            <div class="card card-plain">
                                <div class="card-header">
                                    <h4 class="font-weight-bolder">Sign Up</h4>
                                    <p class="mb-0">Enter your email and password to register</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" action="{{ $route }}" method="POST">
                                        @csrf
                                        @method($method)
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">User ID</label>
                                            <input type="number" class="form-control" name="userId">
                                            @error('userId')
                                                <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name">
                                            @error('name')
                                                <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email">
                                            @error('email')
                                                <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Phone</label>
                                            <input type="number" class="form-control" name="phone">
                                            @error('phone')
                                                <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password">
                                            @error('password')
                                                <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            {{-- <label class="form-label">Role</label> --}}
                                            <select class="form-control" name="role">
                                                <option value="">Pilih Role</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Petugas">Petugas</option>
                                            </select>
                                            @error('role')
                                                <div>{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg bg-gradient-dark btn-lg w-100 mt-4 mb-0">Sign
                                                Up</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-2 text-sm mx-auto">
                                        Already have an account?
                                        <a href="{{ url('/') }}"
                                            class="text-primary text-gradient font-weight-bold">Sign in</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layout-sign>
