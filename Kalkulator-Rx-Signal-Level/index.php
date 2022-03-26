
<?php

if (isset($_POST["konversi"])) {
    $tx_power = htmlspecialchars($_POST["tx-power"]);
    $tx_cable_loss = htmlspecialchars($_POST["tx-cable-loss"]);
    $tx_antenna_gain = htmlspecialchars($_POST["tx-antenna-gain"]);
    $free_space_loss = htmlspecialchars($_POST["free-space-loss"]);
    $rx_antenna_gain = htmlspecialchars($_POST["rx-antenna-gain"]);
    $rx_cable_loss = htmlspecialchars($_POST["rx-cable-loss"]);
    $hasil = $tx_power - $tx_cable_loss + $tx_antenna_gain - $free_space_loss + $rx_antenna_gain - $rx_cable_loss;
    $hasil = $hasil . " dBm";
    $tx_power  = $tx_power  . " dBm";
    $tx_cable_loss = $tx_cable_loss  . " dB";
    $tx_antenna_gain = $tx_antenna_gain  . " dB";
    $free_space_loss = $free_space_loss  . " dB";
    $rx_antenna_gain = $rx_antenna_gain  . " dB";
    $rx_cable_loss = $rx_cable_loss  . " dB";
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
                                        <td>Tx Power</td>
                                        <td> : </td>
                                        <td>
                                            <input class="input" name="tx-power" type="number" required/>
                                            <div class="satuan">dBm</div>
                                            <div class="garis"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tx Cable Loss</td>
                                        <td> : </td>
                                        <td>
                                            <input class="input" name="tx-cable-loss" type="number" step="any" required/>
                                            <div class="satuan">dB</div>
                                            <div class="garis"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tx Antenna Gain</td>
                                        <td> : </td>
                                        <td>
                                            <input class="input" name="tx-antenna-gain" type="number" step="any" required/>
                                            <div class="satuan">dB</div>
                                            <div class="garis"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Free Space Loss</td>
                                        <td> : </td>
                                        <td>
                                            <input class="input" name="free-space-loss" type="number" step="any" required/>
                                            <div class="satuan">dB</div>
                                            <div class="garis"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Rx Antenna Gain</td>
                                        <td> : </td>
                                        <td>
                                            <input class="input" name="rx-antenna-gain" type="number" step="any" required/>
                                            <div class="satuan">dB</div>
                                            <div class="garis"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Rx Cable Loss</td>
                                        <td> : </td>
                                        <td>
                                            <input class="input" name="rx-cable-loss" type="number" step="any" required/>
                                            <div class="satuan">dB</div>
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
                                        <td>Tx Power</td>
                                        <td> : </td>
                                        <td><?= $tx_power?></td>
                                    </tr>
                                    <tr>
                                        <td>Tx Cable Loss</td>
                                        <td> : </td>
                                        <td><?= $tx_cable_loss?></td>
                                    </tr>
                                    <tr>
                                        <td>Tx Antenna Gain</td>
                                        <td> : </td>
                                        <td><?= $tx_antenna_gain?></td>
                                    </tr>
                                    <tr>
                                        <td>Free Space Loss(FSL)</td>
                                        <td> : </td>
                                        <td><?= $free_space_loss?></td>
                                    </tr>
                                    <tr>
                                        <td>Rx Antenna Gain</td>
                                        <td> : </td>
                                        <td><?= $rx_antenna_gain?></td>
                                    </tr>
                                    <tr>
                                        <td>Rx Cable Loss</td>
                                        <td> : </td>
                                        <td><?= $rx_cable_loss?></td>
                                    </tr>
                                    <tr>
                                        <td>Rx Signal Level</td>
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
