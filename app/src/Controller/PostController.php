<?php

namespace App\Controller;

use App\Entity\Post;
use App\Manager\CommentManager;
use App\Manager\UserManager;
use App\Service\PostService;
use Cacofony\BaseClasse\BaseController;
use App\Manager\PostManager;
use App\Service\ExampleService;
use Cacofony\Helper\AuthHelper;

class PostController extends BaseController
{
    private $VIEW_PATH = 'Frontend/Post';

    /**
     * @Route(path="/", name="homePage")
     * @param PostManager $postManager
     * @param ExampleService $service
     * @return void
     */
    public function getHome(PostManager $postManager, ExampleService $service)
    {
        $posts = $postManager->findAll();

        $this->render('Frontend/home', [
            'posts' => $posts,
            'strongText' => $service->getStrong('je suis du texte qui vient d\'un service en autowiring'),
            'appSecret' => $service->getAppSecret()
        ], 'Le titre de la page');
    }

    /**
     * @Route(path="/article/{id}", name="get_article_show")
     * @param int $id
     * @param string $truc
     * @param PostManager $postManager
     * @return void
     */
    public function getShow(int $id, PostManager $postManager, CommentManager $commentManager)
    {
        /** @var Post $post */
        $post = $postManager->findOneBy('id', $id);

        if (!$post) {
            $this->HTTPResponse->redirect('/?errorMessage=Cet article n\'existe plus.');
        }

        $comments = $commentManager->getWithAuthorName($post->getId());

        $this->render("{$this->VIEW_PATH}/show", [
            'post' => $post,
            'comments' => $comments
        ], $post->getTitle());
    }

    /**
     * @Route(path="/ecrire-un-article", name="get_article_create")
     */
    public function getCreate()
    {
        $this->render("{$this->VIEW_PATH}/create", [], 'Création d\'un article');
    }

    /**
     * @Route(path="/ecrire-un-article", name="post_article_create")
     */
    public function postCreate(PostService $postService)
    {
        if (!AuthHelper::isLoggedIn()) {
            $this->HTTPResponse->redirect('/' . '?errorMessage=Vous devez être connecté pour modifier un article.');
        }

        $user = AuthHelper::getLoggedUser();


        $title = $this->HTTPRequest->getRequest('title');
        $content = $this->HTTPRequest->getRequest('content');
        $file = $_FILES['file'] ?? null;

        if($post = $postService->create($title, $content, $file, $user->id)) {
            $this->HTTPResponse->redirect('/article/' . $post->getId() . '?successMessage=L\'article a bien été créer.');
        }

        $this->render("{$this->VIEW_PATH}/create", [], 'Création d\'un article');
    }

    /**
     * @Route(path="/article/{id}/update", name="get_article_update")
     */
    public function getUpdate(int $id, PostManager $postManager)
    {
        if (!AuthHelper::isLoggedIn() || !$post = $postManager->findOneBy('id', $id)) {
            $this->HTTPResponse->redirect('/?errorMessage=Une erreur est survenu.');
        }

        $this->render("{$this->VIEW_PATH}/update", ['post' => $post], 'Création d\'un article');
    }

    /**
     * @Route(path="/article/{id}/update", name="get_article_update")
     */
    public function postUpdate(int $id, PostManager $postManager, PostService $postService, UserManager $userManager)
    {
        if (!AuthHelper::isLoggedIn()) {
            $this->HTTPResponse->redirect('/?errorMessage=Vous devez être connecté pour modifier un article');
        }

        $user = $userManager->findOneBy('id', AuthHelper::getLoggedUser()->id);

        $title = $this->HTTPRequest->getRequest('title');
        $content = $this->HTTPRequest->getRequest('content');
        $file = $_FILES['file'] ?? null;

        if ($postService->update($id, $user, $title, $content, $file)) {
            $this->HTTPResponse->redirect("/article/{$id}?successMessage=L'article a bien été créer.");
        }

//        $this->render("{$this->VIEW_PATH}/update", ['post' => $post], 'Création d\'un article');
    }

    /**
     * @Route(path="/article/{id}/delete", name="get_article_delete")
     */
    public function getDelete(int $id, PostService $postService, UserManager $userManager) {
        if (!AuthHelper::isLoggedIn()) {
            $this->HTTPResponse->redirect('/?errorMessage=Vous devez être connecté pour supprimer un article');
        }

        $user = AuthHelper::getLoggedUser();

        $user = $userManager->findOneBy('id', $user->id);

        $postService->delete($id, $user);

        $this->HTTPResponse->redirect('/');
    }
}