<?php
// Função para determinar a estação do ano com base na data fornecida
function determinarEstacao($dia, $mes) {
    // Definindo as datas de transição das estações no hemisfério sul (Brasil)
    if (($mes == 3 && $dia >= 20) || ($mes > 3 && $mes < 6) || ($mes == 6 && $dia <= 20)) {
        // Primavera (20 de março a 20 de junho)
        return 'Outono';
    } elseif (($mes == 6 && $dia >= 21) || ($mes > 6 && $mes < 9) || ($mes == 9 && $dia <= 22)) {
        // Verão (21 de junho a 22 de setembro)
        return 'Inverno';
    } elseif (($mes == 9 && $dia >= 23) || ($mes > 9 && $mes < 12) || ($mes == 12 && $dia <= 20)) {
        // Outono (23 de setembro a 20 de dezembro)
        return 'Primavera';
    } else {
        // Inverno (21 de dezembro a 19 de março)
        return 'Verão';
    }
}

// Variáveis para armazenar os resultados
$estacao = '';
$dia = '';
$mes = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe o dia e o mês do formulário
    $dia = $_POST['dia'];
    $mes = $_POST['mes'];
    
    // Chama a função para determinar a estação
    $estacao = determinarEstacao($dia, $mes);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estação do Ano</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h1 {
            font-size: 24px;
            color: #333;
        }
        label {
            font-size: 16px;
            color: #333;
        }
        input[type="number"] {
            padding: 10px;
            font-size: 16px;
            width: 80%;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 80%;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            font-size: 18px;
            margin-top: 20px;
            font-weight: bold;
        }
        .image-container {
            margin-top: 20px;
        }
        .image-container img {
            width: 200px;
            height: auto;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Descubra a Estação do Ano</h1>

    <!-- Formulário para receber o dia e o mês -->
    <form method="post">
        <label for="dia">Dia:</label>
        <input type="number" id="dia" name="dia" min="1" max="31" value="<?= $dia ?>" required>
        <label for="mes">Mês:</label>
        <input type="number" id="mes" name="mes" min="1" max="12" value="<?= $mes ?>" required>
        <button type="submit">Descobrir Estação</button>
    </form>

    <?php if ($estacao != ''): ?>
        <div class="result">
            A estação do ano é: <strong><?= $estacao ?></strong>
        </div>

        <div class="image-container">
            <?php
            // Exibe a imagem dependendo da estação do ano
            switch ($estacao) {
                case 'Primavera':
                    echo '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT8mEie46WGfGqXJ_YHXSywC4W0DSqih8y5Dg&s">';
                case 'Verão':
                    echo '<img src="https://s.calendarr.com/upload/de/62/inicio-do-verao-f.jpg">'; // Substitua com o caminho da imagem
                    break;
                case 'Outono':
                    echo '<img src="https://g3i5r4x7.rocketcdn.me/wp-content/uploads/2020/03/Outono.jpg">'; // Substitua com o caminho da imagem
                    break;
                case 'Inverno':
                    echo '<img src="https://static.escolakids.uol.com.br/2020/07/frio-extremo.jpg">'; // Substitua com o caminho da imagem
                    break;
            }
            ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
