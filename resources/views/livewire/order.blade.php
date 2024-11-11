<div>
    <div class="card p-3 pb-0">
        <div class="row">
            <div class="col-2 pe-0">
                <button class="btn {{ !$saleActive ? 'btn-primary' : 'btn-danger' }}"
                    wire:click="{{ !$saleActive ? 'newSale' : 'cancelSale' }}">
                    {{ !$saleActive ? 'New Sale' : 'Cancel Sale' }}
                </button>
                <button class="btn btn-info" wire:loading>Loading ...</button>
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
                <div class="pt-4 pb-2">
                    <h6 class="font-weight-bolder text-uppercase">List</h6>
                </div>
                @if (!$allProduct)
                    <p>Tidak ada produk tersedia</p>
                @else
                    <div class="row">
                        <div class="col-4">
                            @foreach ($allProduct as $product)
                                <div class="card p-3 rounded-4 pb-0">
                                    <img src="{{ asset('storage/images/' . $product->image) }}" class="rounded-4"
                                        alt="">
                                    <div class="mt-2">
                                        <h6 class="font-weight-bolder">{{ $product->name_product }}</h6>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between text-uppercase text-center text-xs font-weight-bolder opacity-7">
                                        <span class=" rounded-md px-1">{{ $product->category }}</span>
                                        <span>Rp. {{ number_format($product->price, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="mt-3">
                                        <button wire:click="updatedProductID({{ $product->id }})"
                                            class="btn btn-success w-full rounded-4 shadow">Order Now</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                {{-- <div class="row mt-3">
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
                                <span
                                    class="text-uppercase text-center text-xs font-weight-bolder opacity-7 px-1">Quantity</span>
                                <input type="number" id="quantity"
                                    class="form-control form-control-sm  text-center" value="1" min="1"
                                    style="width: 60px;">
                            </div>
                            <div class="row mt-3">
                                <div class="col-7 pe-1 ">
                                    <button type="button" class="btn btn-danger w-full shadow">Cancel</button>
                                </div>
                                <div class="col-5 ps-0">
                                    <button type="button" class="btn btn-success w-full shadow">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            {{-- End Header --}}

            {{-- Sale --}}
            @if ($saleActive)
                <div class="col-4">
                    <div class="card p-3 mb-4">
                        <h6>Member :</h6>
                        <input type="text" class="form-control mb-3" placeholder="Search Member..."
                            wire:model.live="searchMember">
                        @if (!empty($members))
                            <ul class="list-group">
                                @foreach ($members as $member)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="row">
                                            {{ $member->phone }} |
                                            {{ $member->name_customer }}
                                        </div>
                                        <button class="btn btn-primary btn-sm"
                                            wire:click="selectMember({{ $member->id }})">
                                            Add
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="card p-3 rounded-4">
                        <div class="d-flex justify-content-between align-items-center font-weight-bolder">
                            <span class="text-uppercase">Invoice :</span>
                            <span>{{ $saleActive->SalesID }}</span>
                        </div>
                        <div class="card p-2 mt-3 rounded-4">
                            <div class="row">
                                <div class="col-4 me-1">
                                    <img src="assets/img/logos/item-burger/b1.jpg" class="rounded-4" alt="burger">
                                </div>
                                <div class="col-7 px-0">
                                    <h6 class="d-inline-flex text-ms font-weight-bolder">Baraduochiz Burger
                                    </h6>
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
                                    <span>{{ number_format($subtotal, 2, ',', '.') }}</span>
                                </div>
                                <div class="d-flex justify-content-between mt-1">
                                    <span class="text-uppercase">Member :</span>
                                    @if ($customerName)
                                        <span>{{ $customerName }}</span>
                                    @else
                                        <span>Not available</span>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-between mt-1">
                                    <span class="text-uppercase">Discount :</span>
                                    @if ($this->saleActive && $this->saleActive->discount > 0)
                                        <span>{{ $this->saleActive->discount }}%</span>
                                    @else
                                        <span>Not available</span>
                                    @endif
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between mt-1">
                                    <span class="text-uppercase">Total Payment :</span>
                                    <span>Rp
                                        {{ number_format($totalAll, 2, ',', '.') }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <span class="text-uppercase">Payment :</span>
                                    <input type="number" class="form-control"
                                        {{ $allProduct->isEmpty() ? 'disabled' : '' }} placeholder="..."
                                        wire:model.live="pay" style="width: 150px;">
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <span class="text-uppercase">Get Change :</span>
                                    <span>{{ number_format($getChange, 2, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            @if ($pay)
                                @if ($getChange < 0)
                                    <div class="alert alert-danger text-white text-center mt-2">
                                        Money not enough
                                    </div>
                                @elseif ($getChange > 0 || $totalAll == $pay)
                                    <button type="button" class="btn btn-success w-full rounded-4 shadow"
                                        wire:click="payDone">Place An
                                        Order
                                        Now</button>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @endif
            {{-- End Sale --}}
        </div>
    </div>
    {{-- End Content --}}

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
</div>
