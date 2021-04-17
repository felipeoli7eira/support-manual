<div class="container">
    <div class="row">
        <div class="columns center">
            <br />
            <br />
            <div class="row">
                <div class="columns">
                    <a class="button" href="/criar">Criar novo Post</a>
                </div>
            </div>
            <table class="u-full-width">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $value) {
                    ?>
                        <tr>
                            <td><?=$value['title']?></td>
                            <td><?=$value['create_date']?></td>
                            <td style="width: 45%;">
                                <a class="button" href="/postagem/<?=$value['id']?>" target="_blank">Visualizar</a>
                                <a class="button" href="/editar/<?=$value['id']?>">Editar</a>
                                <a class="button">Remover</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <br />
            <br />
            <br />
            <br />
            <h2 class="center">Perfil de usuário em desenvolvimento!</h2>
            <br />
            <br />
            <br />
            <br />
            <br />
            <h3>Usuário: <?= $_SESSION['user']['name'] ?></h3>
            <a class="button button-primary small-button" href="/sair">Sair</a>
        </div>
    </div>
</div>