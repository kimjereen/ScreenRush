<?php include('./header.php'); ?>
<?php
    include_once './database/dbconfig.php'; 

    $user_id = "";
    if(isset($_SESSION['login'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        $user_id = "";
    }
    echo '<script>var userId = ' . json_encode($user_id) . ';</script>';
?>

    <section id="comments-section" style="padding:100px; min-height:100vh; background: hsl(170, 21%, 5%)">

        <div class="other-ratings container" style="padding-top: 70px;">

            <p class="section-subtitle">By ScreenRush Community</p>
            <h2 class="h2 section-title" style="margin-bottom:50px;">My Reviews</h2>

            <div id="userReviews">

            </div>
        </div>
    </section>

    <?php include('./footer.php'); ?>

  <script type="text/javascript">
        $(document).ready(function() {
            loadMovies();
            loadMyReviews();

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


        //ALL REVIEWS USER MADE
        function loadMyReviews() {
            $.ajax({
                url: "ajax.php",
                method: "POST",
                data: {
                    "getMyReviews": true,
                    "user_id": userId,
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
                                <p class="username">⤴ `+data['movie_name']+`</p>
                                <p> `+data['comment']+`</p>
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
