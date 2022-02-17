<?php
use Cacofony\Helper\AuthHelper;
/** @var $post \App\Entity\Post */
?>

<h1><?= $post->getTitle(); ?></h1>
<p><small>Publié le : <?= $post->getCreatedAt()->format('Y/m/d à H:m'); ?></small></p>

<?php if (AuthHelper::isLoggedIn() && (AuthHelper::getLoggedUser()->is_admin || AuthHelper::getLoggedUser()->id === $post->getAuthorId())): ?>
    <a class="btn btn-danger" href="/article/<?= $post->getId() ?>/delete">Supprimer l'article</a>
    <a class="btn btn-warning" href="/article/<?= $post->getId() ?>/update">Mettre à jour l'article</a>
<?php endif; ?>


<p><?= nl2br($post->getContent()); ?></p>
