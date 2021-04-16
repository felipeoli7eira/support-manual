<info></info>
<div id="top">
    <div id="preview">
    </div>
</div>

<hr />

<div class="container">
    <form method="POST">
        <div class="row">
            <div class="four columns center preview">
                <input name="postName" required placeholder="Nome do post">
            </div>
            <div class="four columns center preview">
                <select name="postDifficulty">
                    <option disabled>Dificuldade</option>
                    <option>Baixa</option>
                    <option>Média</option>
                    <option>Alta</option>
                </select>
            </div>
            <div class="four columns center preview">
                <input name="imageUrl" placeholder="Imagem do post">
            </div>
        </div>
        <div class="row">
            <div class="columns center preview">
                <textarea id="postCode" name="postCode" spellcheck="false"><h1>Exemplo</h1></textarea>
            </div>
        </div>
        <div class="row">
            <div class="six columns center">
                <button id="switch" onclick="switchTopBottom()" type="button">Mudar para Baixo</button>
            </div>
            <div class="six columns center">
                <button type="submit">Criar Post</button>
            </div>
        </div>
    </form>
</div>

<hr />

<div id="bottom">
    <div id="preview">
    </div>
</div>

<script src="/js/textarea.js"></script>
<script src="/js/criar.js"></script>