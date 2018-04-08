<?php
session_start();

if(!isset($_SESSION['username'])){ // validates that admin has indeed logged in.
    
    header("location: index.php");
}
    include '../../dbConnection.php';
    $conn = getDatabaseConnection("tcp");
    
function getDepartmentInfo(){
    global $conn;        
    $sql = "SELECT deptName, departmentId 
            FROM tc_department 
            ORDER BY deptName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    return $records;
    
}

if (isset($_GET['addUserFrom'])){
    //the administrator clicked on the "Add User" button
    $firstName = $_GET['firstName'];
    $firstName = $_GET['lastName'];
    $email = $_GET['email'];
    $universityId  = $_GET['universityId'];
    $phone = $_GET['phone'];
    $gender = $_GET['gender'];
    $role = $_GET['role'];
    $deptId = $_GET['deptId'];
    
    // no single quotes for parameter Id's as it allowr for sql injection
    
    $sql = "INSERT INTO tc_user
            (firstName, lastName, email, universityId, gender, phone, role, deptId)
            VALUES 
            (:fName, :lName, :email, :universityId, :gender, :phone, :role, :deptId)";
    $namedParameters = array();
    $namedParameters[':fName'] = $firstNam;
    $namedParameters[':lName'] = $lastName;
    $namedParameters[':email'] = $email;
    $namedParameters[':universityId'] = $universityId;
    $namedParameters[':gender'] = $gender;
    $namedParameters[':phone'] = $phone;
    $namedParameters[':role'] = $role;
    $namedParameters[':deptId'] = $deptId;
    
    $stmt - $conn->prepare($sql);
    $stmt->execute($namedParameters);
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Admin: Adding New User </title>
        <link href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel = "stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
         <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="jumbotron text-center">
       
        <h1> Admin Section </h1>
        <!--<h2> Adding New Users</h2> -->
        
        <fieldset>
            
            <legend> Add New User </legend>
         <form>
            <table style="width:60%" align="center">
                <tr><td>First Name:</td><td><input type="text" name="firstName"/></td></tr>
                 
                <tr><td>Last Name:</td><td> <input type="text" name="lastName"/></td></tr> 
                <tr><td>Email: </td><td><input type="text" name="email"/></td></tr>
                <tr><td>University Id:</td><td> <input type="text" name="universityId"/></td></tr> 
                <tr><td>Phone:</td><td> <input type="text" name="phone"/></td></tr>
                <tr><td>Gender:</td><td> <input type="radio" name="gender" value="F" id="genderF"/> 
                        <label for="genderF">Female</label>
                        <input type="radio" name="gender" value="M" id="genderM"/> 
                        <label for="genderM">Male</label>
                </td></tr>
                <tr><td>Role: </td><td>  <select name="role">
                            <option value=""> Select One </option>
                            <option>Faculty</option>
                            <option>Student</option>
                            <option>Staff</option>
                        </select>
                </td></tr>
                <br />
                <tr><td>Department: </td><td><select name="deptId">
                                <option value=""> Select One </option>
                                <?php
                                
                                    $departments = getDepartmentInfo();
                                    foreach ($departments as $record) {
                                        echo "<option value='$record[departmentId]'>$record[deptName]</option>";
                                    }
                                
                                ?>
                                
                            </select>
                            <br />
                </td></tr>
                <tr><td colspan="2"><input type="submit" name="addUserForm" value="Add User!"/></td></tr>
            </table>
        </form>
    
        </fieldset>
    </body>
</html>