<?php
require 'connect.php';


$con = new mysqli(
    'localhost',
    'root',
    '',
    'petcare');

if ($con->connect_error)
    die("Error connecting to database" . $con->connect_error);
else echo "connected successfully";


if($_SERVER['REQUEST_METHOD']=='POST') {


    if (!empty($_FILES["image"]["name"])) {
        // Get file info
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            // Insert image content into database
            $name=$_POST['name'];
            $description=$_POST['description'];
            $price=$_POST['price'];

            $filename=$_FILES['image'] ['name'];
            $filetempname=$_FILES['image'] ['tmp_name'];
            $folder='service_image/';
            //move_uploaded_file($filetempname,$folder.$filename);


            $sql="insert into services (name,description, price, image)".
                "values('$name','$description','$price', '$filename')";
            $insert=mysqli_query($con,$sql);

            if ($insert) {
                $status = 'success';
                $statusMsg = "File uploaded successfully.";
            } else {
                $statusMsg = "File upload failed, please try again.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        }
    } else {
        $statusMsg = 'Please select an image file to upload.';
    }



// Display status message
    echo $statusMsg;



    if ($insert) {
        echo "ayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyyayyy";
    } else {
        echo "errorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerrorerror";
        die(mysqli_error($con));
    }
}
// Insert image content into database

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add a service </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-wnea99uKIC3TJF7v4eKk4Y+lMz2Mklv18+r4na2Gn1abDRPPOeef95xTzdwGD9e6zXJBteMIhZ1+68QC5byJZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="leena.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">-->
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
</script>            </div>

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



        </head>


    <div id="service-form">
        <div>
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900" class="service-form" style="color: #10779b; font-size: xx-large; margin-left: 65px; margin-top: 50px">Add a service</h3>
                        <p class="mt-1 text-sm text-gray-600"></p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label class="block text-sm font-medium text-gray-700">Service name</label>
                                    <input name="name" type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700"> Description </label>
                                    <div class="mt-1">
                                        <textarea id="description" name="description" rows="3" placeholder="Brief description for the new service" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                                    </div>
                                    <p> </p>
                                </div>
                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700">Price</label>
                                    <input name="price" type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700"> Upload image </label>
                                    <div class="mt-1 flex items-center">
                                            <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                            </span>
                                        <input type="file" name="image" id="image" style="margin-left:20px;" />

                                        <!--<label for="document">Upload image</label>
                                        <input type="image" name="image" id="image">

                                    <button type="button" name="image" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Upload</button>-->
                                    </div>
                                </div>

                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button class="btn btn-background-slide" type="submit">Save</button>
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