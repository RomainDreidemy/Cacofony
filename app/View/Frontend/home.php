<?php

use Cacofony\Helper\AuthHelper;
use App\Entity\Post;

?>


<h1 class="my-3">Je suis la page d'accueil</h1>

<ul>
    <div class="row">
        <?php /** @var $posts Post[] */
        foreach ($posts as $post) : ?>
        <div class="col-sm-4 mb-3">
            <div class="card">
                <img src="<?= $post->getPicture_link() ? "/upload/{$post->getPicture_link()}" :'https://placehold.co/600x400?text=no image' ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $post->getTitle() ?></h5>
                    <i>Publié le: <?= $post->getCreatedAt()->format('d/m/Y') ?></i>
                    <a href="/article/<?= $post->getId() ?>" class="btn btn-primary mt-3">Voir l'article</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>


</ul>


