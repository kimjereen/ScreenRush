<?php 
    include_once '../database/dbconfig.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScreenRush Admin</title>
    <link rel="favicon" href="/favicon.ico" type="image/png">

    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/admin-style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body class="dark">

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="">ScreenRush Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Tables</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" id="seeMoviesTable">See Movies Table</a></li>
                    <li><a class="dropdown-item" id="seeReviewsTable">See Reviews Table</a></li>
                </ul>
            </li>
        </ul>
        <div class="d-flex">
            <input class="form-control me-2" type="text" placeholder="Search" id="search_name">
        </div>
        <form class="d-flex">
            <button class="btn btn-danger" type="button"> <i class="fas fa-sign-out-alt"></i> Logout</button>
        </form>
        </div>
    </div>
    </nav>


    <div class="container mt-4" id="moviesData">
        <!-- Button trigger modal -->
        <div class="container mt-4 d-flex justify-content-between">
                <h2>MOVIES TABLE</h2>
                <button type="button" class="btn btn-success shadow" data-bs-toggle="modal" data-bs-target="#addMovieModal">
                <i class="fas fa-plus"></i> Add Movie
                </button>
            </div>
            

            <!-- Add Movie Modal -->
            <div class="modal fade" id="addMovieModal" tabindex="-1" aria-labelledby="addMovieModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addMovieModalLabel">Add Movie</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addMovieForm">
                            <div class="mb-3">
                                <label for="movie_name" class="form-label">Title</label>
                                <input type="text" class="form-control" id="movie_name" name="movie_name" placeholder="Movie Title" required>
                            </div>
                            <div class="mb-3">
                                <label for="movie_des" class="form-label">Description</label>
                                <textarea class="form-control" id="movie_des" name="movie_des" placeholder="Movie Description" required></textarea>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <label for="year" class="form-label">Year</label>
                                    <input type="text" class="form-control" id="year" name="year" placeholder="Year Release (ex: 2020)" required>
                                    </div>
                                    <div class="mb-3">
                                    <label for="resolution" class="form-label">Resolution</label>
                                    <select class="form-select" id="resolution" name="resolution" required>
                                        <option value="" disabled selected>Select Resolution</option>
                                        <option value="4K">4K</option>
                                        <option value="HD">HD</option>
                                        <option value="1080p">1080p</option>
                                        <option value="720p">720p</option>
                                        <option value="480p">480p</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <label for="duration" class="form-label">Duration</label>
                                    <input type="text" class="form-control" id="duration" name="duration" placeholder="Movie total minutes (ex: 64 min)" required>
                                    </div>
                                    <div class="mb-3">
                                    <label for="pg" class="form-label">PG</label>
                                    <select class="form-select" id="pg" name="pg" required>
                                        <option value="" disabled selected>Select Movie Rating Standard (PG)</option>
                                        <option value="PG 13">PG 13</option>
                                        <option value="R">R</option>
                                        <option value="PG">PG</option>
                                        <option value="G">G</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="" disabled selected>Select Movie Status</option>
                                        <option value="Released">Released</option>
                                        <option value="Upcoming">Upcoming</option>
                                        <option value="New">New</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <label for="genre" class="form-label">Genre</label>
                                    <input type="text" class="form-control" id="genre" name="genre" placeholder="Movie Genre (ex: Historical, Romance)" required>
                                    </div>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="img_src" class="form-label">Cover</label>
                                <input type="text" class="form-control" id="img_src" name="img_src" placeholder="Enter movie poster URL" required>
                            </div>
                            <div class="mb-3">
                                <label for="trailer" class="form-label">Trailer</label>
                                <input type="text" class="form-control" id="trailer" name="trailer" placeholder="Enter movie trailer link" required>
                            </div>
                            <input type="submit" class="btn btn-primary" value=SUBMIT>
                        </form>
                    </div>
                    </div>
                </div>
            </div>

            

            <!-- Update Movie Modal -->
            <div class="modal fade" id="updateMovieModal" tabindex="-1" aria-labelledby="updateMovieModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateMovieModalLabel">Update Movie</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="updateMovieForm">
                                <input type="hidden" id="update_movie_id" value="update_movie_id">
                                <div class="mb-3">
                                    <label for="update_movie_name" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="update_movie_name" value="update_movie_name" placeholder="Movie Title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="update_movie_des" class="form-label">Description</label>
                                    <textarea class="form-control" id="update_movie_des" value="update_movie_des" placeholder="Movie Description" required></textarea>
                                </div>

                                <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <label for="year" class="form-label">Year</label>
                                    <input type="text" class="form-control" id="update_year" value="update_year" placeholder="Year Release (ex: 2020)" required>
                                    </div>
                                    <div class="mb-3">
                                    <label for="resolution" class="form-label">Resolution</label>
                                    <select class="form-select" id="update_resolution" value="update_resolution" required>
                                        <option value="" disabled selected>Select Resolution</option>
                                        <option value="4K">4K</option>
                                        <option value="HD">HD</option>
                                        <option value="1080p">1080p</option>
                                        <option value="720p">720p</option>
                                        <option value="480p">480p</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <label for="duration" class="form-label">Duration</label>
                                    <input type="text" class="form-control" id="update_duration" value="update_duration" placeholder="Movie total minutes (ex: 64 min)" required>
                                    </div>
                                    <div class="mb-3">
                                    <label for="pg" class="form-label">PG</label>
                                    <select class="form-select" id="update_pg" value="update_pg" required>
                                        <option value="" disabled selected>Select Movie Rating Standard (PG)</option>
                                        <option value="PG 13">PG 13</option>
                                        <option value="R">R</option>
                                        <option value="PG">PG</option>
                                        <option value="G">G</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="update_status" value="update_status" required>
                                        <option value="" disabled selected>Select Movie Status</option>
                                        <option value="Released">Released</option>
                                        <option value="Upcoming">Upcoming</option>
                                        <option value="New">New</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <label for="genre" class="form-label">Genre</label>
                                    <input type="text" class="form-control" id="update_genre" value="update_genre" placeholder="Movie Genre (ex: Historical, Romance)" required>
                                    </div>
                                </div>
                            </div>

                                <div class="mb-3">
                                    <label for="update_img_src" class="form-label">Cover</label>
                                    <input type="text" class="form-control" id="update_img_src" value="update_img_src" placeholder="Enter movie poster URL" required>
                                </div>
                                <div class="mb-3">
                                    <label for="update_trailer" class="form-label">Trailer</label>
                                    <input type="text" class="form-control" id="update_trailer" value="update_trailer" placeholder="Enter movie trailer link" required>
                                </div>
                                <input type="submit" class="btn btn-primary" value="UPDATE">
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <!-- TABLE -->
            <div class="container table-container mt-4 bg-dark shadow">
                <div class="table-responsive" >
                    <!-- CRUD Table -->
                    <table class="table table-hover table-responsive table-striped">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Year</th>
                                <th scope="col">Resolution</th>
                                <th scope="col">PG</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Status</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Cover</th>
                                <th scope="col">Trailer</th>
                                <th scope="col" class="last text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody id="tableBody">
                            
                        </tbody>

                    </table>
                </div>
            </div>
    </div>






    <div class="container mt-4" id="reviewsData">
        <!-- Button trigger modal -->
        <div class="container mt-4">
                <h2>USER REVIEWS TABLE</h2>
            </div>
            

            <!-- TABLE -->
            <div class="container table-container mt-4 bg-dark shadow">
                <div class="table-responsive" >
                    <!-- CRUD Table -->
                    <table class="table table-hover table-responsive table-striped">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">MID</th>
                                <th scope="col">Movie Title</th>
                                <th scope="col">UID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Stars</th>
                                <th scope="col">Review Date</th>
                                <th scope="col">Comment</th>
                            </tr>
                        </thead>

                        <tbody id="reviewsTable">
                            
                        </tbody>

                    </table>
                </div>
            </div>
    </div>
    
    

