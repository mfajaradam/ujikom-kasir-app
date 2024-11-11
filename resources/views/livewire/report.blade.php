<div>
    @php
        $dataSale = $saleAll;
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-0 h4 font-weight-bolder">Report</h3>
                <p class="mb-4">
                    Information report transactions
                </p>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Transaction Report</h4>
                        @if (count($dataSale) > 0)
                            <a href="{{ url('/print') }}" target="_blank" class="btn btn-primary">Report</a>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7" >Number</th>
                                <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7" >Date</th>
                                <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7" >Number Invoice</th>
                                <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7" >Subtotal</th>
                                <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7" >Discount</th>
                                <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7" >Total</th>
                            </thead>
                            <tbody>
                                @foreach ($dataSale as $sale)
                                    <tr>
                                        <td class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ $loop->iteration }}</td>
                                        <td class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ $sale->sale_date }}</td>
                                        <td class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ $sale->SalesID }}</td>
                                        <td class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ number_format($sale->subtotal, 2, ',', '.') }}</td>
                                        <td class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ rtrim(rtrim($sale->discount, '0'), '.') }}%</td>
                                        <td class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">{{ number_format($sale->total, 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
