<?php component('header', compact('page_title')); ?>
<?php component('navbar'); ?>
    <h1 class='special-h1 normal-h1'>Your current <span>Tasks</span></h1>
<div class="container">
        <?php if(!$tasks){$tasks = [];} ?>


    <div class="task_type" ondrop="drop(event, 'todo')" ondragover="allowDrop(event)">
            <h2>To do</h2>
        <?php foreach ($tasks as $task): ?>
        <?php if($task['status']=='assigned'){?>
                <div class="task" draggable="true" ondragstart="drag(event)" id="<?= $task['id'] ?>">
                    <p><?= $task['description'] ?></p>
                    <p><?= $task['start_date']?></p>
                    <p><?= $task['due_date'] ?></p>
                </div>
        <?php }?>
        <?php endforeach; ?>
    </div>



    <div class="task_type" ondrop="drop(event, 'doing')" ondragover="allowDrop(event)">
            <h2>Doing</h2>
        <?php foreach ($tasks as $task): ?>
            <?php if($task['status']=='pending'){?>
                <div class="task" draggable="true" ondragstart="drag(event)" id="<?= $task['id'] ?>">
                    <h3><?= $task['title'] ?></h3>
                    <p><?= $task['description'] ?></p>
                    <p><?= $task['start_date']?></p>
                    <p><?= $task['deadline'] ?></p>
                </div>
            <?php }?>
        <?php endforeach; ?>
    </div>

    <div class="task_type" ondrop="drop(event, 'done')" ondragover="allowDrop(event)">
            <h2>Done</h2>
        <?php foreach ($tasks as $task): ?>
            <?php if($task['status']=='completed'){?>
                <div class="task" draggable="true" ondragstart="drag(event)" id="<?= $task['id'] ?>">
                    <h3><?= $task['title'] ?></h3>
                    <p><?= $task['description'] ?></p>
                    <p><?= $task['start_date']?></p>
                    <p><?= $task['deadline'] ?></p>
                </div>
            <?php }?>
        <?php endforeach; ?>
    </div>


        </div>
        <div class="create-task">
            <a href="/tasks/create">+</a>
        </div>
    </div>
<?php component('footer'); ?>