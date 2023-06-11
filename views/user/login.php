<div class="section">
    <h1>Log in</h1>
</div>
<div class="form">
    <?php if (isset($_SESSION['error_login'])) : ?>
        <p class="alert_red">El usuario no se ha logueado correctamente</p>
    <?php endif;?>
    <?php Utils::unsetSession('error_login') ?>
    <form action="<?= base_url ?>user/identify" method="post" class="form">

        <label for="email">Email</label>
        <input type="email" name="email">
        <br>

        <label for="password">Password</label>
        <input type="password" name="password">
        <br>

        <input type="submit" value="Send data">

    </form>
</div>