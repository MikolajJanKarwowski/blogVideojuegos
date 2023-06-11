    <div class="section">
        <h1>Noticias principales</h1>
        <?=Utils::isIndentify()?>
    </div>

    <div class="news">
        <?php while($n = $news->fetch_object()):?>
            <div class="articles">
            <h1><?=$n->title?></h1>
            <?php if($n->imagen != null):?>
                <img src="<?=base_url . 'uploads/images/' . $n->imagen?>" alt="Imagen por defecto"class="img-news">
            <?php else:?>
                <img src="<?=base_url?>assets/img/default.jpg" alt="Imagen por defecto" class="img-news">
            <?php endif;?>
           
            <p><?=substr($n->article, 0, 150);?> ...</p>
            <ul>
                <li>
                <?php 
                    $categoria = Utils::getCategoryById($n->id_categoria);
                    while ($cat = $categoria->fetch_object()){
                        echo $cat->name;
                    }
                ?>
                </li>
                <li>
                    <?=$n->date_creation?>
                </li>
            </ul>
            <a href="<?=base_url . 'news/ver&id=' . $n->id?>" class="button">Enlace a la noticia</a>
        </div>
        <?php endwhile;?>
        
       
    </div>