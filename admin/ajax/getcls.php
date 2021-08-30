<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("getcls",$_POST['token']))
{
   $check = $db->prepare('SELECT * FROM cls_details');
   $data = array();
   $execute = $check->execute($data);
   ?>
   <select name="Class" id="class" style="width:100%;color:#000;" >
       <?php
       while($datarow = $check->fetch())
       {
           ?>
           <option value="<?php echo $datarow['id'];?>"> <?php echo $datarow['cname'];?> </option>
         <?php
        }?>
   </select>
 <?php 
}?>