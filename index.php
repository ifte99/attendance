    <?PHP 
        $title='Index';
         require_once'includes/header.php';
         require_once'db/conn.php';
         $results= $crud->getSpecialities();
     ?>

    <h1 class="text-center">Registration for IT Conference</h1>

    <form method="post" action="success.php">
    <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input required type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name">      
        </div>

        <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input required type="text" class="form-control" id="lastname" name="lastname"  placeholder="Enter Last Name">      
        </div>

        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="text" class="form-control" id="dob"   name="dob">      
        </div>

        <div class="mb-3">
            <label for="speciality" class="form-label">Area of Expertise</label>
            <select class="form-select form-select-lg mb-3" id="speciality" name="speciality" aria-label=".form-select-lg example">
               <!-- <option selected>Select Area of Expertise</option>
                <option value="1">Database Admin</option>
                <option value="2">Software Developer</option>
                <option value="3">Web Administrator</option>
                <option value="4">Other</option> -->
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){   ?>

                    <option value="<?php echo $r['speciality_id'] ?>"> <?php echo $r['name']; ?> </option>
 
                 <?php } ?>    
                

                
            </select>      
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input required type="email" class="form-control" id="email"  name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Contact Numer</label>
            <input  type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>

        <div class="d-grid">
            <button type="submit" name="submit" class="btn btn-primary ">Submit</button>
        </div>
    </form>
<br>
<br>
<br>
<br>
<br>

    <?PHP require_once('includes/footer.php'); ?>