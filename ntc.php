<?php
        // ATENÇÃO: o tipo da coluna na tabela deve ser MEDIUMBLOB
        include("conecta.php");

        $produto = $_POST["produto"];
        $codigo = $_POST["codigo"];

        // Lê o conteúdo do arquivo de imagem e armazena na variável $imagem
		$imagem = file_get_contents($_FILES["imagem"]["tmp_name"]);
		
		$comando = $pdo->prepare("INSERT INTO ntc(titulo',texto,imagem) VALUES(:titulo,:texto,:imagem)");
        $comando->bindParam(":titulo", $titulo);
        $comando->bindParam(":texto", $texto);
        $comando->bindParam(":imagem", $imagem, PDO::PARAM_LOB);
		$resultado = $comando->execute();



        
        // As linhas abaixo você usará sempre que quiser mostrar a imagem

        $comando = $pdo->prepare("SELECT * FROM ntc");
		$resultado = $comando->execute();
        while( $linhas = $comando->fetch() )
        {
            $dados_imagem = $linhas["foto"];
            $i = base64_encode($dados_imagem);

            $produto =  $linhas["produto"];
            $codigo =  $linhas["codigo"];

            echo("PRODUTO: $produto PREÇO: $codigo  <br>");
            echo(" <img src='data:image/jpeg;base64,$i' width='100px'> <br> <br> ");
        }
		
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fut Ville</title>
    <script src="rodape.js"></script> <!-- CONECTA JS -->
    <link rel="stylesheet" href="ntc.css"> <!-- CONECTA CSS -->
    <link rel="shortcut icon" href="img/logo1.png" type="image/x-icon"> <!-- LOGO NA ABA -->
</head>
<body>
    <div class="cabecalho">
        <div class="logo" onclick="Aparecer();"> 
            <div class="menu"></div>
            <div class="menu"></div>
            <div class="menu"></div>
        </div>
        <div class="logoprinc"><img src="img/ntc.png" width="280px"></div>
        <div class="logo">OI</div>
    </div>


        <div class="lateral" id="lateral">
            <div onclick="Fechar();" class="fechar"><img src=img/x.png width="20px"></div>
            <div class="menu_conta"></div>    
            <div class="rodape2">Cadastro</div><br>
            <div class="rodape2">Escalação</div><br>
            <div class="rodape2">Competições</div><br>
            <div class="rodape2">Ranking</div><br>
            <a href="ntc.html"><div class="rodape2">Notícias</div></a><br>
            <div class="rodape2">Dashboard</div><br>
        </div>

        <div class="quadrado_anuncio"></div>

        <h2 class="title" elementtiming="text-csr">Atletas Suspensos</h2>
        <div class="red">Hulk (atacante do Atlético-MG) e Arias (meia do Fluminense) cumprem suspensão no fim de semana. Mercado fecha neste sábado (08), às 15h59 (de Brasília)</div>
        <img src="img/hulk-arias.png" alt="ntc1'" class="ntc1">
        <hr>
        
        <h2 class="title" elementtiming="text-csr">Promoção do Momento</h2>
        <div class="red2">Cartola PRO por R$ 29,90: mais da metade do Brasileirão, com descontão de 50%</div>
        <img src="img/fred.png" alt="ntc1'" class="ntc1">
        <hr>



        
    <div class="rodape">© 2022-2023 FutVille FC - Liga Joinvilense de Futebol</div> 
</body>
</html>