
<?php
session_start();
 
/*if(!isset($_SESSION['id'])) {     the primary key
  header("location: login.php");
  exit();
}*/
?>

<!DOCTYPE html>

<html>

<head>

<title>My Profile</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="leena.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

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


            <div class="w-px bg-gray-100 h-12 ml-8 mt-" style="padding-top: 2em;"></div>
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



    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">
            <h3 class="text-2xl font-bold text-center">My Profile</h3>
              
            <div class="mt-4">
                    <div>

                <div id="service-form">
                    <div>
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                   
            <br>
                   </div>
                            </div>
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form action="#"  method="POST">
                                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            
            
            <?php    
       if (!( $database = mysqli_connect( "localhost", "root", "" )))
       die( "<p>Could not connect to database</p>" );
        
       if (!mysqli_select_db( $database, "petcare" ))
       die( "<p>Could not open URL database</p>" );     
           $id='1';
//jjjhjhgjyf
$query="select * from petowner WHERE id=".$id;  
 
$run=mysqli_query($database, $query);  
 
if($run){
    while($row=mysqli_fetch_row($run)){
            
            echo "<div class='mt-4' id=$row[6]>
            <div>
        <h4><strong>First name</strong></h4>
            <p> $row[0]</p>    
        
            </div>
<br>
            <div>
            <h4><strong>Last Name</strong></h4>
            <p> $row[1]</p>    
            </div>

<br>

            <div class='col-span-6 sm:col-span-3'>
            <h4><strong>Gender</strong></h4>
            <p> $row[4]</p>    
               
                </select>
            </div>

            <div class='mt-4'>
            <h4><strong>Email</strong></h4>
            <p> $row[3]</p>    
               
            </div>


            <div class='mt-4'>
            <h4><strong>Phone Number</strong></h4>
            <p> $row[2]</p>    
            </div>





           

        <div>
        <h4><strong>Photo</strong></h4>
            <div class='mt-1 flex items-center'>
                <img src ='$row[7]' class='P-pic'>

            </div>
        </div>
            
 
            //profile_img/
           
                                            
            
            
            
                                        </div>
               
                                        </div>
                                    </div>
            
            
                        
                                        </div>
                        
                                    </div>
                        
                                </footer>
            
            
                            </div>
                        </div>
                        
                                
                                
                    </div>
                    
                    <div class='flex items-baseline justify-between'>
                        <button class='px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900'>  <a   href='file:///Users/reema/Desktop/LinaWEB/reset%20password.html'>Edit</a>       </button>   
                        <button type='button' class='px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900'  onclick='deleteAjax($row[6])'>  Delete      </button>    </div> ";
                    }
            
                }
                        ?>
                  
                </div>
           
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
           var w = id.getAttribute("id");
             
           $.ajax({
           
 
              type:'post',
              url:'delete_owner.php',
              data:{w:w},
              success:function(data){
                  $("#".id).hide();
              }
 
         });
           
       }
         
     }
 
</script> 
                                          
            

</body>
</html>