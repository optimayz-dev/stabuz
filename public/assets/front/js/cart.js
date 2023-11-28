$(document).ready(function () {

    var form = '.cart';

    $(form).on('submit', function (event) {
        event.preventDefault();

        var url = $(this).attr('data-action');

        $.ajax({
            url: url,
            method: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                console.log(response)

                $('#success_div').addClass('show');

                setTimeout(function () {
                    $('#success_div').removeClass('show')
                }, 3000);
            },
            error: function (response) {
                console.log(response);
            }
        });
    });

    var minusProduct = '.minus-product';

    $(minusProduct).on('click', function (event) {
        event.preventDefault();

        let routeurl = $(this).attr('href');
        console.log(routeurl);
        $.ajax({
            url: routeurl,
            method: 'GET',
            cache: false,
            processData: false,
            success: function (response) {
                // for (let i = 0; i < basketItems.length; i++) {
                //     totalQuantity += basketItems[i].quantity;
                // }
                // $('.total_quantity').text(response)
                console.log(response)
                // console.log(response)
                // window.location.reload();
            },
            error: function (response) {
                console.log(response);
            }
        });

    })

    var plusProduct = '.plus-product';

    $(plusProduct).on('click', function (event) {
        event.preventDefault();

        let routeurl = $(this).attr('href');

        console.log(routeurl);
        $.ajax({
            url: routeurl,
            method: 'GET',
            cache: false,
            processData: false,
            success: function (response) {
                // for (let i = 0; i < basketItems.length; i++) {
                //     totalQuantity += basketItems[i].quantity;
                // }
                // $('.total_quantity').text(response)
                console.log(response)
                // console.log(response)
                // window.location.reload();
            },
            error: function (response) {
                console.log(response);
            }
        });

    })

    var deleteProduct = '.delete-product';

    $(deleteProduct).on('click', function (event) {
        event.preventDefault();

        let routeurl = $(this).attr('href');

        console.log(routeurl);
        $.ajax({
            url: routeurl,
            method: 'GET',
            cache: false,
            processData: false,
            success: function (response) {
                // for (let i = 0; i < basketItems.length; i++) {
                //     totalQuantity += basketItems[i].quantity;
                // }
                // $('.total_quantity').text(response)
                console.log(response)
                // console.log(response)
                // window.location.reload();
            },
            error: function (response) {
                console.log(response);
            }
        });

    })

});
