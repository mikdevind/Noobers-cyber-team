
<?php
require("bin/core.php");

$x = array(24,22,21,20,22,19,20,23,24,25,21,20,20,19,25,27,28,25,26,24,27,23,24,23,22,21,26,25,26,27);
$y = array(10,5,6,3,6,4,5,9,11,13,7,4,6,3,12,13,16,12,14,12,16,9,13,11,7,5,12,11,13,14);
$n = sizeof($y);

$sin = new Core($x, $y, 50);
$cos = new Phase1($x, $y);

echo "<br>Rata - Rata X		 : ".$cos->mean($x);
echo "<br>Rata - Rata Y		 : ".$cos->mean($y);

echo "<br>Regresi Linear (C) : ".$sin->Regresi_Linear_C();
echo "<br>Regresi Linear (R) : ".$sin->Regresi_Linear_R();
echo "<br>Hasil Predisksi 	 : ".$sin->Prediksi();

?>

<html>
	<body>

		<table>
			<tr>
				<td>NO</td>
				<td>X</td>
				<td>Y</td>>
			</tr>
		<?php for($i=0; $i<$n; $i++):?>
		<tr>
			<td><?php echo $i+1;?></td>
			<td><?php echo $x[$i];?></td>
			<td><?php echo $y[$i];?></td>
			
		</tr>
		<?php endfor; ?>
		</table>
	</body>
</html>