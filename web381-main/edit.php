<?php
include 'connect.php';

if(isset($_GET['editid']))
$AID = $_GET['editid'];

if(isset($_POST['done'])){
    // if status = accept change to Pending

    $date=$_POST['date'];
    $time=$_POST['time'];
    $service=$_POST['service'];
    $note=$_POST['note'];

    if($status == "Pending"){
    $query = "update `appointment`set service = $service, date = $date, time = $time, note = $note  where AID=$AID"; 
    $sql = mysqli_query($con,$query);
    }

    else{
        $query = "update `appointment`set service = $service, date = $date, time = $time, note = $note, appointment_status = 'Pending'  where AID=$AID"; 
        $sql = mysqli_query($con,$query);
    }
    
    if ($sql) 
    header('location:UpComingAppoint.php');

    else
     die(mysqli_error($con));
}

if(isset($_POST['cancel']))
    header('location:UpComingAppoint.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>veterinary clinic </title>

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
        
        <div class="flex flex-col bg-white px-12 pb-10">
            <div class="flex flex-row py-5">
            </div>

            <nav style="margin-bottom: 30px; margin-left: 8px;">
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

            <div class="flex flex-row">

                <div class="flex flex-col w-40 bg-white pl-5 py-3 mr-3 rounded-tl-2xl rounded-tr-2xl app-bg-white active">
                    <span class="text-md app-color-blue-1 font-semibold"><a href="UpComingAppoint.php"> Upcoming Appointments </a></span>

                </div>



                <div class="flex flex-col w-40 bg-white pl-5 py-3 mr-3 rounded-tl-2xl rounded-tr-2xl app-bg-blue-1">
                    <span class="text-md text-white font-semibold"><a href="PreviousAppoint.php"> Previous Appointments </a></</span>
                </div>

                <div class="flex flex-col w-40 bg-white pl-5 py-3 mr-3 rounded-tl-2xl rounded-tr-2xl app-bg-blue-3">
                    <span class="text-md text-white font-semibold"><a href="BookAppoint.php"> Book </a> </span>
                    <span class="text-md text-white font-semibold"><a href="BookAppoint.php"> Appointment</a> </span>
                </div>

            </div>

            <div class="flex flex-row bg-white p-10 relative">

            <?php

            $query2="select * from `appointment`,`pet` where PID=vpid AND AID=$AID ";
                    $result=mysqli_query($con,$query2);
                    $row = mysqli_fetch_assoc($result);

                            $na = $row['name'];
                            $se = $row['service'];
                            $da = $row['date'];
                            $ti = $row['time'];
                            $no = $row['note'];
                            $status = $row['appointment_status'];
            
                    echo'
                 <table class="w-full">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="text-left text-xs app-color-black pb-5"> <div style="margin-right: 4.5em;"> PET </div> </th>
                            <th class="text-left text-xs app-color-black pb-5"> <div style="margin-right: 2em;"> SERVICE </div> </th>
                            <th class="text-left text-xs app-color-black pb-5"> <div style="margin-left:2em"> DATE </div> </th>
                            <th class="text-left text-xs app-color-black pb-5">TIME</th>
                            <th class="text-left text-xs app-color-black pb-5"> <div style="margin-left: 2em;"> STATUS </div> </th>
                            <th class="text-left text-xs app-color-black pb-5"> <div style="margin-right: 4em;"> NOTE </div> </th>
                            <th class="text-left text-xs app-color-black pb-5">ACTION</th> 
                        </tr>
                    </thead>

                     <tbody> 

                        <tr class="app-border-1">
                            
                        <td>
                        <div class="mr-3 ml-6 w-20 h-28" style="margin-top: 1.6em;"><img src=https://images.unsplash.com/photo-1592754862816-1a21a4ea2281?ixlib width="55px"
                            height="4=50px" alt="ace dog picture" ></div>
                    </td>

                    <td> <span class="font-semibold text-5m app-color-black-1"> <div>'.$na.'</div> </td>


                    <form action="#"  method="POST" enctype="multipart/form-data">

                    <td> <span class="font-semibold text-5m app-color-gray-1"> <div>
                     <select name="service">';


                    $que = "select name from `services`";
                    $res = mysqli_query($con,$que);
                    while($row = mysqli_fetch_assoc($res)){
                        $Sname = $row['name']; 

                     if ($status == $Sname)
                   echo' <option selected>'.$Sname.'</option>';

                   else
                   echo ' <option>'.$Sname.'</option>';
                    }

                     echo'</select>
                    </div> </td>

                    <td> <span class="font-semibold text-5m app-color-gray-1"> 
                    <input type="date" name="date" value="'.$da.'" > 
                    <i class="fas fa-calendar-alt"></i> </span>
                     </td>

                    <td> <span class="font-semibold text-5m app-color-gray-1"> <input type="time" name="time" value="'.$ti.'" > 
                    <i class="fas fa-clock"></i> </span>
                     </td> ';

                     if ($status == 'Accepted'){
                        echo'<td> <div class="app-bg-red-2 h-8 w-20 font-semibold text-sm flex justify-center items-center app-color-red-1 rounded-md" style="margin-right: 1.7em;"> Accepted</div>
                         </td>

                         <td> <span class="font-semibold text-5m app-color-gray-1"> <p> <input type="text" name="note" value="'.$no.'"
                            class="w-75 px-3 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"> </span>
                              </td>
                      
                              <td>
                              <button class="btn btn-background-slide" name ="done"> Done </button>
                              <button class="btn1 btn-background-slide" name="cancel"> Cancel </button>
                               </form>

                            </td>
                      </tr> '; }


                else if ($status == 'Pending'){
                    echo ' <td> <div class="app-bg-orange-2 h-8 w-20 font-semibold text-sm flex justify-center items-center app-color-orange-1 rounded-md" > Pending </div> 
                    </td>

                         <td> <span class="font-semibold text-5m app-color-gray-1"> <p> <input type="text" name="note" value="'.$no.'"
                            class="w-75 px-3 py-1 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"> </span>
                              </td>
                  
                       <td>
                        <button class="btn btn-background-slide" name ="done"> Done </button>
                        <button class="btn1 btn-background-slide" name="cancel"> Cancel </button>
                        </form>

                        </td>
                      </tr> ';}


                 echo ' </tbody> </table> ';  

        ?>


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