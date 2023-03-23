<?php
    include ("../config/cabecalho.php");
?>
 <main class="main">
        <div class="cadastrogeral">
            <h2>Cadastro de usuário</h2>
            <div class="form">
                <form action="" method="POST">
                    <div class="cgrid">
                        <div>
                            <div class="partes">
                                <label for="Nome" class="label">Nome</label>
                                <input type="text" name="Nome" id="nome" required placeholder="Nome" class="input">
                            </div>
                            <div class="partes">
                                <label for="login" class="label">Login</label>
                                <input type="text" name="Login" id="Login" placeholder="Login" required class="input">
                            </div>
                            
                        </div>
                        <div>
                            <div class="partes">
                                <label for="Email" class="label">E-mail</label>
                                <input type="email" name="Email" id="Email" placeholder="E-mail" required minlength="4" maxlength="255" class="input">
                            </div>
                            <div class="partes">
                                <label for="Senha" class="label">Senha</label>
                                <input type="password" name="Senha" id="Senha" placeholder="Senha" required minlength="8" maxlength="255" class="input">
                            </div>
                        </div>
                    </div>
                    <div class="boxes">
                        <div class="captcha">
                            <label class="container">
                                <input type="checkbox" required>
                                <div class="checkmark"></div>
                              </label>
                              <p>Não sou um robô</p>
                        </div>

                        <div class="termos">
                            <label class="container">
                                <input type="checkbox" required>
                                <div class="checkmark"></div>
                              </label>
                              <p>Aceito os <a href="">Termos e condições</a></p>
                        </div>
                    </div>
                    <div class="botao">
                        <button type="submit" class="btn btn-outline-warning">Confirmar cadastro</button>
                    </div>
                </form>
            </div>
            <div class="opcoes">
                <div class="google">
                    <button><a href=""><i class="fa-brands fa-google"></i> Cadastrar com o Google</a></button>
                </div>
                <div class="facebook">
                    <button><a href=""><i class="fa-brands fa-facebook"></i> Cadastrar com o Facebook</a></button>
                </div>
            </div>
        </div>
    </main>
    <?php
        include ("../conexao.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST["Nome"];
            $email = $_POST["Email"];
            $login = $_POST["Login"];            
            $senha = $_POST["Senha"];

            $sql = "insert into usuario (nome,email,login,senha) values (:nome,:email,:login, :senha)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":login", $login);
            $stmt->bindValue(":senha", $senha);
            $stmt->execute();

            if($stmt ->rowCount() > 0 ){
                echo "Registrado com sucesso";
            }else{
                echo "Erro ao tentar registrar";
            }
        }
    ?>
<?php
    include ("../config/rodape.php");
