<?php
/** @var \App\Entity\User $user */
?>

<h1 class="mt-3">Modifier mon profil</h1>

<form method="post">
    <input class="form-control" type="hidden" name="id" id="id" required value="<?= $user->getId() ?>" />

    <div class="mb-3">
        <label class="form-label" for="first_name">Prénom</label>
        <input class="form-control" type="text" name="first_name" id="first_name" required value="<?= $user->getFirst_Name() ?>" />
    </div>

    <div class="mb-3">
        <label class="form-label" for="last_name">Nom de famille</label>
        <input class="form-control" type="text" name="last_name" id="last_name" required value="<?= $user->getLast_name() ?>" />
    </div>

    <div class="mb-3">
        <label class="form-label" for="email">Email</label>
        <input class="form-control" type="text" name="email" id="email" required value="<?= $user->getEmail() ?>" />
    </div>

    <div class="mb-3">
        <label class="form-check-label" for="is_admin">Est admin ?</label>
        <input class="form-check-input" type="checkbox" name="is_admin" id="is_admin" <?= $user->getIs_admin() ? 'checked' : '' ?> />
    </div>

    <div class="mb-3">
        <label class="form-label" for="password">Mot de passe</label>
        <input class="form-control" type="text" name="password" id="password" />
    </div>

    <div class="mb-3">
        <label class="form-label" for="password_verify">Confirmer mot de passe</label>
        <input class="form-control" type="text" name="password_verify" id="password_verify" />
    </div>

    <input type="submit" class="btn btn-primary">
</form>