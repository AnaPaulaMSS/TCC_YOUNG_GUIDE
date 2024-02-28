<?php
 include ('conexao.php');

// Verifique se o ID da postagem e o ID do usuário estão disponíveis
if (isset($_GET['post_id']) && isset($_GET['user_id'])) {
    $post_id = $_GET['post_id'];
    $user_id = $_GET['user_id'];

    // Verifique se o usuário já curtiu o artigo
    $check_sql = "SELECT * FROM salva WHERE esp_id = $user_id AND post_id = $post_id";
    $check_result = $conexao->query($check_sql);

    if ($check_result->num_rows > 0) {
        // O usuário já curtiu a postagem, então remova a curtida
        $delete_sql = "DELETE FROM salva WHERE esp_id = $user_id AND post_id = $post_id";
        if ($conexao->query($delete_sql) === TRUE) {
            echo "Postagem removida dos salvos";
        } else {
            echo "Erro ao remover ao salvamento : " . $conexao->error;
        }
    } else {
        // O usuário ainda não curtiu a postagem, então adicione a curtida
        $insert_sql = "INSERT INTO salva (esp_id, post_id) VALUES ($user_id, $post_id)";
        if ($conexao->query($insert_sql) === TRUE) {
            echo "Postagem salva com sucesso";
        } else {
            echo "Erro ao salvar a postagem: " . $conexao->error;
        }
    }
}
?>