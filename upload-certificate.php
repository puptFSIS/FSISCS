<?php
$upload_dir = 'acccertificates/'; // Directory for file storing
$filename= '';
$result = 'ERROR';
$result_msg = '';
$allowed_image = array ('image/gif', 'image/jpeg', 'image/jpg', 'image/pjpeg', 'image/png');
define('PICTURE_SIZE_ALLOWED', 2242880); // bytes

if (isset($_FILES['certificate']))  // file was send from browser
{
	if ($_FILES['certificate']['error'] == UPLOAD_ERR_OK)  // no error
	{
		if (in_array($_FILES['certificate']['type'], $allowed_image)) 
		{
			if(filesize($_FILES['certificate']['tmp_name']) <= PICTURE_SIZE_ALLOWED) // bytes
			{
				$filename = date('YmGdis') . $_FILES['certificate']['name'];
				$result = 'OK';
			}
			else 
			{
				$filesize = filesize($_FILES['certificate']['tmp_name']);
				$filetype = $_FILES['certificate']['type'];
				$result_msg = 'The uploaded file exceeds the allowed filesize';
			}
		}else {
			$result_msg = 'The uploaded file is not allowed';
		}
	}
	elseif ($_FILES['certificate']['error'] == UPLOAD_ERR_INI_SIZE)
	{
		$result_msg = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
	}
	else
	{
		//file is not required
		$result = 'OK';
	}
}

?>