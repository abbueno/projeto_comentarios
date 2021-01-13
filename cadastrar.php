<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Comentarios</title>
    <link rel="stylesheet" href="css/cadastrar.css">
</head>
<body>    
    <form method="POST">
    <h1>CADASTRE-SE</h1>
    <label for="nome">NOME</label>
    <input type="text" name="nome" id="nome" maxlength="40">
    <label for="email">EMAIL</label>
    <input type="email" name="email" autocomplete="off" id="email" maxlength="40">    
    <label for="senha">SENHA</label>
    <input type="password" name="senha" id="senha">
    <label for="confSenha">CONFIRMAR SENHA</label>
    <input type="password" name="confSenha" id="confSenha">
    <input type="submit" value="cadastrar">
    
    </form>
    
</body>
</html>

<?PHP
if(isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confSenha = addslashes($_POST['confSenha']);

    if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confSenha))
    {
        if($senha == $confSenha)
        {
            require_once 'CLASSES/usuarios.php';
            $us = new Usuario("projeto_comentarios", "localhost", "root", "");
            if($us->cadastrar($nome, $email, $senha))
            {
                echo "Cadastrado com sucesso!";
            }else
            {
                echo "Email já estão cadastrados!";
            }
        }else
            {
                echo "Senhas não correspondem!";
            }
    }else{
        echo "Preencha todos os campos!";
    }
}

?>