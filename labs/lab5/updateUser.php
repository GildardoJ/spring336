<?php
session_start();

if(!isset($_SESSION['username'])){ // validates that admin has indeed logged in.
    
    header("location: index.php");
}
    include 'DbConnection.php';
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
    global $conn;
    $sql = "UPDATE tc_user 
            SET 'firstName' = ':fName',
                'lastName' = ':lName',
                'gender' = ':gender'
            WHERE userId = 2 ";
    $namedParameters = array();
    $namedParameters[":fName"] = $_GET['firstN'];
    $namedParameters[":lName"] = $_GET['lastN'];
    $namedParameters[":gender"] = $_GET['gender'];
    //$namedParameters[":userId"] = $_GET['userId'];
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
   // $record = $stmt->fetch();
  //  return $record;
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
            
            <tr><td><input type="hidden" name="userId" value="<?=$userInfo['userId']?> " /></td></tr>
            <tr><td>First Name: </td><td><input type="text" name="firstN" required value="<?=$userInfo['firstName']?>"/></td></tr>
            <tr><td>Last Name:</td><td> <input type="text" name="lastN" required value="<?=$userInfo['lastName']?>"/></td></tr>
            <tr><td>Email: </td><td><input type="text" name="email" required value="<?=$userInfo['email']?>"/></td></tr>
            <tr><td>University Id: </td><td><input type="text" name="newUserId"  value="<?=$userInfo['userId']?>"/> </td></tr>
            <tr><td>Phone:</td><td> <input type="text" name="phone"  value="<?=$userInfo['phone']?>"/> </td></tr>
            
           <tr><td> Gender: 
               </td><td><input type="radio" name="gender" value="F" id="genderF" <?=($userInfo['gender']=='F')?"checked":"" ?> required/> 
                        <label for="genderF">Female</label>
                        <input type="radio" name="gender" value="M" id="genderM" <?=($userInfo['gender']=='M')?"checked":"" ?> required/> 
                        <label for="genderM">Male</label>
            </td></tr>
            
            <tr><td>Role: </td><td>  <select name="role">
                                        <option value="<?=$userInfo['role']?>"><?=$userInfo['role']?> </option>
                                        <option>Faculty</option>
                                        <option>Student</option>
                                        <option>Staff</option>
                                    </select>
            </td></tr>
            
            <tr><td>Department:</td><td> <select name="deptId">
                                        <option value="<?=$userInfo['deptId']?>"> <?=$userInfo['deptId']?> </option>
                                        <?php
                                            $departments = getDepartmentInfo();
                                            foreach ($departments as $record) {
                                                echo "<option value='$record[departmentId]'>$record[deptName]</option>";
                                            }
                                        ?>
                                        </select>
            </td></tr>
                        
               <tr><td colspan="2"> <input type="submit" name="updateUserForm" value="Update User!"/></td></tr>
            </table>   
        </form>
        
        </fieldset>
    </body>
</html>