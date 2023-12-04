$(document).ready(function() {
    $("#addEmail").on("click", function() {
        $("#more-input").append("<div class=\"input-wrapper\"><input type=\"text\" name=\"parent_id\" class=\"form-control parent_id\" placeholder=\"Ведите название категории\" id=\"parent_id\" value=\"\"/><input type=\"hidden\" name=\"parent_id_hidden\" id=\"parent_id_hidden\"/><div class=\"suggestions\"></div></div>");
    });
    $("#removeEmail").on("click", function() {
        $("#more-input").children().last().remove();
    });
});

$(document).ready(function() { $("#e1").select2(); });
$(document).ready(function() { $("#e2").select2(); });
$(document).ready(function() { $("#e3").select2(); });
$(document).ready(function() { $("#e4").select2(); });
$(document).ready(function() { $("#e5").select2(); });
$(document).ready(function() { $("#e6").select2(); });

$(".select option").each(function() {
    $(this).siblings('[value="'+ this.value +'"]').remove();
});

// <div className="input-wrapper"><label>@error('parent_id_hidden')<div className=parent_id_hidden>{{$message}}</div>@enderror<input type="text" name="parent_id" className="form-control" placeholder="Ведите название категории" id="parent_id" value=""/><input type="hidden" name="parent_id_hidden" id="parent_id_hidden"/></label><div id="suggestions"></div></div>


$(document).ready(function () {
    var parentInput = $('#parent_id');
    var suggestionsDiv = $('#suggestions');

    parentInput.keyup(function () {
        var parent_id = parentInput.val();

        if (parent_id.length >= 3) {
            $.get(`/search/category?search=${parent_id}`)
                .done(function (response) {
                    var suggestions = response;
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

        if (categoryVal.length >= 3) {
            $.get(`/search/category?search=${categoryVal}`, function (response) {
                var suggestions = response;

                // Очищаем контейнер с результатами
                $('#search_results').empty();

                // Создаем и добавляем ссылки с результатами в контейнер
                $.each(suggestions, function (index, suggestion) {
                    var suggestionLink = $('<a>')
                        .attr('href', `/admin/catalog/${suggestion.id}/edit`) // Замените на правильный путь к роуту
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




