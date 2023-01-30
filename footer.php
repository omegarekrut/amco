    <div class="text-center align-align-self-end mb-4 w-100" style="bottom:0;visibility:hidden">
        <img class="img-fluid img-logo" src="assets/img/logo.png" alt="">
    </div>
</main>
    <div class="text-center align-align-self-end mb-4 position-absolute w-100" style="bottom:0;">
        <img class="img-fluid img-logo" src="assets/img/logo.png" alt="">
    </div>
<footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="assets/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="assets/js/script.js?=<?php rand()&10000 ?>"></script>
</footer>
</body>
<script>
    <?php if( isset($_SESSION['id_user'])){ ?>
        localStorage.setItem('id_user', '<?php echo $_SESSION['id_user']; ?>');
    <?php } ?>
    </script>

</html>