<?php
/**
 * Created by PhpStorm.
 * User: joshe
 * Date: 9/15/2019
 * Time: 9:15 PM
 */

$pagetitle = "Lunch Decision Maker!";
include_once "head.php";

//Set Variables
$showform = 1;
$errormsg = 0;
$errlunchdoption = "";
$numofchoices = 0;

if($_SERVER['REQUEST_METHOD'] == "POST"){

    //Sanitize data
    $formstuff['lunchoption'] = trim($_POST['lunchoption']);

    //Make sure field is not empty
    if(empty($formstuff['lunchoption'])) {$errlunchdoption = "Cannot be left empty!"; $errormsg = 1;}

    //Check for duplicate entries
    $sql = "SELECT * FROM lunchoptions WHERE lunchoption = ?";
    $count = checkDup($pdo, $sql, $formstuff['lunchoption']);
    if($count > 0){
        $errormsg = 1;
        $errlunchdoption = "This option already exists.";
    }

    //Error handling
    if($errormsg == 1){
        echo "<p> There are errors. Please fix them. </p>";
    }
    else{
        //Insert option into the database
        try{
            $sql = "INSERT into lunchoptions (lunchoption) VALUES (:lunchoption)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':lunchoption', $formstuff['lunchoption']);
            $stmt->execute();

            echo "<p class='awesome'> Great Choice!!! </p>";
        }
        catch (PDOException $e){
            die ($e ->getMessage());
        }
    }
}
if($showform == 1) {
    ?>
    <form name="lunchchoice" id="lunchchoice" method="post" action="lunchchoice.php">
        <table>
            <tr>
                <th><label for="lunchoption">Enter an option:</label><span class="important">*</span></th>
                <td><input name="lunchoption" id="lunchoption" type="text" size="20" placeholder="Lunch Time!"/>
                    <span class="error"><?php if (isset($errlunchdoption)) {
                            echo $errlunchdoption;
                        } ?></span></td>
            </tr>
        </table>
        <input type="submit" name="submit" id="submit" value="Submit"/> <br />
        <a href="getlunch.php" id="choice">GET MY CHOICE!</a>

    </form>
    <img src="pictures/cculogo.png" alt="CCU Logo" class="picture">
    <?php
}
include_once "foot.php";
?>