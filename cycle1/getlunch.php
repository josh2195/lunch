<?php
/**
 * Created by PhpStorm.
 * User: joshe
 * Date: 9/16/2019
 * Time: 3:32 AM
 */
include_once "head.php";
//Clear the database
cleartable($pdo);
?>
<p class="chosen">
    <?php
    //Display the random selection
    chooselunch($pdo);
    ?>
</p>
<?php
include_once "foot.php";