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

function getUserInfo($userId) {
    global $conn;
    $sql = "SELECT *
            FROM tc_user
            WHERE  userId = $userId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch();
    //print_r($record);
    return $record;


}

if (isset($_GET['updateUserForm'])){
    
    $sql = "UPDATE tc_user 
            SET firstName = :fName,
                lastName = :lName,
                gender = :gender,
            WHERE userId = :userId ";
    $namedParameters = array();
    $namedParameters[":fNmae"] = $_GET['firstName'];
    $namedParameters[":lName"] = $_GET['lastName'];
    $namedParameters[":userId"] = $_GET['userId'];
    $namedParameters[":gender"] = $_GET['gender'];
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
    $recordd = $stmt->fetch();
    
    return $recordd;
}

if (isset($_GET['userId'])){
    
    $userInfo = getUserInfo($_GET['userId']);
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin: Updating User </title>
        <link href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel = "stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="jumbotron text-center">
        <h1> Admin Section </h1>
        <fieldset>
            
            <legend> Update User </legend>
         <form>
            <table style="width:60%" align="center">
            
            <tr><td><input type="hidden" name="userId" value="<?=$userInfo['userId']?> " />
            <tr><td>First Name: </td><td><input type="text" name="firstName" required value="<?=$userInfo['firstName']?>"/></td></tr>
            <tr><td>Last Name:</td><td> <input type="text" name="lastName" required value="<?=$userInfo['lastName']?>"/></td></tr>
            <tr><td>Email: </td><td><input type="text" name="email"/></td></tr>
            <tr><td>University Id: </td><td><input type="text" name="universityId"/> <br>
            <tr><td>Phone:</td><td> <input type="text" name="phone"/> <br>
           <tr><td> Gender: </td><td><input type="radio" name="gender" value="F" id="genderF" <?=($userInfo['gender']=='F')?"checked":"" ?> required/> 
                    <label for="genderF">Female</label>
                    <input type="radio" name="gender" value="M" id="genderM" <?=($userInfo['gender']=='M')?"checked":"" ?> required/> 
                    <label for="genderM">Male</label><br>
            <tr><td>Role: </td><td>  <select name="role">
                        <option value=""> Select One </option>
                        <option>Faculty</option>
                        <option>Student</option>
                        <option>Staff</option>
                    </select>
            <br />
            <tr><td>Department:</td><td> <select name="deptId">
                            <option value=""> Select One </option>
                            <?php
                            
                                $departments = getDepartmentInfo();
                                foreach ($departments as $record) {
                                    echo "<option value='$record[departmentId]'>$record[deptName]</option>";
                                }
                            
                            ?>
                            
                        </select>
                        <br />
                <input type="submit" name="updateUserForm" value="Update User!"/>
        </form>
    
        </fieldset>
    </body>
</html>