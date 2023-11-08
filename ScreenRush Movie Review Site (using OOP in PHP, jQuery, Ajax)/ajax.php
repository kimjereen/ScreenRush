<?php
    require "./database/dbconfig.php";
    $db = new DB();
    $user = new USER();
    $admin = new ADMIN();

    /*FOR USERS*/
    if(isset($_POST['userLogin'])) {
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        $user->login($user_email, $user_password);
    }

    if(isset($_POST['userRegister'])) {
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        $user->register($username, $fullname, $user_email, $user_password);
    }

    /*FOR ADMIN*/
    if(isset($_POST['adminLogin'])) {
        $admin_email = $_POST['admin_email'];
        $admin_password = $_POST['admin_password'];

        $admin->adLogin($admin_email, $admin_password);
    }


    /*FOR DATA*/
    if(isset($_POST['getMovies'])) {
        $db->select('movies');
        
        echo json_encode($db->res);
    }

    if(isset($_POST['getMovieDetails'])) {
        $movie_id = $_POST["movie_id"];
        $db->select('movies', "*", "movie_id = $movie_id");
        
        echo json_encode($db->res);
    }


    if(isset($_POST['getPopularMovies'])) {
        $sortBy = $_POST['sortBy'];
        $db->filterRatings('movies', '*', $sortBy);
        echo json_encode($db->res);
    }

    /* old version
    if(isset($_POST['getNewUpcomingMovies'])) {
        $db->select('movies', '*', 'status IN ("new", "upcoming")');
        echo json_encode($db->res);
    }*/

    if (isset($_POST['getNewUpcomingMovies'])) {
        $filter = isset($_POST['filter']) ? $_POST['filter'] : '';
    
        if ($filter) {
            $db->select('movies', '*', "status = '$filter'");
        } else {
            $db->select('movies', '*', 'status IN ("new", "upcoming")');
        }
    
        echo json_encode($db->res);
    }

    if(isset($_POST['getMovieByGenre'])) {
        $hint = $_POST['hint'];
        $db->select('movies', '*', "genre LIKE '%$hint%'");
        echo json_encode($db->res);
        exit;
    }
    

    if(isset($_POST['getReviews'])) {
        $movie_id = $_POST["movie_id"];
        $db->select('user_review', "*", "movie_id = $movie_id");
        
        echo json_encode($db->res);
    }

    if(isset($_POST['getAllReviews'])) {
        $db->select('user_review');
        
        echo json_encode($db->res);
    }

    if(isset($_POST['getMyReviews'])) {
        $user_id = $_POST["user_id"];
        $db->select('user_review', "*", "user_id = $user_id");
        
        echo json_encode($db->res);
    }


    //CRUD
    if(isset($_POST['addMovie'])) {
        $postData = $_POST['datas'];
        $data = array (
            'movie_name' => $postData['movie_name'],
            'movie_des' => $postData['movie_des'],
            'year' => $postData['year'],
            'resolution' => $postData['resolution'],
            'pg' => $postData['pg'],
            'duration' => $postData['duration'],
            'ratings' => 0.0,
            'num_of_stars' => 0,
            'num_of_reviews' => 0,
            'status' => $postData['status'],
            'genre' => $postData['genre'],
            'img_src' => $postData['img_src'],
            'trailer' => $postData['trailer'],
        );

        $db->insert('movies', $data);
        echo json_encode($db->res);
    }

    if(isset($_POST['updateMovie'])) {
        $movie_id = $_POST['movie_id'];
        $postData = $_POST['datas'];
        $data = array(
            'movie_name' => $postData['movie_name'],
            'movie_des' => $postData['movie_des'],
            'year' => $postData['year'],
            'resolution' => $postData['resolution'],
            'pg' => $postData['pg'],
            'duration' => $postData['duration'],
            'status' => $postData['status'],
            'genre' => $postData['genre'],
            'img_src' => $postData['img_src'],
            'trailer' => $postData['trailer'],
        );
    
        $db->update('movies', $data, "movie_id = '$movie_id'");
        echo json_encode($db->res);
    }

    if(isset($_POST['updateMovieData'])) {
        $movie_id = $_POST['movie_id'];
        $ratings = $_POST['ratings'];
        $num_of_stars = $_POST['num_of_stars'];
        $num_of_reviews = $_POST['num_of_reviews'];
    
        $data = array(
            'ratings' => $ratings,
            'num_of_stars' => $num_of_stars,
            'num_of_reviews' => $num_of_reviews,
        );
    
        $db->update('movies', $data, "movie_id = '$movie_id'");
        echo json_encode($db->res);
    }
    
    if(isset($_POST['deleteMovie'])) {
        $movie_id = $_POST['movie_id'];
        $db->delete('movies', "movie_id = $movie_id");
        echo json_encode($db->res);
    }

    if(isset($_POST['searchMovie'])) {
        $hint = $_POST['hint'];
        $db->select('movies', '*', "movie_name LIKE '%$hint%'");
        echo json_encode($db->res);
        exit;
    }


    /*FOR REVIEWING*/
    if(isset($_POST['makeReview'])) {
        $movie_id = $_POST['movie_id'];
        $movie_name = $_POST['movie_name'];
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $stars = $_POST['stars'];
        $date = $_POST['date'];
        $comment = $_POST['comment'];

        $user->review($movie_id, $movie_name, $user_id, $username, $stars, $date, $comment);
    }



?>