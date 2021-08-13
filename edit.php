<?PHP 
        $title='Edit Record';
         require_once'includes/header.php';
         require_once'db/conn.php';
         $results= $crud->getSpecialities();

         if(!isset($_GET['id'])){
             //echo 'error';
             include 'includes/errormessage.php';
             header("Location: viewrecords.php");


         }else{
             $id = $_GET['id'];

            $attendee = $crud->getAttendeeDetails($id);
        

         
     ?>

    <h1 class="text-center">Edit Record</h1>

    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>" />
    <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstname" name="firstname" placeholder="Enter First Name">      
        </div>

        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastname" name="lastname"  placeholder="Enter Last Name">      
        </div>

        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth'] ?>" id="dob"   name="dob">      
        </div>

        <div class="mb-3">
            <label for="speciality" class="form-label">Area of Expertise</label>
            <select class="form-select form-select-lg mb-3" value="<?php echo $attendee['speciality'] ?>" id="speciality" name="speciality" aria-label=".form-select-lg example">
               <!-- <option selected>Select Area of Expertise</option>
                <option value="1">Database Admin</option>
                <option value="2">Software Developer</option>
                <option value="3">Web Administrator</option>
                <option value="4">Other</option> -->
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){   ?>

                    <option  value="<?php echo $r['speciality_id'] ?>" <?php if($r['speciality_id'] == $attendee['speciality_id']) echo 'Selected' ?>> 
                         <?php echo $r['name']; ?> 
                    </option>
 
                 <?php } ?>    
                

                
            </select>      
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control"  id="email" value="<?php echo $attendee['emailaddress'] ?>" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Contact Numer</label>
            <input type="text" class="form-control" value="<?php echo $attendee['contactnumber'] ?>" id="phone" name="phone" aria-describedby="phoneHelp">
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>

        <div class="d-grid">
            <button type="submit" name="submit" class="btn btn-success ">Save Changes</button>
        </div>
    </form>

    <?php } ?>
<br>
<br>
<br>
<br>
<br>

    <?PHP require_once('includes/footer.php'); ?>