<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<h1>Liste des articles</h1>

<?php if (!empty($articles)) { ?>
    <ul>
        <?php foreach ($articles as $article) { ?>
            <li>
                <h3><?= htmlspecialchars($article->getTitle()); ?></h3>
                <a href="index.php?controller=article&action=read&id=<?= $article->getId(); ?>">Lire plus</a>
            </li>
        <?php } ?>
    </ul>
<?php } else { ?>
    <p>Aucun article disponible.</p>
<?php } ?>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>
