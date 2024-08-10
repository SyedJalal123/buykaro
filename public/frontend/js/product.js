
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

document.addEventListener( 'DOMContentLoaded', function () {
    var splide = new Splide( '#thumbnail-slider', {
            gap         : 10,
            rewind      : true,
            focus       : 'center',
            pagination  : false,
    });
    var thumbnails = $('.thumbnail');
    var current;

    for ( var i = 0; i < thumbnails.length; i++ ) {
        initThumbnail( thumbnails[ i ], i );
    }

    function initThumbnail( thumbnail, index ) {
        thumbnail.addEventListener( 'click', function () {
            splide.go( index );
        } );
    }

    splide.on( 'mounted move', function () {
        var thumbnail = thumbnails[ splide.index ];

        if ( thumbnail ) {
            if ( current ) {
                current.classList.remove( 'is-active' );
            }

            thumbnail.classList.add( 'is-active' );
            current = thumbnail;
        }
    } );

    splide.mount();
});

$(document).ready(function() {
    $(document).on('click', '.view_variation-item', function(){
        if($('.view_variation-item').hasClass('selected')){
            $(".view_variation-item").removeClass("selected");
        }
        $(this).addClass("selected");   
    });

    $(document).on('click', '.is-minus', function(){
        val = parseInt($('#view_quantity_input').val()) - 1;
        if(val > 0){
            $('#view_quantity_input').val(parseInt(val));
        }
    });

    $(document).on('click', '.is-plus', function(){
        val = parseInt($('#view_quantity_input').val()) + 1;
        $('#view_quantity_input').val(parseInt(val));
    });

    $(document).on('click', '.variation-item', function(){
        if($('.variation-item').hasClass('selected')){
            $(".variation-item").removeClass("selected");
        }
        $(this).addClass("selected");   
    });

    $('#city-select').select2({
        dropdownParent: $('#buynow_modal .modal-body')
    });
    
    window.onload = function() { 
        if($('#modal_value').val() == 'open'){
            $('#buynow_modal').modal('show');
        }
    }
});

function splide_main_fun(id){
    product_images = "{{json_encode($product_images)}}".split(',');
    html = '';
    for(i = 0; i < product_images.length; ++i){    
        html += '<li class="splide__slide">'+
                    '<img src="'+product_images[i].replace("[&quot;", "").replace("&quot;","").replace("&quot;]","")+'">'+
                '</li>';
    }
    $('#thumbnail-slider-list').append(html);

    var splide = new Splide( '#thumbnail-slider', {
            gap         : 10,
            rewind      : true,
            focus       : 'center',
            pagination  : false,
    });
    var thumbnails = $('.thumbnail');
    var current;

    for ( var i = 0; i < thumbnails.length; i++ ) {
        initThumbnail( thumbnails[ i ], i );
    }

    function initThumbnail( thumbnail, index ) {
        thumbnail.addEventListener( 'click', function () {
            splide.go( index );
        } );
    }

    splide.on( 'mounted move', function () {
        var thumbnail = thumbnails[ splide.index ];

        if ( thumbnail ) {
            if ( current ) {
                current.classList.remove( 'is-active' );
            }

            thumbnail.classList.add( 'is-active' );
            current = thumbnail;
        }
    } );

    splide.mount();
}

function splide_fun(id){
    var splide = new Splide( id, {
        gap         : 10,
        rewind      : true,
        focus       : 'center',
        pagination  : false,
    });
    var thumbnails = $('.thumbnail');
    var current;

    for ( var i = 0; i < thumbnails.length; i++ ) {
        initThumbnail( thumbnails[ i ], i );
    }

    function initThumbnail( thumbnail, index ) {
        thumbnail.addEventListener( 'click', function () {
            splide.go( index );
        } );
    }

    splide.on( 'mounted move', function () {
        var thumbnail = thumbnails[ splide.index ];

        if ( thumbnail ) {
            if ( current ) {
                current.classList.remove( 'is-active' );
            }

            thumbnail.classList.add( 'is-active' );
            current = thumbnail;
        }
    });

    splide.mount();
}

function addtocart(){
    variation = null;
    variation_title = null;
    id = $('#modal_productId').val();
    title = $('#product-model-title').text();
    quantity = $('#quantity_input').val();
    price = $('#modal_price_input').val();
    image = $('#modal_productImage').val();

    $(".variation-item").each(function () {
        if($(this).hasClass("selected")){
            variation = $(this).text();
            return false;
        }
    });

    // variation_title = $('#variation-title-'+variation).val();
    variation_title = document.getElementById('variation-title-'+variation).value;
    
    // Get Data
    $.ajax({
        url: PR_URL+'/addToCart',
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
            console.log(response);
        }
    });
}

function buynow() {
    variation = null;
    variation_title = null;
    $(".variation-item").each(function () {
        if($(this).hasClass("selected")){
            variation = $(this).text();
            return false;
        }
    });
    product_id = $('#product_id').val();
    variation_title = document.getElementById('variation-title-'+variation).value;
    // variation_title = $('#variation-title-'+variation).val();
    quantity = $('#quantity_input').val();
    price = $('#product_price').val();
    total = quantity * price;

    $('#product').val(product_id+'-'+variation_title+'-'+variation+'-'+quantity+'-'+price+'-'+total);
    $('#product_variation_title').val(variation_title);
    $('#product_variation_value').val(variation);
    $('#product_quantity').val(quantity);
    $('#product_sub_total').val(total);
    $('#total').val(total);
    $('#total_show').text('Rs'+addCommas(total)+'.00');
    $('#submit-button').text('BUY IT NOW - '+'Rs.'+addCommas(total)+'.00');
    $('#price_and_quantity').text('Rs.'+addCommas(price)+'.00 x '+quantity);
    html = '';
    html = variation_title+": <strong>"+variation+"</strong>";
    $('#product-variation').html(html);

    // del_url = "{{url('remove_from_cart')}}"+'/'+product_id+'/'+variation+'/open';
    // $('cart-box-delete').attr('href',del_url);

    
}