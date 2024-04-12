<?php component('header', compact('page_title')); ?>
<?php component('navbar'); ?>
<?php $tasks = []; ?>
    <h1 class='special-h1 normal-h1'>Your current <span>Tasks</span></h1>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="/tasks/create" class="btn btn-primary">Create Task</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Deadline</th>
                            <th>Completed</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($tasks as $task): ?>
                            <tr>
                                <td><?= $task->title; ?></td>
                                <td><?= $task->description; ?></td>
                                <td><?= $task->deadline; ?></td>
                                <td><?= $task->completed ? 'Yes' : 'No'; ?></td>
                                <td>
                                    <a href="/tasks/<?= $task->id; ?>/edit" class="btn btn-warning">Edit</a>
                                    <form action="/tasks/<?= $task->id; ?>/delete" method="post" style="display: inline-block;">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
<?php component('footer'); ?>