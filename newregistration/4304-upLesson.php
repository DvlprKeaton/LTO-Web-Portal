<?php
include("condb.php");

session_start();

$sname = $_SESSION["Fullname"];
$student = $_POST['student'];
$title = $_POST['title'];

$sql = "SELECT * FROM lessontbl WHERE Lessonname = '$title' AND Status = '1'";
$res = mysqli_query($cn, $sql);

if($res && mysqli_num_rows($res)>0)
{
  function myAlert($msg, $url)
	{
    echo '<script language="javascript">alert("'.$msg.'");</script>';
    echo "<script>document.location = '$url'</script>";
	}
	myAlert("Lesson is Already Uploaded!", "tLesson.php");
}else 
    {
					date_default_timezone_set('Asia/Manila');
					$ldate = date("d-m-Y");


		    	$pname = rand(1000,10000)."-".$_FILES["file"]["name"];

					$tname = $_FILES["file"]["tmp_name"];

					$uploads_dir = 'lecture';

					move_uploaded_file($tname, $uploads_dir.'/'.$pname);

					$sql2 = "INSERT INTO lecturetbl(Lecturename,lFile,lDate,lStudent,lTutor,Status) VALUE ('$title','$pname','$ldate','$student','$sname','1')";
					$result = mysqli_query($cn, $sql2);

					function myAlert1($msg, $url){
					echo '<script language="javascript">alert("'.$msg.'");</script>';
					echo "<script>document.location = '$url'</script>";
					}
					myAlert1("Upload Success!", "tLesson.php");

        
    }
?>