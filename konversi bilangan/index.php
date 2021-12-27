<?php
if (isset($_POST["convert"])) {
    $input = $_POST["input"];
    $input = htmlspecialchars($input);
    if ($_POST["awal"] == "bin") {
       if ($_POST["akhir"] == "oct") {
           $hasil = bindec($input);
           $output = decoct($hasil);
           $output = $output . "<SUB>8</SUB>";
       }elseif ($_POST["akhir"] == "hex") {
           $hasil = bindec($input);
           $output = dechex($hasil);
           $output = $output . "<SUB>16</SUB>";
       }elseif ($_POST["akhir"] == "dec") {
           $output = bindec($input);
           $output = $output . "<SUB>10</SUB>";
       }elseif ($_POST["akhir"] == "text") {
           $output = bin2string($input);
       }else{
        $output = $input . "<SUB>2</SUB>";
       }
       
       $input = $input . "<SUB>2</SUB>";
    }elseif ($_POST["awal"] == "oct") {
       if ($_POST["akhir"] == "bin") {
           $hasil = octdec($input);
           $output = decbin($hasil);
           $output = $output . "<SUB>2</SUB>";
       }elseif ($_POST["akhir"] == "hex") {
           $hasil = octdec($input);
           $output = dechex($hasil);
           $output = $output . "<SUB>16</SUB>";
       }elseif ($_POST["akhir"] == "dec") {
           $output = octdec($input);
           $output = $output . "<SUB>10</SUB>";
       }elseif ($_POST["akhir"] == "text") {
           $output = oct2string($input);
       }else{
        $output = $input . "<SUB>8</SUB>";
       }
       
       $input = $input . "<SUB>8</SUB>";
    }elseif ($_POST["awal"] == "hex") {
       if ($_POST["akhir"] == "bin") {
           $hasil = hexdec($input);
           $output = decbin($hasil);
           $output = $output . "<SUB>2</SUB>";
       }elseif ($_POST["akhir"] == "oct") {
           $hasil = hexdec($input);
           $output = decoct($hasil);
           $output = $output . "<SUB>8</SUB>";
       }elseif ($_POST["akhir"] == "dec") {
           $output = hexdec($input);
           $output = $output . "<SUB>10</SUB>";
       }elseif ($_POST["akhir"] == "text") {
           $output = hex2string($input);
       }else{
        $output = $input . "<SUB>16</SUB>";
       }
       
       $input = $input . "<SUB>16</SUB>";
    }
    elseif ($_POST["awal"] == "dec") {
       if ($_POST["akhir"] == "bin") {
           $output = decbin($input);
           $output = $output . "<SUB>2</SUB>";
        }elseif ($_POST["akhir"] == "oct") {   
           $output = decoct($input);
           $output = $output . "<SUB>8</SUB>";
       }elseif ($_POST["akhir"] == "hex") {
           $output = dechex($input);
           $output = $output . "<SUB>16</SUB>";
       }elseif ($_POST["akhir"] == "text") {
           $output = dec2string($input);
       }else{
        $output = $input . "<SUB>10</SUB>";
       }
       
       $input = $input . "<SUB>10</SUB>";
    }
    elseif ($_POST["awal"] == "text") {
       if ($_POST["akhir"] == "bin") {
           $output = string2bin($input);
           $output = $output . "<SUB>2</SUB>";
         }elseif ($_POST["akhir"] == "oct") {
           $output = string2oct($input);
           $output = $output . "<SUB>8</SUB>";
         }elseif ($_POST["akhir"] == "hex") {
           $output = string2hex($input);
           $output = $output . "<SUB>16</SUB>";
         }elseif ($_POST["akhir"] == "dec") {
           $output = string2dec($input);
           $output = $output . "<SUB>10</SUB>";
         }else {
          
          $output = $input;
         }
    }
}
?>
<form action="" method="post">
  <input type="text" name="input" id="nilai" value="11" required/>
  <select id="awal"name="awal" >
    <option value="bin">biner</option>
    <option value="oct">oktal</option>
    <option value="hex">hexadesimal</option>
    <option value="dec" selected>desimal</option>
    <option value="text">text</option>
  </select>
  <p id="to">To</p>
  <select id="akhir" name="akhir">
    <option value="bin" selected>biner</option>
    <option value="oct">oktal</option>
    <option value="hex">hexadesimal</option>
    <option value="dec">desimal</option>
    <option value="text">text</option>
  </select>
  <button type="submit" name="convert" id="buttonn">convert</button>
</form>
<p><strong><p>Hasil :</p></strong></p><br>
<div class="hasil">
  <?php if (isset($_POST["convert"])){?>
  <table>
    <tr>
      <td>Input</td>
      <td> : </td>
      <td><?= $input?></td>
    </tr>
    <tr>
      <td>Output</td>
      <td> : </td>
      <td><?= $output?></td>
    </tr>
  </table>
  <?php } ?>
</div>
