<?php component('header', compact('page_title')); ?>
<?php component('navbar'); ?>
<?php extract(returned_errors()); ?>
    <h1 class="special-h1 normal-h1"><span>Create a Task</span></h1>
    <form action="/tasks" method="POST">
        <div class="form-field">
            <label for="title">Title</label>
            <input placeholder="Task Title" type="text" name="title" id="title" required value="<?= old('title') ?>">
        </div>
        <?= error('title') ?>
        <div class="form-field">
            <label for="description">Description</label>
            <textarea placeholder="Task Description" name="description" id="description" required><?= old('description') ?></textarea>
        </div>
        <?= error('description') ?>
        <div class="form-field">
            <label for="deadline">Deadline</label>
            <input type="date" name="deadline" id="deadline" required value="<?= old('deadline') ?>">
        </div>
        <?= error('deadline') ?>
        <div class="yellow-stylish-button form-button">
            <div>
                <button>Create Task</button>
            </div>
        </div>
    </form>
<?php component('footer'); ?>