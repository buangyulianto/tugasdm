<html>
<a href="./">kembali</a></br>
<?php
$pyes = 0.714285714;
$pno = 0.285714286;

$age = $_POST['age'];
$income = $_POST['income'];
$student = $_POST['student'];
$cr = $_POST['cr'];

if($age == 'youth'){
	$ageyes = 0.2;
	$ageno = 0.75;
}elseif($age == 'ma'){
	$ageyes = 0.4;
	$ageno = 0;
}else{
	$ageyes = 0.4;
	$ageno = 0.25;
};

if($income == 'low'){
	$incomeyes = 0.3;
	$incomeno = 0;
}elseif($income == 'medium'){
	$incomeyes = 0.4;
	$incomeno = 0.5;
}else{
	$incomeyes = 0.2;
	$incomeno = 0.5;
};

if($student == 'yes'){
	$studentyes = 0.7;
	$studentno = 0;
}else{
	$studentyes = 0.3;
	$studentno = 1;
};

if($cr == 'fair'){
	$cryes = 0.6;
	$crno = 0.5;
}else{
	$cryes = 0.4;
	$crno = 0.5;
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
