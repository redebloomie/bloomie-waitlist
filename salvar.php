<?php
    //arquivo salvar_dados.php
    require_once("connect.php");

    $connect = conectar();

    // Filtrar e validar os dados do formulário
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    // Validar o tipo de dados
    if (!is_string($name) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Dados inválidos do formulário.");
    }

    // Preparar a instrução SQL
    $stmt = $connect->prepare("INSERT INTO usuario (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);

    // Executar a instrução SQL
    if ($stmt->execute()) {
        header("Location: index.html");
        exit();
    } else {
        echo "Erro ao enviar mensagem: " . $stmt->error;
    }

    // Fechar a conexão
    $stmt->close();
    $connect->close();

?>