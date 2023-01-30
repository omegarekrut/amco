<?php include 'header.php';
include('connection.php');
include('functions.php'); ?>
<div class="mb-4">
    <div class="display-2 font-gotham-bold text-center mb-4">
        Classifica!
    </div>
    <div class="table-responsive mx-3">
        <table class="table text-white text-center">
            <!--
            <thead>
                <tr>
                    <th> </th>
                    <th> Nome </th>
                    <th>Points</th>
                </tr>
            </thead>-->
            <tbody>
            <?php
            $i=0;
            $sql = "SELECT * FROM rank inner join users on users.id_user = rank.id_user order by rank.point desc";
            $rs = $conn->query( $sql );
            while( $row = $rs->fetch_object()){
                $i++;
                $class="";
                if( $row->id_user == $_SESSION['id_user']){
                    $class="background-color:white;color:black;";
                }
            ?>
                <tr style="<?php echo $class ?>">
                    <th scope="row"><?php echo $i ?>°&nbsp;&nbsp;&nbsp;</th>
                    <td style="text-transform: capitalize;"><?php echo $row->nome ?> <span class="font-gotham-bold"><?php echo $row->cognome ?></span></td>
                    <td class="font-gotham-bold"><?php echo $row->point ?></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'footer.php' ?>