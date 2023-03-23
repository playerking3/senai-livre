<?php
    include("../config/cabecalho.php");
?>

<main class="main">
        <div class="cadastrogeral">
            <h2>Login de usuário</h2>
            <div class="form">
                <form action="" method="POST">
                    <div class="cgrid">
                        <div>
                            <div class="partes">
                                <label for="Login" class="label">Login</label>
                                <input type="text" name="Login" id="Login" placeholder="Login" required minlength="4" maxlength="255" class="input">
                            </div>
                        </div>
                        <div>
                            <div class="partes">
                                <label for="Senha" class="label">Senha</label>
                                <input type="password" name="Senha" id="Senha" placeholder="Senha" required minlength="8" maxlength="255" class="input">
                            </div>
                        </div>
                    </div>
                    <div class="boxes">
                        <div class="captcha">
                            <label class="container">
                                <input type="checkbox">
                                <div class="checkmark"></div>
                              </label>
                              <p>Não sou um robô</p>
                        </div>
                    </div>
                    <div class="botao">
                        <button type="submit" class="btn btn-outline-warning">Confirmar Login</button>
                    </div>
                </form>
            </div>
            <div class="opcoes">
                <div class="google">
                    <button><a href=""><i class="fa-brands fa-google"></i> Logar com o Google</a></button>
                </div>
                <div class="facebook">
                    <button><a href=""><i class="fa-brands fa-facebook"></i> Logar com o Facebook</a></button>
                </div>
            </div>
        </div>
</main>

<?php
    include("../conexao.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $login = $_POST["Login"];            
        $senha = $_POST["Senha"];

        $sql = "SELECT * FROM usuario WHERE login = :login AND senha = :senha";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":login", $login);
        $stmt->bindValue(":senha", $senha);
        $stmt->execute();

        if ($stmt->rowCount() > 0){
            echo "Login efetuado com sucesso";
        }else{
            echo "Falha ao efetuar o login";
        }
    }

include("../config/rodape.php");