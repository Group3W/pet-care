<?php

session_start();
$errors = array('email' => '', 'password' => '');
$email = $password = '';

if (isset($_POST['submit'])) {

    //1- check for empty fields.
    if (empty($_POST['email'])) {
        $errors['email'] = "* this field is empty";
    } else {
        $email = $_POST['email'];
    }

    if (empty($_POST['password'])) {
        $errors['password'] = "* this field is empty";
    } else {
        $password = $_POST['password'];
    }

    //2- check for errors
    if (!array_filter($errors)) {

        if (!($con = mysqli_connect("localhost", "root", "")))
            echo "Could not connect to database";

        if (!mysqli_select_db($con, 'petcare'))
            echo "Could not open URL database ";

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        $emailQuery = " SELECT email FROM petOwner WHERE email = '" . $email . "' AND password = '" . $password . "' ";
        $emailResult = mysqli_query($con, $emailQuery);
        if (!$emailResult) {
            echo ("Error description: " . mysqli_error($con));
        } else {
            if (mysqli_num_rows($emailResult) == 1) {
                $_SESSION['email'] = $email;
                header("Location:../web381-main/UpComingAppoint.php");
            } else {
                echo '<script>window.alert("The student with the entered credintials doesn\'t exists, check again!")</script>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="lina.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link href="headStyle.css" rel="stylesheet" type="text/css">
</head>

<body>
    <header class="site-header">
        <div class="site-identity">
        <a href="mainPage.html"><img src="log.jpg" alt="logo" /></a>
        <h1><a href="mainPage.html">Veterinary Clinic</a></h1>
        </div>
        <nav class="site-navigation">
            <ul class="nav">
                <li><a href="#aboutus">About us</a></li>

                <li><a href="#aboutus">Contact us</a></li>
            </ul>
        </nav>
    </header>
    <br>
    <div id="service-form">
        <div>
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900" class="service-form" style="color: #10779b; font-size: xx-large; margin-left: 65px; margin-top: 50px">Log in to
                            your account</h3>
                        <p class="mt-1 text-sm text-gray-600"></p>
                    </div>
                </div>
                <form action="/web381-main/login.php" method="POST">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <br>
                            <div class="mt-4">
                                <label class="block" for="email">Email<label>
                                        <input type="text" placeholder="Email" name="email" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                            <div class="mt-4">
                                <label class="block">Password<label>
                                        <input type="password" placeholder="Password" name="password" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                            <div class="mt-6 text-grey-dark">
                                <a class="text-blue-600 hover:underline" href="Forgot pass.php">
                                    Forget password?
                                </a>
                            </div>
                            <div class="flex">
                                <button style="background-color: #10779b" class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900" type="submit" name="submit">Login</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
    <div class="main">footer</div>
    <footer class="footer-distributed">
        <div class="footer-left">
            <h3>Veterinary<span> Clinic</span></h3>
            <p class="footer-company-name"> Clinic Animal&copy; 2022</p>
        </div>
        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <a href="https://www.google.com.sa/maps/dir/24.722851,46.6415726/%D8%A7%D8%B1%D9%86%D8%A8+%D9%86%D8%B7+%D9%84%D9%84%D8%AD%D9%8A%D9%88%D8%A7%D9%86%D8%A7%D8%AA+%D8%A7%D9%84%D8%A7%D9%84%D9%8A%D9%81%D8%A9+-+%D9%81%D8%B1%D8%B9+%D8%A7%D9%84%D9%86%D8%AF%D9%89%D8%8C+3447+%D8%B7%D8%B1%D9%8A%D9%82+%D8%A7%D9%84%D8%AB%D9%85%D8%A7%D9%85%D8%A9+%D8%A7%D9%84%D9%81%D8%B1%D8%B9%D9%8A%D8%8C+%D8%A7%D9%84%D9%86%D8%AF%D9%89%D8%8C+%D8%A7%D9%84%D8%B1%D9%8A%D8%A7%D8%B6+13317%E2%80%AD%E2%80%AD/@24.7606936,46.7047228,13z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x3e2efdf3be8f5a53:0xf785185cadce2878!2m2!1d46.683574!2d24.8156892">
                    <p><span>Riyadh </span> KSA(Saudi Arabia)</p>
                </a>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <p>+966 555 000000</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p>petClinic@gmail.com
                    </a></p>
            </div>
        </div>
        <div class="footer-right">
            <p id="aboutus" class="footer-company-about">
                <span>About us</span>
                Pet Care clinic is the result of years of knowledge and applied experience in veterinary medicine. At
                Advanced Pet Clinic,
                we are committed to sustaining a professional caring practice that provides superior animal health care
                for your furry companions.
                Through our medical expertise and facilities, we guarantee an unmatched level of service to our clients
                in the Kingdom of Saudi Arabia
            </p>
            <div class="footer-icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </div>
        </div>
    </footer>
</body>

</html>