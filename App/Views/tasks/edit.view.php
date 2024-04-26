<?php component('header', compact('page_title')); ?>
<?php component('navbar'); ?>
<?php extract(returned_errors()); ?>
<h1 class="special-h1 normal-h1"><span>edit a Task</span></h1>
<form action="/tasks" method="post" >
    <input type="hidden" name="id" value="<?= $task->id ?>" >
    <input type="hidden" name="_method" value="PATCH" >
    <div class="form-field">
        <label for="description">Description</label>
        <textarea placeholder="Task Description" name="description" id="description" required><?= old('description') ?></textarea>
    </div>
    <?= error('description') ?>
    <div class="form-field">
        <label for="due_date">Deadline</label>
        <input type="date" name="due_date" id="due_date" required value="<?= old('due_date') ?>">
    </div>
    <?= error('due_date') ?>
    <div class="yellow-stylish-button form-button">
        <div>
            <button>Edit Task</button>
        </div>
    </div>
</form>
<?php component('footer'); ?>
