<?php
date_default_timezone_set('Europe/Moscow');

// Подключение файла с функциями
require_once('functions.php');
define ('SECONDS_IN_DAY', 86400);

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

// Шаблон основного контента страницы
$page_content = renderTemplate('templates/index.php', ['task_list' => $task_list]);

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

