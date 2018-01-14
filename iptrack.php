<li><a target="_blank" href="iplog.csv">View User's IP Address</a></li>

<?php
  // This program generates a web pages that gets 
  // the user's information, saves it to a file, 
  // and displays it on the web page.
  // Created by Mitchell Robinson.
  // 27 July, 2014.
  
  // Name of the ip address log.
  $outputWebBug = 'iplog.csv';

  // Get the ip address and info about client.
  @ $details = json_decode(file_get_contents("http://ipinfo.io/{$_SERVER['REMOTE_ADDR']}/json"));
  @ $hostname=gethostbyaddr($_SERVER['REMOTE_ADDR']);
  
  // Get the query string from the URL.
  $QUERY_STRING = preg_replace("%[^/a-zA-Z0-9@,_=]%", '', $_SERVER['QUERY_STRING']);
  
  // Write the ip address and info to file.
  @ $fileHandle = fopen($outputWebBug, "a");
  if ($fileHandle)
  {
    $string ='"'.$QUERY_STRING.'","' // everything after "?" in the URL
      .$_SERVER['REMOTE_ADDR'].'","' // ip address
      .$hostname.'","' // hostname
      .$_SERVER['HTTP_USER_AGENT'].'","' // browser and operating system
      .'","' // where they got the link for this page
           .date("D dS M,Y h:i a").'"' // date
      ."\n"
      ;
     $write = fputs($fileHandle, $string);
    @ fclose($fileHandle);
  }

  $string = '<code>'
    .'<p>'.$QUERY_STRING.'</p><p>IP address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
    .$_SERVER['REMOTE_ADDR'].'</p><p>Hostname:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
    .$hostname.'</p><p>Browser and OS:&nbsp;'
    .$_SERVER['HTTP_USER_AGENT'].'</p><p>'
    .'</p><p>Coordinates:&nbsp;&nbsp;&nbsp;&nbsp;'
   
    .date("D dS M,Y h:i a").'</p></code>'
    ;

  ?>