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


<?php if (!is_null($post->getPicture_link())): ?>
    <div class="mt-3">
        <img src="/upload/<?= $post->getPicture_link() ?>" class="img-fluid" alt="...">
    </div>
<?php endif; ?>

<p><?= nl2br($post->getContent()); ?></p>

<hr>

<form method="post" action="/post/<?= $post->getId() ?>/comment" class="mb-5">
    <div class="mb-3">
        <label for="content" class="form-label">Donnez-nous votre avis</label>
        <textarea name="content" id="content" class="form-control"></textarea>
    </div>

    <input type="submit" class="btn btn-success" value="Envoyer mon commentaire">
</form>


<?php if (count($comments)): ?>
    <hr>

    <h2>Commentaires (<?= count($comments) ?>)</h2>

    <?php foreach ($comments as $comment): ?>
            <div class="card mb-3">
                <div class="card-header">
                    <?= $comment['first_name'] ?>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p><?= nl2br($comment['content']) ?></p>
                        <footer class="blockquote-footer">Publié le <?= (new DateTime($comment['publishedAt']))->format('d/m/Y') ?></footer>
                    </blockquote>
                </div>

                <?php if (AuthHelper::isLoggedIn() && ($comment['authorId'] === AuthHelper::getLoggedUser()->id || AuthHelper::getLoggedUser()->is_admin)): ?>
                    <a href="/comment/<?= $comment['id'] ?>/delete" class="btn btn-danger">Supprimer</a>
                <?php endif; ?>

            </div>

    <?php endforeach; ?>
<?php endif; ?>
