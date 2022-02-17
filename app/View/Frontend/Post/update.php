<?php /** @var $post \App\Entity\Post */ ?>

<h1>Créer un article</h1>

<form method="post">
    <div class="mb-3">
        <label class="form-label" for="title">Titre</label>
        <input class="form-control" type="text" name="title" id="title" value="<?= $post->getTitle() ?>" />
    </div>

    <div class="mb-3">
        <label class="form-label" for="content">Contenu</label>
        <textarea class="form-control" name="content" id="content"><?= $post->getContent() ?></textarea>
    </div>

        <input class="btn btn-success" type="submit">
</form>
