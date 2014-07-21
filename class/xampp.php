<?php
include('config.php');
class XamppDomainAdder
{
    
    
    function scrapeHost($fileLocation, $from)
    {
        $getContentFile = file_get_contents($fileLocation);
        $arr            = explode("\n", $getContentFile);
        $arrCount       = count($arr);
        
        for ($x = 0; $x <= $from; $x++) {
            unset($arr[$x]);
        }
        return $arr;
    }
    
    
    
    function addHost($hostfileLocation, $vhostFileLocation, $ip, $domainName, $DocumentRoot, $ServerName)
    {
        
        $hostFileCurrent = file_get_contents($hostfileLocation);
        // Append a new person to the file
        $hostFileCurrent .= "\r\n" . $ip . " " . $domainName . "\n";
        // Write the contents back to the file
        file_put_contents($hostfileLocation, $hostFileCurrent);
        
        $vhostFileCurrent = file_get_contents($vhostFileLocation);
        // Append a new person to the file
        //$vhostFileCurrent .= "\r\n".$ip." ".$domainName."\n";
        // Write the contents back to the file
        
        $file    = $vhostFileLocation;
        // Open the file to get existing content
        $current = file_get_contents($file);
        // Append a new person to the file
        $endline = "\n";
        $current .= '' . $endline . '<VirtualHost *:80>
        ServerAdmin webmaster@dummy-host2.example.com
        DocumentRoot "' . $DocumentRoot . '/' . $ServerName . '"
        ServerName ' . $ServerName . '
        ##ErrorLog "logs/dummy-host2.example.com-error.log"
        ##CustomLog "logs/dummy-host2.example.com-access.log" common
    </VirtualHost>';
        // Write the contents back to the file
        file_put_contents($file, $current);
        $backslash = '\\';
        $cmd       = 'mkdir ' . $DocumentRoot . '' . $backslash . '' . $ServerName . '';
        $output    = shell_exec('' . $cmd . '');
        
        $myfile = fopen("restartApache.bat", "w") or die("Unable to open file!");
        $txt = 'net stop apache2.4 & net start apache2.4';
        fwrite($myfile, $txt);
        fclose($myfile);        
    }
    
    
}


/**
$xampp = new XamppDomainAdder;
$HostfileLocation = 'C:\Windows\System32\drivers\etc\hosts';
$hostfile = $xampp->scrapeHost($fileLocation,20);
var_dump($hostfile);

$addHost = $xampp->addHost($hostfileLocation,$vhostFileLocation,$ip,$domainName);
**/





?>