<?php
session_start();
include 'includes/dados.php'; // Verifique se o caminho está correto
include 'includes/cabecalho.php';

// Verifique se a variável $profissoes está definida
if (!isset($profissoes)) {
    $profissoes = []; // Inicializa como um array vazio se não estiver definido
}

$todasProfissoes = $profissoes;
if (isset($_SESSION['novas_profissoes'])) {
    $todasProfissoes = array_merge($todasProfissoes, $_SESSION['novas_profissoes']);
}
$todasProfissoes = array_values($todasProfissoes);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Profissões</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #343a40; /* Cor de fundo escura */
            color: #ffffff; /* Texto branco */
        }
        .card {
            background-color: #495057; /* Cor do cartão */
            transition: all 0.3s ease; /* Transição suave para todas as propriedades */
        }
        .card-img-top {
            width: 100%; /* Largura total da carta */
            height: 150px; /* Altura fixa para as imagens */
            object-fit: cover; /* Corta a imagem para preencher o espaço */
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Para distribuir o conteúdo */
        }
        .remover {
            display: none; /* Inicialmente escondido */
            margin-top: 10px; /* Margem superior */
        }
    </style>
    <script>
        function toggleRemover(id) {
            var remover = document.getElementById('remover-' + id);
            if (remover.style.display === 'block') {
                remover.style.display = 'none'; // Esconde o botão de remover
            } else {
                remover.style.display = 'block'; // Mostra o botão de remover
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5">Painel de Profissões</h1>
        <div class="row justify-content-center">
            <?php foreach ($todasProfissoes as $id => $profissao): ?>
                <div class="col-md-4 mb-4">
                    <div class="card" id="card-<?= $id ?>">
                        <img src="<?= $profissao['imagem'] ?>" class="card-img-top" alt="<?= $profissao['titulo'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $profissao['titulo'] ?></h5>
                            <p class="card-text"><strong>Categoria:</strong> <?= $profissao['categoria'] ?></p>
                            <a href="detalhes.php?id=<?= $id ?>" class="btn btn-primary">Ver mais</a>
                            <?php if (isset($_SESSION['logado']) && $id >= count($profissoes)): ?>
                                <span onclick="toggleRemover(<?= $id ?>)" style="cursor: pointer; color: #dc3545;">...</span>
                                <form method="post" action="remover.php" class="remover" id="remover-<?= $id ?>">
                                    <input type="hidden" name="id" value="<?= $id - count($profissoes) ?>">
                                    <button type="submit" class="btn btn-danger">Remover</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <p class="text-center mt-3">
            <a href="filtrar.php" class="text-white">🔍 Filtrar Profissões</a>
        </p>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php include 'includes/rodape.php'; ?>
</html>