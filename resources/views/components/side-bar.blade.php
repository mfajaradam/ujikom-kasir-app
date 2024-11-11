<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 bg-white my-2"
    id="sidenav-main">
    <div class="sidenav-header">
        <div class="navbar-brand px-4 py-3 m-0">
            <div class="d-flex justify-between">
                {{-- <img src="../assets/img/logo street food.jpg" class="navbar-brand-img" alt="main_logo"> --}}
                <div class="row">
                    <span class="ms-1 font-weight-bold text-1xl text-uppercase text-dark">
                        CashierSm@rt
                    </span>
                </div>
            </div>
        </div>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <x-nav-link href="/dashboard" :active="request()->is('dashboard')">
                    <span class="nav-link-text ms-1">Dashboard</span>
                </x-nav-link>
            </li>
            <li class="nav-item">
                <x-nav-link href="/products" :active="request()->is('products')">
                    <span class="nav-link-text ms-1">Product</span>
                </x-nav-link>
            </li>
            <li class="nav-item">
                <x-nav-link href="/customers" :active="request()->is('customers')">
                    <span class="nav-link-text ms-1">Customers</span>
                </x-nav-link>
            </li>
            <li class="nav-item">
                <x-nav-link href="/posSystem" :active="request()->is('posSystem')">
                    <span class="nav-link-text ms-1">POS System</span>
                </x-nav-link>
            </li>
            <li class="nav-item">
                <x-nav-link href="/reports" :active="request()->is('reports')">
                    <span class="nav-link-text ms-1">Print Report</span>
                </x-nav-link>
            </li>
            {{-- <li class="nav-item">
                <x-nav-link href="/orders" :active="request()->is('orders')">
                    <span class="nav-link-text ms-1">Order Product</span>
                </x-nav-link>
            </li> --}}
        </ul>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <div class="mx-3">
              <a class="btn bg-gradient-danger w-100" href="{{ route('signOut') }}">Logout</a>
            </div>
          </div>
    </div>
</aside>
