<?php component('header', compact('page_title')); ?>
<?php component('navbar'); ?>
<?php extract(returned_errors()); ?>
    <h1 class="special-h1 normal-h1"><span>Create a Project</span></h1>
    <form action="/projects" method="POST">
        <div class="form-field">
            <label for="title">Name</label>
            <input placeholder="Project Name" type="text" name="name" id="name" required value="<?= old('name') ?>">
        </div>
        <?= error('name') ?>

        <div class="yellow-stylish-button form-button">
            <div>
                <button>Create Project</button>
            </div>
        </div>
    </form>
<?php component('footer'); ?>