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