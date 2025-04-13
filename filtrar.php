<?php
include 'includes/dados.php';
include 'includes/cabecalho.php';

$categoriaSelecionada = $_GET['categoria'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrar Profissões</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #343a40; /* Cor de fundo escura */
            color: #ffffff; /* Texto branco */
        }
        .card {
            background-color: #495057; /* Cor de fundo das cartas */
            border: none; /* Remove a borda padrão */
        }
        .card img {
            max-height: 150px; /* Altura máxima para as imagens */
            object-fit: cover; /* Cobre o espaço sem distorcer */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-5">Filtrar por Categoria</h2>
        <form method="GET" action="filtrar.php" class="text-center">
            <label for="categoria">Escolha uma categoria:</label>
            <select name="categoria" id="categoria" class="form-control w-50 mx-auto">
                <option value="">-- Todas --</option>
                <?php
                $categorias = array_unique(array_column($profissoes, 'categoria'));
                foreach ($categorias as $cat) {
                    $selecionado = $categoriaSelecionada === $cat ? 'selected' : '';
                    echo "<option value=\"$cat\" $selecionado>$cat</option>";
                }
                ?>
            </select>
            <button type="submit" class="btn btn-primary mt-3">Filtrar</button>
        </form>

        <hr>

        <h3>Resultados:</h3>
        <div class="row">
            <?php
            foreach ($profissoes as $id => $profissao) {
                if ($categoriaSelecionada && $profissao['categoria'] !== $categoriaSelecionada) {
                    continue;
                }
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= $profissao['imagem'] ?>" class="card-img-top" alt="<?= $profissao['titulo'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $profissao['titulo'] ?></h5>
                            <p class="card-text"><strong>Categoria:</strong> <?= $profissao['categoria'] ?></p>
                            <a href="detalhes.php?id=<?= $id ?>" class="btn btn-light">Ver mais</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>