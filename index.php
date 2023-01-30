<?php include 'header.php' ?>
<div class="mx-4">
    <div class="display-1 mb-5 text-center">Registrati</div>
    <form class="mb-5" id='login-form' action="handler.php" method='POST' accept-charset='UTF-8'>
        <div class="mb-3">
            <input name="email" onchange="ShowAlert();" pattern="[a-z0-9._%+-]+@amco\.it" title="Inserisci il tuo indirizzo email aziendale (@amco.it)" placeholder="E-mail aziendale" type="email" class="form-control form-control-sm px-3 rounded-pill fs-6" id="email-input" required>
            <div class="invalid-feedback" id="invalid-email-format">
                Inserisci il tuo indirizzo email aziendale (@amco.it)
            </div>
        </div>
        <div class="mb-3">
            <input name="name" placeholder="Nome" type="text" class="form-control form-control-sm px-3 rounded-pill fs-6" id="name-input" required>
        </div>
        <div class="mb-3">
            <input name="cognome" placeholder="Cognome" type="text" class="form-control form-control-sm px-3 rounded-pill fs-6" id="cognome-input" required>
        </div>
        <div class="mb-3">
            <input name="password" placeholder="Password" type="password" class="form-control form-control-sm px-3 rounded-pill fs-6" id="password-input" required>
        </div>
        <div class="mb-3 form-check px-0 mx-0">
            <input type="checkbox" class="rounded-circle ms-1 checkbox" id="agreenment-check" required style="">
            <label class="form-check-label align-middle text-start ms-2" for="agreenment-check" style="font-size: .65rem;">Accetto i termini di servizio e la <a href="https://www.amco.it/privacy/" target="blank">privacy policy</a></label>
            <div class="invalid-feedback">
                You must agree before submitting.
            </div>
        </div>
        <input type="hidden" name="login" value="1">
        <button id="login-button" type="submit" name="login" class="btn btn-outline-light rounded-pill w-100">Conferma</button>
        <?php if (isset($_GET['msg'])) { ?>
            <p class="mb-0 w-100 error text-danger text-center mt-3" style="font-size:0.9rem;"> <?php echo $_GET['msg']; ?> </p>
        <?php } ?>
    </form>

    <form class="d-none" action="handler.php" method='POST' accept-charset='UTF-8' id="form2">
        <input type="hidden" id="id_user" name="id_user">
    </form>
</div>
<script>
    window.addEventListener("load", (event) => {
        let myItem = localStorage.getItem('id_user');
        if (myItem) {
            $('#id_user').val(myItem);
            $('#form2').submit()
        }
    });
</script>
<?php include 'footer.php' ?>