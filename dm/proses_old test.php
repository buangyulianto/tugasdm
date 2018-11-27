<html>
<a href="./">kembali</a></br>
<?php
$pyes = 0.642857143;
$pno = 0.357142857;

$age = $_POST['age'];
$income = $_POST['income'];
$student = $_POST['student'];
$cr = $_POST['cr'];

if($age == 'youth'){
	$ageyes = 0.222;
	$ageno = 0.6;
}elseif($age == 'ma'){
	$ageyes = 0.444;
	$ageno = 0;
}else{
	$ageyes = 0.333;
	$ageno = 0.4;
};

if($income == 'low'){
	$incomeyes = 0.333;
	$incomeno = 0.2;
}elseif($income == 'medium'){
	$incomeyes = 0.444;
	$incomeno = 0.4;
}else{
	$incomeyes = 0.222;
	$incomeno = 0.4;
};

if($student == 'yes'){
	$studentyes = 0.667;
	$studentno = 0.2;
}else{
	$studentyes = 0.333;
	$studentno = 0.8;
};

if($cr == 'fair'){
	$cryes = 0.667;
	$crno = 0.4;
}else{
	$cryes = 0.333;
	$crno = 0.6;
};

//print_r ($age);
$buyyes = ($ageyes*$incomeyes*$studentyes*$cryes)*$pyes;
$buyno = ($ageno*$incomeno*$studentno*$crno)*$pno;

if ($buyyes > $buyno){
	$kesimpulan = "Membeli komputer";
}else{
	$kesimpulan = "TIDAK membeli komputer";
};
?>
Skor Yes = <?php echo $buyyes;?></br>
Skor No = <?php echo $buyno;?></br>
<h2>Kesimpulan: <?php echo $kesimpulan; ?></h2>
</html>