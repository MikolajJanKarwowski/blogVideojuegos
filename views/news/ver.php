<div class="section">
    <h1><?= $new->title ?></h1>
    <?= Utils::isIndentify() ?>
</div>
<div class="news_unique">
    <h3><?php
        $categoria = Utils::getCategoryById($new->id_categoria);
        while ($cat = $categoria->fetch_object()) {
            echo $cat->name;
        }
        ?></h3>
        <br>
    <h4>Created by <?php
        $user = Utils::getUserById($new->id_user);
        while ($u = $user->fetch_object()) {
            echo $u->name . " " . $u->surname;
        }
        ?></h4>
        <br>
    <p><?= $new->article ?></p>
    <?php if ($new->imagen != null) : ?>
        <img src="<?= base_url . 'uploads/images/' . $new->imagen ?>" alt="Imagen por defecto" class="img-news">
    <?php else : ?>
        <img src="<?= base_url ?>assets/img/default.jpg" alt="Imagen por defecto" class="img-news">
    <?php endif; ?>
    <?php if(isset($_SESSION['admin'])):?>
        <a href="<?=base_url . 'news/edit&id=' . $new->id?>" class="button button_small">Editar</a>
        <a href="<?=base_url . 'news/delete&id=' . $new->id?>" class="button button_small button_red">Borrar</a>
    <?php endif;?>
</div>