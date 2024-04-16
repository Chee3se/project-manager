<?php component('header', compact('page_title')); ?>
<?php component('navbar'); ?>
    <h1 class='special-h1 normal-h1'>Your current <span>Tasks</span></h1>
<div class="container">
        <?php if(!$tasks){$tasks = [];} ?>


    <div class="task_type">
            <h2>To do</h2>
        <?php foreach ($tasks as $task): ?>
        <?php if($task['status']=='todo'){?>
            <div class="task">
                    <h3><?= $task['title'] ?></h3>
                    <p><?= $task['description'] ?></p>
                    <p><?= $task['start_date']?></p>
                    <p><?= $task['deadline'] ?></p>
                </div>
        <?php }?>
        <?php endforeach; ?>
    </div>



    <div class="task_type">
            <h2>Doing</h2>
        <?php foreach ($tasks as $task): ?>
            <?php if($task['status']=='doing'){?>
                <div class="task">
                    <h3><?= $task['title'] ?></h3>
                    <p><?= $task['description'] ?></p>
                    <p><?= $task['start_date']?></p>
                    <p><?= $task['deadline'] ?></p>
                </div>
            <?php }?>
        <?php endforeach; ?>
    </div>

    <div class="task_type">
            <h2>Done</h2>
        <?php foreach ($tasks as $task): ?>
            <?php if($task['status']=='done'){?>
                <div class="task">
                    <h3><?= $task['title'] ?></h3>
                    <p><?= $task['description'] ?></p>
                    <p><?= $task['start_date']?></p>
                    <p><?= $task['deadline'] ?></p>
                </div>
            <?php }?>
        <?php endforeach; ?>
    </div>




<!--        <form method=" post">-->
<!--            <input type="hidden" name="id" value="--><?php //= $task["id"]?><!--" />-->
<!--            <input type="hidden" name="_method" value="DELETE" />-->
<!--            <button>Delete</button>-->
<!--        </form>-->




        </div>
        <div class="create-task">
            <a href="/tasks/create">+</a>
        </div>
    </div>
<?php component('footer'); ?>