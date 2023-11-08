<?php include('./header.php'); ?>
<?php
    $movie_id = $_GET['id'];

    echo $movie_id;
?>

<main>
    <article>

    <!-- MOVIE DETAILS AND REVIEW PAGE -->
    <section class="movie-detail">
        <div class="container">

          <figure class="movie-detail-banner">

            <img src="./assets/images/movie-4.png" alt="Free guy movie poster">

            <button class="play-btn">
                <ion-icon name="play-circle-outline"></ion-icon>
            </button>

          </figure>

          <div class="movie-detail-content">

            <p class="detail-subtitle">New</p>

            <h1 class="h1 detail-title">
              Free <strong>Guy</strong>
            </h1>

            <div class="meta-wrapper">

                <div class="badge-wrapper">
                    <div class="badge badge-fill">PG 13</div>

                    <div class="badge badge-outline">HD</div>
                </div>

                <div class="ganre-wrapper">
                    <a href="#">Comedy</a>
                </div>

                <div class="date-time">

                    <div>
                        <ion-icon name="calendar-outline"></ion-icon>
                        <time datetime="2021">2021</time>
                    </div>

                    <div>
                        <ion-icon name="time-outline"></ion-icon>
                        <time datetime="PT115M">115 min</time>
                        
                    </div>

                    <div class="rating">
                        <ion-icon name="star"></ion-icon>
                        <data>9.0</data>
                    </div>

                </div>

            </div>

            <p class="storyline">
              A bank teller called Guy realizes he is a background character in an open world video game called Free
              City that will
              soon go offline.
            </p>

            <div class="write-review">
                
                <button class="bulb">
                    <ion-icon name="bulb"></ion-icon>
                </button>

                <div class="title-wrapper">
                    <p class="title">Rate Now!</p>

                    <p class="text">Tell us what you think about this movie?</p>
                </div>
                
                <div id="ratings" class="ratings">
                    <ion-icon name="star-outline" data-ratings="1"></ion-icon>
                    <ion-icon name="star-outline" data-ratings="2"></ion-icon>
                    <ion-icon name="star-outline" data-ratings="3"></ion-icon>
                    <ion-icon name="star-outline" data-ratings="4"></ion-icon>
                    <ion-icon name="star-outline" data-ratings="5"></ion-icon>
                </div>
            </div>


          </div>

        </div>

    </section>

    <section id="review-section" style="background: hsl(225, 25%, 9%); padding: 50px 0;">

            <p class="section-subtitle">Write a Review</p>
            <h2 class="h2 section-title" style="margin-bottom:50px;">How will you rate this Movie?</h2>

        <div class="review-form-section ">

        <form id="reviewForm">
            <div id="star-rate" class="star-rate">
                <ion-icon name="star-outline" data-rating="1"></ion-icon>
                <ion-icon name="star-outline" data-rating="2"></ion-icon>
                <ion-icon name="star-outline" data-rating="3"></ion-icon>
                <ion-icon name="star-outline" data-rating="4"></ion-icon>
                <ion-icon name="star-outline" data-rating="5"></ion-icon>
            </div>

            <br>
            <div>
                <label for="review" class="review-text">Comment:</label><br>
                <textarea id="review" name="review" rows="4" cols="65" required placeholder="What do you think?" class="comment-bar"></textarea><br><br>
            </div>

            <div class="review-btn-actions">
                <button type="submit" class="btn review-btn btn-submit">Submit</button>
                <button type="submit" class="btn review-btn btn-cancel">Cancel</button>
            </div>
        </form>

        </div>
        
    </section>
    
    <section id="comments-section" style="padding:100px; margin-top: 40px;">

        <div class="other-ratings container">

            <p class="section-subtitle">By ScreenRush Community</p>
            <h2 class="h2 section-title" style="margin-bottom:50px;">Other Reviews</h2>


            <div class="user-comment" style="margin:20px auto; max-width:70%;">
                <div class="user-info">
                    <div class="user-profile">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </div>

                    <div class="user-details">
                        <p class="username">kimjereen2425</p>
                        <div class="comment-subheader">
                                <ion-icon name="calendar-outline"></ion-icon>
                                <p class="comment-date-rate">October 29, 2023</p>
                                
                                <ion-icon name="star"></ion-icon>
                                <p class="comment-date-rate">2/5</p>
                            
                        </div>
                    </div>
                </div>

                <div class="user-review">
                    <p>Great movie! I thoroughly enjoyed it.</p>
                </div>
            </div>

        </div>
    </section>





    <!-- ALL MOVIES -->
    <section class="tv-series">
        <div class="container">

        <p class="section-subtitle">All Movies</p>
        <h2 class="h2 section-title">World Best Movies</h2>

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

        <ul class="movies-list" id="movieList">

        </ul>

        </div>
    </section>



      </article>
