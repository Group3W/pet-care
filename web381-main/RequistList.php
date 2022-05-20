<?php
include 'connect.php';?>








<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Appointment App </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="leena.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">


</head>
</head>
<body>

    <div class="flex" style="margin-bottom: 30px; margin-top: 8px;">


        <div class="flex flex-row pl-5 items-center" style="margin-right: 10px; margin-top: 2px; margin-left: 20px;">

          
            <div class="mr-1 h-12 "><img src="https://cdn-icons-png.flaticon.com/512/2206/2206368.png" alt="Admin Icon Vector Art, Icons, and Graphics for Free Download"  width="80" ></div>
                            <div class="flex flex-col pl-5">
                            <span class="font-semibold text-lg app-color-black" style="padding-top: 36px;">Manager</span>
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
        <button class="app-color-red-1 font-semibold text-md app-button-shadow w-20 py-2 rounded-3xl mr-5" style="color: darkred; margin-right:25px;">
            <a href="mainPage.html">Log out </a>
        </button>
        <div class=" h-14 mt-2 " style="margin-right:10em;"><img src="logo2.jpg" alt="veterinary clinic logo" width="95" ></div>
</div>

<div style=" margin-top: 1.9em; margin-left:61.2em; font-family:Georgia, 'Times New Roman', Times, serif; font-size: 19px; color: #0d4e66;"><p>Veterinary Clinic</div>

        <!--logout btn-->
      

        <!-- <button class="app-color-blue-1 font-semibold text-md app-button-shadow w-40 py-2 rounded-3xl mr-5" style="color: #10779b"> <a href=" HTMLPage2.html">Appointments </a></button>-->

    </div>
    <div class="flex flex-col bg-white px-12 pb-10">
        <div class="flex flex-row py-5">

            <button class="app-color-blue-1 font-semibold text-md app-button-shadow w-40 py-3 rounded-3xl mr-5" style="color: #10779b"> <a href="clinicManager.html">Home </a></button>
            <button class="app-color-blue-1 font-semibold text-md app-button-shadow w-40 py-3 rounded-3xl mr-5" style="color: #10779b"> <a href="AddService.php">Add a service </a></button>
            <button class="app-color-blue-1 font-semibold text-md app-button-shadow w-40 py-3 rounded-3xl mr-5 active" style="color: #10779b"> <a href=" RequistList.php">Appointments </a></button>
            <button class="app-color-blue-1 font-semibold text-md app-button-shadow w-40 py-3 rounded-3xl mr-5" style="color: #10779b"> <a href=" review2.html">reviews </a></button>
        </div>

        <div class="flex flex-row">


            <div class="flex flex-col w-40 bg-white pl-5 py-3 mr-3 rounded-tl-2xl rounded-tr-2xl app-bg-blue-4 active" style="background-color: #10779b;">
                <span class="text-3xl app-color-blue-1 font-bold" style="color: #ffff"></span>
                <span class="text-md app-color-blue-1 font-semibold" style="color: #ffff"><a href="RequistList.php"> Requests List </a></span>
            </div>

            <div class="flex flex-col w-40 bg-white pl-5 py-3 mr-3 rounded-tl-2xl rounded-tr-2xl app-bg-blue-1" style="background-color: #10779b;">
                <span class="text-md text-white font-semibold"><a href="UpcomingAppointments.php"> Upcoming appointments </a></span>
            </div>

            <div class="flex flex-col w-40 bg-white pl-5 py-3 mr-3 rounded-tl-2xl rounded-tr-2xl app-bg-white" style="background-color: #10779b;">
                <span class="text-md text-white font-semibold"><a href="availableAppointment.html"> Available appointments</a> </span>
            </div>

            <div class="flex flex-col w-40 bg-white pl-5 py-3 mr-3 rounded-tl-2xl rounded-tr-2xl app-bg-blue-3" style="background-color: #10779b;">
                <span class="text-md text-white font-semibold"><a href="PreviousAppointments.php"> Previous appointments</a> </span>
            </div>

            <!--<div class="flex flex-col w-40 bg-white pl-5 py-3 mr-3 rounded-tl-2xl rounded-tr-2xl app-bg-white" style="background-color: #10779b;">
                <span class="text-md text-white font-semibold"><a href="setAppointment.html"> Set available appointments</a> </span>
            </div>-->
        </head>

        </div>
        <div class="flex flex-row bg-white p-10 relative">

            <table class="w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th class="text-left text-xs app-color-black pb-5">PET</th>
                        <th class="text-left text-xs app-color-black pb-5">SERVICE</th>
                        <th class="text-left text-xs app-color-black pb-5">DATE</th>
                        <th class="text-left text-xs app-color-black pb-5">TIME</th>
                        <th class="text-left text-xs app-color-black pb-5">REQUEST DETAILS</th>
                        <th class="text-left text-xs app-color-black pb-5">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                <?php
               
                $query2="select count(*) as c from`appointment`,`pet`where PID=vpid AND appointment_status='Pending' ";
                $count=mysqli_query($con,$query2);
                $fetch = mysqli_fetch_assoc($count);
                $reqnum = $fetch['c'];
                if($reqnum>0)
                {

              


         
            $sql="select * from`appointment`,`pet`where PID=vpid AND appointment_status='Pending'";
            $result=mysqli_query($con,$sql);
            if($result)
            {
             
                $i=0;
                while(
                    $row=mysqli_fetch_assoc($result)){
                        $i++;
                        $ID=$row['AID'];
                        $pid=$row['vpid'];
                        $pic=$row['photo'];
                        $name=$row['name'];
                        $gender=$row['gender'];
                        $dob=$row['dob'];
                        $service=$row['service'];
                        $date=$row['date'];
                        $time=$row['time'];
                        $note=$row['note'];

                        
                        echo '         
                       

                        <tr class="app-border-1">
                        <td>
                            <svg class="w-6 h-6 app-color-blue-3 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path></svg>
                        </td>
                        <td>
                        <div class="flex justify-center items-center rounded-md mr-4 h-5  app-bg-yellow-2 app-color-yellow-1 text-lg font-semibold">'.$i.'</div>
                        </td>
                        <td>
                            <div class="flex flex-row py-3">
                            <img src="data:image/jpeg;base64,'.base64_encode($row['photo'] ).'" height="200" width="200" class="img-thumnail" />                    
                            <div class="flex flex-col">
                                    <span class="font-semibold text-sm app-color-black">'.$name.'</span>
                                    <span class="font-semibold text-xs app-color-gray-1">'.$gender.',  '.$dob.'
                                    </span>
                                    <span class="text-md app-color-blue-1 font-semibold"><a href="VPP1.php?profileid='.$pid.'"> View Profile </a></span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="font-semibold text-5m app-color-gray-1">'.$service.'</span>
                        </td>
                        <td>
                            <span class="font-semibold text-sm app-color-gray-1">'.$date.'</span>
                        </td>
                        <td>
                            <div class="app-bg-red-2 h-8 w-20 font-semibold text-sm flex justify-center items-center app-color-red-1 rounded-md">
                            '.$time.'                            </div>
                        </td>
                        <td>
                            <span class="font-semibold text-5m app-color-gray-1"> <details open><summary> Details </summary><p> '.$note.'</p></details></span>
                        </td>

                        <td>

                            <button class="btn btn-background-slide"><a href="accept.php?acceptid='.$ID.'">Accept</button>
                            <button class="btn1 btn-background-slide"><a href="decline.php?declineid='.$ID.'">Decline</a></button>
                        </td>
                    </tr>
                  
                    
        
  
                        ';
                    }
                }
            }
            else{
                echo '  <tr class="app-border-1"> 
                
                <span class="font-semibold text-5m app-color-gray-1">There is no appointment requested yet</span>
      </tr>
         

                ';
            }
                        ?>

</tbody>
            </table>
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
