<?php

namespace App\Manager;

use Cacofony\BaseClasse\BaseManager;

class CommentManager extends BaseManager
{
    public function getWithAuthorName(int $postId) {
        $statement = $this->pdo->prepare("
            SELECT c.id, content, publishedAt, u.first_name, c.authorId
            FROM Comment c
            INNER JOIN User u on u.id = c.authorId
            WHERE c.postId = :postId
        ");
        $statement->bindValue('postId', $postId);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_ASSOC);

        $results = $statement->fetchAll();

        return $results ?? [];
    }
}

