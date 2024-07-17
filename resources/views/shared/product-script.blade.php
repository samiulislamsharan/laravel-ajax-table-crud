<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
    integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://kit.fontawesome.com/b9b86b707b.js" crossorigin="anonymous"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on("click", "#btnAddProduct", function(e) {
            e.preventDefault();

            let name = $("#name").val();
            let price = $("#price").val();

            // console.log(name, price);

            $.ajax({
                type: "POST",
                url: "{{ route('product.store') }}",
                data: {
                    name: name,
                    price: price
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.status == "success") {
                        $("#addProductModal").modal("hide");
                        $("#addProductForm")[0]
                            .reset();
                        $("#productsTable").load(
                            location.href + " #productsTable");
                    }
                },
                error: function(error) {
                    // console.log(error);
                    let err = error.responseJSON;
                    if (err.errors) {
                        $(".error-message").html("");
                        $.each(err.errors, function(key, value) {
                            $(".error-message").append("<p>" + value +
                                "</p> <br>");
                        });
                    }
                }
            });
        });

        $(document).on("click", "#btnUpdateProductForm", function() {
            let id = $(this).data("id");
            let name = $(this).data("name");
            let price = $(this).data("price");

            $("#update_id").val(id);
            $("#update_name").val(name);
            $("#update_price").val(price);

            $("#updateProductModal").modal("show");
        });
        });
    });
</script>
