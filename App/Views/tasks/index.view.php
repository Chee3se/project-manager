<?php component('header', compact('page_title')); ?>
<?php component('navbar'); ?>
    <h1 class='special-h1 normal-h1'>Your current <span>Tasks</span></h1>
    <div class="container">
        <?php foreach ($tasks as $task): ?>
            <div class="task">
                <p><?= $task['title'] ?></p>
                <p><?= $task['description'] ?></p>
                <p><?= $task['deadline'] ?></p>
                <p><?= $task['completed'] ?></p>
            </div>
        <?php endforeach; ?>
        <div class="create-task">
            <a href="/tasks/create">+</a>
        </div>
    </div>
<?php component('footer'); ?>