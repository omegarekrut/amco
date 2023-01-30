<?php include 'header.php';
if( date('Y-m-d H:i:s') >= $dataFine ){ 
    header('Location: ending.php');
    exit;
}
 ?>
<div class="text-justify mx-4 mb-4">
    <h2 class="" style="text-align: left;">Prima di iniziare il gioco, <span class="font-gotham-bold">ecco qualche semplice regola:</span></h2>
    <ul>
        <li>Inizia il gioco con la prima domanda.</li>
        <li>Rispondi velocemente per avere più possibilità di vincere.</li>
        <li>Segui attentamente il percorso della mostra perché è lì che puoi trovare tutte le risposte.</li>
    </ul>
    <?php if( date('Y-m-d H:i:s') >= $dataInizio && date('Y-m-d H:i:s') <= $dataFine ){ ?>
        <button id="onclick_quiz" onClick="document.location.href='quiz.php'" class="btn btn-outline-light rounded-pill w-100">GIOCA E VINCI!</button>
    <?php } ?>
</div>
<?php include 'footer.php' ?>