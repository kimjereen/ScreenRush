<?php 
    include('./header.php'); 
    include_once './database/dbconfig.php'; 
    $db = new DB();

    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $username = $_SESSION['username'];
        $loggedUser = $_SESSION['login'];
        
    } else {
        $_SESSION['login'] = "GUEST";
        $loggedUser = $_SESSION['login'];
        
        $user_id = "";
        $username = "";
    }

    $movie_id = $_GET['id'];
    echo '<script>var loggedUSER = ' . json_encode($loggedUser) . ';</script>';
    echo '<script>var movieId = ' . json_encode($movie_id) . ';</script>';
    echo '<script>var userId = ' . json_encode($user_id) . ';</script>';
    echo '<script>var userName = ' . json_encode($username) . ';</script>';

    // Prepare and bind the query to prevent SQL injection
    $stmt = $db->mysql->prepare("SELECT * FROM movies WHERE movie_id = ?");
    $stmt->bind_param("i", $movie_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result) {
        $row = $result->fetch_assoc();
        $num_ratings = $row['ratings'];
        $num_of_stars = $row['num_of_stars'];
        $num_of_reviews = $row['num_of_reviews'];
        $movie_name = $row['movie_name'];
    } else {
        echo "Can't get movie details";
    }

    echo '<script>var numRatings = ' . json_encode($num_ratings) . ';</script>';
    echo '<script>var numOfStars = ' . json_encode($num_of_stars) . ';</script>';
    echo '<script>var numOfReviews = ' . json_encode($num_of_reviews) . ';</script>';
    echo '<script>var movieName = ' . json_encode($movie_name) . ';</script>';

?>


