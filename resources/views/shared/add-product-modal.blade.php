<!-- Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <form action="" method="POST" id="addProductForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addProductModalLabel">
                        <i class="fa-solid fa-dice-d6"></i>
                        Add Product
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
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name"
                                aria-label="Product Name" aria-describedby="add-product-name-input">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa-solid fa-dollar-sign"></i>
                            </span>
                            <input type="text" name="price" id="price" class="form-control" placeholder="Price"
                                aria-label="Product Price" aria-describedby="add-product-price-input">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">
                        <span class="fa-solid fa-xmark"></span>
                        Close
                    </button>
                    <button type="button" class="btn btn-light" id="btnAddProduct">
                        <span class="fa-solid fa-plus"></span>
                        Add
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
