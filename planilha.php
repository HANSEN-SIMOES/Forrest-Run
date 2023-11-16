<?php include "template/header.php"; ?>


<?php
        include "template/footer.php";
?>

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
            <div class="form-group">
                <label for="day">Data</label>
                <input type="date" class="form-control" id="day" name="day[]" required>
            </div>
            <div class="form-group">
                <label for="preWorkout">Pré Treino</label>
                <input type="text" class="form-control" id="preWorkout" name="preWorkout[]" required>
            </div>
            <div class="form-group">
                <label for="distance">Distância</label>
                <input type="text" class="form-control" id="distance" name="distance[]" required>
            </div>
            <div class="form-group">
                <label for="method">Método</label>
                <input type="text" class="form-control" id="method" name="method[]" required>
            </div>
            <div class="form-group">
                <label for="speed">Velocidade</label>
                <input type="text" class="form-control" id="speed" name="speed[]" required>
            </div>
            <div class="form-group">
                <label for="time">Tempo</label>
                <input type="text" class="form-control" id="time" name="time[]" required>
            </div>
            <div class="form-group">
                <label for="pace">Ritmo Min/km</label>
                <input type="text" class="form-control" id="pace" name="pace[]" required>
            </div>
            <div class="form-group">
            <label for="observations">Observações</label>
            <textarea class="form-control" id="observations" name="observations[]" rows="2"></textarea>
</div>

            
            <hr>

            <input class="btn btn-primary" type="submit" name="btn-gerar" value ="gerar pdf"><br><br>



        </form>
        <button type="button" class="btn btn-primary" id="addDay">Adicionar Dia</button>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('addDay').addEventListener('click', function () {
            const form = document.getElementById('trainingForm');
            const clonedForm = form.cloneNode(true);

            
            const inputs = clonedForm.querySelectorAll('input');
            inputs.forEach(input => input.value = '');

            form.parentNode.appendChild(clonedForm);
        });

        document.getElementById('submitForm').addEventListener('click', function () {
            const forms = document.querySelectorAll('#trainingForm');
            const formData = [];

            forms.forEach(form => {
                const formValues = new FormData(form);
                const data = {};
                for (const [key, value] of formValues) {
                    data[key] = value;
                }
                formData.push(data);
            });

         
            console.log(formData);
        });
    </script>

<?php include "template/footer.php"; ?>