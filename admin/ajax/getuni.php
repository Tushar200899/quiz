<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("getuni",$_POST['token']))
{
   $check = $db->prepare('SELECT * FROM uni_details');
   $data = array();
   $execute = $check->execute($data);
   ?>
   <select name="university" id="university" style="width:100%;color:#000;" >
       <?php
       while($datarow = $check->fetch())
       {
           ?>
           <option value="<?php echo $datarow['id'];?>"> <?php echo $datarow['uname'];?> </option>
         <?php
        }?>
   </select>
 <?php 
}?>