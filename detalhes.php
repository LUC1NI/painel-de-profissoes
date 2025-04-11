<?php
include 'includes/dados.php';
include 'includes/cabecalho.php';

// Verifica se foi passado um ID pela URL
if (!isset($_GET['id']) || !isset($profissoes[$_GET['id']])) {
    echo "<p>Profissão não encontrada.</p>";
    include 'includes/rodape.php';
    exit;
}

$id = $_GET['id'];
$profissao = $profissoes[$id];
?>

<div class="profissao">
    <img src="<?= $profissao['imagem'] ?>" alt="<?= $profissao['titulo'] ?>">
    <h2><?= $profissao['titulo'] ?></h2>
    <p><strong>Categoria:</strong> <?= $profissao['categoria'] ?></p>
    <p><strong>Descrição:</strong> <?= $profissao['descricao'] ?></p>
</div>

<p><a href="index.php">← Voltar para o catálogo</a></p>

<?php include 'includes/rodape.php'; ?>
