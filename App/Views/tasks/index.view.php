<?php component('header', compact('page_title')); ?>
<?php component('navbar'); ?>

    <h1 class='special-h1 normal-h1'>Your current <span>Tasks</span></h1>


<div class="container">
        <?php if(!$tasks){$tasks = [];} ?>


    <div class="task_type" ondrop="drop(event, 'assigned')" ondragover="allowDrop(event)">
            <h2>To do</h2>
        <?php foreach ($tasks as $task): ?>
        <?php if($task['status']=='assigned'){?>
                <a href="/tasks/edit?id=<?=$task['id']?>" draggable="true" ondragstart="drag(event)" id="<?= $task['id'] ?>">
                    <div class="task" >
                        <form class="delete_form" method="post" action="/tasks">
                            <input type="hidden" name="id" value="<?= $task['id']?>" />
                            <input type="hidden" name="_method" value="DELETE" />
                            <div class="delete">
                                <div>
                                    <button >X</button>
                                </div>
                            </div>
                        </form>
                        <p><?= $task['description'] ?></p>
                        <p><?= $task['start_date']?></p>
                        <p><?= $task['due_date'] ?></p>
                    </div>
                </a>


        <?php }?>
        <?php endforeach; ?>
    </div>



    <div class="task_type" ondrop="drop(event, 'pending')" ondragover="allowDrop(event)">
            <h2>Doing</h2>
        <?php foreach ($tasks as $task): ?>
            <?php if($task['status']=='pending'){?>
                <a href="/tasks/edit?id=<?=$task['id']?>"  draggable="true" ondragstart="drag(event)" id="<?= $task['id'] ?>">
                    <div class="task">
                        <form class="delete_form" method="post" action="/tasks">
                            <input type="hidden" name="id" value="<?= $task['id']?>" />
                            <input type="hidden" name="_method" value="DELETE" />
                            <div class="delete">
                                <div>
                                    <button >X</button>
                                </div>
                            </div>
                        </form>
                        <p><?= $task['description'] ?></p>
                        <p><?= $task['start_date']?></p>
                        <p><?= $task['due_date'] ?></p>
                    </div>
                </a>
            <?php }?>
        <?php endforeach; ?>
    </div>


    <div class="task_type" ondrop="drop(event, 'completed')" ondragover="allowDrop(event)">
            <h2>Done</h2>
        <?php foreach ($tasks as $task): ?>
            <?php if($task['status']=='completed'){?>
                <a href="/tasks/edit?id=<?=$task['id']?>" draggable="true" ondragstart="drag(event)" id="<?= $task['id'] ?>">
                    <div class="task" >
                        <form class="delete_form" method="post" action="/tasks">
                            <input type="hidden" name="id" value="<?= $task['id']?>" />
                            <input type="hidden" name="_method" value="DELETE" />
                            <div class="delete">
                                <div>
                                    <button >X</button>
                                </div>
                            </div>
                        </form>
                        <p><?= $task['description'] ?></p>
                        <p><?= $task['start_date']?></p>
                        <p><?= $task['due_date'] ?></p>
                    </div>
                </a>
            <?php }?>
        <?php endforeach; ?>
    </div>


        </div>
        <div class="create-task">
            <a href="/tasks/create">+</a>
        </div>
    </div>
<?php component('footer'); ?>