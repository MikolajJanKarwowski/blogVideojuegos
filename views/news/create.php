<div class="section">
    <h1>Create news</h1>
    <?=Utils::isIndentify()?>
</div>
<div class="form">
<?php if(isset($_SESSION['news_create']) && $_SESSION['news_create'] == 'complete'):?>
<p class="alert_green">La noticia se ha registrado correctamente correctamente</p>
<?php elseif(isset($_SESSION['news_create']) && $_SESSION['news_create'] == 'fail'):?>
    <p class="alert_red">La noticia no se ha registrado correctamente</p>
<?php endif;?>
<?php Utils::unsetSession('news_create')?>
    <form action="<?= base_url ?>news/save" method="post" class="form" enctype='multipart/form-data'>
        <label for="categoria">Categoria</label>
        <select name="categoria">
            <?php $categories = Utils::getCategories()?>
            <?php while($cat = $categories->fetch_object()):?>
            <option value="<?=$cat->id?>"><?=$cat->name?></option>
            <?php endwhile;?>
        </select>
        <br>
        <label for="title">Titulo</label>
        <input type="text" name="title">
        <br>
        <label for="article">Articulo</label>
        <textarea name="article" id="" cols="30" rows="10"></textarea>
        <br>
        <label for="imagen">Imagen</label>
        <input type="file" name="imagen">
        <br>
        <input type="submit" value="Send data">

    </form>
    <a href="<?=base_url?>news/index" class="button button_small">Ver noticias destacadas</a>
</div>