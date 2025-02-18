<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<div class="container article-detail my-5">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title"><?= htmlspecialchars($article->getTitle()); ?></h1>
            
            <div class="card-text article-content">
                <?= nl2br(htmlspecialchars($article->getDescription())); ?>
            </div>

            <div class="mt-4">
                <a href="index.php?controller=article&action=list" class="btn btn-primary">
                    Retour à la liste
                </a>
            </div>
        </div>
    </div>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?> 