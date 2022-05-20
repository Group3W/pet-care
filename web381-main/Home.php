<?php

session_start();

$errors = array('firstName' => '', 'lastName' => '', 'gender' => '', 'email' => '', 'phone' => '', 'password' => '', 'confirmedPassword' => '', 'photo' => '');
$firstName = $lastName = $gender = $email = $phone = $password = $confirmedPassword = $photo = '';
//if user clicks on submit
if (isset($_POST['submit'])) {



    //1-check empty fields
    if (empty($_POST['firstName'])) {
        $errors['firstName'] = '* this field is empty';
    } else {
        //don't contain digits
        if (1 === preg_match('~[0-9]~', $_POST['firstName'])) {
            $errors['firstName'] = '* first name must contain only letters';
        } else {
            $firstName = $_POST['firstName'];
        }
    }

    if (empty($_POST['lastName'])) {
        $errors['lastName'] = '* this field is empty';
    } else {
        //dont contain digits
        if (1 === preg_match('~[0-9]~', $_POST['lastName'])) {
            $errors['lastName'] = '* last name must contain only letters ( no numbers )';
        } else {
            $lastName = $_POST['lastName'];
        }
    }

    if (empty($_POST['email'])) {
        $errors['email'] = '* this field is empty';
    } else {
        //valid email format
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = '* enter valid email address';
        } else {
            $email = $_POST['email'];
        }
    }

    if (empty($_POST['phone'])) {
        $errors['phone'] = '* this field is empty';
    } else {
        //valid format
        if (!is_numeric($_POST['phone'])) {
            $errors['phone'] = '* phone numbers must be only digits';
        } else {
            if (strlen($_POST['phone']) != 10) {
                $errors['phone'] = '* phone numbers must be 10 digits long';
            } else {
                $phone = $_POST['phone'];
            }
        }
    }

    if (empty($_POST['password'])) {
        $errors['password'] = '* this field is empty';
    } else {
        //fulfill the condition 
        //1- contain capital letters
        //2- contain small letters
        //3- contain digits.
        if (!preg_match('@[0-9]@', $_POST['password']) || !preg_match('@[A-Z]@', $_POST['password']) || !preg_match('@[a-z]@', $_POST['password'])) {
            $errors['password'] = "password must contain digits,small and capital letters";
        } else {
            // the condition is fulfilled
            $password = $_POST['password'];
        }
    }

    if ($_POST['confirmedPassword'] != $_POST['password']) {
        $errors['confirmedPassword'] = '* the password do not match';
    } else {
        $password = $_POST['confirmedPassword'];
    }


    if (empty(filter_input(INPUT_POST, 'gender'))) {
        $errors['gender'] = '* you must select your gender';
    } else {
        $gender = filter_input(INPUT_POST, 'gender');
    }

    $photo = $_FILES["uploadfile"]["name"];

    //if there is no errors 
    if (!array_filter($errors)) {
        if (!($con = mysqli_connect("localhost", "root", "")))
            // die("<p>Could not connect to database</p>");
            echo "Could not connect to database";

        if (!mysqli_select_db($con, 'petcare'))
            // die("<p>Could not open URL database</p>");
            echo "Could not open URL database ";

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        //check if user's email exists:
        $emailQuery = " SELECT email FROM petOwner WHERE email = '" . $email . "' ";
        $phoneQuery = " SELECT phone FROM petOwner WHERE phone = '" . $phone . "' ";
        $emailResult = mysqli_query($con, $emailQuery);
        $phoneResult = mysqli_query($con, $phoneQuery);
        if (!$emailQuery || !$phoneQuery) {
            echo ("Error description: " . mysqli_error($con));
        } else {
            if (mysqli_num_rows($emailResult) == 1)
                echo '<script>window.alert("The pet owner with the entered email already exists, try different email.")</script>';
            elseif (mysqli_num_rows($phoneResult) == 1)
                echo '<script>window.alert("The pet owner with the entered phone already exist, try different phone.")</script>';
            else {
                $reg = "INSERT INTO petOwner (Fname,Lname,Pnumber,email,gender,password,photo) VALUES('" . $firstName . "','" . $lastName . "','" . $phone . "','" . $email . "','" . $gender . "','" . $password . "','" . $photo . "');";
                if (!mysqli_query($con, $reg)) {
                    echo "error :" . mysqli_error($con);
                } else {
                    $_SESSION['email'] = $email;
                    header("Location:../web381-main/UpComingAppoint.php");
                }
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

    <title>Register</title>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="lina.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link href="headStyle.css" rel="stylesheet" type="text/css">



    <style>
        img {
            border-radius: 25%;
        }

        /* Clear floats after image containers */


        .column {
            flex: 33.33%;
            padding: 5px;
        }
    </style>



</head>

<body>

    <header class="site-header">
        <div class="site-identity">
            <a href="mainPage.html"><img src="log.jpg" alt="logo" /></a>
            <h1><a href="Home.html">Veterinary Clinic</a></h1>
        </div>
        <nav class="site-navigation">
            <ul class="nav">
                <li><a href="#aboutus">About us</a></li>

                <li><a href="#aboutus">Contact us</a></li>
            </ul>
        </nav>
    </header>



    <div id="service-form">
        <div>
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900" class="service-form" style="color: #10779b; font-size: xx-large; margin-left: 65px; margin-top: 50px">Join us
                        </h3>
                        <p class="mt-1 text-sm text-gray-600"></p>
                        <br>
                        <div class="row">
                            <div class="column">
                                <img src="cute.jpg" alt="dog" style="width:80%">
                            </div>
                            <div class="column">
                                <img src="doc.jpg" alt="doctor" style="width:80%">
                            </div>
                            <div class="column">
                                <img src="caat.jpg" .jpg alt="cat" style="width:80%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="/web381-main/Home.php" method="POST" enctype="multipart/form-data">
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">



                                <div class="mt-4">
                                    <div>
                                        <label class="block" for="Name">First Name<label>
                                                <input type="text" placeholder="First Name" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" name="firstName" value="<?php echo $firstName ?>">
                                                <span class="text-xs text-red-400"><?php echo $errors['firstName'] ?></span>

                                    </div>
                                    <br>
                                    <div>
                                        <label class="block" for="Name">Last Name<label>
                                                <input type="text" placeholder="Last Name" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" name="lastName" value="<?php echo $lastName ?>">
                                                <span class="text-xs text-red-400"><?php echo $errors['lastName'] ?></span>

                                    </div>



                                    <br>


                                    <div >
                                        <label class="block" >Gender</label>
                                        <span class="text-xs text-red-400"><?php echo $errors['gender'] ?></span>
                                        <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="gender">
                                            <option selected disabled value="default">select your gender</option>
                                            <option value="female">Female</option>
                                            <option value="male">Male</option>
                                        </select>
                                    </div>





                                    <div class="mt-4">
                                        <label class="block" for="email">Email<label>
                                                <input type="text" placeholder="Email" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" name="email" value="<?php echo $email ?>">
                                                <span class="text-xs text-red-400"><?php echo $errors['email'] ?></span>

                                    </div>



                                    <div class="mt-4">
                                        <label class="block" for="email">Phone number<label>
                                                <input type="text" placeholder="Phone number" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" name="phone" value="<?php echo $phone ?>">
                                                <span class="text-xs text-red-400"><?php echo $errors['phone'] ?></span>

                                    </div>





                                    <div class="mt-4">
                                        <label class="block">Password<label>
                                                <input type="password" placeholder="Password" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" name="password" value="<?php echo $password ?>">
                                                <span class="text-xs text-red-400"><?php echo $errors['password'] ?></span>

                                    </div>
                                    <div class="mt-4">
                                        <label class="block">Confirm Password<label>
                                                <input type="password" placeholder="Password" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" name="confirmedPassword" value="<?php echo $confirmedPassword ?>">
                                                <span class="text-xs text-red-400"><?php echo $errors['confirmedPassword'] ?></span>
                                    </div>

                                    <div>
                                        <label class="block"> Photo </label>
                                        <div class="mt-1 flex items-center">
                                        <input type="file" name="uploadfile" value=""/>
                                        </div>
                                    </div>


                                    <div class="flex">
                                        <button style="background-color: #10779b ;" class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900" type="submit" name="submit">
                                            Create Account </button>
                                    </div>

                                    <div class="mt-6 text-grey-dark">
                                        Already have an account?
                                        <a class="text-blue-600 hover:underline" href="login.php">
                                            Log in
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button class="btn btn-background-slide">Save</button>
                            </div> -->
                        </div>
                    </form>
                </div>
            </div>
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
                <p><a href="mailto:petClinic@gmail.com">petClinic@gmail.com</a></p>
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