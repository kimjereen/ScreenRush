<?php include('./header.php'); ?>
<?php 
    include_once './database/dbconfig.php'; 
    $db = new DB();

    if(isset($_SESSION['user_id'])) {
        $loggedUser = $_SESSION['login'];
        
    } else {
        $_SESSION['login'] = "GUEST";
        $loggedUser = $_SESSION['login'];
    }


    if ($loggedUser !== 'GUEST') {
        $goTo = './profile.php';
    } else {
        $goTo = './signin.php'; 
    }
?>

    <main>
    <article>

    <!-- HERO -->
    <section class="hero">
        <div class="container">

        <div class="hero-content">

            <p class="hero-subtitle">ScreenRush</p>

            <h1 class="h1 hero-title">
                Discover the Latest <strong>Movies</strong> Today!
            </h1>

            <div class="meta-wrapper">

            <div class="badge-wrapper">
                <div class="badge badge-fill">PG 18</div>

                <div class="badge badge-outline">4K</div>
            </div>

            <div class="ganre-wrapper">
                <a href="#">Action, </a>
                <a href="#">Sci-Fi, </a>
                <a href="#">Horror, </a>
                <a href="#">Zombies</a>
            </div>

            <div class="date-time">

                <div>
                <ion-icon name="calendar-outline"></ion-icon>

                <time datetime="2023">2020</time>
                </div>

                <div>
                <ion-icon name="time-outline"></ion-icon>

                <time datetime="PT128M">116 mins</time>
                </div>

            </div>

            </div>

            <a href="https://www.youtube.com/watch?v=yVucSRLLeIM&t=4s&pp=ygUYdHJhaW4gdG8gYnVzYW4gMiB0cmFpbGVy" target="_blank">
                <button class="btn btn-primary">
                    <ion-icon name="play"></ion-icon>
                    <span>Watch now</span>
                </button>
            </a>

        </div>

        </div>
    </section>





    <!-- UPCOMING -->
    <section class="upcoming">
        <div class="container">

            <div class="flex-wrapper">

                <div class="title-wrapper">
                <p class="section-subtitle">Hot Picks</p>

                <h2 class="h2 section-title">New Movie Releases</h2>
                </div>

                <ul class="filter-list">

                    <li>
                        <button class="filter-btn" id="upcomingButton">Upcoming</button>
                    </li>

                    <li>
                        <button class="filter-btn" id="recentlyAddedButton">Recently Added</button>
                    </li>

                    <li>
                        <button class="filter-btn" id="all">All</button>
                    </li>

                </ul>

            </div>

            <ul class="movies-list " id="newUpcoming">
                
            </ul>

        </div>
    </section>




    <!-- SERVICE -->
    <section class="service">
        <div class="container">

        <div class="service-banner" style="width: 40%;">
            <figure>
            <img src="./assets/images/service-banner.png" alt="ScreenRush">
            </figure>

            <!-- href should go to login/signup page -->
            <a href="<?php echo $goTo; ?>" class="service-btn" >
                <span>Get Started  </span>
            </a>
        </div>

        <div class="service-content">

            <p class="service-subtitle">Our Value</p>

            <h2 class="h2 service-title">Welcome to ScreenRush!</h2>

            <p class="service-text">
            Discover the latest and top-rated movies. Rate and review your favorites to share your recommendations with other movie enthusiasts. Let ScreenRush be your guide to finding the perfect film for your next movie night!
            </p>

            <ul class="service-list">

            <li>
                <div class="service-card">

                <div class="card-icon">
                    <ion-icon name="star"></ion-icon>
                </div>

                <div class="card-content">
                    <h3 class="h3 card-title">Community Ratings and Reviews</h3>

                    <p class="card-text">
                    Read insightful reviews and ratings from a vibrant community of movie enthusiasts, helping you make informed decisions about what to watch next.
                    </p>
                </div>

                </div>
            </li>

            <li>
                <div class="service-card">

                <div class="card-icon">
                    <ion-icon name="flame"></ion-icon>
                </div>

                <div class="card-content">
                    <h3 class="h3 card-title">Get Ready for an Adrenaline Rush</h3>

                    <p class="card-text">
                    Feel the hits on fire! Immerse yourself in a world of cinematic delight, check out the latest, the newest, and most popular movies today with ScreenRush.
                    </p>
                </div>

                </div>
            </li>

            </ul>

        </div>

        </div>
    </section>





    <!-- TOP RATED -->
    <section class="top-rated">
        <div class="container">

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





    <!-- ALL MOVIES -->
    <section class="tv-series">
        <div class="container">

        <p class="section-subtitle">All Movies</p>

        <h2 class="h2 section-title">World Best Movies</h2>

        <ul class="movies-list" id="movieList">

        </ul>

        </div>
    </section>


    </article>
    </main>


    <?php include('./footer.php'); ?>


    <!-- GO TO TOP -->
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
