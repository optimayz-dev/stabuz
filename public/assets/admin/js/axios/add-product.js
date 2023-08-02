$(document).ready(function () {
    $(document).on('keyup', '#search', function () {
        var searchVar = $('#search').val();

        if (searchVar === "") {
            $('#list-container').html(''); // Используем #list-container вместо #list
            $('#result').hide();
        } else {
            axios.get(route('get.product.parents'), {
                searchVar: searchVar
            })
                .then(function (response) {
                    // Обновить #list-container с результатами поиска
                    var products = response.data.products;
                    var html = '';

                    // Создать HTML-разметку для каждого продукта
                    products.forEach(function (product) {
                        html += '<div class="product">';
                        html += '<h2>' + product.title + '</h2>';
                        // Добавьте другие свойства продукта, которые вы хотите отобразить
                        html += '</div>';
                    });

                    $('#list-container').html(html); // Используем #list-container вместо #list

                    // Показать #result
                    $('#result').show();
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    });
});

$(document).ready(function (){
    $(document).on('keyup', '#catalog_id', function (){
        var catalog_id = $('#catalog_id').val()

        if (catalog_id === ''){

        } else {
            axios.get('get.product.parents', {
                catalog_id: catalog_id
            })
                .then(function (respone){

                })
        }
    })
})
