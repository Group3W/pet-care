<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $breed=$_POST['breed'];
    $gender=$_POST['gender'];
    $status=$_POST['status'];
    $dob=$_POST['dob'];
    $medical_history=$_POST['medical'];
    
    $filename=$_FILES['image'] ['name'];
    $filetempname=$_FILES['image'] ['tmp_name'];
    $folder='pett_image/';
    move_uploaded_file($filetempname,$folder.$filename);


    $sql="insert into `pett`(name,pic)
    values('$name','$filename')";
    $resu=mysqli_query($con,$sql);
if($resu)
{
    echo "ayyy";
}


    else
    {
        die(mysqli_error($con));
    }
}
if(isset($_POST['submit'])){
    $sql="insert into `petprofile`(breed,gender,status,dob,medical_history)
    values( '$breed' , '$gender' ,'$status', '$dob' ,'$medical_history')";

 
$query=mysqli_query($con,$sql);
if($query)
{
    echo "ayyy";
}


    
    else
    {
        die(mysqli_error($con));
    }
}
   
?>






<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>veterinary clinic </title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="lina.css">

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

            <div class="flex flex-row" style="margin-left:5em;">

            <div class="flex flex-col  bg-white pl-5 py-3 mr-3 rounded-tl-2xl rounded-tr-2xl app-bg-blue-3" >
                    <span class="text-lg text-white font-semibold" style="text-indent: 8px;  width:6em ;">Add Pet </span>
                </div>

                </div>




            </div>

           
              
                </div>
            </div>
        </div>
    
            </div>
        </div>
    </div>
    <div id="service-form">
        <div>
            <div class="md:grid md:grid-cols-3 md:gap-6" style="margin-left:8em; margin-top:-1em;">
                
                <div class=" md:mt-0 md:col-span-2">
                    <form action="#"  method="POST" enctype="multipart/form-data">
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
    
    
    
                                <div class="mt-4">
                                    <div>
                                        <label class="block" for="Name">Pet Name<label>
                                                <input type="text" placeholder="Pet Name"
                                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" name="name">
                                    </div>
                <br>
                                    <div>
                                        <label class="block" for="Name">Breed<label>
                                                <input type="text" placeholder="Breed" 
                                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" name="breed">
                                    </div>
                                    
    <br>
    
    
                                    <div class="col-span-6 sm:col-span-3">
                                        <label class="block text-sm font-medium text-gray-700">Gender</label>
                                        <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="gender">
                                            <option>Female</option>
                                            <option>Male</option>
            
                                        </select>
                                    </div>
                                    <br>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label class="block text-sm font-medium text-gray-700">Status</label>
                                        <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="status">
                                            <option>spayed</option>
                                            <option>neutered </option>
            
                                        </select>
                                    </div>
    
    
    
    
    
                                    <div class="mt-4">
                                        <label class="block" for="Date">Date Of Birth<label>
                                                <input type="date" placeholder="Date"
                                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" name="dob">
                                    </div>
                                    <br>
                                    <div>
                                        <label class="block" for="Name">Vaccinations List and Medical History (optional) <label>
                                                <input type="text" placeholder=" Medical History"
                                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" name="medical">
                                    </div>
                
                <div>
                                    <label class="block text-sm font-medium text-gray-700"> Photo </label>
                                    <div class="mt-1 flex items-center">
                <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                  <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                  </svg>
                </span>
                <input type="file" name="image" id="image" style="margin-left:20px;" />  

                                    
                                </div>
    
    
    
                            </div>
                                    <div class="flex" >
                                        <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900" name="submit" > 
                                  Add pet </button>
                                    </div>
                                    
                                    
    
    
    
                                   
                                </div>
    
    
    
    
                              
    
    
    
    
    
    
    
    
    
    
                               
                                
    
    
    
    
                                
    
    
    
    
              
    
    
    
                          
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
                                
                            </div>
                        </div>
                    </form>
                    <script>  
 $(document).ready(function(){  
      $('#submit').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  
    
            
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

