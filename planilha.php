<?php include "template/header.php"; ?>

<div class="container mt-5">
    <h2>Formulário de Treinamento</h2>
    <form method="POST" action="gerarpdf.php" id="trainingForm">
        <div class="form-group">
            <label for="aluno">Selecione o Aluno</label>
            <select class="form-control" id="aluno_id" name="aluno_id" required>
                <option value="">Selecione um aluno</option>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "teste";

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
        
        <!-- Campos do primeiro dia -->
        <div id="dayFields1" class="dayFields">
            <div class="form-group">
                <label for="day">Data</label>
                <input type="date" class="form-control" name="day[]" required>
            </div>
            <div class="form-group">
                <label for="preWorkout">Pré Treino</label>
                <input type="text" class="form-control" name="preWorkout[]" required>
            </div>
            <div class="form-group">
                <label for="distance">Distância</label>
                <input type="text" class="form-control" name="distance[]" required>
            </div>
            <div class="form-group">
                <label for="method">Método</label>
                <input type="text" class="form-control" name="method[]" required>
            </div>
            <div class="form-group">
                <label for="speed">Velocidade</label>
                <input type="text" class="form-control" name="speed[]" required>
            </div>
            <div class="form-group">
                <label for="time">Tempo</label>
                <input type="text" class="form-control" name="time[]" required>
            </div>
            <div class="form-group">
                <label for="pace">Ritmo Min/km</label>
                <input type="text" class="form-control" name="pace[]" required>
            </div>
            <div class="form-group">
                <label for="observations">Observações</label>
                <textarea class="form-control" name="observations[]" rows="2"></textarea>
            </div>
        </div>

        <!-- Container para campos adicionados dinamicamente -->
        <div id="dynamicDayFieldsContainer"></div>

        <hr>

        <input class="btn btn-primary" type="submit" name="btn-gerar" value="gerar pdf"><br><br>
    </form>

    <!-- Botão "Adicionar Dia" -->
    <button type="button" class="btn btn-primary" id="addDay">Adicionar Dia</button>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            var counter = 2; // Iniciar o contador em 2 para corresponder ao segundo conjunto de campos

            // Função para criar campos do dia dinamicamente
            function createDayFields(counter) {
                var dayFields = '<div class="dayFields" id="dayFields' + counter + '">';
                dayFields += '<div class="form-group">';
                dayFields += '<label for="day">Data</label>';
                dayFields += '<input type="date" class="form-control" name="day[]" required>';
                dayFields += '</div>';
                dayFields += '<div class="form-group">';
                dayFields += '<label for="preWorkout">Pré Treino</label>';
                dayFields += '<input type="text" class="form-control" name="preWorkout[]" required>';
                dayFields += '</div>';
                dayFields += '<div class="form-group">';
                dayFields += '<label for="distance">Distância</label>';
                dayFields += '<input type="text" class="form-control" name="distance[]" required>';
                dayFields += '</div>';
                dayFields += '<div class="form-group">';
                dayFields += '<label for="method">Método</label>';
                dayFields += '<input type="text" class="form-control" name="method[]" required>';
                dayFields += '</div>';
                dayFields += '<div class="form-group">';
                dayFields += '<label for="speed">Velocidade</label>';
                dayFields += '<input type="text" class="form-control" name="speed[]" required>';
                dayFields += '</div>';
                dayFields += '<div class="form-group">';
                dayFields += '<label for="time">Tempo</label>';
                dayFields += '<input type="text" class="form-control" name="time[]" required>';
                dayFields += '</div>';
                dayFields += '<div class="form-group">';
                dayFields += '<label for="pace">Ritmo Min/km</label>';
                dayFields += '<input type="text" class="form-control" name="pace[]" required>';
                dayFields += '</div>';
                dayFields += '<div class="form-group">';
                dayFields += '<label for="observations">Observações</label>';
                dayFields += '<textarea class="form-control" name="observations[]" rows="2"></textarea>';
                dayFields += '</div>';
                dayFields += '</div>';

                return dayFields;
            }

            // Função para adicionar um novo conjunto de campos de formulário
            function addDayFields() {
                var newFields = createDayFields(counter);
                $("#dynamicDayFieldsContainer").append(newFields);
                counter++;
            }

            // Manipulador de evento para o botão "Adicionar Dia"
            $("#addDay").on("click", function (e) {
                e.preventDefault();
                addDayFields();
            });
        });
    </script>

    </div>
    <br><br><br><br>
    <?php include "template/footer.php"; ?>
