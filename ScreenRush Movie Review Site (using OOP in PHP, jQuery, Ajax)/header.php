<?php 
    include_once './database/dbconfig.php'; 
    $db = new DB();

    if(isset($_SESSION['user_id'])) {
        $loggedUser = $_SESSION['login'];
        
    } else {
        $_SESSION['login'] = "GUEST";
        $loggedUser = $_SESSION['login'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScreenRush</title>
    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="favicon" href="favicon.png" type="image/png">

    <link rel="shortcut icon" href="favicon.ico" type="image/ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body id="top">

    <!-- HEADER -->
    <header class="header" data-header>
        <div class="container">

        <div class="overlay" data-overlay></div>

        <a href="./index.php" class="logo">
            <img src="./logo.png" alt="ScreenRush logo">
        </a>

        
        <div class="header-actions">

        
            <button class="search-btn">
            <ion-icon name="search-outline"></ion-icon>
            </button>

            <div class="search-movie">
                <div action="post" class="search-form" >
                    <input type="text" class="search-bar" id="search_name" placeholder="search movie">
                </div>
            </div>
        

            <a href="./signin.php" class="btn btn-primary" id="signInBtn" <?php if ($loggedUser !== 'GUEST') {echo 'style="display: none;"';} ?>>Sign in</a>
            <a href="./profile.php" class="btn btn-primary" id="loginBtn" <?php if ($loggedUser === 'GUEST') {echo 'style="display: none;"';} ?>>Profile</a>

            <!--
            <a href="./signin.php" class="btn btn-primary" id="signInBtn">Sign in</a>
            <a href="./profile.php" class="btn btn-primary" id="loginBtn">Profile</a>
            -->

        </div>

        <button class="menu-open-btn" data-menu-open-btn>
            <ion-icon name="reorder-two"></ion-icon>
        </button>

        <nav class="navbar" data-navbar>

            <div class="navbar-top">

            <a href="./index.php" class="logo">
                <img src="./logo.png" alt="ScreenRush Logo">
            </a>

            <button class="menu-close-btn" data-menu-close-btn>
                <ion-icon name="close-outline"></ion-icon>
            </button>

            </div>

            <ul class="navbar-list">
                <li>
                    <a href="./index.php" class="navbar-link">Home</a>
                </li>

                <li>
                    <a href="./movies.php" class="navbar-link">Movies</a>
                </li>

                <li>
                    <a href="./top_rated.php" class="navbar-link">Top Rated</a>
                </li>

                <li <?php if ($loggedUser === 'GUEST') {echo 'style="display: none;"';} ?>>
                    <a href="./my_reviews.php" class="navbar-link">My Reviews</a>
                </li>
            </ul>

            <ul class="navbar-social-list">

                <li>
                    <a href="#" class="navbar-social-link">
                    <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="navbar-social-link">
                    <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="navbar-social-link">
                    <ion-icon name="logo-pinterest"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="navbar-social-link">
                    <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="navbar-social-link">
                    <ion-icon name="logo-youtube"></ion-icon>
                    </a>
                </li>

            </ul>

        </nav>

        </div>
        
    </header>


    <script type="text/javascript">
        $(document).ready(function() {
            //displays
            loadMovies();
            loadNewMovies();
            loadPopularMovies();

           
            //new section filter
            $("#upcomingButton").focus(function() {
                loadNewMovies("Upcoming");
            });

            $("#recentlyAddedButton").focus(function() {
                loadNewMovies("New");
            });

            $("#all").focus(function() {
                loadNewMovies("");
            });


            //genre filter
            $("#noGenre").focus(function() {
                loadPopularMovies();
            });

            $("#romanceButton").focus(function() {
                loadMoviesByGenre("Romance");
            });

            $("#comedyButton").click(function() {
                loadMoviesByGenre("Comedy");
            });

            $("#fantasyButton").click(function() {
                loadMoviesByGenre("Fantasy");
            });

            $("#thrillerButton").click(function() {
                loadMoviesByGenre("Thriller");
            });

            $("#dramaButton").click(function() {
                loadMoviesByGenre("Drama");
            });

            $("#musicButton").focus(function() {
                loadMoviesByGenre("Music");
            });

            $("#actionButton").click(function() {
                loadMoviesByGenre("Action");
            });

            $("#adventureButton").click(function() {
                loadMoviesByGenre("Adventure");
            });


        });

        //ALL MOVIES
        function loadMovies() {
            $.ajax({
                url: "ajax.php",
                method: "POST",
                data: {
                    "getMovies": true,
            },
            success: function (result) {
                var mList = ``;
                var datas = JSON.parse(result);

                datas.forEach(function (data) {
                    mList += `<li>`;
                    mList += `
                                <div class="movie-card">

                                    <a href="./review_movie.php?id=`+data['movie_id']+`">
                                    <figure class="card-banner">
                                        <img src="`+data['img_src']+`" alt="`+data['movie_name']+`">
                                    </figure>
                                    </a>

                                    <div class="title-wrapper">
                                    <a href="./review_movie.php?id=`+data['movie_id']+`">
                                        <h3 class="card-title">`+data['movie_name']+`</h3>
                                    </a>

                                    <time datetime="2022">`+data['year']+`</time>
                                    </div>

                                    <div class="card-meta">
                                    <div class="badge-wrapper">
                                        <div class="badge badge-outline">`+data['resolution']+`</div>
                                        <div class="badge badge-fill">`+data['pg']+`</div>
                                    </div>

                                    <div class="duration">
                                        <ion-icon name="time-outline"></ion-icon>

                                        <time datetime="PT137M">`+data['duration']+`</time>
                                    </div>

                                    <div class="rating">
                                        <ion-icon name="star"></ion-icon>

                                        <data>`+data['ratings']+`</data>
                                    </div>
                                    </div>

                                </div> `;
                    mList += `</li>`;
                });

                    $('#movieList').html(mList);
                },
                error: function (error) {
                    console.error("AJAX error:", status, error);
                    alert("Oops! Something went wrong.");
                },
            });
        }


        //NEW/UPCOMING MOVIES FILTER
        function loadNewMovies(filter) {
            $.ajax({
                url: "ajax.php",
                method: "POST",
                data: {
                    "getNewUpcomingMovies": true,
                    "filter": filter
            },
            success: function (result) {
                var mList = ``;
                var datas = JSON.parse(result);

                datas.forEach(function (data) {
                    mList += `<li>`;
                    mList += `
                                <div class="movie-card">

                                    <a href="./review_movie.php?id=`+data['movie_id']+`">
                                    <figure class="card-banner">
                                        <img src="`+data['img_src']+`" alt="`+data['movie_name']+`">
                                    </figure>
                                    </a>

                                    <div class="title-wrapper">
                                    <a href="./review_movie.php?id=`+data['movie_id']+`">
                                        <h3 class="card-title">`+data['movie_name']+`</h3>
                                    </a>

                                    <time datetime="2022">`+data['year']+`</time>
                                    </div>

                                    <div class="card-meta">
                                    <div class="badge-wrapper">
                                        <div class="badge badge-outline">`+data['resolution']+`</div>
                                        <div class="badge badge-fill">`+data['pg']+`</div>
                                    </div>

                                    <div class="duration">
                                        <ion-icon name="time-outline"></ion-icon>

                                        <time datetime="PT137M">`+data['duration']+`</time>
                                    </div>

                                    <div class="rating">
                                        <ion-icon name="star"></ion-icon>

                                        <data>`+data['ratings']+`</data>
                                    </div>
                                    </div>

                                </div> `;
                    mList += `</li>`;
                });

                    $('#newUpcoming').html(mList);
                },
                error: function (error) {
                    console.error("AJAX error:", status, error);
                    alert("Oops! Something went wrong.");
                },
            });
        }


        //TOP RATED/POPULAR MOVIES FILTER
        function loadPopularMovies() {
            var sortBy = "ratings"
            $.ajax({
                url: "ajax.php",
                method: "POST",
                data: {
                    "getPopularMovies": true,
                    "sortBy": sortBy
            },
            success: function (result) {
                var mList = ``;
                var datas = JSON.parse(result);

                datas.forEach(function (data) {
                    mList += `<li>`;
                    mList += `
                                <div class="movie-card">

                                    <a href="./review_movie.php?id=`+data['movie_id']+`">
                                    <figure class="card-banner">
                                        <img src="`+data['img_src']+`" alt="`+data['movie_name']+`">
                                    </figure>
                                    </a>

                                    <div class="title-wrapper">
                                    <a href="./review_movie.php?id=`+data['movie_id']+`">
                                        <h3 class="card-title">`+data['movie_name']+`</h3>
                                    </a>

                                    <time datetime="2022">`+data['year']+`</time>
                                    </div>

                                    <div class="card-meta">
                                    <div class="badge-wrapper">
                                        <div class="badge badge-outline">`+data['resolution']+`</div>
                                        <div class="badge badge-fill">`+data['pg']+`</div>
                                    </div>

                                    <div class="duration">
                                        <ion-icon name="time-outline"></ion-icon>

                                        <time datetime="PT137M">`+data['duration']+`</time>
                                    </div>

                                    <div class="rating">
                                        <ion-icon name="star"></ion-icon>

                                        <data>`+data['ratings']+`</data>
                                    </div>
                                    </div>

                                </div> `;
                    mList += `</li>`;
                });

                    $('#topRated').html(mList);
                },
                error: function (error) {
                    console.error("AJAX error:", status, error);
                    alert("Oops! Something went wrong.");
                },
            });
        }


        //SHOW MOVIES BY GENRE
        function loadMoviesByGenre(genre) {
            var theGenre = genre;
            $.ajax({
                url: "ajax.php",
                method: "POST",
                data: {
                    "getMovieByGenre": true,
                    "hint": theGenre
                },
                success: function(result) {
                    var mList = ``;
                    var datas = JSON.parse(result);

                    datas.forEach(function(data) {
                        mList += `<li>`;
                        mList += `
                                    <div class="movie-card">

                                        <a href="./review_movie.php?id=`+data['movie_id']+`">
                                        <figure class="card-banner">
                                            <img src="`+data['img_src']+`" alt="`+data['movie_name']+`">
                                        </figure>
                                        </a>

                                        <div class="title-wrapper">
                                        <a href="./review_movie.php?id=`+data['movie_id']+`">
                                            <h3 class="card-title">`+data['movie_name']+`</h3>
                                        </a>

                                        <time datetime="2022">`+data['year']+`</time>
                                        </div>

                                        <div class="card-meta">
                                        <div class="badge-wrapper">
                                            <div class="badge badge-outline">`+data['resolution']+`</div>
                                            <div class="badge badge-fill">`+data['pg']+`</div>
                                        </div>

                                        <div class="duration">
                                            <ion-icon name="time-outline"></ion-icon>

                                            <time datetime="PT137M">`+data['duration']+`</time>
                                        </div>

                                        <div class="rating">
                                            <ion-icon name="star"></ion-icon>

                                            <data>`+data['ratings']+`</data>
                                        </div>
                                        </div>

                                    </div> `;
                        mList += `</li>`;
                    });

                    $('#topRated').html(mList);
                },
                error: function(error) {
                    console.error("AJAX error:", status, error);
                    alert("Oops! Something went wrong.");
                },
            });
        }























        //SEARCH
        $("#search_name").on("input", function() {
            var searchName = $("#search_name").val();

            $.ajax({
                url: "ajax.php",
                method: "POST",
                data: {
                    "searchMovie": true,
                    "hint": searchName
                },
                success: function(result) {
                    var mList = ``;
                    var datas = JSON.parse(result);

                    datas.forEach(function(data) {
                        mList += `<li>`;
                        mList += `
                                    <div class="movie-card">

                                        <a href="./review_movie.php?id=`+data['movie_id']+`">
                                        <figure class="card-banner">
                                            <img src="`+data['img_src']+`" alt="`+data['movie_name']+`">
                                        </figure>
                                        </a>

                                        <div class="title-wrapper">
                                        <a href="./review_movie.php?id=`+data['movie_id']+`">
                                            <h3 class="card-title">`+data['movie_name']+`</h3>
                                        </a>

                                        <time datetime="2022">`+data['year']+`</time>
                                        </div>

                                        <div class="card-meta">
                                        <div class="badge-wrapper">
                                            <div class="badge badge-outline">`+data['resolution']+`</div>
                                            <div class="badge badge-fill">`+data['pg']+`</div>
                                        </div>

                                        <div class="duration">
                                            <ion-icon name="time-outline"></ion-icon>

                                            <time datetime="PT137M">`+data['duration']+`</time>
                                        </div>

                                        <div class="rating">
                                            <ion-icon name="star"></ion-icon>

                                            <data>`+data['ratings']+`</data>
                                        </div>
                                        </div>

                                    </div> `;
                        mList += `</li>`;
                    });

                    $('#movieList').html(mList); 
                    $('#newRelease').html(mList); 
                    $('#topRated').html(mList); 
                    $('#newUpcoming').html(mList);
                },
                error: function(error) {
                    console.error("AJAX error:", status, error);
                    alert("Oops! Something went wrong.");
                },
              });
        });


        //AUTOCOMPLETE SEARCH
        $("#search_name").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "ajax.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        searchMovie: true,
                        hint: request.term,
                    },
                    success: function (data) {
                        response(data.map((item) => ({
                            label: item.movie_name,
                            value: item.movie_name,
                            id: item.movie_id
                        })));
                    },
                    error: function (error) {
                        console.error("AJAX error:", status, error);
                        alert("Oops! Something went wrong.");
                    },
                });
            },
            minLength: 2, 
            select: function (event, ui) {
                
                window.location.href = "./review_movie.php?id=" + ui.item.id;
            },
        });


    </script>