 <?php
$date = date("Y-m-d H-i-s");
//جلب اي بي الجهاز
$ip = getIP();
//جلب نظام الجهاز
$os=getOS();
//جلب نوع المتصفح
$browser=getBrowser();
//حفظ البيانات في مصفوفة
$login_info=[
   "ip"=>$ip,
   "os"=>$os,
   "browser"=>$browser];
dbInsert("logs", "date, admin_id, login_info, action", [$date, $_SESSION['user_id'], serialize($login_info), "logout"]);
      
      
//  تفريغ مصفوفة الجلسة
$_SESSION=array();

//انهاء الجلسة
session_destroy();
// اعادة التوجيه الى صفحة الدخول 
 echo '<meta http-equiv="refresh" content ="0; url=login" />';

 die();