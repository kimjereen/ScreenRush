<?php include('./header.php'); ?>
<?php
    session_start();
    include('./database/dbconfig.php');
    $user = new USER();

    if(isset($_SESSION['user_id'])) {
        echo "<script> alert('Login Successful'); </script>";
        header("Location: ./profile.php");
    } else {
        //echo "<script> alert('GUEST!'); </script>";
        echo "Error in logging in";
    }

/*
    session_start();
    require './database/dbconfig.php';

    if(isset($_SESSION['user_id'])) {
        $user = $_SESSION['login'];

        //echo $user;
    } else {
        $user = $_SESSION['login'];

        //echo $user;
    }

    echo $user;*/

?>

session_start();
    require './database/dbconfig.php';

    $username = "";
    $fullname = "";
    $user_email ="";
    if(isset($_SESSION['login'])) {
        $user = $_SESSION['login'];
    } else {
        $_SESSION['login'] = "GUEST";
    }

    echo $user;


<?php
/*
    require './conn.php';
    $user = "";
    if(isset($_SESSION['user_id'])) {
        $user = $_SESSION['login'];
    } else {
        $_SESSION = [];
        session_unset();
        session_destroy();
        $user = "No User Logged in";
    }

    echo $user;*/
?>



/*
    $movie_id = $_GET['id'];
    echo '<script>var loggedUSER = ' . json_encode($loggedUser) . ';</script>';
    echo '<script>var movieId = ' . json_encode($movie_id) . ';</script>';
    echo '<script>var userId = ' . json_encode($user_id) . ';</script>';
    echo '<script>var userName = ' . json_encode($username) . ';</script>';


    $sql = "SELECT * FROM movies WHERE movie_id = $movie_id";
    $result = $db->mysql->query($sql);
    $row = $result->fetch_assoc();

    if($row) {
        $num_ratings = $row['ratings'];
        $num_of_stars = $row['num_of_stars'];
        $num_of_reviews = $row['num_of_reviews'];
    } else {
        echo "Cant get movie details";
    }

    //echo $num_ratings ." ". $num_of_stars . " ".  $num_of_reviews;
    echo '<script>var numRatings = ' . json_encode($num_ratings) . ';</script>';
    echo '<script>var numOfStars = ' . json_encode($num_of_stars) . ';</script>';
    echo '<script>var numOfReviews = ' . json_encode($num_of_reviews) . ';</script>';
    */