<?php

session_start();
$errors = array('email' => '', 'password' => '');
$email = $password = '';

if (isset($_POST['submit'])) {

    //1- check for empty fields.
    if (empty($_POST['email'])) {
        $errors['email'] = "* this field is empty";
    } else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = '* enter valid email address';
        } else {
            $email = $_POST['email'];
        }
    }

    if (empty($_POST['password'])) {
        $errors['password'] = "* this field is empty";
    } else {
        if (!preg_match('@[0-9]@', $_POST['password']) || !preg_match('@[A-Z]@', $_POST['password']) || !preg_match('@[a-z]@', $_POST['password'])) {
            $errors['password'] = "password must contain digits,small and capital letters";
        } else {
            // the condition is fulfilled
            $password = $_POST['password'];
        }
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
        $emailQuery = " SELECT email FROM petOwner WHERE email = '" . $email . "'";
        $emailResult = mysqli_query($con, $emailQuery);
        if (!$emailResult) {
            echo ("Error description: " . mysqli_error($con));
        } else {
            if (mysqli_num_rows($emailResult) == 1) {
                $updateQuery = " UPDATE petOwner SET password='".$password."' WHERE email='".$email."' ";
                $updateResult = mysqli_query($con, $updateQuery);
                if ($updateResult){
                    $_SESSION['email'] = $email;
                    header("Location:../web381-main/login.php");
                } else {
                    echo ("Error description: " . mysqli_error($con));
                }
            } else {
                echo '<script>window.alert("The pet owner with the entered credintials doesn\'t exists, check again!")</script>';
            }
        }
    }else{
        echo '<script>window.alert("feilds can\'t be empty!")</script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Forgot password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="lina.css">
</head>
<body>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">
            <h3 class="text-2xl font-bold text-center">Reset your password</h3>
            <form action="Forgot pass.php" method="POST">
                <div class="mt-4">
                    <div>
                        <input name="email" type="text" placeholder="email" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>
                    <div>
                        <input name="password" type="text" placeholder="new passowrd" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>
                    <div class="flex items-baseline justify-between">
                        <button class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900" type="submit" name="submit">send password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
                <p>
                    petClinic@gmail.com
                    </a>
                </p>
            </div>
        </div>
        <div class="footer-right">
            <p id="aboutus" class="footer-company-about">
                <span>About us</span>
                Pet Care clinic is the result of years of knowledge and applied experience in veterinary medicine. At Advanced Pet Clinic,
                we are committed to sustaining a professional caring practice that provides superior animal health care for your furry companions.
                Through our medical expertise and facilities, we guarantee an unmatched level of service to our clients in the Kingdom of Saudi Arabia
            </p>
            <div class="footer-icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>