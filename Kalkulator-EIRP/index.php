
<?php
if (isset($_POST["konversi"])) {
    $daya = htmlspecialchars($_POST["daya"]);
    $penguatan = htmlspecialchars($_POST["penguatan"]);
    $hasil = $daya + $penguatan;
    if($hasil <= 36){
        $status_legal_p2p = "Yes";
    } else{
        $status_legal_p2p = "No";
    }
    if($hasil <= 30){
        $status_legal_p2mp = "Yes";
    } else{
        $status_legal_p2mp = "No";
    }
    $hasil = $hasil . " dBm";
    $daya = $daya . " dBm";
    $penguatan = $penguatan . " dBi";

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
                                            <div class="satuan">dBi</div>
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
                                    <tr>
                                        <td>Status Legal P2P</td>
                                        <td> : </td>
                                        <td><?= $status_legal_p2p?></td>
                                    </tr>
                                    <tr>
                                        <td>Status Legal P2MP</td>
                                        <td> : </td>
                                        <td><?= $status_legal_p2mp?></td>
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
