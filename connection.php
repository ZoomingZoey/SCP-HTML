<?php
    // Create a connection to the database:
    $mysqli = new mysqli("localhost", "a3003659_scp_user",
                         "toiohomai1234", "a3003659_scp_records") or die(mysqli_error($mysqli));
    
    // variable to hold all infomation from the database:
    $table = $mysqli->query("SELECT * FROM scp") or die($mysqli->error);
    
    // CREATE - Listens and receives data from the create SCP record input form and creates a new record entry in the database:
    if (isset($_POST['create'])) {
        // Get the fields passed via POST from the input form:
        $item = $_POST['item'];
        $object_class = $_POST['object_class'];
        $subject_image = $_POST['subject_image'];
        $containment = $_POST['containment'];
        $description = $_POST['description'];
        
        // create the insert MySQL command:
        $insert = "INSERT INTO scp(item, object_class, subject_image, containment, description)
        values('$item', '$object_class', '$subject_image', '$containment', '$description');";
        
        // run the insert MySQL command and output a message if it command succeeds or fails:
        if ($mysqli->query($insert) === TRUE) {
            // now get the newly added record
            $result = $mysqli->query("SELECT * FROM scp WHERE id = LAST_INSERT_ID()");
            $record = $result->fetch_assoc();
            $subjectLink = 'subject.php?subject=' . $record['item'];
            echo "
                <h1>Record was added successfully.</h1>
                <p><a href='{$subjectLink}'>Go to new record page</p>
            ";
        }
        else {
            echo "
                <h1>Error submitting data.</h1>
                <p>{$mysqli->error()}</p>
                <p><a href='catalogue.php'>Click here to go to the SCP catalogue page</a></p>
            ";
        }
    }
    
    // UPDATE - updates a existing record in the database:
    if (isset($_POST['update'])) {
        // Get the updated fields passed via POST from the input form:
        $id = $_POST['id'];
        $item = $_POST['item'];
        $object_class = $_POST['object_class'];
        $subject_image = $_POST['subject_image'];
        $containment = $_POST['containment'];
        $description = $_POST['description'];
        
        // create the update MySQL command:
        $update_cmd = "UPDATE scp SET item='$item', object_class='$object_class', subject_image='$subject_image',
        containment='$containment', description='$description' WHERE id = $id";
        
        // run the update MySQL command and output a message if it command succeeds or fails:
        if ($mysqli->query($update_cmd) === TRUE) {
            $result = $mysqli->query("SELECT * FROM scp WHERE id = $id");
            $record = $result->fetch_assoc();
            $subjectLink = 'subject.php?subject=' . $record['item'];
            echo "
                <h1>Record updated successfully!</h1>
                <p><a href='{$subjectLink}'>Click here to go to the updated subject page</a></p>
            ";
        }
        else {
            echo "
                <h1>Error updating record.</h1>
                <p><a href='catalogue.php'>Click here to go to the SCP catalogue page</a></p>
            ";
        }
    }
    
    // DELETE - deletes an existing record from the database:
    if (isset($_GET['delete'])) {
        // Get the subject/row id field passed via POST:
        $id = $_GET['delete'];
        
        // create the delete MySQL command:
        $delete_cmd = "DELETE FROM scp WHERE id=$id";
        
        // run the delete MySQL command and output a message if it command succeeds or fails:
        if ($mysqli->query($delete_cmd) === TRUE) {
            echo "
                <h1>Record deleted successfully!</h1>
                <p><a href='catalogue.php'>Click here to go to the SCP catalogue page</a></p>
            ";
        }
        else {
            echo "
                <h1>Error deleting record.</h1>
                <p><a href='catalogue.php'>Click here to go to the SCP catalogue page</a></p>
            ";
        }
        
    }
?>