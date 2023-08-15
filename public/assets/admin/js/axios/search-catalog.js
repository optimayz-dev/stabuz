document.addEventListener('DOMContentLoaded', function () {
    var parentInput = document.getElementById('parent_id');
    var suggestionsDiv = document.getElementById('suggestions');

    parentInput.addEventListener('keyup', function () {
        var parent_id = parentInput.value;

        if (parent_id.length >= 3) {
            axios.get(`/search/categories?search=${parent_id}`)
                .then(function (response) {
                    var suggestions = response.data;

                    // Очищаем контейнер с подсказками
                    suggestionsDiv.innerHTML = '';

                    // Создаем элементы для подсказок и добавляем их в контейнер
                    suggestions.forEach(function (suggestion) {
                        var suggestionItem = document.createElement('div');
                        suggestionItem.classList.add('suggestion');
                        suggestionItem.textContent = suggestion.title;


                        suggestionItem.addEventListener('click', function () {
                            // Установим выбранный каталог в поле ввода
                            parentInput.value = suggestion.title;
                            // Установим ID каталога в скрытое поле
                            document.getElementById('parent_id_hidden').value = suggestion.id;
                            // Очистим контейнер с подсказками
                            suggestionsDiv.innerHTML = '';
                        });

                        suggestionsDiv.appendChild(suggestionItem);
                    });
                })
                .catch(function (error) {
                    console.error(error);
                });
        }
    });
});
