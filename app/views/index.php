<section class="light">
  <div class="container">
    <div class="row">
      <div class="five columns">
        <div>
          <img src="https://steamuserimages-a.akamaihd.net/ugc/830196727540775822/AB2C9A1A2ADED44CC3BEEBD689B03E5E8D4E4290/" class="intro-img">
        </div>
      </div>
      <div class="seven columns">
        <h3>Quem Somos</h3>
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam architecto veniam, repellat, voluptatibus
          blanditiis obcaecati autem eius corrupti ex veritatis similique debitis cum, provident unde placeat quam
          aliquam dolor. Obcaecati?
        </p>
      </div>
    </div>
  </div>
</section>
<section class="dark">
  <div class="container">
    <h3 class="center">Artigos</h3>
    <div class="row">
      <?php
      foreach ($data as $key => $value) {
        echo "
        <div class='three columns light mini-content'>
          <a href='/postagem/{$value['id']}' class='clear-link'>
            <img src='{$value['imageUrl']}' alt='{$value['title']}'>
            <span><strong>{$value['title']}</strong></span>
            <span>Dificuldade: {$value['difficulty']}</span>
            <span><small>{$value['create_date']}</small></span>
          </a>
        </div>";
      }
      ?>
    </div>
  </div>
</section>