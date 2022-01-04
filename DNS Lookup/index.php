<?php
if(isset($_POST["lookup"])){
    $data_input = htmlspecialchars($_POST["input"]);
    $DNS_A = dns_get_record($data_input,DNS_A);
    $DNS_AAAA = dns_get_record($data_input,DNS_AAAA);
    $DNS_CNAME = dns_get_record($data_input,DNS_CNAME);
    $DNS_MX = dns_get_record($data_input,DNS_MX);
    $DNS_NS = dns_get_record($data_input,DNS_NS);
    $DNS_TXT = dns_get_record($data_input,DNS_TXT);
}
?>
<form action="" method="post" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td>Masukan DNS</td>
                                        <td> : </td>
                                        <td>
                                            <input type="text" name="input" id="nilai" placeholder="mikdevind.my.id" required/>
                                            <div class="garis"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <center>
                                                <button type="submit" name="lookup" id="buttonn">Look Up</button>
                                            </center></td>
                                    </tr>
                                </table>
                            </form>
<?php if (isset($_POST["lookup"])){?>
                                <div class="dns-a">
                                    <div class="header-output">
                                        <p>A</p>
                                        <div class="garis"></div>
                                    </div>
                                    <div class="isi-output">
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <th>Type</th>
                                                <th>Domain Name</th>
                                                <th>TTL</th>
                                                <th>Address</th>
                                            </tr>
                                            <?php if($DNS_A != null){foreach($DNS_A as $output_A){?>
                                            <tr>
                                                <td><?= $output_A["type"]?></td>
                                                <td><?= $output_A["host"]?></td>
                                                <td><?= $output_A["ttl"]?></td>
                                                <td><?= $output_A["ip"]?></td>
                                            </tr>
                                            <?php }}else{?>
                                            <tr>
                                                <td colspan="4">
                                                    <center>
                                                        <p>Sorry no record found!</p>
                                                    </center>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </table>
                                    </div>
                                </div>
                                <div class="dns-ns">
                                    <div class="header-output">
                                        <p>CNAME</p>
                                        <div class="garis"></div>
                                    </div>
                                    <div class="isi-output">
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <th>Type</th>
                                                <th>Domain Name</th>
                                                <th>TTL</th>
                                                <th>Cononical Name</th>
                                            </tr>
                                            <?php if($DNS_CNAME != null){foreach($DNS_CNAME as $output_CNAME){?>
                                                <td><?= $output_CNAME["type"]?></td>
                                                <td><?= $output_CNAME["host"]?></td>
                                                <td><?= $output_CNAME["ttl"]?></td>
                                                <td><?= $output_CNAME["target"]?></td>
                                            </tr>
                                            <?php }}else{?>
                                            <tr>
                                                <td colspan="4">
                                                    <center>
                                                        <p>Sorry no record found!</p>
                                                    </center>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </table>
                                    </div>
                                </div>
                                <div class="dns-aaaa">
                                    <div class="header-output">
                                        <p>AAAA</p>
                                        <div class="garis"></div>
                                    </div>
                                    <div class="isi-output">
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <th>Type</th>
                                                <th>Domain Name</th>
                                                <th>TTL</th>
                                                <th>Address</th>
                                            </tr>
                                            <?php if($DNS_AAAA != null){foreach($DNS_AAAA as $output_AAAA){?>
                                                <td><?= $output_AAAA["type"]?></td>
                                                <td><?= $output_AAAA["host"]?></td>
                                                <td><?= $output_AAAA["ttl"]?></td>
                                                <td><?= $output_AAAA["ipv6"]?></td>
                                            </tr>
                                            <?php }}else{?>
                                            <tr>
                                                <td colspan="4">
                                                    <center>
                                                        <p>Sorry no record found!</p>
                                                    </center>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </table>
                                    </div>
                                </div>
                                <div class="dns-mx">
                                    <div class="header-output">
                                        <p>MX</p>
                                        <div class="garis"></div>
                                    </div>
                                    <div class="isi-output">
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <th>Type</th>
                                                <th>Domain Name</th>
                                                <th>TTL</th>
                                                <th>Preference</th>
                                                <th>Address</th>
                                            </tr>
                                            <?php if($DNS_MX != null){foreach($DNS_MX as $output_MX){?>
                                                <td><?= $output_MX["type"]?></td>
                                                <td><?= $output_MX["host"]?></td>
                                                <td><?= $output_MX["ttl"]?></td>
                                                <td><?= $output_MX["pri"]?></td>
                                                <td><?= $output_MX["target"]?></td>
                                            </tr>
                                            <?php }}else{?>
                                            <tr>
                                                <td colspan="5">
                                                    <center>
                                                        <p>Sorry no record found!</p>
                                                    </center>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </table>
                                    </div>
                                </div>
                                <div class="dns-ns">
                                    <div class="header-output">
                                        <p>NS</p>
                                        <div class="garis"></div>
                                    </div>
                                    <div class="isi-output">
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <th>Type</th>
                                                <th>Domain Name</th>
                                                <th>TTL</th>
                                                <th>Cononical Name</th>
                                            </tr>
                                            <?php if($DNS_NS != null){foreach($DNS_NS as $output_NS){?>
                                                <td><?= $output_NS["type"]?></td>
                                                <td><?= $output_NS["host"]?></td>
                                                <td><?= $output_NS["ttl"]?></td>
                                                <td><?= $output_NS["target"]?></td>
                                            </tr>
                                            <?php }}else{?>
                                            <tr>
                                                <td colspan="4">
                                                    <center>
                                                        <p>Sorry no record found!</p>
                                                    </center>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </table>
                                    </div>
                                </div>
                                <div class="dns-txt">
                                    <div class="header-output">
                                        <p>TXT</p>
                                        <div class="garis"></div>
                                    </div>
                                    <div class="isi-output">
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <th>Type</th>
                                                <th>Domain Name</th>
                                                <th>TTL</th>
                                                <th>Record</th>
                                            </tr>
                                            <?php if($DNS_TXT != null){foreach($DNS_TXT as $output_TXT){?>
                                                <td><?= $output_TXT["type"]?></td>
                                                <td><?= $output_TXT["host"]?></td>
                                                <td><?= $output_TXT["ttl"]?></td>
                                                <td><?= $output_TXT["txt"]?></td>
                                            </tr>
                                            <?php }}else{?>
                                            <tr>
                                                <td colspan="4">
                                                    <center>
                                                        <p>Sorry no record found!</p>
                                                    </center>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </table>
                                    </div>
                                </div>
                                <?php } ?>
