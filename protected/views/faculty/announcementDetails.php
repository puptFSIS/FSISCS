<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$ID = $_GET['ID'];
	$sql="SELECT * FROM tbl_announcement WHERE ID='$ID' AND status='Active'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	
	echo '
	<h2>' . $row['title'] . '</h2>
	<!-- End - Post title -->
	<!-- Post information -->
	<p class=post-header-meta>
	Posted on ' . $row['sDay'] . ' ' . $row['sMonth'] . ' ' . $row['sYear'] . ' by ' . $row['by'] . '
	</p>
	<!-- End - Post information -->
	<!-- Post comments link -->
	<p class=post-header-comments>
	</p>
	<!-- End - Post comments link -->
	</header>
	<!-- End - Post header -->
	<!-- Post text -->
	<section>
	<figure class=align-center>
	<span class=element-holder>
	<img alt="Image example" src="./assets/post-1.jpg.pagespeed.ce.mi4CIaX3kI.jpg" width=594 />
	</span>
	</figure>
	<p>' . $row['body'] . '</p>
	</section>

	';
?>