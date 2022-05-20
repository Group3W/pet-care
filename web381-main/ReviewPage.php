<?php

include 'connect.php';

$nameErr = $reviewErr = $starsErr = "";

if(isset($_GET['rid']))
    $AID=$_GET['rid'];



if(isset($_POST['submit'])){

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"]) || empty($_POST["review"]) || empty($_POST["rate"])){

            if (empty($_POST["name"]))
          $nameErr = "Name is required";
    
          if (empty($_POST["review"])) 
            $reviewErr = "This field is required";

          if (empty($_POST["rate"])) 
          $starsErr = "This field is required";
        }
    
            else{
    
    $reviewerName = $_POST['name'];
    $review = $_POST['review'];
    $rate = $_POST['rate']; 
    $RPID;

    $query="insert into `review`(reviewerName , experience , rate, RPID )
    values( '$reviewerName' , '$review' , '$rate' , '$RPID' )";
    $result = mysqli_query($con,$query);


    $q="update `appointment` set appointment_status='Reviewed' where AID=$AID"; 
    $r = mysqli_query($con,$q);

    if($r)
        header('location:PreviousAppoint.php');


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

    <title> Review Page </title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="leena.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">




</head>
<body>

    <div class="flex" style="margin-bottom: 30px; margin-top: 8px;">


        <div class="flex flex-row pl-5 items-center" style="margin-right: 10px; margin-top: 2px; margin-left: 20px;">

            <div class="mr-1 h-12 "><img src="owner.png" alt="Pet owner image" width="80" ></div>
                            <div class="flex flex-col pl-5">
                                <span class="font-semibold text-lg app-color-black" style="padding-top: 36px;">Owner</span>
                            </div>


            <div class="w-px bg-gray-100 h-12 ml-8 mt-7 style="padding-top: 2em;"></div>
        </div>



        <div class="flex flex-row pl-5 items-center mr-auto" style="margin-top: 33px;">

            <div class="h-9 w-9 app-bg-white flex justify-center items-center rounded-xl">
                <svg class="w-30 h-8 app-color-blue-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <div class="flex flex-col pl-10" style="margin-left:-14px; margin-top: -1px;">
                <span class="font-semibold text-md app-color-black">Today</span>
                <span class="font-semibold text-md app-color-blue-1" id="date"></span>

                <script> 
                var date = new Date();
                var year = date.getFullYear();
                var month = date.getMonth()+1;
                var day = String(date.getDate()).padStart(2,'0');
                var date = year + '-' + month + '-' + day;
                document.getElementById('date').innerHTML = date;
                </script>
                
            </div>

        </div>

        <div class=" h-14 mt-2 " style="margin-right:10em;"><img src="logo2.jpg" alt="veterinary clinic logo" width="95" ></div>
</div>

<div style=" margin-top: 1.9em; margin-left:61.2em; font-family:Georgia, 'Times New Roman', Times, serif; font-size: 19px; color: #0d4e66;"><p>Veterinary Clinic</div>

<hr style="margin-top: 1em;">

        <div class="flex-col bg-white px-12 pb-10">
            <div class="flex flex-row py-5">
            </div>

            <nav style="margin-bottom: 2em;">
                <div class="three-lines"></div>
                <div class="three-lines"></div>
                <div class="three-lines"></div>

                <ul>
                    <li><a href="viewPets.php">Home</a></li>
                    <li><a href="myProfile.php">My profile </a> </li>
                    <li><a href="UpComingAppoint.php">Appointments</a> </li>
                    <li><a href="viewPets.php">My pets</a></li>
                    <li><a href="#aboutus">About us</a> </li>
                    <li><a href="#aboutus">Contact us</a> </li>
                    <li><a href="mainPage.php">Log out</a> </li>


                </ul> </nav>

            <div class="flex flex-row" style="border-color: aqua; margin-left: 100px;">

                <div class="flex flex-col w-40 bg-white pl-5 py-3 mr-3 rounded-tl-2xl rounded-tr-2xl app-bg-blue-3" >
                    <span class="text-lg text-white font-semibold" style="text-indent: 5px; text-indent:10px ;">Add Review </span>
                </div>

            </div>
        
            <div class="flex flex-row bg-white p-10 relative" style="margin-left:100px; width:150%;">



            <div id="service-form">
            <div>
            <div class="md:grid md:grid-cols-3 md:gap-6" style="margin-left:-2.4em; margin-top:-1em; width=40%">
                <div class=" md:mt-0 md:col-span-2">
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-10 py-5 bg-white space-y-6 sm:p-6">
                                 <div class="mt-4">



                     <div>
                    <div style="font-weight: 350; font-size: large; margin-bottom: 5em; margin-left:5px; "> Please take a few minutes to give us your feedback about our service.
                        <div> <p style="margin-bottom: 3em; font-size: 15px;"> <span style="color: firebrick;">*</span> indicates required field</p> </div> </div>
                        

                    
                        <form action="#"  method="POST" enctype="multipart/form-data">

                   <div style="margin-left:30px; margin-bottom: 3.5em;"> <p><label> Name: <span style="font-size: 15px; color: firebrick;">*<?php echo $nameErr; ?> </span> </label> </p> 
                    <input type="text" placeholder="Name" name="name"
                    class="w-75 px-3 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" style="margin-left: -2px; font-size:16px;"> </div>

                     <div style="margin-bottom: 40px; margin-left:30px; ">
                        <p><label> How was your experience? <span style="font-size: 15px; color: firebrick; top:3em;">*<?php echo $reviewErr; ?> </span> </label></p>
                            <textarea name="review" rows="4" cols="40" style="overflow: scroll; margin-bottom: 15px; font-size:16px; margin-left: -3px;" class=" px-2 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"></textarea> 
                        
                     </div>

                     <div style="margin-left: 13em; margin-bottom: 3px; "> Rate our service <span style="font-size: 15px; color: firebrick; top:3em;">*<?php echo $starsErr; ?> </span> </div> 

            
                <div class="rate" style="margin-left: 11.8em; ">
                    <input type="radio" id="star5" name="rate" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 star</label>
                </div>

                    <div style="margin-top: 6em; margin-left: 13.5em; width: 18%; "> 
                        <button style ="background-color: #10779b; text-align: center;" class="w-full px-2 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900" name = "submit">
                            Submit</button> 
                    </div>
                </form>

                </div>
            </div>
                </div>
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
                <a href="https://www.google.com.sa/maps/dir/24.722851,46.6415726/%D8%A7%D8%B1%D9%86%D8%A8+%D9%86%D8%B7+%D9%84%D9%84%D8%AD%D9%8A%D9%88%D8%A7%D9%86%D8%A7%D8%AA+%D8%A7%D9%84%D8%A7%D9%84%D9%8A%D9%81%D8%A9+-+%D9%81%D8%B1%D8%B9+%D8%A7%D9%84%D9%86%D8%AF%D9%89%D8%8C+3447+%D8%B7%D8%B1%D9%8A%D9%82+%D8%A7%D9%84%D8%AB%D9%85%D8%A7%D9%85%D8%A9+%D8%A7%D9%84%D9%81%D8%B1%D8%B9%D9%8A%D8%8C+%D8%A7%D9%84%D9%86%D8%AF%D9%89%D8%8C+%D8%A7%D9%84%D8%B1%D9%8A%D8%A7%D8%B6+13317%E2%80%AD%E2%80%AD/@24.7606936,46.7047228,13z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x3e2efdf3be8f5a53:0xf785185cadce2878!2m2!1d46.683574!2d24.8156892">      <p><span>Riyadh </span> KSA(Saudi Arabia)</p>      </a>
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
                Veterinary clinic is the result of years of knowledge and applied experience in veterinary medicine. At Advanced Pet Clinic,
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