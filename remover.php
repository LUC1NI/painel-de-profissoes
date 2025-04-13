<?php
session_start();

if (!isset($_SESSION['logado'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int) $_POST['id'];
    if (isset($_SESSION['novas_profissoes'][$id])) {
        unset($_SESSION['novas_profissoes'][$id]);
        $_SESSION['novas_profissoes'] = array_values($_SESSION['novas_profissoes']);
    }
}

header('Location: index.php');
exit;