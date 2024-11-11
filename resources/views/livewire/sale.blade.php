<div>
    <div class="ms-3">
        <div class="row">
            <div class="col-4">
                <h3 class="mb-0 h4 font-weight-bolder">Sale</h3>
                <p class="mb-4">
                    Transaction Product
                </p>
                <div class="ms-3">
                    <button class="btn {{ !$saleActive ? 'btn-primary' : 'btn-danger' }}"
                        wire:click="{{ !$saleActive ? 'newSale' : 'cancelSale' }}">
                        {{ !$saleActive ? 'New Sale' : 'Cancel Sale' }}
                    </button>
                    <button class="btn btn-info" wire:loading>Loading ...</button>
                </div>
            </div>
            @if ($saleActive)
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <h6>Invoice : {{ $saleActive->SalesID }}</h6>
                            </div>
                            <hr>
                            <div>
                                <h6>Total : <span
                                        class="font-weight-bolder">Rp.{{ $totalAll === 0 ? 'XXXXXXXXXX' : number_format($totalAll, 2, ',', '.') }}</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Search Member --}}
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h6>Member :</h6>
                            <input type="text" class="form-control mb-3" wire:model.live="searchMember"
                                placeholder="Search Member...">

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
                    </div>
                </div>
            @else
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <h6>Invoice : XXXXXXXXXX</h6>
                            </div>
                            <hr>
                            <div>
                                <h6>Total : <span class="font-weight-bolder">Rp.XXXXXXXXXX</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="row mt-3 mb-3">
        {{-- <div class="col-4">
            <div class="ms-3">
                <button class="btn {{ !$saleActive ? 'btn-primary' : 'btn-danger' }}"
                    wire:click="{{ !$saleActive ? 'newSale' : 'cancelSale' }}">
                    {{ !$saleActive ? 'New Sale' : 'Cancel Sale' }}
                </button>
                <button class="btn btn-info" wire:loading>Loading ...</button>
            </div>
        </div> --}}
        <div class="col-8">
            {{-- <div class="card">
                <div class="card-body">
                    <h6>Member :</h6>
                    <input type="text" class="form-control mb-3" wire:model.live="searchMember"
                        placeholder="Search Member...">

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
            </div> --}}
        </div>
    </div>


    @if ($saleActive)
        <div class="row">
            <div class="col-4">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                @if ($customerName)
                                    <div class="row">
                                        <span><strong>Member :</strong> {{ $customerName }}</span>
                                    </div>
                                    <div class="row">
                                        <span><strong>Phone :</strong> {{ $customerPhone }} </span>
                                    </div>
                                    <!-- Tampilkan informasi lain sesuai kebutuhan -->
                                @else
                                    <p>No member selected.</p>
                                @endif
                            </div>
                            <hr>
                            <div class="col">
                                <h6 class="card-title">Total Cost</h6>
                                <div class="d-flex justify-content-between">
                                    <span>Subtotal :</span>
                                    <span>{{ number_format($subtotal, 2, ',', '.') }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Diskon :</span>
                                    @if ($this->saleActive && $this->saleActive->discount > 0)
                                        <span>Diskon: {{ $this->saleActive->discount }}%</span>
                                    @else
                                        <span>Tidak tersedia</span>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>Rp.</span>
                                    <span>{{ number_format($totalAll, 2, ',', '.') }}</span>
                                </div>
                                <hr>
                                <div class="mt-4">
                                    <h6 class="card-title">Pay</h6>
                                    <input type="number" class="form-control"
                                        {{ $allProduct->isEmpty() ? 'disabled' : '' }} placeholder="..."
                                        wire:model.live="pay">
                                </div>
                                <hr>
                                <div class="mt-4">
                                    <h6 class="card-title">Get Change</h6>
                                    <div class="d-flex justify-content-between">
                                        <span>Rp.</span>
                                        <span>{{ number_format($getChange, 2, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($pay)
                        @if ($getChange < 0)
                            <div class="alert alert-danger text-white text-center mt-2">
                                Money not enough
                            </div>
                        @elseif ($getChange > 0 || $totalAll == $pay)
                            <button class="btn btn-success mt-3 w-100" wire:click="payDone">PAY</button>
                        @endif
                    @endif
                </div>
            </div>

            {{-- Chart --}}
            <div class="col-8 ">
                <div class="card">
                    <div class="card-body">
                        <h6>Product :</h6>
                        <input type="text" class="form-control mb-3" wire:model.live="searchProduct"
                            placeholder="Search product...">
                        @if (!empty($products))
                            <ul class="list-group">
                                @foreach ($products as $product)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="row">
                                            {{ $product->ProductID }} |
                                            {{ $product->name_product }}
                                        </div>
                                        <button class="btn btn-primary btn-sm"
                                            wire:click="selectProduct({{ $product->id }})">
                                            Add
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        @if ($messageError)
                            <div class="alert alert-danger" role="alert">
                                {{ $messageError }}
                            </div>
                        @endif
                        <hr>
                        <div class="table-responsive">
                            <table class="table w-100">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-center text-xxs font-weight-bolder opacity-7">No
                                        </th>
                                        <th class="text-uppercase text-center text-xxs font-weight-bolder opacity-7">
                                            Number Product</th>
                                        <th class="text-uppercase text-center text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th class="text-uppercase text-center text-xxs font-weight-bolder opacity-7">
                                            Price</th>
                                        <th class="text-uppercase text-center text-xxs font-weight-bolder opacity-7">QTY
                                        </th>
                                        <th class="text-uppercase text-center text-xxs font-weight-bolder opacity-7">
                                            Subtotal</th>
                                        <th class="text-uppercase text-center text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allProduct as $product)
                                        <tr>
                                            <td
                                                class="text-uppercase text-center text-xxs font-weight-bolder opacity-7 align-middle">
                                                {{ $loop->iteration }}</td>
                                            <td
                                                class="text-uppercase text-center text-xxs font-weight-bolder opacity-7 align-middle">
                                                {{ $product->product->ProductID }}</td>
                                            <td
                                                class="text-uppercase text-center text-xxs font-weight-bolder opacity-7 align-middle">
                                                {{ $product->product->name_product }}</td>
                                            <td
                                                class="text-uppercase text-center text-xxs font-weight-bolder opacity-7 align-middle">
                                                {{ number_format($product->product->price, 2, ',', '.') }}</td>
                                            <td
                                                class="text-uppercase text-center text-xxs font-weight-bolder opacity-7 align-middle">
                                                {{ $product->quantity }}
                                            </td>
                                            <td
                                                class="text-uppercase text-center text-xxs font-weight-bolder opacity-7 align-middle">
                                                {{ number_format($product->product->price * $product->quantity, 2, ',', '.') }}
                                            </td>
                                            <td class="text-center align-middle">
                                                <button class="btn btn-danger mx-auto"
                                                    wire:click="deleteProduct({{ $product->id }})">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
