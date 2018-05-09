<?php
//Abby Shope


// assume that user's file will be saved in
// uploaded/ (in current folder)
// this folder must be created and have a+rwx permission

// call the function, saveFile, for actual uploading.

$msg = saveFile($_FILES['profilepicture']);

//echo "<P>$msg1</P>\n" ;
//adds new profile photo to database
function saveFile($filedata) {

    // 0. for debugging
    printf("<PRE>\n");
	echo "hello";
    print_r($filedata);
    printf("</PRE>\n");

    $msg = "";

    // 1. important variables from $filedata
	$userfn = $filedata['name'];
	$size = $filedata['size']; //TODO sometimes if the file is too big, it will say size = 0, check php.ini?
	$tmpfn = $filedata['tmp_name'];
	$type = $filedata['type'];


    printf("<P>Step 1 done</P>");


    // 2. check file size for (0, 5MB]


	if ($size == 0) {
		echo "file is empty";
		return $msg;
	}
	else if ($size > 5200000 ) {
		$msg = "file is too large";
		return $msg;	
	}
   
    printf("<P>Step 2 done</P>");

    // 3. get uploaded file data info from temp folder

	$imginfo = getimagesize($tmpfn);
	

    printf("<P>Step 3 done</P>");


    // 4. check mime type (is it an image?)

	if ($imginfo == FALSE) {
		$msg = "File is not an image";
		return $msg;
	}


    printf("<P>Step 4 done</P>");


    // 5check for allowed types (jpg/gif/png) 


    printf("<P>Step 5 done</P>\n");

    // 6. copy uploaded file from temp folder to correct folder
    $folder = "./uploaded/";
    $fn = $folder . $userfn;

    $result = move_uploaded_file($tmpfn, $fn);

    print "<P>Saving uploaded file as " . $fn . "</P>\n";


    printf("<P>Step 6 done</P>");

    // 7. check if copying was successful
//something in the if statement is invalid php
	
	if ($result != FALSE ) {
		$msg = "<P> Successfully uploaded $userfn</P>\n";
	//change owner info
	//chown ____ files/folders
	//$cmd = "chown shopab01 $fn";
	$cmd = "chmod a+rw $fn";
	system($cmd);
	}
	else {
 //  		 printf("false");
		$msg = "<P> Error uploading $userfn</P>\n";
	}

    // 8. return success or failure message
    return $msg;
}

?>
<HTML>
<HEAD> <TITLE> Speeding Bullet  </TITLE>

<META name="viewport" content="width=device-width, initial-scale=1">

			<LINK rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
				<LINK rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">

					<SCRIPT src="js/jquery-1.11.3.min.js"> </SCRIPT>
					<SCRIPT src="js/bootstrap.min.js">     </SCRIPT>

					<STYLE type="text/css">
					/*for all paragraphs*/
					p {
						padding: 100px;
						background: #002F6C;
						color: white;
						font-family: arial;
						text-align: center;
					}	
					body {
						color: #002F6C;
					}
					p.gray {
						padding: 20px;
						font-size: 15px;
						font-weight: bold;
						text-align: center;
						background: #dbdfe5;
						font-family: arial;
					}
					h1 {
						text-align: center;
						color: #002F6C;
						font-family: arial;
						font-size: 72px;
					}
					body {
						text-align: center;
						font-family: arial;
					}
					input {
						margin-bottom: 8px;
					}
</STYLE>

</HEAD>
<BODY>
 <?php print $msg; ?> </br>
<td> <a href="profile.php">Click here to return to profile.</a>
</BODY>
</HTML>
