<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <title>Laravel Table AJAX CRUD</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>

            <div class="col-md-8">
                <div class="h1 my-3 text-center">Laravel Table AJAX CRUD</div>

                <!-- Theme Toggle Icon -->
                <button id="themeToggle" class="btn btn-lg theme-toggle-btn">
                    <i class="fas fa-moon"></i>
                </button>

                <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal"
                    data-bs-target="#addProductModal">
                    <span class="fa-solid fa-plus"></span>
                    Add Product
                </button>

                <div class="input-group input-group-lg mb-3">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                    <input type="text" name="search" id="search" class="form-control"
                        placeholder="Search here..." aria-label="Search here" aria-describedby="search-here-input">
                </div>

                <div class="table-data">

                    <table class="table table-striped" id="productsTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>${{ $product->price }}</td>
                                    <td>
                                        <button id="btnUpdateProductForm" class="btn btn-primary me-2"
                                            data-bs-toggle="modal" data-bs-target="#updateProductModal"
                                            data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                            data-price="{{ $product->price }}">
                                            <span class="fa-regular fa-pen-to-square"></span>
                                            Edit
                                        </button>
                                        <button id="btnDeleteProduct" class="btn btn-danger"
                                            data-id="{{ $product->id }}">
                                            <span class="fa-regular fa-trash-can"></span>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr colspan="4">Nothing to show here.</tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('shared.add-product-modal')

    @include('shared.update-product-modal')

    @include('shared.product-script')

    {!! Toastr::message() !!}

</body>

</html>
