﻿<?php

include 'connect.php';

$dateErr = $timeErr ="";

if(isset($_POST['book'])){

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["date"]) || empty($_POST["time"])){

            if (empty($_POST["date"]))
          $dateErr = "Date is required";
    
          if (empty($_POST["time"])) 
            $timeErr = "Time is required";
        }
    
            else{
    
    $date=$_POST['date'];
    $time=$_POST['time'];
    $pet=$_POST['pet'];
    $service=$_POST['service'];
    $note=$_POST['note'];
    $status = "Pending";

    $q = "select `vpid` from `pet` where name='$pet' ";
    $r=mysqli_query($con,$q);

     $id = mysqli_fetch_assoc($r);
     $PID = $id['vpid'];

    $query="insert into `appointment`(PID , date , time , service , note , appointment_status)
    values( '$PID' , '$date' , '$time' , '$service' ,'$note' ,'$status' )";
 
    $res=mysqli_query($con,$query);

    if($res)    
    header('location:UpComingAppoint.php');
    

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

    <title> veterinary clinic </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="leena.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">



</head>
<body>


    <div class="flex" style="margin-bottom: 30px; margin-top: 8px;">


            <div class="flex flex-row pl-5 items-center" style="margin-right: 10px; margin-top: 2px; margin-left: 20px;">

                <div class="mr-1 h-12 "><img src="owner.png" alt="Pet owner image" width="80" >
                </div>

                                <div class="flex flex-col pl-5">
                                    <span class="font-semibold text-lg app-color-black" style="padding-top: 36px;">Owner</span>
                                </div>


                <div class="w-px bg-gray-100 h-12 ml-8 mt-7 style="padding-top: 2em;">
                </div>

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

            <div class=" h-14 mt-2 " style="margin-right:10em;"><img src="logo2.jpg" alt="veterinary clinic logo" width="95" >
            </div>
    </div>

    <div style=" margin-top: 1.9em; margin-left:61.2em; font-family:Georgia, 'Times New Roman', Times, serif; font-size: 19px; color: #0d4e66;"><p>Veterinary Clinic
        
    </div>

        <hr style="margin-top: 1em;">

        <div class="flex-col bg-white px-12 pb-10">

            <div class="flex flex-row py-5">
            </div>



            <nav style="margin-bottom: 36px; margin-left: 8px;">
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
            <br>

            <div class="flex flex-row" >

                <div class="flex flex-col w-40 bg-white pl-5 py-3 mr-3 rounded-tl-2xl rounded-tr-2xl app-bg-blue-3">
                    <span class="text-md text-white font-semibold"><a href="UpComingAppoint.php"> Upcoming Appointments </a></span>

                </div>



                <div class="flex flex-col w-40 bg-white pl-5 py-3 mr-3 rounded-tl-2xl rounded-tr-2xl app-bg-blue-3">
                    <span class= "text-md text-white font-semibold"><a href="PreviousAppoint.php"> Previous Appointments </a></</span>
                </div>

                <div class="flex flex-col w-40 bg-white pl-5 py-3 mr-3 rounded-tl-2xl rounded-tr-2xl bg-white active">
                    <span class="text-md app-color-blue-1 font-semibold"><a href="BookAppoint.php"> Book </a>  </span>
                    <span class="text-md app-color-blue-1 font-semibold"><a href="BookAppoint.php"> Appointment</a> </span>
                </div>

         </div>

            <div class="flex flex-row bg-white p-10 relative">

                <div style="margin-left:5em;">

                <div id="service-form">
            <div>
            <div class="md:grid md:grid-cols-3 md:gap-6" style="margin-left:-7.5em; margin-top:-1em; width=40%">
                <div class=" md:mt-0 md:col-span-2">
                        <div class="shadow sm:rounded-md sm:overflow-hidden" style="width:150%;">
                            <div class="px-10 py-5 bg-white space-y-6 sm:p-6">
                                 <div class="mt-4">

                <form action="#"  method="POST" enctype="multipart/form-data">

                <?php
                          $query2="select count(*) as c from `pet`,`petowner` where vpid = id ";
                          $count=mysqli_query($con,$query2);
                          $fetch = mysqli_fetch_assoc($count);
                          $petNum = $fetch['c'];

                          if($petNum > 0){
                     echo '
                     
                    <div style="font-weight: 450; font-size: large; margin-bottom: 0.7em; margin-top: -0.5em; background-color: rgb(227, 235, 252); width: 100%;"> </div>
                    <p style="margin-bottom: 3em;  margin-top: -1em; font-size: 15px;"> <span style="color: firebrick;">*</span> indicates required field</p>

                    <div class="item">
                        <p> <label class="block" for="Date"> Date: <span style="font-size: 14px; color: firebrick;" >*'; ?> <?php echo $dateErr; ?> <?php echo'</span> </label> </p> 
                        <input style="margin-bottom: 2em; margin-left: -2px; font-size:16px; width:10em;" type="date" name="date" class="px-2 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        <i class="fas fa-calendar-alt"></i>
                      </div>

                      <div class="item">
                        <p>Time: <span style="font-size: 14px; color: firebrick;">*'; ?> <?php echo $timeErr; ?> <?php echo' </span></p>
                        <input style=" margin-left: -2px; font-size:16px; width:10em;" type="time" name="time" class="px-2 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        <i class="fas fa-clock"></i>
                      </div>

                      <div style="margin-bottom: 2.5em; margin-top: 3em;"><p><label>
                          Pet:
                          <select style="margin-left: 9px; width:30%;" name="pet"> ';

                          $query2="select `name` from `pet`,`petowner` where vpid = id ";
                          $result=mysqli_query($con,$query2);

                          while($row=mysqli_fetch_assoc($result)){
                                $name=$row['name'];
    
                         echo' <option> '.$name.'</option>';
                        }

                        echo ' </select>
                      </label></p> </div>

                      <div style="margin-bottom: 3em; "><p><label>
                        Service:
                        <select style="margin-left: 9px; width:30%;" name="service">';

                    $que = "select name from `services`";
                    $re = mysqli_query($con,$que);
                    while($ro = mysqli_fetch_assoc($re)){
                        $Sname = $ro['name']; 

                   echo ' <option>'.$Sname.'</option>';
                    }
                             
                   echo '
                        </select>
                    </label></p> </div>

                     <div>
                        <p style="margin-left: 3px;"> <label> Notes </label></p>
                        <textarea name="note" rows="4" cols="35" style="overflow: scroll; margin-bottom: 15px; font-size:16px; margin-left: -3px;" class=" px-2 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"></textarea> 
                    </div>

                     <div style="margin-top: 3em; margin-left: 14em; width:17%; "> 
                        <button  style ="background-color: #10779b; text-align: center;" class="w-full px-2 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900" name="book" >
                            Submit</button> 
                     </div>

                </form>';

                    }
                else
                echo ' <div style="font-weight: 450; font-size: large; margin-bottom: 3em; margin-top: 2em; width: 100%;">You Have No Pets <br> To Book An Appointment Please Add a Pet</div> ';
                          
    ?>


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