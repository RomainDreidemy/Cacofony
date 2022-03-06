<?php

/** @var $users User[] */

use App\Entity\User;
use Cacofony\Helper\AuthHelper;

?>

<h1>Les des utilisateurs</h1>

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">First name</th>
        <th scope="col">Last name</th>
        <th scope="col">Email</th>
        <th scope="col">Is admin</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user->getFirst_Name() ?></td>
            <td><?= $user->getLast_name() ?></td>
            <td><?= $user->getEmail() ?></td>
            <td><input type="checkbox" disabled <?= $user->getIs_admin() ? 'checked' : '' ?> class="form-check-input"></td>
            <td><a href="/admin/user/<?= $user->getId() ?>/delete" class="btn btn-outline-danger btn-sm <?= $user->getId() === AuthHelper::getLoggedUser()->id ? 'disabled' : '' ?>">Supprimer</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

