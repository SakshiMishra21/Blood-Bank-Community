<?php
include('header.php');
include('sidebar.php');
include('conn.php')
?>

<!-- contact -->
<br/><br/><br/>
	<div  id="contact" style="background: url(/BloodBankCommunity/images/demo/img6.jpg);margin-top: 3px;" >

		<div style="margin-top: 25px;">
			<img src="/BloodBankCommunity/images/demo/img3.jpg" style="height:340px; margin-top: 110px; margin-left: 80px;">
		</div>
		<div class="contact-right-w3l">

			<h5  style="margin-top: 100px;">contact Us </h5>
			<div>
			<form action="notify.php" target="_blank" method="post">
				<div>
					<input type="text" class="name" name="name" placeholder="Enter Name" required="">
				</div>
				<div>
					<input type="email" class="name" name="email" placeholder="Email" required="">
				</div>
				<div>
					<input type="text" class="name" name="mobnum" placeholder="Mobile No." required="">
				</div>
				<div>
					<input type="text" class="name" name="sub" placeholder="Subject" required="">
				</div>
				<div>
					<textarea placeholder="Your Message" name="message" required=""></textarea>
				</div>
				<div >
					<input type="submit" value="Send Message" name="sbmt" style="margin-top: -2px;">

				</div>
			</form>
		</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- //contact -->
<?php
if(isset($_POST["sbmt"])) 
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobnum=$_POST['mobnum'];
	$sub=$_POST['sub'];
	$message=$_POST['message'];
	$s="INSERT INTO `contact`(`name`, `email`, `mobnum`, `sub`, `message`) VALUES('$name','$email','$mobnum','$sub','$message')";
	$q=mysqli_query($cn,$s);
	mysqli_close($cn);
	if($q>0)
	{
	echo "<script>alert('Record Save');</script>";
	}
	else
	{echo "<script>alert('Saving Record Failed');</script>";
	}
		
		}	
include('footer.php');
?>