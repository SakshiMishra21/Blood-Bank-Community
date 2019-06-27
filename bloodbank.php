<?php
include('header.php');
//include('sidebar.php');
include('conn.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bloodbank</title>
</head>
<form method="POST" action="">
<div class="container" style="background:#FF3F4A; width: 100%;margin-top: 70px;"><br/><br/>
	<div class="row">
	<div class="container"  class="img-resposive" style="margin-top: 100px; border: solid; background-image: url(/blood/images/img8.jpg); background: cover;">
		<h3 style="margin-top: 2px; font-family: sans-serif; font-size: 30px; color: #fff;">Find Blood banks of india</h3>
		<?php
		$state_all = mysqli_query($cn,"SELECT * FROM state");
		?>
		<div class="col-md-5" style="margin-top: -67px;"><br/><br><br/>
			<select name="state" placeholder="select state" style="width: 249px; margin-bottom:40px;  height: 40px;margin-top: 54px;">
				<option value="">--Select State--</option>
			<?php while($states = mysqli_fetch_assoc($state_all)){ ?>
				<option value="<?php echo $states['s_name']; ?>"><?php echo $states['s_name']; ?></option>
		<?php } ?>
				\
		    </select>
		</div>
		<?php
		$city_all = mysqli_query($cn,"SELECT * FROM city");

		?>
		<div class="col-md-4" style="margin-top: 0px;">
			<select name="city" style="width: 249px; height: 40px;margin-top: 54px; ">
				<option value="">--Select City--</option>
			<?php while($cities = mysqli_fetch_assoc($city_all)){ ?>
				<option value="<?php echo $cities['c_name']; ?>"><?php echo $cities['c_name']; ?></option>
		<?php } ?>
				
			</select>
		</div>
		<!---->
		<div class="col-md-2" style="margin-top: 0px;margin-left: 10px;">
				<input type="submit" name="submit" value="Search"style="width: 100px;background-color:grey; height: 40px;margin-top: 54px;">
			</div>
	</div>
	<br/><br/><br/><br/><br/><br/>
</div>
</div>
</form>
<!--<div style="background: url(/blood/images/img6.jpg);"></div>-->
<?php
//$cn=makeconnection();
if(isset($_POST['submit'])){
echo"<h1 style='margin-top: 20px;color: rgba(165, 24, 24, 0.78)'>Blood Banks</h1>";
$states = $_POST['city'];
$cities = $_POST['state'];
$s="SELECT * FROM bloodbank WHERE state='$cities' AND city='$states' ";
	$result=mysqli_query($cn,$s);
	//$r=mysqli_num_rows($result); 
while($data=mysqli_fetch_assoc($result))
	{
?>
<div class="container-fluid" style="margin-top:100px; box-sizing: border-box;">
	<div class="row">
		<div class="col-md-8" style="border: 2px solid;height: 245px;margin-left: 268px;">
			<p style="margin: 4px;
    				  margin-left: 312px;
    				  font-style: italic;
    				  font-family: -webkit-body;
                      font-weight: bolder;
                      font-size: 18px;
                      color: #fff;
                      text-align: center;">
                      <h1 style="color: rgba(165, 24, 24, 0.78);margin-top:-55px; "><br/><?php echo $data['name'];?></h1><br/>   
                      <i class="fa fa-0map-marker" aria-hidden="true" style="color: rgba(165, 24, 24, 0.78)"></i>
                      State:&nbsp&nbsp&nbsp&nbsp<?php echo $data['state'];?> <br/>       	
                      <i class="fa fa-flag" aria-hidden="true" style="color: rgba(165, 24, 24, 0.78)"></i>City:&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $data['city'];?><br/>
                      <i class="fa fa-address-book" aria-hidden="true" style="color: rgba(165, 24, 24, 0.78)"></i>Address:&nbsp&nbsp<?php echo $data['address'];?>
            </p>
        </div>
		
	</div>
</div>
<?php
}
?>
<br/><br/><br/><br/>
<?php
}
include('footer.php');
?>