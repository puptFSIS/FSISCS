 <style>
#app
{
    width: 100px;
    margin-left: -40%;
    margin-right: 10px;
}

#disapp
{
    width: 100px;
    margin-top: -48px;
    margin-left: 100px;
}

#btn-modal
{
  width: 80px;
}
</style>
 <div class="w3-code notranslate cssHigh">
  <h4><strong><center>APPROVAL</center></strong></h4>

      <p>
        Note: After Reviewing, you must tag the Accomplishment and the Uploaded Proof(s) if Approve or Not.
      </p>

  <center>
        <form action="index.php?r=administrator/processIPCRapproval" method="post">
          <input type="hidden" name="id" value="<?php echo $id;?>">
          <input type="hidden" name="m" value="<?php echo $m; ?>">
          <input type="hidden" name="y" value="<?php echo $y; ?>">
          <input type="hidden" name="accomp" value="<?php echo $accomp; ?>">
          <input type="hidden" name="fcode" value="<?php echo $fcode; ?>">
          <input type="hidden" name="idaccomp" value="<?php echo $idaccomp; ?>">
          <button id="App" name="btn" type="submit" value="Approved">Approved</button>
        </form>
        
        
          <button id="disapp" data-toggle="modal" data-target="#ModalCenterApproval">Disapproved</button>
          <!-- <button id="disapp" name="btn" value="Disapprove" data-toggle="modal" data-target="#exampleModalCenter">Disapprove</button> -->
          <!-- <input type="hidden" value="Disapprove" name="Disapprove">
          <input type="submit" value="Submit"> -->
        <!-- </form> -->  
  </center>
</div>


     <!-- Modal for Disapprove feedback -->
         <div class="modal fade" id="ModalCenterApproval">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <form action="index.php?r=administrator/processIPCRapproval" method="post">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="hidden" name="m" value="<?php echo $m; ?>">
                <input type="hidden" name="y" value="<?php echo $y; ?>">
                <input type="hidden" name="accomp" value="<?php echo $accomp; ?>">
                <input type="hidden" name="fcode" value="<?php echo $fcode; ?>">
                <input type="hidden" name="idaccomp" value="<?php echo $idaccomp; ?>">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><strong>ADD FEEDBACK</strong></h5>
              </div>
              <div class="modal-body">
                <textarea name="feedback"><?php //echo $remarks; ?></textarea>
              </div>
              <div class="modal-footer">
                <button id="btn-modal" data-dismiss="modal">Close</button>
                <button  id="btn-modal" name="btn" value="Disapproved" type="submit">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>

<!-- Modal Feedback -->
<!-- <div class="modal fade" id="exampleModalCenter">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form id="myForm" action="index.php?r=administrator/processIPCRapproval<?php echo '&m='.$m.'&y='.$y.'&id='.$id.'&fcode='.$fcode.''?>" method="post">
      <div class="modal-header">
        
        <h5 class="modal-title" id="exampleModalLongTitle">Disapprove? Provide Feedback.</h5>
      </div>
      <div class="modal-body">
        <textarea type name="feedback" placeholder="Feedback"></textarea>
      </div>
      <div class="modal-footer">
        <button id="btn-modal" data-dismiss="modal">Close</button>
        <button  id="btn-modal" type="submit">Save</button>
      </div>
      </form>
    </div>
  </div>
</div> -->
<!-- <hr>
<h4 class="underlined-header"><strong><center>FEEDBACK</center></strong></h4>
<p>
    <strong>Note: if you disapprove, you can provide feedback.</strong>
</p>
<form action="" method="post">
<textarea type name="feedback" placeholder="Feedback"></textarea>
<br>
<center>
  <button  id="btn-modal" type="submit">Save</button>
</center>
</form>
<script src="ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('feedback');
</script> -->