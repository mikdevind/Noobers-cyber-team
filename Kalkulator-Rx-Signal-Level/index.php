
<?php
require '../../functions.php';
$ip_client = get_client_ip();
$browser = get_client_browser();
$device = get_client_device();
date_default_timezone_set("Asia/Jakarta");
$tanggal = date("Ymd");
$waktu   = time();
$pukul = date("H:i:s");

$nama_tools = preg_split('[/]', $_SERVER['REQUEST_URI']);
$nama_tools = $nama_tools[2];
$nama_tools_database = preg_replace("[-]", "_", $nama_tools);
$nama_tool = preg_replace("[-]", " ", $nama_tools);
$kata_judul_tools = preg_split('[ ]', $nama_tool);
$jumlah_judul_tools = count($kata_judul_tools);
$judul_tools = "";
for ($i=0; $i < $jumlah_judul_tools; $i++) { 
  $kata_judul_tool = ucfirst($kata_judul_tools[$i]); 
  $judul_tools = $judul_tools . " " . $kata_judul_tool;
 } 
$deskripsi_page =", Menghitung Fresnel Zone Clearence(FZC)";

$s = mysqli_query($koneksi, "SELECT * FROM statistik WHERE ip='$ip_client' AND tanggal='$tanggal'");
if(mysqli_num_rows($s) == 0){
  mysqli_query($koneksi, "INSERT INTO statistik(ip, device, browser, tanggal, online, $nama_tools_database, pukul) VALUES('$ip_client', '$device', '$browser', '$tanggal', '$waktu', '1',  '$pukul')");
}
 
else{
  mysqli_query($koneksi, "UPDATE statistik SET device='$device', browser='$browser', online='$waktu', $nama_tools_database=$nama_tools_database+1, pukul='$pukul' WHERE ip='$ip_client' AND tanggal='$tanggal'");
}
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
    $base64_converter_mysql = mysqli_query($koneksi, "SELECT * FROM tools WHERE nama = '$nama_tool'");
    
    $base64_converter = mysqli_fetch_assoc($base64_converter_mysql);
    $logo_base64_converter = str_replace(" ","-",$base64_converter["icon"]);
    $keterangan_base64_converter = json_decode($base64_converter["deskripsi"]);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
  <title>MIKDevInd | <?php echo $judul_tools ?></title>
  <script data-ad-client="ca-pub-5514455999077580" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <link rel="canonical" href="http://mikdevind.my.id" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:title" content="mikdevind" />
  <meta property="og:type" content="mikdevind" />
  <meta property="og:url" content="http://mikdevind.my.id" />
  <meta property="og:site_name" content="mikdevind" />
  <meta property="og:image" content="http://mikdevind.my.id/images/icon.png"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="../../script.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="../../style.css">
  <link rel="icon" href="../../images/icon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <meta content="<?= $keterangan_base64_converter[0] ?>" name="description">
  <Meta Content="mikdevind " Name="Keywords"/>
  <Meta Content="<?php echo $judul_tools ?>, mikdevind" Name="Keywords"/>
  <meta name="viewport" content="width=device-width" initial-scale="1.0">
  <style type="text/css">
    .error{
        color: #f00;
        font-weight: bold;
    }
    .satuan{
      display: inline-block;
    }
  </style>
</head>
<body>
    <?php include "../../navbar.php";?>
    <div class="konten">
        <div class="banner1">
            <div class="banner-center">
                <div class="icon">
                    <img src="/images/logo_tools/<?= $base64_converter['icon'] ?>" title="<?= $base64_converter['icon']?>">
                </div>
                <div class="keterangan">
                    <div class="keterangan-center">
                        <div class="judul">
                            <p><?= $base64_converter['nama']?></p>
                        </div>
                        <div class="isi-keterangan-1">
                            <p><?= $keterangan_base64_converter[0] ?></p>
                        </div>
                        <div class="isi-keterangan-2">
                            <p><?= $keterangan_base64_converter[1] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <center><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5514455999077580"
     crossorigin="anonymous"></script>
<!-- iklan display herizontal -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5514455999077580"
     data-ad-slot="5219629019"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script></center>
        <div class="isi-konten-tools">
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
        </div>
    </div>
    <center><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5514455999077580"
     crossorigin="anonymous"></script>
<!-- iklan display herizontal -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5514455999077580"
     data-ad-slot="5219629019"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script></center>
  </div>
  <?php include "../../foter.php";?>
</body>
</html>