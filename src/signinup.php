<?php
include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">

<style>

</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="login_modal.css">
    <link rel="stylesheet" href="signup_modal.css">
    <link rel="stylesheet" href="user_location_input.css">
    <title>Weather App</title>

    <link rel="icon" href="./assests/weather_title.png" type="image/png">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <style>
    html, body {
        background-image: linear-gradient(135deg, #FFF886 10%, #F072B6 100%);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        min-height: 100vh;
    }
    nav {
        background-color: transparent; /* or your custom background color */
    }
</style>

</head>

<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="assests/info.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                Weather Info
            </a>
        </div>
    </nav>
    <section>
        <h2>Welcome to Location based weather report</h2>
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3">Sign Up</p>

                    </div>
                    <form action="/adduser.php" class="mx-1 mx-md-4" method="post">

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <input type="text" id="form3Example1c" class="form-control" placeholder="Please enter your Username" name="username" name="username"/>
                                <label class="form-label" for="form3Example1c">Username</label>
 
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-lock fa-lg me-3 fa-fw"></i>
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <input type="Password" id="form3Example4c"  placeholder="Please enter your Password" class="form-control" name="password"/>
                                 <label class="form-label" for="form3Example4c">Password</label>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-key fa-lg me-3 fa-fw"></i>
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <input type="password" id="form3Example4cd" placeholder="Confirm Password" class="form-control" name="cpassword">
                                <label class="form-label" for="form3Example4cd">Confirm Password</label>
                            </div>
                        </div>


                        <div class="form-check d-flex justify-content-center mb-5">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                            <label class="form-check-label" for="form2Example3">
                                I agree all statements in <a href="#!">Terms of service</a>
                            </label>
                        </div>

                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </section>
    <div class="fixed-bottom">
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2024 - Vivek. All rights reserved.
            </div>
            <!-- Copyright -->

            <!-- Right -->
            <div>
                <a href="#!" class="text-white me-4">
                    <i class="fa fa-facebook-f"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fa fa-twitter"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fa fa-google"></i>
                </a>
                <a href="#!" class="text-white">
                    <i class="fa fa-linkedin-in"></i>
                </a>
            </div>
            <!-- Right -->
        </div>
    </div>
</body>

</html>