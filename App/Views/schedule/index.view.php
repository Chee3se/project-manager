<?php component('header', compact('page_title')); ?>
<?php component('navbar'); ?>
    <h1>Calendar</h1>

<?php
$month = isset($_GET['month']) ? $_GET['month'] : date('m');
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');

$prev_month = $month - 1;
$next_month = $month + 1;
$prev_year = $next_year = $year;

if ($prev_month < 1) {
    $prev_month = 12;
    $prev_year--;
}

if ($next_month > 12) {
    $next_month = 1;
    $next_year++;
}

$daysInMonth = date('t', mktime(0,0,0, $month, 1, $year));
$firstDayOfMonth = date('N', mktime(0,0,0, $month, 1, $year));
?>

    <div style="display: flex; justify-content: space-between;">
        <a href="?month=<?= $prev_month ?>&year=<?= $prev_year ?>">&larr;</a>
        <h2>
            <?= date('F', mktime(0, 0, 0, $month, 10)) ?>
            <?= $year ?>
        </h2>

        <a href="?month=<?= $next_month ?>&year=<?= $next_year ?>">&rarr;</a>
    </div>

    <table>
        <tr>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thu</th>
            <th>Fri</th>
            <th>Sat</th>
            <th>Sun</th>
        </tr>
        <?php $cellCount = $firstDayOfMonth + $daysInMonth; ?>
        <?php for ($i = 1; $i <= $cellCount; $i++) {
            if ($i % 7 == 1) { ?>
                <tr>
            <?php }
            if ($i < $firstDayOfMonth) { ?>
                <td></td>
            <?php } else { ?>
                <td><?= ($i - $firstDayOfMonth + 1) ?></td>
            <?php }
            if ($i % 7 == 0) {?>
                </tr>
            <?php }
        }
        if ($cellCount % 7 != 0) { ?>
            </tr>
        <?php } ?>
    </table>

<?php component('footer'); ?>