</main>


  <?php include('./footer.php'); ?>

  <script type="text/javascript">
        $(document).ready(function() {
            loadMovies();
            loadMovieDetails();

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

            

            $('.ratings ion-icon').on('click', function() {
                var rating = $(this).data('ratings');
                $('.ratings ion-icon').removeClass('checked');

                for (var i = 1; i <= 5; i++) {
                    if (i <= rating) {
                        $('.ratings ion-icon[data-ratings="' + i + '"]').attr('name', 'star');
                        $('.ratings ion-icon[data-ratings="' + i + '"]').addClass('checked');
                    } else {
                        $('.ratings ion-icon[data-ratings="' + i + '"]').attr('name', 'star-outline');
                    }
                }
            });

            $('.star-rate ion-icon').on('click', function() {
                var starRating = $(this).data('rating');
                $('.star-rate ion-icon').removeClass('checked');

                for (var i = 1; i <= 5; i++) {
                    if (i <= starRating) {
                        $('.star-rate ion-icon[data-rating="' + i + '"]').attr('name', 'star');
                        $('.star-rate ion-icon[data-rating="' + i + '"]').addClass('checked');
                    } else {
                        $('.star-rate ion-icon[data-rating="' + i + '"]').attr('name', 'star-outline');
                    }
                }
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


        //ALL MOVIES
        function loadMovieDetails() {
            var movie_id = <?php $movie_id ?>

            $.ajax({
                url: "ajax.php",
                method: "POST",
                data: {
                    "getMovies": true,
                    "movie_id": movie_id
                },
                success: function (result) {
                    var datas = JSON.parse(result);
                    var mDetail = `
                            <div class="container">
                                <figure class="movie-detail-banner">
                                    <img src="${datas.status}" alt="${datas.movie_name}">
                                    <button class="play-btn">
                                        <ion-icon name="play-circle-outline"></ion-icon>
                                    </button>
                                </figure>

                                <div class="movie-detail-content">
                                    <p class="detail-subtitle">New</p>
                                    <h1 class="h1 detail-title">${datas.movie_name}</h1>
                                    <div class="meta-wrapper">
                                        <div class="badge-wrapper">
                                            <div class="badge badge-fill">${datas.pg}</div>
                                            <div class="badge badge-outline">${datas.resolution}</div>
                                        </div>
                                        <div class="ganre-wrapper">
                                            <a href="#">${datas.genre}</a>
                                        </div>
                                        <div class="date-time">
                                            <div>
                                                <ion-icon name="calendar-outline"></ion-icon>
                                                <time datetime="2021">${datas.year}</time>
                                            </div>
                                            <div>
                                                <ion-icon name="time-outline"></ion-icon>
                                                <time datetime="PT115M">${datas.duration}</time>
                                            </div>
                                            <div class="rating">
                                                <ion-icon name="star"></ion-icon>
                                                <data>${datas.ratings}</data>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="storyline">${datas.movie_des}</p>
                                    <div class="write-review">
                                        <button class="bulb">
                                            <ion-icon name="bulb"></ion-icon>
                                        </button>
                                        <div class="title-wrapper">
                                            <p class="title">Rate Now!</p>
                                            <p class="text">Tell us what you think about this movie?</p>
                                        </div>
                                        <div id="ratings" class="ratings">
                                            <ion-icon name="star-outline" data-ratings="1"></ion-icon>
                                            <ion-icon name="star-outline" data-ratings="2"></ion-icon>
                                            <ion-icon name="star-outline" data-ratings="3"></ion-icon>
                                            <ion-icon name="star-outline" data-ratings="4"></ion-icon>
                                            <ion-icon name="star-outline" data-ratings="5"></ion-icon>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

        
                    $('#movie-detail').html(mDetail);
                },
                error: function (error) {
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
                },
                error: function(error) {
                    console.error("AJAX error:", status, error);
                    alert("Oops! Something went wrong.");
                },
              });
        });


        //loadByGenre
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

                    $('#movieList').html(mList);
                },
                error: function(error) {
                    console.error("AJAX error:", status, error);
                    alert("Oops! Something went wrong.");
                },
            });
        }
        
    </script>




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
