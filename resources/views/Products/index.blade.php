<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- Table --}}
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="ms-3">
                <h3 class="mb-0 h4 font-weight-bolder">{{ $title }}</h3>
                <p class="mb-4">
                    Information data about products
                </p>
            </div>

            <div class="card p-4">
                <div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-file-earmark-plus"></i> Add Product
                    </button>
                </div>
                <x-table>
                    <x-slot:field>
                        <th class="text-center">No</th>
                        <th class="text-center">Product ID</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Stock</th>
                        <th class="text-center">Action</th>
                    </x-slot:field>
                    <x-slot:data>
                        @php $i = 0; @endphp
                        @foreach ($products as $product)
                            @php $i++; @endphp
                            <tr>
                                <td class="text-center">{{ $i }}</td>
                                <td class="text-center">{{ $product->ProductID }}</td>
                                <td>
                                    <img src="{{ asset('storage/images/' . $product->image) }}"
                                        class="mx-auto rounded-circle" alt="Image not found" width="50">
                                </td>
                                <td class="text-center">{{ $product->name_product }}</td>
                                <td class="text-center">{{ $product->category }}</td>
                                <td class="text-center">{{ $product->price }}</td>
                                <td class="text-center">{{ $product->stock }}</td>
                                <td class="text-center">
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @if (Auth::user()->role == 'Admin')
                                            {{-- Button Hapus Member --}}
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-flat show_confirm"
                                                data-toggle="tooltip" title='Delete'>Delete Data</button>
                                            {{-- Button Edit Member --}}
                                        @endif
                                        <button type="button" class="btn btn-primary btnedit"
                                            value="{{ $product->id }}">
                                            Edit Data
                                        </button>
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
        <form action="{{ route('products.update') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                @method('PUT')
                <input type="hidden" class="form-control" id="id" name="id">

                <div class="mb-3">
                    <label for="ProductID" class="form-label">Product ID</label>
                    <input type="text" class="form-control" id="ProductID" name="ProductID">
                    @error('ProductID')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Image</label>
                    <input class="form-control" type="file" id="photo" name="photo">
                    @error('photo')
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
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" id="category" name="category" placeholder="..."
                        required>
                    @error('category')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price">
                    @error('price')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock">
                    @error('stock')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </x-modal.update-modal>

    {{-- FORM, Modal Add Data --}}
    <x-modal.add-modal>
        <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                @method($method)
                <div class="mb-3">
                    <label for="productID" class="form-label">Product ID</label>
                    <input type="text" class="form-control" id="productID" name="product_ID" placeholder="..."
                        required>
                    @error('product_ID')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control" type="file" id="formFile" name="photo">
                    @error('photo')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="..."
                        required>
                    @error('name')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" id="category" name="category" placeholder="..."
                        required>
                    @error('category')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="...">
                    @error('price')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="..."
                        required>
                    @error('stock')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </x-modal.add-modal>

    <script>
        new DataTable('#example');

        $(document).ready(function() {
            $(document).on("click", ".btnedit", function() {
                let product_id = $(this).val();
                $('#editModal').modal('show');

                $.ajax({
                    type: "GET",
                    url: 'products/edit-product/' + product_id,
                    success: function(response) {
                        // console.log(response); // Tambahkan ini untuk debugging

                        // Set nilai setiap input field dengan data dari response
                        $('#ProductID').val(response.product.ProductID);
                        $('#id').val(response.product.id);
                        $('#photo').val(response.product.photo); // Kosongkan field foto karena hanya untuk upload file baru
                        $('#name').val(response.product.name_product);
                        $('#category').val(response.product.category);
                        $('#price').val(response.product.price);
                        $('#stock').val(response.product.stock);
                    },
                    error: function(xhr) {
                        console.error("Error fetching data:", xhr.responseText);
                    }
                });
            });
        });
    </script>
</x-layout>
