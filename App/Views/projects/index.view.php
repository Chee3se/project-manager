<?php component('header', compact('page_title')); ?>
<?php component('navbar'); ?>
<h1 class='special-h1 normal-h1'>Your current <span>Projects</span></h1>
<?php if(!$projects){$projects = [];} ?>
<?php if(!$members){$members = [];} ?>

<div class="p_container">
    <?php if($projects == NULL){?>
    <h2>Tev nav projektu</h2>
    <?php }else{ ?>


        <?php foreach ($projects as $project): ?>

            <div class="p_type" >



            <a href="/tasks?project_id=<?=$project['id']?>" >
                <div class="project" >
                        <h3> <?= $project['name'] ?> </h3>
                </div>
            </a>


             <div class="members">
                 <h1>Members</h1>
                 <div class="member-list">

                     <?php foreach ($members[$project['id']] as $member): ?>
                        <?php if($member->id != $_SESSION['id']){ ?>
                             <div class="member">
                                 <button><?= $member->username ?></button>
                             </div>

                        <?php } ?>
                     <?php endforeach; ?>

                 </div>
            </div>
<!--                <div class="edit">-->
<!--                    <a class href="/tasks/edit?id=--><?php //=$project['id']?><!--">-->
<!--                </div>-->

                <?php if($project['owner_id'] == $_SESSION['id']){?>
                <div class="action_buttons">

                <div class="add-members">
                    <a href="/projects/members?project_id=<?=$project['id']?>">Add</a>
                </div>
                <form class="member_delete" method="post" action="/projects">
                    <input type="hidden" name="id" value="<?= $project['id'] ?>" />
                    <input type="hidden" name="_method" value="DELETE" />
                    <div class="member">
                        <button>Delete</button>
                    </div>
                </form>
                </div>
            </div>
            <?php }elseif ($project['owner_id'] != $_SESSION['id']){?>
        <div class="action_buttons">
            <form class="member_delete" method="post" action="/projects/members">
                <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>" />
                <input type="hidden" name="_method" value="DELETE" />
                <div class="member">
                    <button>Leave</button>
                </div>
            </form>
        </div>
    <?php } ?>
</div>

    <?php endforeach; ?>
    <?php } ?>
</div>






<div class="create-task">
    <a href="/projects/create">+</a>
</div>
<?php component('footer'); ?>
