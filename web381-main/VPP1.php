

<?php
include 'connect.php';
?>

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
    <link rel="stylesheet" href="lina.css">
    
</head>

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">

        
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900" class="service-form" style="color: #020607; font-size: xx-large;  margin-top: 50px">Pet Information</h3>
            <p class="mt-1 text-sm text-gray-600"></p>
            <?php
            if(isset($_GET['profileid']))
            {
                $id=$_GET['profileid'];
            
               
            }
            else {
                echo 'failed';
            }
            $sql="SELECT * FROM `pet` where vpid=$id ";
            $result=mysqli_query($con,$sql);
            if($result)
            {
             
                
                    $row=mysqli_fetch_assoc($result);

                        $name=$row['name'];
                        $gender=$row['gender'];
                        $status=$row['status'];
                        $breed=$row['breed'];
                        $dob=$row['dob'];
                        $medical=$row['medical_historyANDVaccinationList'];
                       
                    

                        echo '  <div class="#profile1"
                        <div class="row">
                   

                        </div>
                    <table >
                
                <tbody>
                    <tr>
                    <img src="data:image/jpeg;base64,'.base64_encode($row['photo'] ).'" height="200" width="200" class="img-thumnail" />                    
                    </tr>
                    <tr>
                    <td>
                    <h3 class="text-lg font-awesome leading-6 text-gray-900" class="service-form" style="color: #020607; font-size:medium;  ">Pet Name</h3>
                    </td> </div></td>
                    <td><div class="w-full px-6 py-3 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">'.$name.'
                    </tr>
                    <tr >
                        <td>
                        <h3 class="text-lg font-awesome leading-6 text-gray-900" class="service-form" style="color: #020607; font-size:medium;  ">Gender</h3>
                        </td>
            
                            <td><div class="w-full px-6 py-3 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">'.$gender.'
                           
                        </div></td>
                    </tr>
                    <tr >
                        <td>
                        <h3 class="text-lg font-awesome leading-6 text-gray-900" class="service-form" style="color: #020607; font-size:medium;  ">Breed</h3>
                        </td>
            
                            <td><div class="w-full px-6 py-3 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">'.$breed.'
                              
                        </div></td>
                    </tr>
                    <tr >
                        <td>
                        <h3 class="text-lg font-awesome leading-6 text-gray-900" class="service-form" style="color: #020607; font-size:medium;  ">Status</h3>
                        </td>
                  
                            <td><div class="w-full px-6 py-3 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                         '.$status.'
                        </div></td>
                    </tr>
                    <tr >
                        <td>
                        <h3 class="text-lg font-awesome leading-6 text-gray-900" class="service-form" style="color: #020607; font-size:medium;  ">Date Of Birth</h3>
                        </td>
            
                            <td><div class="w-full px-6 py-3 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                            '.$dob.'
                        </div></td>
                        <tr >
                            <td>
                            <h3 class="text-lg font-awesome leading-6 text-gray-900" class="service-form" style="color: #020607; font-size:medium;  ">Vaccinations List and Medical History</h3>
                            </td>
                
                                <td><div class="w-full px-6 py-3 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                    '.$medical.'
                            </div></td>
                        
                    </tr>
                    <tr></tr>
            
                    </div>
                       ';

                    }
              
                
            
            ?>
      
    
        
        
    </tbody>
</table>


</body>
</html>
