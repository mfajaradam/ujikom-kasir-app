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
                        <th class="text-center">User ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Password</th>
                        <th class="text-center">role</th>
                        <th class="text-center">Action</th>
                    </x-slot:field>
                    <x-slot:data>
                        @php $i = 0; @endphp
                        @foreach ($users as $user)
                            @php $i++; @endphp
                            <tr>
                                <td class="text-center">{{ $i }}</td>
                                <td class="text-center">{{ $user->UserID }}</td>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center">{{ $user->phone }}</td>
                                <td class="text-center">{{ $user->password }}</td>
                                <td class="text-center">{{ $user->role }}</td>
                                <td class="text-center">
                                    <form action="" method="POST">
                                        {{-- Button Edit Member --}}
                                        <button type="button" class="btn btn-primary btnedit"
                                            value="{{ $user->id }}">
                                            Edit Data
                                        </button>
                                        {{-- Button Hapus Member --}}
                                        @csrf
                                        {{-- @method('DELETE') --}}
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
