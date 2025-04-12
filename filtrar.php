<?php
include 'includes/dados.php';
include 'includes/cabecalho.php';

// Pega a categoria selecionada no formulário (via GET)
$categoriaSelecionada = $_GET['categoria'] ?? '';

?>

<h2>Filtrar por Categoria</h2>

<form method="GET" action="filtrar.php">
    <label for="categoria">Escolha uma categoria:</label>
    <select name="categoria" id="categoria">
        <option value="">-- Todas --</option>
        <?php
        // Gera a lista de categorias únicas
        $categorias = array_unique(array_column($profissoes, 'categoria'));
        foreach ($categorias as $cat) {
            $selecionado = $categoriaSelecionada === $cat ? 'selected' : '';
            echo "<option value=\"$cat\" $selecionado>$cat</option>";
        }
        ?>
    </select>
    <button type="submit">Filtrar</button>
</form>

<hr>

<h3>Resultados:</h3>

<div class="lista-profissoes">
    <?php
    foreach ($profissoes as $id => $profissao) {
        if ($categoriaSelecionada && $profissao['categoria'] !== $categoriaSelecionada) {
            continue;
        }
        ?>
        <div class="profissao">
            <img src="<?= $profissao['imagem'] ?>" alt="<?= $profissao['titulo'] ?>">
            <h4><?= $profissao['titulo'] ?></h4>
            <p><strong>Categoria:</strong> <?= $profissao['categoria'] ?></p>
            <a href="detalhes.php?id=<?= $id ?>">Ver mais</a>
        </div>
        <?php
    }
    ?>
</div>

<?php include 'includes/rodape.php'; ?>
