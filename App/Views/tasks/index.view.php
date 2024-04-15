<?php component('header', compact('page_title')); ?>
<?php component('navbar'); ?>
    <h1 class='special-h1 normal-h1'>Your current <span>Tasks</span></h1>
    <div class="container">
<!--        --><?php //dd($tasks);?>
        <?php foreach ($tasks as $task): ?>
            <div class="task">

                <p><?= $task['title'] ?></p>
                <p><?= $task['description'] ?></p>
                <p><?= $task['start_date']?></p>
                <p><?= $task['deadline'] ?></p>
                <p><?= $task['completed'] ?></p>
                <form action="/tasks" method="post">
                    <div class="yellow-stylish-button form-button">
                        <div>
                            <button>Delete</button>
                        </div>
                    </div>
                </form>

            </div>
        <?php endforeach; ?>
        <div class="create-task">
            <a href="/tasks/create">+</a>
        </div>
    </div>
<?php component('footer'); ?>