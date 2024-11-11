<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <div class="container-fluid py-2">
            <div class="card p-3 pb-0">
                <div class="row">
                    <div class="col-2 pe-0">
                        <button type="button" class="btn btn-primary">New Sale</button>
                    </div>
                    <div class="col-3 ps-0">
                        <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                    </div>
                </div>
            </div>
            {{-- Start Content --}}
            <div class="row mt-2">

                {{-- Header --}}
                <div class="row">
                    <div class="py-2">
                        <h6 class="font-weight-bolder text-uppercase">Explore Categories</h6>
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div class="category px-4">
                                <div class="row">
                                    {{-- All Category --}}
                                    <div class="card col-2 m-1 p-1 rounded-3 shadow-sm w-10">
                                        <div class="row mx-auto py-1">
                                            <div class="col d-flex justify-content-center mt-3 p-0">
                                                <span class="font-weight-bold">All</span>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Burger Category --}}
                                    <div class="card col-2 m-1 p-1 border border-danger rounded-3 shadow-sm w-10">
                                        <div class="row mx-auto py-1">
                                            <div class="col">
                                                <img src="assets/img/logos/burger.jpeg" alt="Burger">
                                            </div>
                                            <div class="col d-flex justify-content-center p-0">
                                                <span class="font-weight-bold">Burger</span>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Pizza Category --}}
                                    <div class="card col-2 m-1 p-1 rounded-3 shadow-sm w-10">
                                        <div class="row mx-auto py-1">
                                            <div class="col">
                                                <img src="assets/img/logos/pizza.jpeg" alt="Burger">
                                            </div>
                                            <div class="col d-flex justify-center p-0">
                                                <span class="font-weight-bold">Pizza</span>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Sushi Category --}}
                                    <div class="card col-2 m-1 p-1 rounded-3 shadow-sm w-10">
                                        <div class="row mx-auto py-1">
                                            <div class="col">
                                                <img src="assets/img/logos/sushi.jpeg" alt="Sushi" class="img-fluid">
                                            </div>
                                            <div class="col d-flex justify-center p-0">
                                                <span class="font-weight-bold">Sushi</span>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Salad Category --}}
                                    <div class="card col-2 m-1 p-1 rounded-3 shadow-sm w-10">
                                        <div class="row mx-auto py-1">
                                            <div class="col">
                                                <img src="assets/img/logos/salad.jpeg" alt="Salad" class="img-fluid">
                                            </div>
                                            <div class="col d-flex justify-center p-0">
                                                <span class="font-weight-bold">Salad</span>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Drink Category --}}
                                    <div class="card col-2 m-1 p-1 rounded-3 shadow-sm w-10">
                                        <div class="row mx-auto py-1">
                                            <div class="col">
                                                <img src="assets/img/logos/drink.jpeg" alt="drink" class="img-fluid">
                                            </div>
                                            <div class="col d-block d-flex justify-center p-0">
                                                <span class="font-weight-bold">Drink</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- List --}}
                        <div class="row">
                            <div class="pt-4 pb-2">
                                <h6 class="font-weight-bolder text-uppercase">List</h6>
                            </div>
                            <div class="col-4">
                                <div class="card p-3 rounded-4 pb-0">
                                    <img src="assets/img/logos/item-burger/b1.jpg" class="rounded-4" alt="">
                                    <div class="mt-2">
                                        <h6 class="font-weight-bolder">Baraduochiz Burger</h6>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between text-uppercase text-center text-xs font-weight-bolder opacity-7">
                                        <span class=" rounded-md px-1">Burger</span>
                                        <span>Rp. 37.000</span>
                                    </div>
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-success w-full rounded-4 shadow">Order
                                            Now</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card p-3 rounded-4 pb-0">
                                    <img src="assets/img/logos/item-burger/b1.jpg" class="rounded-4" alt="">
                                    <div class="mt-2">
                                        <h6 class="font-weight-bolder">Baraduochiz Burger</h6>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between text-uppercase text-center text-xs font-weight-bolder opacity-7">
                                        <span class=" rounded-md px-1">Burger</span>
                                        <span>Rp. 37.000</span>
                                    </div>
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-success w-full rounded-4 shadow">Order
                                            Now</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card p-3 rounded-4 pb-0">
                                    <img src="assets/img/logos/item-burger/b1.jpg" class="rounded-4" alt="">
                                    <div class="mt-2">
                                        <h6 class="font-weight-bolder">Baraduochiz Burger</h6>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between text-uppercase text-center text-xs font-weight-bolder opacity-7">
                                        <span class=" rounded-md px-1">Burger</span>
                                        <span>Rp. 37.000</span>
                                    </div>
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-success w-full rounded-4 shadow">Order
                                            Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-4">
                                <div class="card p-3 rounded-4 pb-0">
                                    <img src="assets/img/logos/item-burger/b1.jpg" class="rounded-4" alt="">
                                    <div class="mt-2">
                                        <h6 class="font-weight-bolder">Baraduochiz Burger</h6>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between text-uppercase text-center text-xs font-weight-bolder opacity-7">
                                        <span class=" rounded-md px-1">Burger</span>
                                        <span>Rp. 37.000</span>
                                    </div>
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-success w-full rounded-4 shadow">Order
                                            Now</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card p-3 rounded-4 pb-0">
                                    <img src="assets/img/logos/item-burger/b1.jpg" class="rounded-4" alt="burger">
                                    <div class="mt-2">
                                        <h6 class="font-weight-bolder">Baraduochiz Burger</h6>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between text-uppercase text-center text-xs font-weight-bolder opacity-7">
                                        <span class=" rounded-md px-1">Burger</span>
                                        <span>Rp. 37.000</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <span class="text-uppercase text-center text-xs font-weight-bolder opacity-7 px-1">Quantity</span>
                                        {{-- <button class="btn btn-secondary btn-sm px-2" onclick="decrement()">
                                            <i class="bi bi-dash"></i>
                                        </button> --}}
                                        <input type="number" id="quantity"
                                            class="form-control form-control-sm  text-center" value="1"
                                            min="1" style="width: 60px;">
                                        {{-- <button class="btn btn-secondary btn-sm px-2" onclick="increment()">
                                            <i class="bi bi-plus"></i>
                                        </button> --}}
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-7 pe-1 ">
                                            <button type="button"
                                                class="btn btn-danger w-full shadow">Cancel</button>
                                        </div>
                                        <div class="col-5 ps-0">
                                            <button type="button" class="btn btn-success w-full shadow">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- End Header --}}

                    {{-- Sale --}}
                    <div class="col-4">
                        <div class="card p-3 mb-4">
                            <h6>Member :</h6>
                            <input type="text" class="form-control mb-3" placeholder="Search Member...">
                        </div>
                        <div class="card p-3 rounded-4">
                            <div class="d-flex justify-content-between align-items-center font-weight-bolder">
                                <span class="text-uppercase">Invoice :</span>
                                <span>XXXXXXXXXX</span>
                            </div>
                            <div class="card p-2 mt-3 rounded-4">
                                <div class="row">
                                    <div class="col-4 me-1">
                                        <img src="assets/img/logos/item-burger/b1.jpg" class="rounded-4"
                                            alt="burger">
                                    </div>
                                    <div class="col-7 px-0">
                                        <h6 class="d-inline-flex text-ms font-weight-bolder">Baraduochiz Burger</h6>
                                        <!-- Harga dan jumlah pesanan -->
                                        <div
                                            class="d-flex justify-content-between  text-xs font-weight-bolder opacity-7 mt-1">
                                            <span class="">x1</span>
                                            <span>Rp 37.000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- card sale --}}
                            <div class="card p-3 mt-4 rounded-4 pt-2 ps-3" style="border: 3px dashed #dee2e6;">
                                <h6 class="font-weight-bolder text-uppercase text-sm">Payment Summary</h6>
                                <div class="text-xs font-weight-bolder opacity-7 mt-2">
                                    <div class="d-flex justify-content-between">
                                        <span class="text-uppercase">Subtotal :</span>
                                        <span>137.000.000,00</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-1">
                                        <span class="text-uppercase">Member :</span>
                                        <span>Not available</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-1">
                                        <span class="text-uppercase">Discount :</span>
                                        <span>Not available</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between mt-1">
                                        <span class="text-uppercase">Total Payment :</span>
                                        <span>Rp 137.000.000,00</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <span class="text-uppercase">Payment :</span>
                                        <input type="number" class="form-control" value="0"
                                            style="width: 150px;">
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <span class="text-uppercase">Get Change :</span>
                                        <span>Rp 137.000.000,00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="button" class="btn btn-success w-full rounded-4 shadow">Place An Order
                                    Now</button>
                            </div>
                        </div>
                    </div>
                    {{-- End Sale --}}
                </div>
            </div>
            {{-- End Content --}}
        </div>
    </main>

    <script>
        function increment() {
            let quantityInput = document.getElementById("quantity");
            quantityInput.value = parseInt(quantityInput.value) + 1;
        }

        function decrement() {
            let quantityInput = document.getElementById("quantity");
            if (quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        }
    </script>
</x-layout>
