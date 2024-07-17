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
                    <button id="btnUpdateProductForm" class="btn btn-primary me-2" data-bs-toggle="modal"
                        data-bs-target="#updateProductModal" data-id="{{ $product->id }}"
                        data-name="{{ $product->name }}" data-price="{{ $product->price }}">
                        <span class="fa-regular fa-pen-to-square"></span>
                        Edit
                    </button>
                    <button id="btnDeleteProduct" class="btn btn-danger" data-id="{{ $product->id }}">
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
