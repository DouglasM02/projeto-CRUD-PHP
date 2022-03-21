<section class="mt-3 p-2">
    <h2>Cadastrar</h2>
    <div class="border border-dark p-3">
        <form action="./views/cadastrar.php" method="post">
            <label for="name" class="form-label">Nome:</label>
            <input id="name" name="nome" type="text" class="form-control mb-2" placeholder="Digite um nome" />
            <label for="cpf" class="form-label">CPF:</label>
            <input id="cpf" name="cpf" type="text" class="form-control mb-2" placeholder="Digite um CPF" maxlength="11"/>
            <label for="data" class="form-label">Data de nascimento:</label>
            <input id="data" name="data" type="date" class="form-control mb-3"/>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</section>
