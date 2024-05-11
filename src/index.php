<?php
include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">

<style>

</style>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="user_location_input.css">

    <link rel="icon" href="./assests/weather_title.png" type="image/png">

    <title>Weather App</title>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <style>
        html,
        body {
            background-image: linear-gradient(135deg, #FFF886 10%, #F072B6 100%);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            min-height: 100vh
        }

        nav {
            background-color: transparent;
            /* or your custom background color */
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
            <?php session_start();
            if ($_SESSION['favcolor']) { ?>
                <form class="d-flex" role="search">

                    <button class="btn btn-outline-success" type="submit"> <a href="logout.php">Logout</a></button>

                </form>
            <?php } ?>
        </div>
    </nav>
    <section>
        <h2>Welcome to Location based weather report</h2>
        <?php session_start();
        if ($_SESSION['favcolor']) { ?>

            <!-- index.html -->

            <div class="parent">
                <div class="UserLocationInput">
                    <div class="header">
                        <div class="resName">Save Location Information</div>
                    </div>
                    <div class="SubDescription">
                        <div class="des">Gets info from weather report</div>
                    </div>
                    <hr />

                    <div class="safety-container">

                        <form class="forminputlocation" action="save_location.php" method="POST">
                            <div class="form-group">
                                <label for="location">Location:</label>
                                <input type="text" class="form-control" id="location" name="location"
                                    aria-describedby="locationHelp" placeholder="Enter location">
                                <small id="locationHelp" class="form-text text-muted">Enter the location with correct
                                    co-ordinates .</small>
                            </div>
                            <div class="form-group">
                                <label for="xAxis">X Co-Ordinate:</label>
                                <input type="text" id="xAxis" name="xAxis" required><br>
                            </div>
                            <div class="form-group">
                                <label for="yAxis">Y Co-Ordinate:</label>
                                <input type="text" id="yAxis" name="yAxis" required><br>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>

                <div class="Block2">
                    <h2>Saved Location</h2>
                    <table class="table table-primary table-hover">

                        <?php
                        session_start();
                        $table = 'USER_LOCATION_DATA';
                        $user_pk = $_SESSION['favcolor'];
                        $columns = ['Location', 'XAxis', 'YAxis', 'Details'];
                        $db_columns = ['locationname', 'x', 'y', 'info'];
                        $sql = "SELECT * FROM $table WHERE id='$user_pk'";
                        $stmt = $db_handle->prepare($sql);
                        try {
                            $stmt->execute();
                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }
                        $fetchData = $stmt->fetchAll(); ?>
                        <thead>
                            <tr>
                                <?php foreach ($columns as $col): ?>
                                    <th><?= ucfirst($col) ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($fetchData as $row): ?>
                                <tr>
                                    <?php foreach ($db_columns as $col): ?>
                                        <?php if ($col === 'info') { ?>
                                            <td><button class="btn btn-primary btn-sm"
                                                    onclick="myFunction(<?= $row['x'] ?>, <?= $row['y'] ?> )">Info</button></td>
                                        <?php } else { ?>
                                            <td><?= $row[$col] ?></td>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="Block3" id='locationinfo' style="display:none">
                    <section class="vh-80" style="background-color: #C1CFEA;">
                        <div class="container py-5 h-100">

                            <div class="row d-flex justify-content-center align-items-center h-100" style="color: #282828;">
                                <div class="col-md-14 col-lg-12 col-xl-10">

                                    <div class="card mb-4 gradient-custom" style="border-radius: 25px;">
                                        <div class="card-body p-4">

                                            <div id="demo1" data-mdb-carousel-init class="carousel slide"
                                                data-ride="carousel">

                                                <!-- Carousel inner -->
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <div class="d-flex justify-content-between mb-4 pb-2">
                                                            <div>
                                                                <h2 class="display-2 mb-4" id="GEM_temp">
                                                                    <strong>53°F</strong>
                                                                </h2>
                                                                <p class="text-muted mb-2" id="GEM_city">Phoenix, Arizona
                                                                </p>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="./assests/wind.png" alt="Winf Icon"
                                                                        style="width: 24px; height: 24px; margin-right: 10px;">
                                                                    <p class="text-muted mb-0" id="GEM_winds">7 mph W</p>
                                                                </div>

                                                            </div>
                                                            <div>
                                                                <img src="./assests/forecast.svg" width="150px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="card mb-4" style="border-radius: 25px;">
                                        <div class="card-body p-4">

                                            <div id="demo2" data-mdb-carousel-init class="carousel slide"
                                                data-ride="carousel">

                                                <div id="todayWeatherCarousel" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner" id="todayWeatherCarouselInner">
                                                        <!-- Carousel items will be dynamically added here -->
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="card" style="border-radius: 25px;">
                                        <div class="card-body p-4">

                                            <div id="demo3" data-mdb-carousel-init class="carousel slide"
                                                data-ride="carousel">


                                                <!-- Carousel inner -->
                                                <div id="weatherCarousel" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner" id="weatherCarouselInner">
                                                        <!-- Carousel items will be dynamically added here -->
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                    </section>
                </div>

                <div class="alert alert-danger" role="alert" id="errorInfo" style="display:none;">

                </div>
            </div>

        <?php } else { ?>

            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                            class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form action="/login_user.php" method="post">
                            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                <p class="lead fw-normal mb-0 me-3">Sign in for Weather Info</p>

                            </div>

                            <div class="divider d-flex align-items-center my-4">
                                <p class="text-center fw-bold mx-3 mb-0"></p>
                            </div>

                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="form3Example3" class="form-control form-control-lg"
                                    placeholder="Enter a valid username" name="username" />
                                <label class="form-label" for="form3Example3">username</label>
                            </div>

                            <!-- Password input -->
                            <div data-mdb-input-init class="form-outline mb-3">
                                <input type="password" id="form3Example4" class="form-control form-control-lg"
                                    name="password" placeholder="Enter password" />
                                <label class="form-label" for="form3Example4">Password</label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                    <label class="form-check-label" for="form2Example3">
                                        Remember me
                                    </label>
                                </div>
                                <a href="#!" class="text-body">Forgot password?</a>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-primary btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a
                                        href="signinup.php">Register</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        <?php } ?>

    </section>
    <div class="fixed-bottom">
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2024 - Vivek. All rights reserved.
            </div>
            <!-- Copyright -->

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

        </div>
    </div>

    <script>
        // custom function
        function myFunction(xAxis, yAxis) {

            //const apiUrl = `https://api.weather.gov/points/39.7456,-97.0892`;
            const apiUrl = "https://api.weather.gov/points/" + xAxis + "," + yAxis;
            console.log(apiUrl);

            const outputElement = document.getElementById('weather-info');

            fetch(apiUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const city = data.properties.relativeLocation.properties.city;
                    const state = data.properties.relativeLocation.properties.state;
                    const forecastUrl = data.properties.forecast;
                    const forecasthourlyUrl = data.properties.forecastHourly;
                    const periodsToFetch = 7;

                    fetch(forecastUrl)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(forecastData => {

                            // Get the carousel element
                            const carousel = document.querySelector('#demo3');
                            const carouselInner = carousel.querySelector('.carousel-inner');

                            carouselInner.innerHTML = '';
                            const periods = forecastData.properties.periods.filter((period, index) => {
                                const periodNumber = index + 1;
                                return periodNumber % 2 !== 0 && periodNumber <= 14;
                            });
                            // Loop through the periods and create carousel items
                            periods.forEach((period, index) => {
                                const name = period.name;
                                const temperature = period.temperature;
                                const precipitationProbability = period.probabilityOfPrecipitation.value;

                                // Create a new carousel item div
                                const carouselItem = document.createElement('div');
                                carouselItem.classList.add('carousel-item');

                                // Add the 'active' class to the first carousel item
                                if (index === 0) {
                                    carouselItem.classList.add('active');
                                }

                                // Create the HTML content for the carousel item
                                const itemHTML = `
                                <div class="d-flex justify-content-around text-center mb-4 pb-3 pt-2">
                                ${periods.map((period, periodIndex) => `
                                    <div class="flex-column">
                                        <p class="small" style="font-size: 18px;"><strong>${period.temperature}°F</strong></p>
                                        <p class="mb-0" style="font-size: 15px;"><strong>${period.name.slice(0, 3)}</strong></p>
                                        <div class="d-flex align-items-center" style="margin-top: 20px;">
                                            <img src="./assests/humidity.png" alt="Weather Icon" style="width: 24px; height: 24px; margin-right: 0px;">
                                            <span><strong>${period.probabilityOfPrecipitation.value ?? 0}%</strong></span>
                                        </div>
                                    </div>

                                `).join('')}
                                </div>
                            `;

                                carouselItem.innerHTML = itemHTML;

                                // Append the carousel item to the carousel inner element
                                carouselInner.appendChild(carouselItem);
                            });

                            // Initialize the carousel
                            const carouselInstance = new bootstrap.Carousel(carousel, {
                                interval: false // Prevent automatic sliding
                            });


                            // Display modal
                            document.getElementById('locationinfo').style.display = 'block';
                            document.getElementById('GEM_city').innerText = city + ', ' + state;
                            const temperatureElement = document.getElementById('GEM_temp');
                            temperatureElement.innerHTML = `<strong>${forecastData.properties.periods[0].temperature}&deg;F</strong>`;
                            document.getElementById('GEM_winds').innerText = forecastData.properties.periods[0].windSpeed + " " + forecastData.properties.periods[0].windDirection;

                            // Clear error message
                            document.getElementById('errorInfo').innerText = "";
                            document.getElementById('errorInfo').style.display = 'none';

                        })
                        .catch(error => {
                            handleFetchError();
                        });

                    fetch(forecasthourlyUrl)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(forecastData => {

                            const carousel = document.querySelector('#demo2');
                            const carouselInner = carousel.querySelector('.carousel-inner');

                            carouselInner.innerHTML = '';

                            const periods = forecastData.properties.periods.filter((period, index) => {
                                const periodNumber = index + 1;
                                return periodNumber % 2 !== 0 && periodNumber <= 14;
                            });
                            periods.forEach((period, index) => {
                                const name = period.name;
                                const temperature = period.temperature;
                                const precipitationProbability = period.probabilityOfPrecipitation.value;

                                const carouselItem = document.createElement('div');
                                carouselItem.classList.add('carousel-item');

                                if (index === 0) {
                                    carouselItem.classList.add('active');
                                }

                                const itemHTML = `
                                <div class="d-flex justify-content-around text-center mb-4 pb-3 pt-2">
                                ${periods.map((period, periodIndex) => `
                                    <div class="flex-column">
                                        <p class="small" style="font-size: 18px;"><strong>${period.temperature}°F</strong></p>
                                        <p class="mb-0" style="font-size: 15px;"><strong>${new Date(period.startTime).toLocaleString('en-US', { hour: 'numeric', hour12: true })}</strong></p>
                                        <div class="d-flex align-items-center" style="margin-top: 20px;">
                                            <img src="./assests/humidity.png" alt="Weather Icon" style="width: 24px; height: 24px; margin-right: 0px;">
                                            <span><strong>${period.probabilityOfPrecipitation.value ?? 0}%</strong></span>
                                        </div>
                                    </div>

                                `).join('')}
                                </div>
                            `;

                                carouselItem.innerHTML = itemHTML;
                                carouselInner.appendChild(carouselItem);
                            });

                            const carouselInstance = new bootstrap.Carousel(carousel, {
                                interval: false
                            });

                        })
                        .catch(error => {
                            handleFetchError();
                        });

                })

                .catch(error => {
                    handleFetchError();
                });

            function handleFetchError() {
                const errorInfo = document.getElementById('errorInfo');
                errorInfo.innerText = "Invalid Co-ordinates";
                errorInfo.style.display = 'block';
                setTimeout(function () {
                    errorInfo.style.display = 'none';
                }, 3000);
            }

        }
    </script>

</body>

</html>