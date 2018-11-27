<?php
	if(empty($_POST)){
		//return false;
	}else{
		$age = $_POST['age'];
		$income = $_POST['income'];
		$student = $_POST['student'];
		$cr = $_POST['cr'];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="row">
		  <div class="col-md-10 col-md-offset-1">
			<h2>Prediksi Pembelian Komputer dengan Metode Naive Bayes</h2>
			<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
				<div class="form-group">
					<label for="age" class="col-sm-2 control-label">Age</label>
					<div class="col-xs-4">
						<select class="form-control" name="age" value="<?php echo $age;?>">
							<option>--Silahkan Pilih--</option>
							<option <?php if($age == 'youth') echo 'selected';?> value="youth">Youth</option>
							<option <?php if($age == 'ma') echo 'selected';?> value="ma">Midle Age</option>
							<option <?php if($age == 'senior') echo 'selected';?> value="senior">Senior</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Income</label>
					<div class="col-xs-4">
						<select class="form-control" name="income">
							<option>--Silahkan Pilih--</option>
							<option <?php if($income == 'low') echo 'selected';?> value="low">Low</option>
							<option <?php if($income == 'medium') echo 'selected';?> value="medium">Medium</option>
							<option <?php if($income == 'high') echo 'selected';?> value="high">High</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Student</label>
					<div class="col-xs-4">
						<select class="form-control" name="student">
							<option>--Silahkan Pilih--</option>
							<option <?php if($student == 'yes') echo 'selected';?> value="yes">Yes</option>
							<option <?php if($student == 'no') echo 'selected';?> value="no">No</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Credit Rating</label>
					<div class="col-xs-4">
						<select class="form-control" name="cr">
							<option>--Silahkan Pilih--</option>
							<option <?php if($cr == 'fair') echo 'selected';?> value="fair">Fair</option>
							<option <?php if($cr == 'excellent') echo 'selected';?> value="excellent">Excellent</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="age" class="col-sm-2 control-label"></label>
					<div class="col-xs-4">
						<input class="btn btn-primary" type="submit" value="Submit">
					</div>
				</div>
			</form>
		  </div>
		</div>
		<hr>
<!--Proses form start-->
<?php
error_reporting(0);
$pyes = 0.714285714;
$pno = 0.285714286;

if($age == 'youth'){
	$ageyes = 0.2;
	$ageno = 0.75;
}elseif($age == 'ma'){
	$ageyes = 0.4;
	$ageno = 0;
}elseif($age == 'senior'){
	$ageyes = 0.4;
	$ageno = 0.25;
}else{
	$ageyes =0;
	$ageno = 0;
};

if($income == 'low'){
	$incomeyes = 0.3;
	$incomeno = 0;
}elseif($income == 'medium'){
	$incomeyes = 0.4;
	$incomeno = 0.5;
}elseif($income == 'high'){
	$incomeyes = 0.2;
	$incomeno = 0.5;
}else{
	$incomeyes = 0;
	$incomeno = 0;
};

if($student == 'yes'){
	$studentyes = 0.7;
	$studentno = 0;
}elseif($student == 'no'){
	$studentyes = 0.3;
	$studentno = 1;
}else{
	$studentyes = 0;
	$studentno = 0;
};

if($cr == 'fair'){
	$cryes = 0.6;
	$crno = 0.5;
}elseif($cr == 'excellent'){
	$cryes = 0.4;
	$crno = 0.5;
}else{
	$cryes = 0;
	$crno = 0;
};

//print_r ($age);
$buyyes = ($ageyes*$incomeyes*$studentyes*$cryes)*$pyes;
$buyno = ($ageno*$incomeno*$studentno*$crno)*$pno;
?>
<!--Proses form end-->
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<form class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">Skor YES</label>
						<div class="col-xs-4">
							<input type="text" class="form-control" disabled value="<?php echo $buyyes;?>">
						</div>
					</div>
				</form>
				<form class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">Skor NO</label>
						<div class="col-xs-4">
							<input type="text" class="form-control" disabled value="<?php echo $buyno;?>">
						</div>
					</div>
				</form>
				<form class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">Kesimpulan</label>
						<div class="col-xs-4">
							<?php
								if($buyyes == $buyno){
									echo "<div class='alert alert-warning' role='alert'>Silahkan isi data</div>";
								}elseif($buyyes > $buyno){
									echo "<div class='alert alert-success' role='alert'>Membeli Komputer</div>";
								}else{
									echo "<div class='alert alert-danger' role='alert'>TIDAK Membeli Komputer</div>";
								}
							?>
						</div>
					</div>
				</form>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<form class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama</label>
						<div class="col-xs-4">
							Buang M. Yulianto
						</div>
					</div>
				</form>
				<form class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">NIM</label>
						<div class="col-xs-4">
							G.231.16.0023
						</div>
					</div>
				</form>
			</div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="bootstrap/js/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>