<?php include "template/header.php"; ?>

<div class="container mt-5">
    <h2>Perfil do Aluno</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="aluno_id">Selecione o Aluno</label>
            <select class="form-control" id="aluno_id" name="aluno_id" required>
                <option value="">Selecione um aluno</option>
                <?php
                
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "forrest";

                $conn = new mysqli($servername, $username, $password, $database);

                // Verificar a conexão
                if ($conn->connect_error) {
                    die("Erro na conexão: " . $conn->connect_error);
                }

                // Consulta para recuperar nomes dos alunos
                $sql = "SELECT id, nome FROM alunos";
                $result = $conn->query($sql);

                // Popular o campo de seleção com os nomes dos alunos
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
                }

                // Fechar a conexão com o banco de dados
                $conn->close();
                ?>
            </select>
        </div>
        <br>
        <input type="submit" class="btn btn-primary" name="btn-buscar" value="Buscar">
        <br>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn-buscar'])) {
        $alunoId = $_POST['aluno_id'];

        // Conexão com o banco de dados
        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Erro na conexão: " . $conn->connect_error);
        }

        // Consulta para obter todos os dados do aluno selecionado
        $sql = "SELECT * FROM alunos WHERE id = $alunoId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Exibir os dados do aluno
            $alunoData = $result->fetch_assoc();
            echo '<h3>Dados do Aluno</h3>';
            echo '<p><strong>Nome:</strong> ' . $alunoData['nome'] . '</p>';
            echo '<p><strong>Idade:</strong> ' . $alunoData['idade'] . '</p>';
            echo '<p><strong>Email:</strong> ' . $alunoData['email'] . '</p>';
            echo '<p><strong>Objetivo:</strong> ' . $alunoData['objetivo'] . '</p>';
            echo '<p><strong>Sexo:</strong> ' . $alunoData['sexo'] . '</p>';
            echo '<p><strong>Altura:</strong> ' . $alunoData['altura'] . ' cm</p>';
            echo '<p><strong>Peso:</strong> ' . $alunoData['peso'] . ' kg</p>';

            // Adicione o botão para apagar o aluno
            echo '<form method="POST" action=""><input type="hidden" name="aluno_id" value="' . $alunoId . '"><input type="submit" class="btn btn-danger" name="btn-apagar" value="Apagar Aluno"></form>';

            // Adicione mais campos conforme necessário
        } else {
            echo '<p>Nenhum dado encontrado para o aluno selecionado.</p>';
        }

        // Fechar a conexão com o banco de dados
        $conn->close();
    }

    // Processar a exclusão se o botão for clicado
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn-apagar'])) {
        $alunoId = $_POST['aluno_id'];

        // Conexão com o banco de dados
        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Erro na conexão: " . $conn->connect_error);
        }

        // Consulta para excluir o aluno
        $sql = "DELETE FROM alunos WHERE id = $alunoId";
        if ($conn->query($sql) === TRUE) {
            echo '<p>Aluno apagado com sucesso.</p>';
        } else {
            echo '<p>Erro ao apagar o aluno: ' . $conn->error . '</p>';
        }

        // Fechar a conexão com o banco de dados
        $conn->close();
    }
    ?>
</div>


<?php include "template/footer.php"; ?>
