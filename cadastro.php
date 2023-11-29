<?php include "template/header.php"; ?>




<div class="container mt-5">
        <h1 class="text-center">Cadastro de Alunos</h1>
        <form id="cadastroAlunoForm" class="mx-auto" method="POST" action="processa_formulario.php">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <div class="mb-3">
                <label for="objetivo" class="form-label">Objetivo</label>
                <textarea class="form-control" id="observations" name="observations" rows="2"></textarea>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="idade" class="form-label">Idade</label>
                        <input type="number" class="form-control" id="idade" name="idade">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select class="form-select" id="sexo" name="sexo">
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="altura" class="form-label">Altura (cm)</label>
                        <input type="number" class="form-control" id="altura" name="altura">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="peso" class="form-label">Peso (kg)</label>
                        <input type="number" class="form-control" id="peso" name="peso">
                    </div>
                </div>
                <div class="col-md-12 text-center">
                <button type="submit" name="submit" class="btn btn-primary">Cadastrar</button>






                

                </div>
            </div>
            
        
        </form>
    </div>

    <?php
        include "template/footer.php";
?>