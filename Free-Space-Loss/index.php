
<?php
if (isset($_POST["konversi"])) {
    $jarak = htmlspecialchars($_POST["jarak"]);
    $frekuensi = htmlspecialchars($_POST["frekuensi"]);
    $aksi = htmlspecialchars($_POST["aksi"]);
	if($aksi == "m2db"){
        $hasil = 20*log10($frekuensi)+20*log10($jarak)+36.6;
        $hasil = $hasil . " dB";
        $jarak = $jarak . " Miles";
        $frekuensi = $frekuensi . " MHz";
    }elseif($aksi == "km2db"){
        $jarak2 = $jarak / 1.609344;
        $hasil = 20*log10($frekuensi)+20*log10($jarak2)+36.6;
        $hasil = $hasil . " dB";
        $jarak = $jarak . " KM";
        $frekuensi = $frekuensi . " MHz";
    }

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
                                        <td>Masukkan Jarak </td>
                                        <td> : </td>
                                        <td>
                                            <input class="input" name="jarak" type="number" step="any" required/>
                                            <div class="garis"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Masukkan Frekuensi </td>
                                        <td> : </td>
                                        <td>
                                            <input class="input" name="frekuensi" type="number" step="any" value="2400" required/>
                                            <div class="satuan">MHz</div>
                                            <div class="garis"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Aksi </td>
                                        <td> : </td>
                                        <td>
                                            <select id="akhir" name="aksi">
                                                <option value="m2db" selected>Miles ke dB</option>
                                                <option value="km2db">KM ke dB</option>
                                            </select>
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
                                        <td>Jarak</td>
                                        <td> : </td>
                                        <td><?= $jarak?></td>
                                    </tr>
                                    <tr>
                                        <td>Frekuensi</td>
                                        <td> : </td>
                                        <td><?= $frekuensi?></td>
                                    </tr>
                                    <tr>
                                        <td>Free Space Loss</td>
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
