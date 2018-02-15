<?php
require_once('functions.php');
require_once('data.php');

$page_content = includeTemplate('templates/index.php', ['task_list' => $task_list]);

$layout_content = includeTemplate('templates/layout.php', [
    'content_main' => $page_content,
    'task_categories' => $task_categories,
    'task_list' => $task_list,
    'user_name' => 'Константин',
    'site_title' => 'Дела в порядке - Главная страница'
]);

print($layout_content);

