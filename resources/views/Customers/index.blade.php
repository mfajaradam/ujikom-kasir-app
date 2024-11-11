<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- Table --}}
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="ms-3">
                <h3 class="mb-0 h4 font-weight-bolder">{{ $title }}</h3>
                <p class="mb-4">
                    Information data about customers
                </p>
            </div>

            <div class="card p-4">
                <div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-file-earmark-plus"></i> Add Customer
                    </button>
                </div>
                <x-table>
                    <x-slot:field>
                        <th class="text-center">No</th>
                        <th class="text-center">Customer ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Action</th>
                    </x-slot:field>
                    <x-slot:data>
                        @php $i = 0; @endphp
                        @foreach ($customers as $customer)
                            @php $i++; @endphp
                            <tr>
                                <td class="text-center">{{ $i }}</td>
                                <td class="text-center">{{ $customer->CustomerID }}</td>
                                <td class="text-center">{{ $customer->name_customer }}</td>
                                <td class="text-center">{{ $customer->address }}</td>
                                <td class="text-center">{{ $customer->phone }}</td>
                                <td class="text-center">
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                        {{-- Button Edit Member --}}
                                        <button type="button" class="btn btn-primary btnedit"
                                            value="{{ $customer->id }}">
                                            Edit Data
                                        </button>
                                        {{-- Button Hapus Member --}}
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-flat show_confirm"
                                            data-toggle="tooltip" title='Delete'>Delete Data</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </x-slot:data>
                </x-table>
            </div>
        </div>
    </main>

    {{-- FORM, Modal Update Data --}}
    <x-modal.update-modal>
        <form action="{{ route('customers.update') }}" method="POST">
            <div class="modal-body">
                @csrf
                @method('PUT')
                <input type="hidden" class="form-control" id="id" name="id">

                <div class="mb-3">
                    <label for="CustomerID" class="form-label">Customer ID</label>
                    <input type="text" class="form-control" id="CustomerID" name="CustomerID">
                    @error('CustomerID')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                    @error('name')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address">
                    @error('address')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                    @error('phone')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </x-modal.update-modal>

    {{-- FORM, Modal Add Data --}}
    <x-modal.add-modal>
        <form action="{{ $route }}" method="POST">
            <div class="modal-body">
                @csrf
                @method($method)
                <div class="mb-3">
                    <label for="customerID" class="form-label">Customer ID</label>
                    <input type="text" class="form-control" id="customerID" name="customer_ID" placeholder="..."
                        required>
                    @error('customer_ID')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="..." required>
                    @error('name')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="...">
                    @error('address')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="..."
                        required>
                    @error('phone')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </x-modal.add-modal>

    <script>
        new DataTable('#example');

        // var myModal = document.getElementById('myModal')
        // var myInput = document.getElementById('myInput')

        // myModal.addEventListener('shown.bs.modal', function() {
        //     myInput.focus()
        // })

        $(document).ready(function() {
            $(document).on("click", ".btnedit", function() {
                let customer_id = $(this).val();
                // alert(customer_id);
                $('#editModal').modal('show');

                $.ajax({
                    type: "GET",
                    url: 'customers/edit-customer/' + customer_id,
                    success: function(response) {
                        // console.log(response);
                        $('#CustomerID').val(response.customer.CustomerID);
                        $('#name').val(response.customer.name_customer);
                        $('#address').val(response.customer.address);
                        $('#phone').val(response.customer.phone);
                        $('#id').val(response.customer.id);
                    }
                })
            })
        })
    </script>
</x-layout>
