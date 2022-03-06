<?php

use App\Entity\Comment;
use App\Entity\Post;
use Cacofony\Helper\AuthHelper;
/** @var $post Post */
/** @var $comments Comment[] */
?>

<h1><?= $post->getTitle(); ?></h1>
<p><small>Publié le : <?= $post->getCreatedAt()->format('Y/m/d à H:m'); ?></small></p>

<?php if (AuthHelper::isLoggedIn() && (AuthHelper::getLoggedUser()->is_admin || AuthHelper::getLoggedUser()->id === $post->getAuthorId())): ?>
    <a class="btn btn-danger" href="/article/<?= $post->getId() ?>/delete">Supprimer l'article</a>
    <a class="btn btn-warning" href="/article/<?= $post->getId() ?>/update">Mettre à jour l'article</a>
<?php endif; ?>


<p><?= nl2br($post->getContent()); ?></p>

<h2>Commentaires</h2>
<?php foreach ($comments as $comment): ?>
<div>
    <h3><?= $comment['first_name'] ?></h3>
    <span><?= $comment['publishedAt'] ?></span>
    <p><?= $comment['content'] ?></p>
</div>

<?php endforeach; ?>
