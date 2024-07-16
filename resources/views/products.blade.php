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

    <title>Laravel Table AJAX CRUD</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="h1 my-3 text-center">Laravel Table AJAX CRUD</div>

                <div class="table-data">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal"
                        data-bs-target="#addProductModal">
                        <span class="fa-solid fa-plus"></span>
                        Add Product
                    </button>

                    <table class="table table-striped table-dark" id="productsTable">
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
                                        <button class="btn btn-primary me-2">
                                            <span class="fa-regular fa-pen-to-square"></span>
                                            Edit
                                        </button>
                                        <button class="btn btn-danger">
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

    @include('shared.product-script')

</body>

</html>