</body>


<script type="text/javascript">
        $(document).ready(function() {
            loadMovies();
            loadReviews();

            $("#reviewsData").hide();

            $("#seeMoviesTable").click(function (e) {
                e.preventDefault();

                $('#moviesData').show('slow');
                $("#reviewsData").hide('slow');
            });

            $("#seeReviewsTable").click(function (e) {
                e.preventDefault();

                $('#moviesData').hide('slow');
                $("#reviewsData").show('slow');
                $("#search_name").hide('slow');
            });

            $("#logout").click(function (e) {
                e.preventDefault();

                window.location.href = '../signin.php';
            });



            $("#addMovieForm").on( "submit", function(e)  {
                e.preventDefault();
                var datas = $(this).serializeArray();
                var data_array = {};

                $.map(datas, function(data, cnt) {
                    data_array[data['name']] = data['value'];
                });

                $.ajax({
                    url: "../ajax.php",
                    method: "POST",
                    data: {
                        "addMovie":true,
                        "datas": data_array
                    },
                    success: function (result) {
                        console.log("Data added successfully!");
                        loadMovies();
                        $("#addMovieModal").modal("hide");
                    },
                    error: function (error) {
                        console.error("AJAX error:", error);
                        alert("Oops! Something went wrong.");
                    }
                });
            });


        });


        function loadMovies() {
            $.ajax({
                url: "../ajax.php",
                method: "POST",
                data: {
                    "getMovies": true,
                },
                success: function (result) {
                    var tBody = ``;
                    var cnt = 1;
                    var datas = JSON.parse(result);
                    
                    datas.forEach(function (data) {
                        tBody += `<tr>
                            <th scope="row">`+(cnt++)+`</th>
                            <th class="text-nowrap">`+data['movie_name']+`</th>
                            <td class="col-cut">`+data['movie_des']+`</td>
                            <td class="text-center">`+data['year']+`</td>
                            <td class="text-center">`+data['resolution']+`</td>
                            <td class="text-nowrap text-center">`+data['pg']+`</td>
                            <td class="text-center">`+data['duration']+`</td>
                            <td class="text-center">`+data['status']+`</td>
                            <td class="text-nowrap">`+data['genre']+`</td>
                            <td class="col-cut">`+data['img_src']+`</td>
                            <td class="col-cut">`+data['trailer']+`</td>
                            <td class="last text-nowrap"">
                                <button class="btn btn-primary update-btn" style="margin-right: 5px;"
                                            data-movie-id="${data['movie_id']}"
                                            data-movie-name="${data['movie_name']}"
                                            data-movie-des="${data['movie_des']}"
                                            data-year="${data['year']}"
                                            data-resolution="${data['resolution']}"
                                            data-pg="${data['pg']}"
                                            data-duration="${data['duration']}"
                                            data-status="${data['status']}"
                                            data-genre="${data['genre']}"
                                            data-img-src="${data['img_src']}"
                                            data-trailer="${data['trailer']}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#updateMovieModal"">Update</button>
                                <button class="btn btn-danger delete-btn" data-movie-id="${data['movie_id']}">Delete</button>
                            </td>
                        </tr>`;
                    });

                    $('#tableBody').html(tBody);
                },
                error: function (error) {
                    console.error("AJAX error:", status, error);
                    alert("OOOPSSSS something went wrong :<");
                }
            });
        }


        function loadReviews() {
            $.ajax({
                url: "../ajax.php",
                method: "POST",
                data: {
                    "getAllReviews": true,
                },
                success: function (result) {
                    var tBody = ``;
                    var cnt = 1;
                    var datas = JSON.parse(result);
                    
                    datas.forEach(function (data) {
                        tBody += `<tr>
                            <th scope="row">`+(cnt++)+`</th>
                            <th class="text-center">`+data['movie_id']+`</th>
                            <th class="">`+data['movie_name']+`</th>
                            <td class="text-center">`+data['user_id']+`</td>
                            <td class="text-center">`+data['username']+`</td>
                            <td class="text-center">`+data['stars']+`</td>
                            <td>`+data['date']+`</td>
                            <td>`+data['comment']+`</td>
                        </tr>`;
                    });

                    $('#reviewsTable').html(tBody);
                },
                error: function (error) {
                    console.error("AJAX error:", status, error);
                    alert("OOOPSSSS something went wrong :<");
                }
            });
        }


        //UPDATING A MOVIE
        $(document).on("click", ".update-btn", function(e) {
            e.preventDefault();
            var movie_id = $(this).data("movie-id");
            var movie_name = $(this).data("movie-name");
            var movie_des =  $(this).data("movie-des");
            var year =  $(this).data("year");
            var resolution = $(this).data("resolution");
            var pg = $(this).data("pg");
            var duration =  $(this).data("duration");
            var status =  $(this).data("status");
            var genre = $(this).data("genre");
            var img_src = $(this).data("img-src");
            var trailer =  $(this).data("trailer");

            $.ajax({
                url: "../ajax.php",
                method: "POST",
                data: {
                    "getMovies": true,
                    "movie_id": movie_id
                },
                success: function(result) {
                    $("#update_movie_id").val(movie_id); 
                    $("#update_movie_name").val(movie_name);
                    $("#update_movie_des").val(movie_des);
                    $("#update_year").val(year);
                    $("#update_resolution").val(resolution); 
                    $("#update_pg").val(pg);
                    $("#update_duration").val(duration);
                    $("#update_status").val(status);
                    $("#update_genre").val(genre); 
                    $("#update_img_src").val(img_src);
                    $("#update_trailer").val(trailer);

                },
                error: function(error) {
                    console.error("AJAX error:", status, error);
                    alert("OOOPSSSS something went wrong :<");
                }
            });
        });


        //SAVE UPDATE
        $("#updateMovieForm").on("submit", function(e) {
            e.preventDefault();

            var movieId = $("#update_movie_id").val();
            var movieName = $("#update_movie_name").val();
            var movieDes = $("#update_movie_des").val();
            var year = $("#update_year").val();
            var resolution = $("#update_resolution").val(); 
            var pg = $("#update_pg").val(); 
            var duration = $("#update_duration").val();
            var status = $("#update_status").val(); 
            var genre = $("#update_genre").val();
            var imgSrc = $("#update_img_src").val();
            var trailer = $("#update_trailer").val();


            $.ajax({
                url: "../ajax.php",
                method: "POST",
                data: {
                    "updateMovie": true,
                    "movie_id": movieId,
                    "datas": {
                        "movie_name": movieName,
                        "movie_des": movieDes,
                        "year": year,
                        "resolution": resolution,
                        "pg": pg,
                        "duration": duration,
                        "status": status,
                        "genre": genre,
                        "img_src": imgSrc,
                        "trailer": trailer
                    }
                },
                success: function(result) {
                    loadMovies();
                    
                    $("#updateMovieModal").modal("hide");
                },
                error: function(error) {
                    alert("OOOPSSSS something went wrong :<");
                }
            });
        });


        //DELETING A MOVIE
        $(document).on("click", ".delete-btn", function(e) {
            e.preventDefault();
            var movie_id = $(this).data("movie-id");

            if (confirm("Are you sure you want to delete this movie?")) {
                $.ajax({
                    url: "../ajax.php",
                    method: "POST",
                    data: {
                        "deleteMovie": true,
                        "movie_id": movie_id
                    },
                    success: function(result) {
                        loadMovies();
                    },
                    error: function(error) {
                        alert("OOOPSSSS something went wrong :<");
                    }
                });
            }
        });


        //SEARCH
        $("#search_name").on("input", function() {
            var searchName = $("#search_name").val();

            $.ajax({
                url: "../ajax.php",
                method: "POST",
                data: {
                    "searchMovie": true,
                    "hint": searchName
                },
                success: function(result) {
                    var tBody = ``;
                    var cnt = 1;
                    var datas = JSON.parse(result);
                    
                    datas.forEach(function (data) {
                        tBody += `<tr>
                            <th scope="row">`+(cnt++)+`</th>
                            <th class="text-nowrap ">`+data['movie_name']+`</th>
                            <td class="col-cut">`+data['movie_des']+`</td>
                            <td class="text-center">`+data['year']+`</td>
                            <td class="text-center">`+data['resolution']+`</td>
                            <td class="text-nowrap text-center">`+data['pg']+`</td>
                            <td class="text-center">`+data['duration']+`</td>
                            <td class="text-center">`+data['status']+`</td>
                            <td class="text-nowrap">`+data['genre']+`</td>
                            <td class="col-cut">`+data['img_src']+`</td>
                            <td class="col-cut">`+data['trailer']+`</td>
                            <td class="last text-nowrap">
                                <button class="btn btn-primary">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>`;
                    });

                    $('#tableBody').html(tBody);
                },
                error: function(error) {
                    console.error("AJAX error:", status, error);
                    alert("Oops! Something went wrong.");
                },
              });
        });

    </script>
</html>