<main>
    <article>

    <!-- MOVIE DETAILS AND REVIEW PAGE -->
    <section id="movie-detail" class="movie-detail">
        
    </section>

    <section id="review-section" style="padding-bottom: 50px;">

            <p class="section-subtitle">Write a Review</p>
            <h2 class="h2 section-title">Hello! <?php echo $username; ?></h2>
            <p class="section-subtitle" style="margin-bottom: 50px;">How will you rate this movie?</p>

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
                <label for="comment" class="review-text">your comment:</label><br>
                <textarea id="comment" name="comment" rows="4" cols="65" required placeholder="What do you think?" class="comment-bar"></textarea><br><br>
            </div>

            <div class="review-btn-actions">
                <button type="submit" class="btn review-btn btn-submit">Submit</button>
                <button type="submit" class="btn review-btn btn-cancel" id="userCancel">Cancel</button>
            </div>
        </form>

        </div>
        
    </section>
    
    <section id="comments-section" style="padding:100px; background: hsl(170, 21%, 5%)">

        <div class="other-ratings container">

            <p class="section-subtitle">By ScreenRush Community</p>
            <h2 class="h2 section-title" style="margin-bottom:50px;">Other Reviews</h2>

            <div id="userReviews">

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
            loadMovieDetails();
            loadReviews();

            $("#review-section").hide();
            
            $("#userCancel").click(function() {
				$("#review-section").hide();
                
                $('.ratings ion-icon').removeClass('checked');
                $('.ratings ion-icon').attr('name', 'star-outline');
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

            $('#reviewForm').submit(function (event) {
                event.preventDefault(); 

                makeReview();
            });

        });


        //MAKE REVIEW
        function makeReview() {
            var rating = 0;
            $('#star-rate ion-icon').each(function() {
                if($(this).attr('name') === 'star') {
                    rating = $(this).data('rating');
                }
            });

                var comment = $('#comment').val();
                var date = new Date();

            
                var newNumOfStars = parseInt(numOfStars) + parseInt(rating);
                var newNumOfReviews = parseInt(numOfReviews) + 1;
                var avg_stars = (newNumOfStars / newNumOfReviews) * 2;
                var newRatings = parseFloat(avg_stars.toFixed(1));

                updateMovieData(newNumOfStars, newNumOfReviews, newRatings)
            
            $.ajax({
                url: "ajax.php",
                method: "POST",
                data: {
                    "makeReview": true, 
                    "movie_id": movieId,
                    "movie_name": movieName,
                    "user_id": userId,
                    "username": userName,
                    "stars": rating,
                    "date": date,
                    "comment": comment
                },
                success: function (response) {
                    loadReviews();
                    $("#review-section").hide();
                    $('#reviewForm')[0].reset();
                    $('.ratings ion-icon').removeClass('checked');
                    $('.ratings ion-icon').attr('name', 'star-outline');
                    $('.star-rate ion-icon').removeClass('checked');
                    $('.star-rate ion-icon').attr('name', 'star-outline');
                },
                error: function (xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        }


        function updateMovieData(newNumOfStars, newNumOfReviews, newRatings) {
            $.ajax({
                url: "ajax.php",
                method: "POST",
                data: {
                    "updateMovieData": true, 
                    "movie_id": movieId,
                    "ratings": newRatings,
                    "num_of_stars": newNumOfStars,
                    "num_of_reviews": newNumOfReviews,
                },
                success: function (response) {
                    loadMovieDetails();
                },
                error: function (xhr, status, error) {
                    console.log('Error:', error);
                }
            });
        }


        //MOVIE DETAIL
        function loadMovieDetails() {
            var movie_id = movieId;

            $.ajax({
                url: "ajax.php",
                method: "POST",
                data: {
                    "getMovieDetails": true,
                    "movie_id": movie_id
                },
                success: function (result) {
                    var mDetail = ``;
                    var datas = JSON.parse(result);

                    datas.forEach(function(data) {
                        var oldRatings = data['ratings'];
                        var oldNumOfReviews = data['num_of_reviews'];
                        var oldNumOfStars = data['num_of_stars'];


                    mDetail += `
                            <div class="container">
                                <figure class="movie-detail-banner">
                                    <img src="`+data['img_src']+`" alt="`+data['movie_name']+`">
                                    <a href="`+data['trailer']+`" class="play-btn" target="_blank">
                                        <ion-icon name="play-circle-outline"></ion-icon>
                                    </a>
                                </figure>

                                <div class="movie-detail-content">
                                    <p class="detail-subtitle" style="text-transform: uppercase;">`+data['status']+`</p>
                                    <h1 class="h1 detail-title">`+data['movie_name']+`</h1>
                                    <div class="meta-wrapper">
                                        <div class="badge-wrapper">
                                            <div class="badge badge-fill">`+data['pg']+`</div>
                                            <div class="badge badge-outline">`+data['resolution']+`</div>
                                        </div>
                                        <div class="ganre-wrapper">
                                            <a href="#">`+data['genre']+`</a>
                                        </div>
                                        <div class="date-time">
                                            <div>
                                                <ion-icon name="calendar-outline"></ion-icon>
                                                <time datetime="2021">`+data['year']+`</time>
                                            </div>
                                            <div>
                                                <ion-icon name="time-outline"></ion-icon>
                                                <time datetime="PT115M">`+data['duration']+`</time>
                                            </div>
                                            <div class="rating">
                                                <ion-icon name="star"></ion-icon>
                                                <data>`+data['ratings']+`</data>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="storyline">`+data['movie_des']+`</p>
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
                                        
                                        <p class="text">Click the star to make a review</p>
                                    </div>
                                </div>
                            </div>`;
                
                    });

                    $('#movie-detail').html(mDetail);
                    attachRatingEventListener();
                },
                error: function (error) {
                    console.error("AJAX error:", status, error);
                    alert("Oops! Something went wrong.");
                },
            });
        }


        // Event listener for the rating icons
        function attachRatingEventListener() {
            $('.ratings ion-icon').on('click', function() {

                if(loggedUSER == "GUEST") {
                    $("#review-section").hide();
                    window.location.href = 'signin.php'; 
                } else {
                    $("#review-section").show();
                }
                
                //$("#review-section").show();
                
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
        }



        //ALL REVIEWS OF THIS PARTICULAR MOVIE
        function loadReviews() {
            $.ajax({
                url: "ajax.php",
                method: "POST",
                data: {
                    "getReviews": true,
                    "movie_id": movieId,
            },
            success: function (result) {
                var userComments = ``;
                var datas = JSON.parse(result);


                if (datas.length === 0) {
                    userComments += ` 
                        <div class="user-comment" style="margin:20px auto; max-width:70%;" id="userReviews">
                            <p class="section-subtitle" style="margin-top: 10px;">There are no Reviews yet</p>
                        </div>`;
                } else {
                    datas.forEach(function (data) {
                        userComments += `
                        
                        <div class="user-comment" style="margin:20px auto; max-width:70%;" id="userReviews">
                            <div class="user-info">
                                <div class="user-profile">
                                    <ion-icon name="person-circle-outline"></ion-icon>
                                </div>

                                <div class="user-details">
                                    <p class="username">`+data['username']+`</p>
                                    <div class="comment-subheader">
                                            <ion-icon name="calendar-outline"></ion-icon>
                                            <p class="comment-date-rate">`+data['date']+`</p>
                                            
                                            <ion-icon name="star"></ion-icon>
                                            <p class="comment-date-rate">`+data['stars']+`/5</p>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="user-review">
                                <p>`+data['comment']+`</p>
                            </div>
                        </div>`;
                        
                    });
                }
                    
                    $('#userReviews').html(userComments);
                },
                error: function (error) {
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
