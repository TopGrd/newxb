<?php 
require_once("./exception.php");
$conn=mysql_connect("localhost","root","159357");
$sql1="delete from `xb_social`.`lz_cache`";
$sql2="delete from `xb_nature`.`lz_cache`";
$query1=mysql_query($sql1);
$query2=mysql_query($sql2);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>电子科技大学·学报</title>
<link rel="stylesheet" href="css/styleBase.css" />
<script type="text/javascript" language="JavaScript" src="js/jquery-1.5.1.min.js"> </script>
</head>

<body>
	<div id="wrap">
        <div id="container">
        	<div id="header">
            <iframe id="xif" width="100%;" frameborder="0" scrolling='no' noresize="noresize" framespacing="0" src='nature/index.php?p=rollbar&category_id=372'></iframe>
            </div>

        	<div class="boxBig">
            	<a class="linkImg" target="_blank" href="http://www.xb.uestc.edu.cn/nature/index.php"><img src="images/img_101.jpg" /></a>
                <p class="spaceP"><a class="linkN" target="_blank" href="http://www.xb.uestc.edu.cn/nature/index.php"><span class="strong">电子科技大学学报-自科版</span></a></p>
                <a target="_blank" href="http://222.197.171.171:8077/journalx_xb/Login.action;jsessionid=DA6AD1D5B4056319523B54BFE8004CF9"><span class="small">自科版采编系统>></span></a>
            </div>
        	<div class="boxBig">
            	<a class="linkImg" target="_blank" href="http://www.xb.uestc.edu.cn/social/index.php"><img src="images/img_102.jpg" /></a>
                <p class="spaceP"><a class="linkN" target="_blank" href="http://www.xb.uestc.edu.cn/social/index.php"><span class="strong">电子科技大学学报-社科版</span></a></p>
            </div>
        	<div class="boxBig">
            	<a class="linkImg" target="_blank" href="http://www.xb.uestc.edu.cn/jest/index.php"><img src="images/img_103.jpg" /></a>
                <p class="spaceP"><a class="linkN" target="_blank" href="http://www.xb.uestc.edu.cn/jest/index.php"><span class="strong">Journal of Electronic Science and Technology</span></a></p>
            </div>
        	<div class="boxBig">
            	<a class="linkImg" target="_blank" href="http://www.springer.com/physics/optics+%26+lasers/journal/13320"><img src="images/img_104.jpg" /></a>
                <p class="spaceP"><a class="linkN" target="_blank" href="http://www.springer.com/physics/optics+%26+lasers/journal/13320"><span class="strong">Photonic Sensors</span></a></p>
            </div>
			
			<div style="clear:both; text-align:right; padding:20px; position:relative; right:30px; top:10px;">
			</div>
        </div>
    </div>

        <div id="footer">
		
        	<p class="small" style="font-color:black">CopyRight©UESTC 电子科技大学 学报编辑部  成都市建设北路二段四号电子科技大学沙河校区主楼中2楼211、213、214、216办公室  邮编：610054</p>
			<p class="small">
学报主任：<a href="http://www.ccse.uestc.edu.cn/teacher/teacher.aspx?id=414" target="_blank">周涛</a> （ 教授、博导；联系电话：83208187） &nbsp;&nbsp;&nbsp;  副主任：<a href="http://www.mgmt.uestc.edu.cn/asp/mgmt_professor_detail.asp?TeacherId=447" target="_blank">田江</a>（副教授、硕士生导师；联系电话：83208187）
						</p>
						<p class="small">
						自科版（EI检索）负责人：漆蓉（副编审；联系电话：83202308）
社科版（RCCSE扩展版）负责人：刘波（副编审；联系电话：83201443）

						</p><p class="small">
						英文版负责人：康祝圣（副教授；联系电话：83200028）
Photonic Sensor（EI检索）负责人：朱丹（编审；联系电话：83200199）

						</p>
						
			   
        </div>
	    <script type="text/javascript" src="js/nav.js"> </script>

</body>
</html>






























