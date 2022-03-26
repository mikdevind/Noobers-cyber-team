
<?php
if (isset($_POST["konversi"])) {
    $daya = htmlspecialchars($_POST["daya"]);
    $penguatan = htmlspecialchars($_POST["penguatan"]);
    $hasil = $daya + $penguatan;
    $hasil = $hasil . " dBm";
    $daya = $daya . " dBm";
    $penguatan = $penguatan . " dBd";

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
                                        <td>Daya di Input Antenna</td>
                                        <td> : </td>
                                        <td>
                                            <input class="input" name="daya" type="number" step="any" required/>
                                            <div class="satuan">dBm</div>
                                            <div class="garis"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Penguatan Antenna</td>
                                        <td> : </td>
                                        <td>
                                            <input class="input" name="penguatan" type="number" step="any" required/>
                                            <div class="satuan">dBd</div>
                                            <div class="garis"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <center>
                                                <button type="submit" name="konversi" class="button">Konversi</button>
                                            </center>
                                        </td>
                                    </tr>

                                </table>
                            </form>
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
                                <?php if (isset($_POST["konversi"])){?>
                                <table>
                                    <tr>
                                        <td>daya di input antenna</td>
                                        <td> : </td>
                                        <td><?= $daya?></td>
                                    </tr>
                                    <tr>
                                        <td>penguatan antenna</td>
                                        <td> : </td>
                                        <td><?= $penguatan?></td>
                                    </tr>
                                    <tr>
                                        <td>Fresnel Zone Clearence</td>
                                        <td> : </td>
                                        <td><?= $hasil?></td>
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
