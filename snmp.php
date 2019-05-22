<?php
echo("**** Part 1 *** <br>");
#define NO_ZEROLENGTH_COMMUNITY 1


$ip = "localhost";


print("<br>-------------------------Part 1 (a)-------------------------------------------------<br>");
$a=snmp2_walk($ip, "public", ".1.3.6.1.2.1.1.1" ) ;
$b=snmp2_walk($ip, "public", ".1.3.6.1.2.1.1.2" );
$c=snmp2_walk($ip, "public", ".1.3.6.1.2.1.1.3" );
$d=snmp2_walk($ip, "public", ".1.3.6.1.2.1.1.4" );
$e=snmp2_walk($ip, "public", ".1.3.6.1.2.1.1.5" );
$f=snmp2_walk($ip, "public", ".1.3.6.1.2.1.1.6" ) ;
$g=snmp2_walk($ip, "public", ".1.3.6.1.2.1.1.7" );

echo"<table border='1' style='border-collapse: collapse'>";
echo "<tr> <th>System Group Element</th> <th>Value</th>";
echo "<tr> <td>System Description:</td><td>$a[0]</td>";
echo "<tr> <td>System Object ID:</td><td>$b[0]</td>";
echo "<tr> <td>Uptime:</td><td>$c[0]</td>";
echo "<tr> <td>System Contact:</td><td>$d[0]</td>";
echo "<tr> <td>Name:</td><td>$e[0]</td>";
echo "<tr> <td>System Location:</td><td>$f[0]</td>";
echo "<tr> <td>System Service:</td><td>$g[0]</td>";
echo"</table>";

print("<br>-------------------------Part 1 (b)--------------------------------------------------<br>");

print("<br>---- IP Addresses table----<b>");

$d = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.20.1.1");
$a = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.20.1.2");
$b = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.20.1.3");
$c = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.20.1.4");
$e = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.20.1.5");

$i =0;
echo"<table border=1 style='border-collapse: collapse'>";
echo "<tr> <td > IP Entry Address  </td><td> IPAD IfIndex </td> <td > IP Net Mask  </td>
<td> IP Broadcast Address  </td><td> IP Reassemble Max Size   </td>  </tr>";
foreach ($a as $k=>$val) {
    echo "<tr> <td> $d[$i] </td><td> $a[$i] </td> <td> $b[$i] </td><td> $c[$i] </td><td> $e[$i] </td> </tr>";
    $i++;
}
echo"</table>";


print("<br>---- IP Route table----<b>");

$d = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.21.1.1");
$a = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.21.1.2");
$b = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.21.1.3");
$c = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.21.1.4");
$e = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.21.1.5");
$f = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.21.1.6");
$g = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.21.1.7");
$h = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.21.1.8");
$n = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.21.1.9");
$j = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.21.1.10");
$k = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.21.1.11");
$l = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.21.1.12");
$m = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.21.1.13");

$i =0;
echo"<table border=1 style='border-collapse: collapse'>";
echo "<tr> 
<td > IP Route Destination</td>
<td> IP Route IfIndex </td> 
<td > IP Route Metric1</td>
<td> IP Route Metric2 </td>
<td> IP Route Metric3 </td>
<td> IP Route Metric4 </td>
<td> IP Route NextHop </td>
<td> IP Route Type    </td>
<td> IP Route Protocol   </td>
<td> IP Route Age     </td>
<td> IP Route Mask    </td>
<td> IP Route Metric5 </td>
<td> IP Route Information    </td> </tr>";
foreach ($a as $k=>$val) {
    echo "<tr>
 <td> $d[$i] </td><td> $a[$i] </td> <td> $b[$i] </td><td> $c[$i] </td><td> $e[$i] </td><td> $f[$i] </td>
 <td> $g[$i] </td><td> $h[$i] </td><td> $n[$i] </td><td> $j[$i] </td><td> $k[$i] </td><td> $l[$i] </td>
 <td> $m[$i] </td> </tr>";
    $i++;
}
echo"</table>";


print("<br>----(ARP)IPNetToMedia table----<b>");

$d = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.1");
$a = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.2");
$b = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.3");
$c = snmp2_walk($ip, "public", ".1.3.6.1.2.1.4.22.1.4");

$i =0;
echo"<table border=1 style='border-collapse: collapse'   >";
echo "<tr> <td > IP Net to Media IfIndex  </td><td> IP Net to Media PhysAddress  </td> <td > IP Net to Media NetAddress  </td><td> IP Net to Media Type  </td>  </tr>";
foreach ($a as $k=>$val) {
    echo "<tr> <td> $d[$i] </td><td> $a[$i] </td> <td> $b[$i] </td><td> $c[$i] </td>  </tr>";

    $i++;
}
echo"</table> <br>";
print("<br>-------------------------Part 1 (c)--------------------------------------------------<br>");

print("<br>---- TCP Connection Table----<br>");
//1.3.6.1.2.1.6.13.1.1 - tcpConnState
//1.3.6.1.2.1.6.13.1.2 - tcpConnLocalAddress
//1.3.6.1.2.1.6.13.1.3 - tcpConnLocalPort
//1.3.6.1.2.1.6.13.1.4 - tcpConnRemAddress
//1.3.6.1.2.1.6.13.1.5 - tcpConnRemPort
$d = snmp2_walk($ip, "public", ".1.3.6.1.2.1.6.13.1.1");
$a = snmp2_walk($ip, "public", ".1.3.6.1.2.1.6.13.1.2");
$b = snmp2_walk($ip, "public", ".1.3.6.1.2.1.6.13.1.3");
$c = snmp2_walk($ip, "public", ".1.3.6.1.2.1.6.13.1.4");
$e = snmp2_walk($ip, "public", ".1.3.6.1.2.1.6.13.1.5");
echo"<table border =1 style ='border-collapse;'>";
echo"<tr> <td>TCP Connection State</td><td>TCP Connection Address</td> <td>TCP Connection Port</td> <td>TCP Connection Remote Address</td> 
<td>TCP Connection Remote Port</td>";
$i=0;
foreach ($a as $k=>$val) {
    echo "<tr> <td> $d[$i] </td><td> $a[$i] </td> <td> $b[$i] </td><td> $c[$i] </td> <td> $e[$i] </td> </tr>";

    $i++;
}
echo"</table> <br><br>";
print snmp2_get($ip,"public",".1.3.6.1.2.1.1.1.0"). "<br>";
