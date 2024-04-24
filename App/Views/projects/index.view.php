<?php component('header', compact('page_title')); ?>
<?php component('navbar'); ?>
<h1 class='special-h1 normal-h1'>Your current <span>Projects</span></h1>
<div class="p_container">
    <?php if(!$projects){$projects = [];} ?>


    <div class="p_type" >
        <h2>Projects</h2>
        <?php foreach ($projects as $project): ?>
            <a href="/tasks?project_id=<?=$project['id']?>" >
                <div class="project" >
                        <h3> <?= $project['name'] ?></h3>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>






<div class="create-task">
    <a href="/projects/create">+</a>
</div>
<?php component('footer'); ?>
