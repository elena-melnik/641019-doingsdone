<?php
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
        'deadline' => '22.04.2018',
        'category' => 'Входящие',
        'is_done' => false
    ],
    [
        'task_name' => 'Купить корм для кота',
        'deadline' => '-',
        'category' => 'Домашние дела',
        'is_done' => false
    ],
    [
        'task_name' => 'Заказать пиццу',
        'deadline' => '-',
        'category' => 'Домашние дела',
        'is_done' => false
    ],
];
