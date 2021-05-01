<link rel="stylesheet" href="/css/posts.css">
<style>
    #pag-buttons{
        list-style-type: none;
    }
    .page-item-activate > button{
        background-color:green;
    }
</style>
<main>
    <div class="container">
        <div class="row">
            <div class="columns center">
                <label>Filtre pelo nome da postagem</label>
                <input type="text" id="post-filter">
            </div>
        </div>
        <div class="row">
            <table class="u-full-width">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Dificuldade</th>
                        <th style="width:150px">Data</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php
                            foreach ($data as $key => $value) {
                            ?>
                        <tr onclick="window.location.href='postagem/<?= $value['id'] ?>'">
                            <td><?= $tester['title'] ?></td>
                            <td><?= $value['difficulty'] ?></td>
                            <td><?= $value['create_date'] ?></td>
                        </tr>
                    <?php
                            }
                    ?> -->
                </tbody>
            </table>
        </div>
        <ul id="pag-buttons" style="display: flex;">
            <!-- <li class="page-item active"><span class="page-number">1</span> -->
            <!-- <li class="page-item"><button class="page-number">2</button></li> -->
            <!-- <li class="page-item"><a class="page-number" href="url_topage">3</a></li> -->
        </ul>
    </div>
</main>
<script src="/js/pagination.js"></script>

<script>
    $("#post-filter").keyup((e) => {
        let filtro = $("#post-filter").val();
        mapearPosts(filtro);
    })

    function mapearPosts(filtro) {
        filtro = filtro.toUpperCase();
        let linhas = $('tr');
        for (let i = 1; i < $('tr').length; i++) {
            if (linhas[i].children[0].innerText.toUpperCase().indexOf(filtro) > -1) {
                linhas[i].style.display = "";
            } else {
                linhas[i].style.display = "none"
            }
        }
    }
</script>