<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Reajuste de Preço</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <header>  
            <h1> Reajuste de Preço </h1>
        </header>

        <section>
            <label for="numPreco"> Preço do Produto (R$) </label> <br>
            <input type="number" name="numPreco" id="numPreco" value="0"> <br>

            <label for="numDesconto"> Qual será o percentual de reajuste? (<span id="descontoSpan"> ? </span>%) </label> <br>
            <input type="range" name="numDesconto" id="numDesconto" min="0" max="100" value="50" oninput="mudaValor()">

            <p> <button> Reajustar </button> </p>

            <?php 
                $numPreco = $_POST['numPreco'] ?? 0;
                $numDesconto = $_POST['numDesconto'] ?? 0;
                $resolucaoPrecoDesconto = $numPreco * ($numDesconto / 100);
                $resulAumento = $numPreco + $resolucaoPrecoDesconto;
                $fmtReal = numfmt_create("pt-BR", NumberFormatter::CURRENCY);

                echo "<p> O produto que custava ". numfmt_format_currency($fmtReal, $numPreco, "BRL") . ", com <strong> $numDesconto% </strong> de aumento vai passar a custar <strong> ". numfmt_format_currency($fmtReal, $resulAumento, "BRL") . "</strong> a partir de agora. </p>";
            ?>
        </section>
    </form>
    
</body>
<script src="script.js"></script>
</html>