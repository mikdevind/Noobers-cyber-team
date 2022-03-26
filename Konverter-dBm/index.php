
<?php
if (isset($_POST["konversi"])) {
    $input = htmlspecialchars($_POST["input"]);
    $aksi = htmlspecialchars($_POST["aksi"]);
	if($aksi == "watt2dbm"){
        $hasil = 10 * log($input) + 30;
        $hasil = $hasil . "dBm";
        $input = $input . "Watt";
    }elseif($aksi == "mwatt2dbm"){
        $input1 = $input / 1000;
        $hasil = 10 * log($input1) + 30;
        $hasil = $hasil . "dBm";
        $input = $input . "mWatt";
    }elseif($aksi == "dbm2watt"){
        $input1 = $input - 30;
        $input1 = $input1 / 10;
        $hasil = pow(10, $input1);
        $hasil = $hasil . "Watt";
        $input = $input . "dBm";
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
                                        <td>Masukkan Data </td>
                                        <td> : </td>
                                        <td>
                                            <input class="input" name="input" type="number" step="any" required/>
                                            <div class="garis"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Aksi </td>
                                        <td> : </td>
                                        <td>
                                            <select id="akhir" name="aksi">
                                                <option value="watt2dbm" selected>Watt ke dBm</option>
                                                <option value="mwatt2dbm">mWatt ke dBm</option>
                                                <option value="dbm2watt">dBm ke Watt</option>
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
                                        <td>Input</td>
                                        <td> : </td>
                                        <td><?= $input?></td>
                                    </tr>
                                    <tr>
                                        <td>Output</td>
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
