<?php component('header', compact('page_title')); ?>
<?php component('navbar'); ?>
    <h1 class='special-h1 normal-h1'>Your current <span>Tasks</span></h1>
    <div class="container">
        <?php if(!$tasks){$tasks = [];} ?>
        <?php foreach ($tasks as $task): ?>
            <div class="task">
    <div class="column">
                <div class="task-container">
                    <p><?= $task['title'] ?></p>
                    <p><?= $task['description'] ?></p>
                </div>
    </div>
    <div class="column">
                <p><?= $task['start_date']?></p>
                <p><?= $task['deadline'] ?></p>
    </div>
    <div class="column">
                <p><?= $task['completed'] ?></p>
        <form method="post">
            <input type="hidden" name="id" value="<?= $task["id"]?>" />
            <input type="hidden" name="_method" value="DELETE" />
            <button>Delete</button>
        </form>

    </div>
            </div>
        <?php endforeach; ?>
        <div class="create-task">
            <a href="/tasks/create">+</a>
        </div>
    </div>
<?php component('footer'); ?>