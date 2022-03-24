<h4 class="underlined-header"><strong>ACCOMPLISHMENT AND PROOF(S) APPROVAL</strong></h4>
<p><strong>* After Reviewing, you must tag the Accomplishment and the Uploaded Proof(s) if Approve or Not.</strong></p>
<center>
    <a href="index.php?r=administrator/processIPCRapproval"><button style="margin-right: 10px; width: 100px;">Approve</button></a>
    <button style="width: 100px;" data-toggle="modal" data-target="#exampleModalCenter">Disapprove</button>
</center>


<!-- Modal Feedback -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="index.php?r=faculty/processIPCRapproval" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Disapprove? Provide Feedback.</h5>
      </div>
      <div class="modal-body">
        <textarea name="feedback" placeholder="Feedback"></textarea>
      </div>
      <div class="modal-footer">
        <button style="width: 80px;" data-dismiss="modal">Close</button>
        <a href=""><button style="width: 80px;">Save</button></a>
      </div>
      </form>
    </div>
  </div>
</div>


<script src="ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('feedback');
</script>