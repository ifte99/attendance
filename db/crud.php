<?php
    class crude{
        private $db;

        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function insert($fname,$lname,$dob,$email,$contact,$speciality){
                try{
                    $sql = "INSERT INTO attendee(firstname,lastname,dateofbirth,emailaddress,contactnumber,speciality_id) VALUES(:fname,:lname,:dob,:email,:contact,:speciality)";
                    $stmt = $this->db->prepare($sql);

                    $stmt -> bindparam(':fname',$fname);
                    $stmt -> bindparam(':lname',$lname);
                    $stmt -> bindparam(':dob',$dob);
                    $stmt -> bindparam(':email',$email);
                    $stmt -> bindparam(':contact',$contact);
                    $stmt -> bindparam(':speciality',$speciality);

                    $stmt ->execute();

                    return true;

                }catch(PDOException $e){
                    //throw $th
                    echo $e-> getMessage();
                    return false;

                }
        }

        public function editAttendee($id,$fname,$lname,$dob,$email,$contact,$speciality){
         
            try{

                
            $sql = "UPDATE `attendee` SET `firstname`= :fname,`lastname`= :lname,`dateofbirth`= :dob,`emailaddress`= :email ,`contactnumber`=:contact,`speciality_id`=:speciality WHERE attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            // bind all placeholders to actual values
            $stmt -> bindparam(':id',$id);
            $stmt -> bindparam(':fname',$fname);
            $stmt -> bindparam(':lname',$lname);
            $stmt -> bindparam(':dob',$dob);
            $stmt -> bindparam(':email',$email);
            $stmt -> bindparam(':contact',$contact);
            $stmt -> bindparam(':speciality',$speciality);

            $stmt ->execute();

            return true;

            }catch(PDOException $e){
                //throw $th
                echo $e-> getMessage();
                return false;

            }


        }

        public function getAttendees(){
            try{
                $sql = "SELECT * FROM `attendee` a inner join speciality s on a.speciality_id= s.speciality_id;";
                $result = $this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                //throw $th
                echo $e-> getMessage();
                return false;

            } 

        }


        public function getAttendeeDetails($id){

            try{
                $sql = "select * from attendee a inner join speciality s on a.speciality_id= s.speciality_id where attendee_id = :id ";
             $stmt = $this->db->prepare($sql);
             $stmt -> bindparam(':id',$id);
             $stmt ->execute();
             $result = $stmt->fetch();

             return $result;
                
            }catch(PDOException $e){
                //throw $th
                echo $e-> getMessage();
                return false;

            } 

            

             


        }

        public function deleteAttendee($id){
            try{
                $sql = "DELETE FROM `attendee`  WHERE attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt -> bindparam(':id',$id);
                $stmt ->execute();
                return true;


            }catch(PDOException $e){
                //throw $th
                echo $e-> getMessage();
                return false;

            }

            

        }

        public function getSpecialities(){
            try{
                $sql = "SELECT * FROM `speciality`;";
                $result = $this->db->query($sql);
                return $result;


            }catch(PDOException $e){
                //throw $th
                echo $e-> getMessage();
                return false;

            }

            

        }

        
    }

?>