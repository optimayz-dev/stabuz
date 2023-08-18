$(document).ready(function () {

    var suggestionsDiv = $('#attribute');
    var attributeInput = $('#search_attribute');
    var parentInput = $('#parent_id_hidden');

    attributeInput.keyup(function () {
        var parent_id = parentInput.val();
        if (attributeInput.length >= 1) {

            $.get(`/search/attribute?search=${parent_id}`)

                .done(function (response) {
                    var suggestions = response;

                    // Очищаем контейнер с подсказками
                    suggestionsDiv.empty();

                    // Создаем элементы для подсказок и добавляем их в контейнер
                    $.each(suggestions, function (index, suggestion) {
                        var suggestionItem = $('<div>')
                            .addClass('attribute')
                            .text(suggestion.title);

                        suggestionItem.click(function () {
                            // Установим выбранный каталог в поле ввода
                            attributeInput.val(suggestion.title);
                            // Установим ID каталога в скрытое поле
                            $('#attribute_id').val(suggestion.id);
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
