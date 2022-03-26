
<?php
if (isset($_POST["konversi"])) {
    $Hb = htmlspecialchars($_POST["hb"]);
    $Hr = htmlspecialchars($_POST["hr"]);
    $nilai_satuan = htmlspecialchars($_POST["nilai-satuan"]);
    $satuan = htmlspecialchars($_POST["satuan"]);
    if ($satuan == "jarak") {
        $hasil = atan(( $Hb - $Hr ) / ( $nilai_satuan * 5280 ));
        $hasil = $hasil . "radian";
        $input = $nilai_satuan . "Km";
    }else{
        $hasil = (( $Hb - $Hr ) / tan($nilai_satuan) ) / 5280;
        $hasil = $hasil . "Km";
        $input = $nilai_satuan . "radian";
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
                                        <td>ketinggian dari antenna base station</td>
                                        <td> : </td>
                                        <td>
                                            <input class="input" name="hb" type="number" required/>
                                            <div class="satuan">M</div>
                                            <div class="garis"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ketinggian dari antenna penerima</td>
                                        <td> : </td>
                                        <td>
                                            <input class="input" name="hr" type="number" step="any" required/>
                                            <div class="satuan">M</div>
                                            <div class="garis"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jarak / Sudut</td>
                                        <td> : </td>
                                        <td>
                                            <input class="input" name="nilai-satuan" type="number" step="any" required/>
                                            <div class="satuan">
                                                <select id="akhir" name="satuan" class="aksi">
                                                    <option value="jarak" selected>Km</option>
                                                    <option value="sudut">radian</option>
                                                </select>
                                            </div>
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
                                        <td>ketinggian dari antenna base station</td>
                                        <td> : </td>
                                        <td><?= $Hb?></td>
                                    </tr>
                                    <tr>
                                        <td>ketinggian dari antenna penerima</td>
                                        <td> : </td>
                                        <td><?= $Hr?></td>
                                    </tr>
                                    <tr>
                                        <td>Jarak / Sudut input</td>
                                        <td> : </td>
                                        <td><?= $input?></td>
                                    </tr>
                                    <tr>
                                        <td>Jarak / sudut output</td>
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
