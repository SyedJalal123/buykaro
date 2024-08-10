function addToCart(id, title, quantity, price, image, variation_title, variation){
    
    // Get Data
    $.ajax({
        url: PR_URL+"/addToCart",
        type: "POST",
        data:{ 
            id: id,
            title: title,
            quantity: quantity,
            price: price,
            variation: [variation_title, variation],
            image: image
        },
        success: function(response){
            Swal.fire({
                icon: "success",
                title: "Item Added to Cart",
                showConfirmButton: false,
                timer: 3000,
                showCloseButton: true,
                footer: '<a href="'+PR_URL+'/cart" class="btn-3">GO TO CART</a>'
            });
        }
    });
}