<?php

// Функция подсчета задач в массиве по переданному аргументу - имени категории
function getCategoryTasksQuantity($tasks_array, $category_name) {

    $quantity = 0;

    // Итерация по массиву, посчитать сколько его элементов относятся к проекту из аргумента $category_name.
    foreach ($tasks_array as $array_item) {
        if ($array_item['category'] == $category_name) {
            $quantity++;
        }
    }

    // Если аргумент $category_name равен строке "Все", то вернуть общее число задач в массиве.
    if ($category_name == 'Все') {
        $quantity = count($tasks_array);
    }

    return $quantity;
}

// Функция фильтрации данных
function filterText($string) {
    $html_text = htmlspecialchars($string);

    return $html_text;
}

// Функция-шаблонизатор
function renderTemplate($template_path, $template_data) {

    if (file_exists($template_path)) {
        extract($template_data);
        ob_start();
        require_once $template_path;
        return ob_get_clean();
    }
    return '';
}
