<!-- Modal -->
<div class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="updateProductModalLabel" aria-hidden="true">
    <form action="" method="POST" id="updateProductForm">
        @csrf
        @method('PUT')
        <input type="hidden" name="" id="update_id">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateProductModalLabel">
                        <i class="fa-solid fa-dice-d6"></i>
                        Update Product
                    </h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="error-message text-danger">
                    </div>

                    <div class="form-group">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa-solid fa-bag-shopping"></i>
                            </span>
                            <input type="text" name="update_name" id="update_name" class="form-control"
                                placeholder="Name" aria-label="Product Name"
                                aria-describedby="update-product-name-input">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa-solid fa-dollar-sign"></i>
                            </span>

                            <input type="number" name="update_price" id="update_price" class="form-control"
                                placeholder="Price" aria-label="Product Price"
                                aria-describedby="update-product-price-input">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">
                        <span class="fa-solid fa-xmark"></span>
                        Close
                    </button>

                    <button type="button" class="btn btn-light" id="btnUpdateProduct">
                        <span class="fa-solid fa-plus"></span>
                        Update
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
