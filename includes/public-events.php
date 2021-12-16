<div class="space"></div>
<div class="events title" id="events">
    <h2>Próximos eventos e reuniões</h2>
</div>
<?php
if (!empty($meetings)) {
    array_filter($meetings, function ($meeting) {
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
?>
        <div class="event">
            <div class="day">
                <h3><?= strftime('%d', strtotime($meeting['date'])) ?></h3>
            </div>
            <div class="details">
                <div class="date">
                    <h3><?= ucfirst(utf8_encode(strftime('%B', strtotime($meeting['date'])))) . ' ' . strftime('%Y', strtotime($meeting['date'])) ?></h3>
                </div>
                <div class="theme">
                    <p>Tema: <?= $meeting['theme'] ?></p>
                </div>
                <div class="local">
                    <p><?= $meeting['local'] ?></p>
                </div>
            </div>
        </div>
    <?php
    });
} else {
    ?>
    <div class="event">
        <h3>Sem eventos programados.</h3>
    </div>
<?php
} ?>