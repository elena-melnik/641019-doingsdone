<?php
date_default_timezone_set('Europe/Moscow');

// Подключение файла с функциями
require_once('functions.php');

// простой массив проектов
$task_categories = ["Все", "Входящие", "Учеба", "Работа", "Домашние дела", "Авто"];

// двумерный массив, каждый элемент которого содержит ассоциативный массив
$task_list = [
    [
        'task_name' => 'Собеседование в IT компании',
        'deadline' => '01.06.2018',
        'category' => 'Работа',
        'is_done' => false
    ],
    [
        'task_name' => 'Выполнить тестовое задание',
        'deadline' => '25.05.2018',
        'category' => 'Работа',
        'is_done' => false
    ],
    [
        'task_name' => 'Сделать задание первого раздела',
        'deadline' => '21.04.2018',
        'category' => 'Учеба',
        'is_done' => true
    ],
    [
        'task_name' => 'Встреча с другом',
        'deadline' => '20.02.2018',
        'category' => 'Входящие',
        'is_done' => false
    ],
    [
        'task_name' => 'Купить корм для кота',
        'deadline' => '',
        'category' => 'Домашние дела',
        'is_done' => false
    ],
    [
        'task_name' => 'Заказать пиццу',
        'deadline' => '',
        'category' => 'Домашние дела',
        'is_done' => false
    ],
];

define ('SECONDS_IN_DAY', 86400);
$current_timestamp = time();
// Выявление задач, до даты выполнения которых осталось меньше одного дня.
foreach ($task_list as $index => $task) {
    $days_to_deadline = null;

    if ($task['deadline'] != '') {
        $deadline_timestamp = strtotime($task['deadline']);
        $days_to_deadline = floor(($deadline_timestamp - $current_timestamp) / SECONDS_IN_DAY);
    }

    $task['is_important'] = false;

    if (!is_null($days_to_deadline) && $days_to_deadline <= 1) {
        $task['is_important'] = true;
    }

    $task_list[$index] = $task;
}

$filtered_task_list = [];
// Проверка на существования параметра запроса с идентификатором проекта
if (isset($_GET['task_id'])) {
    $task_id = $_GET['task_id'];

    foreach ($task_list as $task) {
        if (($task['category'] == $task_id) || ($task_id == 'Все')){
            array_push($filtered_task_list, $task);
        }
    }
} else {
    $filtered_task_list = $task_list;
}

if (!$filtered_task_list) {
    http_response_code(404);
}

// Шаблон основного контента страницы
$page_content = renderTemplate('templates/index.php', ['task_list' => $filtered_task_list]);

// Шаблон лейаута страницы с включенным в него основным контентом страницы
$layout_content = renderTemplate('templates/layout.php', [
    'content_main' => $page_content,
    'task_categories' => $task_categories,
    'task_list' => $task_list,
    'user_name' => 'Константин',
    'site_title' => 'Дела в порядке - Главная страница'
]);

// Вывод содержимого лейаута страницы
print($layout_content);

