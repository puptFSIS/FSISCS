<?php
include("config.php");
// session_start();
//fetch.php;
if(isset($_POST['view']))
{

     // $asd = $_POST['view'];
     // echo $asd;
     // die;
     if($_POST['view'] != '')
     {
          $update_query = "UPDATE tbl_ipcrnotification SET status = 1 WHERE status = 0";
          mysqli_query($conn, $update_query);
     }
     // else if($_POST['view'] == ''){
          $query = "SELECT * FROM tbl_ipcrnotification ORDER BY id DESC LIMIT 100";
          $result = mysqli_query($conn, $query);
          $output = '';
          
          if(mysqli_num_rows($result) > 0)
          {
               while($row = mysqli_fetch_array($result))
               {
                    $output .= '
                    <li style="padding-right: 10px; padding-bottom: 5px; padding-left: 15px;">
                     <a href="index.php?r=administrator/IPCRratingsremarks" style="color:black; padding-right: 20px;">
                      <strong>'.$row['subject'].'</strong><br/>
                      <small><em>'.$row['text'].'</em></small><br/>
                      <strong><small><em>Passed on: </em></small></strong>
                      <small><em>'.$row['date'].' </em></small>
                      <small><em>'.$row['time'].'</em></small>
                     </a>
                    </li>
                    <hr style="margin-top: 5px; margin-bottom:5px; background-color: #333;">
                    ';
               }
          }
          else
          {
             $output .= '<li style="padding-right: 10px; padding-bottom: 0px;"><a href="#" style="color:black; padding-right: 20px;" class="text-bold text-italic">No Notification Found</a></li>';
          }
     
     $query_1 = "SELECT * FROM tbl_ipcrnotification WHERE status = 0";
     $result_1 = mysqli_query($conn, $query_1);
     $count = mysqli_num_rows($result_1);
     $data = array(
      'notification'   => $output,
      'unseen_notification' => $count
     );
     echo json_encode($data);
}
?>