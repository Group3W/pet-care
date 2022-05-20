
<?php
include 'connect.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>veterinary clinic </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="lina.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<style>


.P-pic{
            width: 150px;
            border-radius: 50%;
            padding: 2px;
            margin-bottom: 20px;
            align-items: center;
           
        }
</style>


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
                <span class="font-semibold text-md app-color-blue-1">21 Feb 2022</span>
            </div>

        </div>

        <div class=" h-14 mt-2 " style="margin-right:10em;"><img src="logo2.jpg" alt="veterinary clinic logo" width="95" ></div>
</div>

<div style=" margin-top: 1.9em; margin-left:61.2em; font-family:Georgia, 'Times New Roman', Times, serif; font-size: 19px; color: #0d4e66;"><p>Veterinary Clinic</div>

<hr style="margin-top: 1em;">
        
        <div class="flex flex-col bg-white px-12 pb-10">
            <div class="flex flex-row py-5">
            </div>

            <nav>
                <div class="three-lines"></div>
                <div class="three-lines"></div>
                <div class="three-lines"></div>

                <ul>
                    <li><a href="viewPets.html">Home</a></li>
                    <li><a href="myProfile.html">My profile </a> </li>
                    <li><a href="UpComingAppoint.html">Appointments</a> </li>
                    <li><a href="viewPets.php">My pets</a></li>
                    <li><a href="#aboutus">About us</a> </li>
                    <li><a href="#aboutus">Contact us</a> </li>
                    <li><a href="mainPage.html">Log out</a> </li>


                </ul> </nav>
            <br>


            <?php

if (!( $database = mysqli_connect( "localhost", "root", "" )))
die( "<p>Could not connect to database</p>" );
 
if (!mysqli_select_db( $database, "petcare" ))
die( "<p>Could not open URL database</p>" );     
    $id=1;

$query="select * from pet WHERE ownerid=".$id;  


$run=mysqli_query($database, $query);  
 $i=0;
if($run){
    while($row=mysqli_fetch_row($run)){
       $i++;     
    
       $mandv=($row[5]==null)?"none":$row[5];
                        echo "        
                        <div class='flex flex-row bg-white  relative' style='width:80%;'>
                            <div class='flex flex-row bg-white  relative'style='width:90%;'>
            
                                <table class='w-full style=width=150%; '>
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                            
                                           
                
                                            
                                        </tr>
                                        <tr class='app-border-1' id=$row[0]>
                                            <td class='w-10 h-10'>
                                                <svg class=' w-10 h-20 app-color-blue-3 'fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' style='width:80%'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 8h16M4 16h16'></path></svg>
                                            </td>
                
                                            <td>
                                                <div class='flex justify-center items-center rounded-md mr-4 h-5  app-bg-yellow-2 app-color-yellow-1 text-lg font-semibol'>$i</div>
                                            </td>
                                            <td>
                                                <div class='flex flex-row items-center py-3'>
                                                <img src='pett_image/$row[3]' alt='cutest cat' class='P-pic'
                                                    > 

                                                </div>
                                                    <div class='flex flex-col'>
                                                        <span class='font-semibold text-sm app-color-black'style='font-size:20px';>name: ".$row[1]."</span>
                                                        <br>
                                                        <span class='font-semibold text-sm app-color-black'style='font-size:20px';>date of birth: ".$row[2]."</span>
                                                        <br>
                                                        <span class='font-semibold text-sm app-color-black'style='font-size:20px';>breed: ".$row[4]."</span>
                                                        <br>
                                                        <span class='font-semibold text-sm app-color-black'style='font-size:20px';>Medical history AND VaccinationList: ".$mandv."</span>
                                                        <br>
                                                        <span class='font-semibold text-sm app-color-black'style='font-size:20px';>gender: ".$row[6]."</span>
                                                        <br>
                                                        <span class='font-semibold text-sm app-color-black'style='font-size:20px';>status: ".$row[7]."</span>
    <br>

                                                        <button type='button' onclick='deleteAjax($row[0])' class='text-md app-color-blue-1 font-semibold'> Delete pet </button>
                                                        <span class='text-md app-color-blue-1 font-semibold'><a href='editPets.html'> Edit Profile </a></span>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                        
                                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                
                        </div>
                    </div>
                </div>
                        ";
                    }}
                
                        ?>
                        
                        <div class="ml-12 mr-4 w-90 h-10  rounded-md flex  app-color-blue-1 text-lg font-semibold" style="font-size:25px";><a href="addPet.php"> Add new pet</a></div>
                                        </td>
                                  
                                                </div>
           

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

    <script type="text/javascript">
     
     function deleteAjax(id){
         
       if(confirm('are you sure?')){
           var a = id.getAttribute("id");
             
           $.ajax({
           
 
              type:'post',
              url:'deletePet.php',
              data:{a:a},
              success:function(data){
                  $(id).hide();
              }
 
         });
           
       }
         
     }
 
</script>
</body>
</html>
