<section class="mt-3 p-2">
    <h2>Pesquisar por CPF</h2>
    <div class="border border-dark p-3">
        <form action="./views/listarPorCpf.php" method="post">
            <label for="cpf" class="form-label">CPF:</label>
            <input id="cpf" name="cpf" type="text" class="form-control mb-2" placeholder="Digite um CPF" maxlength="11"/>
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </form>
    </div>
</section>

<section class="mt-3 p-2">
    <h2>Pesquisar por Nome:</h2>
    <div class="border border-dark p-3">
        <form action="./views/listarPorNome.php" method="post">
            <label for="nome" class="form-label">Nome:</label>
            <input id="nome" name="nome" type="text" class="form-control mb-2" placeholder="Digite um Nome"/>
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </form>
    </div>
</section>

<section class="mt-3 p-2">
    <h2>Pesquisar por Data de nascimento:</h2>
    <div class="border border-dark p-3">
        <form action="./views/listarPorData.php" method="post">
            <label for="data" class="form-label">Nome:</label>
            <input id="data" name="data" type="date" class="form-control mb-2" />
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </form>
    </div>
</section>
