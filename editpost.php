<?php 
    
    require_once'db/conn.php';

    // get values from post operation 

    if(isset($_POST['submit'])){

        // extract value from the postarray
        $id =  $_POST['id'];
        $fname= $_POST['firstname'];
        $lname= $_POST['lastname'];
        $dob= $_POST['dob'];
        $email= $_POST['email'];
        $contact= $_POST['phone'];
        $speciality= $_POST['speciality'];
   
    
    //call crud function

    $result = $crud->editAttendee($id,$fname,$lname,$dob,$email,$contact,$speciality);

    if($result){
         header("Location: viewrecords.php");
    }else{
        include 'includes/errormessage.php';
    }


    //redirect to index.php
  }
    else{
        include 'includes/errormessage.php';
    }


  
?>