<?php

namespace App\Controller;

use App\Repository\ArticleRepository;

class ArticleController extends Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'list':
                        $this->list();
                        break;
                    case 'read':
                        $this->read();
                        break;
                    default:
                        throw new \Exception("Cette action n'existe pas : " . $_GET['action']);
                }
            } else {
                throw new \Exception("Aucune action détectée");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }

    protected function list()
    {
        $articleRepository = new ArticleRepository();
        $articles = $articleRepository->findAll();
        
        $this->render('article/list', [
            'articles' => $articles,
            'pageTitle' => 'Liste des articles'
        ]);
    }

    protected function read()
    {
        try {
            if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
                throw new \Exception("ID de l'article invalide");
            }

            $articleRepository = new ArticleRepository();
            $article = $articleRepository->findOneById((int)$_GET['id']);

            if (!$article) {
                throw new \Exception("Article non trouvé");
            }

            $this->render('article/read', [
                'article' => $article,
                'pageTitle' => $article->getTitle()
            ]);
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }
}
