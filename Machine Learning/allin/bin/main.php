
<?php
require("core.php");
$kata = ",";
if (isset($_POST['excute']))
{
	if(strpos($_POST['nilaix'], $kata) && strpos($_POST['nilaiy'], $kata) != false)
	{
		$to = $_POST['menuju'];
		$x = explode(",",$_POST['nilaix']);
		$y = explode(",",$_POST['nilaiy']);
		$n = sizeof($y);
		$sin = new Core($x, $y, $to);
		$cos = new Phase1($x, $y);
		$x2 = $sin->Regresi_Linear_1();
		$y2 = $sin->Regresi_Linear_2();
		$xy = $sin->Regresi_Linear_3();
	}
	else
	{
		header("refresh:5;url=../index.php");
		exit("Penulisan Input Salah Akan<br>Akan Kembali Ke Home Dalam 5 Detik");
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="config.css">
</head>
<body>
	<h2>Prediksi Data</h2>
	<h2>Tabel Kebenaran</h2>
	<table class="table1">
		<tr>
			<th>NO</th>
			<th>X</th>
			<th>Y</th>
			<th>X2</th>
			<th>Y2</th>
			<th>XY</th>
		</tr>
		<?php for($i=0; $i<$n; $i++):?>
		<tr>
			<td><?php echo $i+1;?></td>
			<td><?php echo $x[$i];?></td>
			<td><?php echo $y[$i];?></td>
			<td><?php echo $x2[$i];?></td>
			<td><?php echo $y2[$i];?></td>
			<td><?php echo $xy[$i];?></td>
		</tr>
		<?php endfor; ?>
	</table>		
</body>
</html>

<?php
echo "<h1>Hasil Prediksi : <br></h1>";
echo "Jika Nilai X=".$to."<br>";
echo "=> Maka Nilai Y=".$sin->Prediksi();
?>