
<?php
if (isset($_POST["prediksi"])) {
    $xinput = htmlspecialchars($_POST["x"]);
    $yinput = htmlspecialchars($_POST["y"]);
    $X = floatval(htmlspecialchars($_POST["X"]));
    error_reporting(0);
    $xexplode = explode(";", $xinput);
    $yexplode = explode(";", $yinput);
    $n = count($xexplode);
    $jumx= 0;
    $jumy= 0;
    $jumx2= 0;
    $jumy2= 0;
    $jumxy= 0;
    for ($i=0; $i < $n; $i++) { 
      $x = floatval($xexplode[$i]);
      $y = floatval($yexplode[$i]);
      $x2 = $x * $x;
      $y2 = $y * $y;
      $xy = $x * $y;
      $jumx = $jumx + $x;
      $jumy = $jumy + $y;
      $jumx2 = $jumx2 + $x2;
      $jumy2 = $jumy2 + $y2;
      $jumxy = $jumxy + $xy;
    }
    $b =(($n * $jumxy) - ($jumx * $jumy)) / (($n * $jumx2) - ($jumx * $jumx));
    $a = ($jumy - ($b * $jumx)) / $n;
    $Y = $a + ($b * $X);
    $r = (($n *$jumxy) - ($jumx * $jumy)) / (sqrt((($n * $jumx2)- ($jumx * $jumx))*(($n * $jumy2)-($jumy * $jumy))));
    $persentase = str_replace("-", "", intval(($r / 1) * 100));
} 

?>
<!DOCTYPE html>
<html>
<head>
  <title>MIKDevInd</title>
</head>
<body>
            <center>
                <div class="input">
                    <div class="header">
                        <div class="judul">
                            <p>Input</p>
                        </div>
                    </div>
                    <div class="garis"></div>
                    <div class="isi">
                        <center>
                            <?php if(isset($error)){?>
                            <p class="error"><?= $error?></p>
                            <?php }?>
                            <form method="post" action="">
                                <table border="0" cellspacing="0" cellpadding="5">
                                    <tr>
                                        <td>Variabel prediktor/label (x) </td>
                                        <td> : </td>
                                        <td>
                                            <input class="input" name="x" type="text" <?php if (isset($_POST["prediksi"])) {
                                              echo 'value="'. htmlspecialchars($_POST["x"]).'"';} ?> required/>
                                            <div class="garis"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Variabel pkriterium/nilai (y) </td>
                                        <td> : </td>
                                        <td>
                                            <input class="input" name="y" type="text" <?php if (isset($_POST["prediksi"])) {
                                              echo 'value="'.htmlspecialchars($_POST["y"]).'"';} ?> required/>
                                            <div class="garis"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nilai variabel prediktor yang ingin di prediksi</td>
                                        <td> : </td>
                                        <td>
                                            <input class="input" name="X" type="text" <?php if (isset($_POST["prediksi"])) {
                                              echo 'value="'.htmlspecialchars($_POST["X"]).'"';} ?> required/>
                                            <div class="garis"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <center>
                                                <button type="submit" name="prediksi" class="button">Prediksi</button>
                                            </center>
                                        </td>
                                    </tr>

                                </table>
                            </form>
                            <div class="catatan" style="text-align: left; list-style: inside; margin-top: 10px;">
                              <p><b>NB :</b></p>
                              <ul>
                                <li>Cara penulisan datanya adalah data1;data2;data3;data4.</li>
                                <li>Jumlah data Variabel prediktor/label (x) dan Variabel pkriterium/nilai (y) harus sama.</li>
                                <li>Untuk penulisan koma digantikan dengan titik, contohnya 1.2.</li>
                              </ul>
                            </div>
                        </center>
                    </div>
                </div>
                <div class="output">
                    <div class="header">
                        <div class="judul">
                            <p>Output</p>
                        </div>
                    </div>
                    <div class="garis"></div>
                    <div class="isi">
                        <center>
                            <p><strong><p>Hasil :</p></strong></p><br>
                            <div class="hasil">
                                <?php if (isset($_POST["prediksi"])){?>
                                <table>
                                    <tr>
                                        <td>Variabel prediktor/label (x)</td>
                                        <td> : </td>
                                        <td><?= $xinput?></td>
                                    </tr>
                                    <tr>
                                        <td>Variabel pkriterium/nilai (y)</td>
                                        <td> : </td>
                                        <td><?= $yinput?></td>
                                    </tr>
                                    <tr>
                                        <td>Nilai variabel prediktor yang ingin di prediksi</td>
                                        <td> : </td>
                                        <td><?= $X?></td>
                                    </tr>
                                    <tr>
                                        <td>Hasil prediksi</td>
                                        <td> : </td>
                                        <td><?= $Y?></td>
                                    </tr>
                                    <tr>
                                        <td>Koefesien</td>
                                        <td> : </td>
                                        <td><?= $r?></td>
                                    </tr>
                                    <tr>
                                        <td>Persentasi</td>
                                        <td> : </td>
                                        <td><?= $persentase . "%"?></td>
                                    </tr>

                                </table>
                                <?php } ?>
                            </div>
                        </center>
                    </div>
                </div>
            </center>
</body>
</html>
