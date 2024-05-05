<?php component('header', compact('page_title')); ?>
<?php component('navbar'); ?>
<h1 class='special-h1 normal-h1'>Your current <span>Projects</span></h1>
<?php if(!$projects){$projects = [];} ?>
<?php if(!$members){$members = [];} ?>

<div class="p_container">
        <?php foreach ($projects as $project): ?>

            <div class="p_type" >
            <a href="/tasks?project_id=<?=$project['id']?>" >
                <div class="project" >
                        <h3> <?= $project['name'] ?> </h3>
                </div>
            </a>

                <div class="add-members">
                    <a href="/projects/members?project_id=<?=$project['id']?>">Add</a>
                </div>
             <div class="members">
                 <h1>Members</h1>
                 <div class="member-list">

                     <?php foreach ($members as $member): ?>

                         <form class="member_delete" method="post" action="/projects">
                             <input type="hidden" name="id" value="<?= $member->id ?>" />
                             <input type="hidden" name="_method" value="DELETE" />
                             <div class="member">
                                 <button><?= $member->username ?></button>
                             </div>
                         </form>

                     <?php endforeach; ?>

                 </div>
            </div>
            </div>

        <?php endforeach; ?>
</div>






<div class="create-task">
    <a href="/projects/create">+</a>
</div>
<?php component('footer'); ?>
