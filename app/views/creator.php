<div id="top">
    <div id="preview">
    </div>
</div>

<hr />

<div class="container">
    <form action="/creator" method="POST">
        <div class="row">
            <div class="columns center preview">
                <br>
                <input name="postName" placeholder="Nome do post">
                <textarea id="postCode" name="postCode" spellcheck="false"><h1>Preview Example</h1></textarea>
                <!-- <tex id="postCode" contenteditable="true" spellcheck=false></div> -->
            </div>
        </div>
        <div class="row">
            <div class="six columns center">
                <button id="switch" onclick="switchTopBottom()" type="button">Switch to Bottom</button>
            </div>
            <div class="six columns center">
                <button type="submit">Create Post</button>
            </div>
        </div>
    </form>
</div>

<hr />

<div id="bottom">
    <div id="preview">
    </div>
</div>

<script src="/js/creator.js"></script>