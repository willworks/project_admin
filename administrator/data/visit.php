<?php
//加入到前端页面来记录访客信息
header("Content-Type: text/html; charset=utf-8");
$filename = "data/count.txt";
$logs= "data/logs.txt";
$ip=$_SERVER['REMOTE_ADDR'];
$Today=date("Y年m月d日   H:i:s ");
$handle = fopen ($filename, "a+") or exit("Unable to open file!");
$contents = "";
if(!feof($handle)) {
$contents = fread($handle,filesize($filename));
}
fclose($handle);
$handle=fopen($filename,"w");
if($contents== "")$contents=0;
if(is_numeric($contents))$contents+=1;
fputs($handle,$contents);

$system_info['visit'] = $contents;

fclose($handle);
$handle=fopen($logs, "a");
$hand=fopen($logs, "r");
$text=fgets($hand);
$system_info['visit_time_before'] = $text;
$log_text=$ip. "   在   ".$Today. "访问\n ";
$system_info['visit_ip'] = $ip;
$system_info['visit_time'] = $Today;

fputs($handle,$log_text);
fclose($hand);
fclose($handle);
?>