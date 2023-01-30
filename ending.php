<?php 
include 'header.php';
include('connection.php');
include('functions.php');
$points = setEnding($_SESSION['id_user']);
 ?>
<div class="text-center mb-4">
    <?php if( $points){ ?>
        <div class="display-2 font-gotham-bold">
            Complimenti!
        </div>
        <h1 class="mb-5">Hai completato il quiz</h1>
    <?php } ?>
<?php if( date('Y-m-d H:i:s') >= $dataFine ){  ?>
    <span>Visualizza <a href="score.php">la classifica</a> e scopri il tuo posizionamento.</span>
<?php }else{ ?>
    <span>Dalle 19.30 controlla la classifica e scopri il tuo posizionamento.</span>
<?php } ?>

    <?php if( $points){ ?>
        <h1 class="mt-5">Hai totalizzato:</h1>
        <div class="display-2 font-gotham-bold">
            <?php echo $points; ?>pt
        </div>
    <?php } ?>
</div>
<script>
    // setTimeout(() => {
    //     window.location.href = "score.php";
    // }, 3000);
</script>
<?php include 'footer.php' ?>