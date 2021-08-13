<?PHP 
        $title='Success';
         require_once 'includes/header.php';
         require_once 'db/conn.php';

         if(isset($_POST['submit'])){
             $fname= $_POST['firstname'];
             $lname= $_POST['lastname'];
             $dob= $_POST['dob'];
             $email= $_POST['email'];
             $contact= $_POST['phone'];
             $speciality= $_POST['speciality'];
             

             $isSuccess = $crud -> insert($fname,$lname,$dob,$email,$contact, $speciality);

             if($isSuccess){
                 include 'includes/successmessage.php';
                 

             }
             else{

                include 'includes/errormessage.php';
                
             }
         }
     ?>
     
     <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $_POST['firstname'] .' '. $_POST['lastname'] ;?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $_POST['speciality']  ;?>

            </h6>

            <h6 class="card-text">
               Date of Birth:  <?php echo $_POST['dob']  ;?>

            </h6>

            <h6 class="card-text">
                Email: <?php echo $_POST['email']  ;?>

            </h6>
            <h6 class="card-text">
                 Contact Number : <?php echo $_POST['phone']  ;?>

            </h6>
           
        </div>
     </div>

    


<br>
<br>
<br>
<br>
<br>

    <?PHP require_once('includes/footer.php'); ?>