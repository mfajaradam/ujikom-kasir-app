<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Print Transaction Report</title>
</head>

<body onload="print()">
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4 ">Transaction Report</h4>
                        {{-- <a href="{{ url('/print') }}" target="_blank" class="btn btn-primary mb-3">Cetak</a> --}}
                        {{-- <img src="../assets/img/logo street food.jpg" class="navbar-brand-img" alt="main_logo"> --}}
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
                                @foreach ($saleAll as $sale)
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

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
