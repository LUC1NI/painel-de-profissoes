<?php
include 'includes/dados.php';
include 'includes/cabecalho.php';
?>

<?php foreach ($profissoes as $id => $profissao): ?>
    <div class="profissao">
        <img src="<?= $profissao['imagem'] ?>" alt="<?= $profissao['titulo'] ?>">
        <h2><?= $profissao['titulo'] ?></h2>
        <p><strong>Categoria:</strong> <?= $profissao['categoria'] ?></p>
        <a href="detalhes.php?id=<?= $id ?>">Ver mais</a>
    </div>
<?php endforeach; ?>

<?php include 'includes/rodape.php'; ?>
