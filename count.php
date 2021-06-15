<?php  
"SELECT count(`code`) From request_info where year=2019 OR year=1970 ";
"SELECT DISTINCT count(`code`) From request_info"//this count each defferent codes;
"SELECT service,count(service) From app_request_info WHERE service=61521 GROUP BY service";
"SELECT `code`, count(code) From request_info WHERE year=2019 GROUP BY `code`"//this count the distnict  service given in year 2019;
?>

