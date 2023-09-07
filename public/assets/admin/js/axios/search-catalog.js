$(document).ready(function () {
    var parentInput = $('.parent_id');
    var suggestionsDiv = $('.suggestions');

    parentInput.keyup(function () {
        var parent_id = parentInput.val();

        if (parent_id.length >= 5) {
            $.get(`/search/categories?search=${parent_id}`)
                .done(function (response) {
                    var suggestions = response;
                    console.log(suggestionsDiv);
                    // Очищаем контейнер с подсказками
                    suggestionsDiv.empty();

                    // Создаем элементы для подсказок и добавляем их в контейнер
                    $.each(suggestions, function (index, suggestion) {
                        var suggestionItem = $('<div>')
                            .addClass('suggestion')
                            .text(suggestion.title);

                        suggestionItem.click(function () {
                            // Установим выбранный каталог в поле ввода
                            parentInput.val(suggestion.title);
                            // Установим ID каталога в скрытое поле
                            $('#parent_id_hidden').val(suggestion.id);
                            // Очистим контейнер с подсказками
                            suggestionsDiv.empty();
                        });

                        suggestionsDiv.append(suggestionItem);
                    });
                })
                .fail(function (error) {
                    console.error(error);
                });
        }
    });
    parentInput.on('input', function () {
        // Очистка контейнера с подсказками
        suggestionsDiv.empty();
    });
});


$(document).ready(function () {
    $('#search_category').keyup(function () {

        var categoryVal = $('#search_category').val()

        if (categoryVal.length >= 5) {
            $.get(`/search/categories?search=${categoryVal}`, function (response) {
                var suggestions = response;

                // Очищаем контейнер с результатами
                $('#search_results').empty();

                // Создаем и добавляем ссылки с результатами в контейнер
                $.each(suggestions, function (index, suggestion) {
                    var suggestionLink = $('<a>')
                        .attr('href', `/admin/category/${suggestion.id}`) // Замените на правильный путь к роуту
                        .text(suggestion.title);

                    var suggestionItem = $('<div>')
                        .addClass('suggestion')
                        .append(suggestionLink);

                    $('#search_results').append(suggestionItem);
                });
            });
        } else {
            // Если в поле меньше 5 символов, очищаем контейнер с результатами
            $('#search_results').empty();
        }
    });

    $('#search_category').on('input', function () {
        // Очищаем контейнер с результатами при изменении значения поля
        $('#search_results').empty();
    });
});




