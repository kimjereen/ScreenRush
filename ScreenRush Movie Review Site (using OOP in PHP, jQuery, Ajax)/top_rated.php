<?php include('./header.php'); ?>

    <main>
    <article>

    <!-- TOP RATED -->
    <section class="top-rated">
        <div class="container">

        <div class="just-space"></div>

        <p class="section-subtitle">Online Streaming</p>

        <h2 class="h2 section-title">Top Rated Movies</h2>

        <ul class="filter-list">
            <li>
                <button class="filter-btn" id="noGenre">All</button>
            </li>
            <li>
                <button class="filter-btn" id="romanceButton">Romance</button>
            </li>
            <li>
                <button class="filter-btn" id="comedyButton">Comedy</button>
            </li>
            <li>
                <button class="filter-btn" id="fantasyButton">Fantasy</button>
            </li>
            <li>
                <button class="filter-btn" id="thrillerButton">Thriller</button>
            </li>
            <li>
                <button class="filter-btn" id="dramaButton">Drama</button>
            </li>
            <li>
                <button class="filter-btn" id="musicButton">Music</button>
            </li>
            <li>
                <button class="filter-btn" id="actionButton">Action</button>
            </li>
            <li>
                <button class="filter-btn" id="adventureButton">Adventure</button>
            </li>
        </ul>

        <ul class="movies-list" id="topRated">

        </ul>

        </div>
    </section>


    </article>
    </main>


  <?php include('./footer.php'); ?>


  <!-- #GO TO TOP -->
  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up"></ion-icon>
  </a>

  <!-- js link -->
  <script src="./js/script.js"></script>

  <!-- ionicon link -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>