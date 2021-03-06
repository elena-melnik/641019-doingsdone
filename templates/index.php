<h2 class="content__main-heading">Список задач</h2>

<form class="search-form" action="index.html" method="post">
    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

    <input class="search-form__submit" type="submit" name="" value="Искать">
</form>

<div class="tasks-controls">
    <nav class="tasks-switch">
        <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
        <a href="/" class="tasks-switch__item">Повестка дня</a>
        <a href="/" class="tasks-switch__item">Завтра</a>
        <a href="/" class="tasks-switch__item">Просроченные</a>
    </nav>

    <label class="checkbox">
        <a href="/">
            <input class="checkbox__input visually-hidden" type="checkbox">
            <span class="checkbox__text">Показывать выполненные</span>
        </a>
    </label>
</div>

<?php if ($task_list): ?>
    <!-- Заменить все содержимое этой таблицы данными из массива задач $task-list -->
    <table class="tasks">
        <?php foreach ($task_list as $task): ?>
            <!-- Если у задачи статус "выполнен", то строке с этой задачей добавить класс "task--completed" -->
            <tr class="tasks__item <?= ($task['is_done'])? ' task--completed' : '' ?> <?= ($task['is_important'])? ' task--important' : '' ?>">
                <td class="task__select">
                    <label class="checkbox task__checkbox">
                        <!--добавить input-у аттрибут "checked", если у задачи статус "выполнен" -->
                        <input class="checkbox__input visually-hidden" type="checkbox" <?= ($task['is_done'])? ' checked' : '' ?>>
                        <span class="checkbox__text"><?=filterText($task['task_name']); ?></span>
                    </label>
                </td>

                <td class="task__file"><?=filterText($task['category']); ?></td>

                <td class="task__date"><?=filterText($task['deadline']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Задач этой категории нет</p>
<?php endif; ?>
