<?php component('header', compact('page_title')); ?>
<?php component('navbar'); ?>
<?php extract(returned_errors()); ?>
    <h1 class="special-h1 normal-h1"><span>Create a Task</span></h1>
    <form action="/tasks" method="POST">
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
                <button>Create Task</button>
            </div>
        </div>
    </form>
<?php component('footer'); ?>