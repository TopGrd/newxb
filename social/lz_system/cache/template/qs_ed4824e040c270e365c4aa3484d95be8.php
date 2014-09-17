<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>电子科技大学学报·社科版</title>
<link rel="icon" href="images/favicon.png" type="images/x-icon" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
</head>

<body id="wrap">

		<div id="banner">
	<div id="nav_top">
    	<ul>
        	<li><a href="index.php">首页</a></li>
            <li><a href="index.php?p=newsitem&item_id=4">学报简介</a></li>
            <li><a href="index.php?p=category&category_id=23">新闻动态</a></li>
            <li><a href="index.php?p=category&category_id=24">投稿须知</a></li>
            <li><a href="index.php?p=category&category_id=1">期刊浏览</a></li>
	    <li><a href="index.php?p=guestbook">留言</a></li>            
            <li><a href="admin.php">管理入口</a></li>
	    
        </ul>
    </div>
</div> 



		<div id="content">

	
   
   
    <div id="left">
	<p class="strong-blue" style="text-align:center;">电子科技大学学报·社科版</p>
	<img src="images/img_08.jpg" />
	<p style="text-align:center;">ISSN 1008-8105</p>
	<p style="text-align:center;">全国优秀社科学报</p>
	<p style="text-align:center;">全国理工农医院校社科学报</p>
	<p style="text-align:center;">优秀期刊</p>
	<hr />
	<p class="strong">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;栏目：创新人才培养、人文天地、社科经纬、管理科学、预警灾害机制研究、教育科学、信息科学、经济时空、科技创新、争鸣园地、社会热点等栏目。其中，“信息科学”栏目为全国社会科学优秀栏目。</p>
	<p class="strong">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;该刊还是《中国核心期刊（遴选）数据库》收录期刊、《中国学术期刊综合评价数据库》来源期刊、《中国学术期刊（光盘版）》收录期刊、《龙源国际名刊网》、《   中国期刊网》入网期刊、《中文科技期刊数据库》收录期刊，现今拥有广泛的读者群和一批极富影响力的作者。</p>
        <hr />
	<p class="strong">双月刊，大16开本，每期112页</p>
	<p class="strong">国内统一刊号：CN51-1569/C</p>
	<p class="strong">国际标准刊号：ISSN 1008-8105</p>
	<p class="strong">国内发行代号：62-113</p>
	<p class="strong">国外发行代号：4847Q</p>
</div>
   
    <div id="middle">
	
<?php
$_arr = $db->get_all("SELECT * FROM `lz_category` WHERE parent_id=1 AND status=1 ORDER BY category_id DESC  LIMIT 1");
foreach($_arr as $article)
{
        echo "<div id='m_top'>";
        echo "<a href='index.php?p=category&category_id=1'>更多已发行往期</a>";
        echo "</div>";

        echo "<a href='index.php?p=category&category_id=$article[category_id]'><h1>---$article[name]---</h1></a>";
        
        $childid=$article[category_id];
        
    
  $_arr = $db->get_all("SELECT * FROM `lz_category` WHERE parent_id=$childid AND status=1 ORDER BY category_id DESC");
		
         foreach($_arr as $art) {
               echo "<h2><a href='index.php?p=category&category_id=$art[category_id]'>.$art[name].</a></h2>";
               
               $itemid=$art[category_id];
   $_arr = $db->get_all("SELECT * FROM `lz_item` WHERE category_id=$itemid AND status=1 ORDER BY order_id DESC,publish_time DESC ");  
                foreach($_arr as $at){
                     

                  echo "<ul>";
                  
                     echo " <li class='link_c'><a href='index.php?p=item&item_id=$at[item_id]'>$at[name]</a></li>";
               
               		 	
                 echo  "</ul>";
                 }
      
      }
}
?> 
</div>
   
    <div id="right">
	<h3>全文检索</h3>
        <form action="search.php" method="get" id="form_1" >
            <input value=""  name="q" type="text" /><br />
            <select name="tm">
                  <option value="1">按标题</option>
                  <option value="2">按作者</option>
                  <option value="3">按关键词</option>
             </select>
            <input type="submit" value="开始搜索"  />
        </form>
    	<div id="r_header">
		<h3>新闻动态</h3>
        	<ul>
            	<?php if (!empty($_obj['news'])){if (!is_array($_obj['news']))$_obj['news']=array(array('news'=>$_obj['news'])); $_stack[$_stack_cnt++]=$_obj; $rowcounter = 0; foreach ($_obj['news'] as $rowcnt=>$news) { $news['ROWCNT']=($rowcounter); $news['ALTROW']=$rowcounter%2; $news['ROWBIT']=$rowcounter%2; $rowcounter++;$_obj=&$news; ?>
            		<li><a href="index.php?p=newsitem&item_id=<?php echo $_obj['item_id']; ?>" title="<?php echo $_obj['name']; ?>"><?php echo show_description_text($_obj['name'],15);
?>...</a></li>
            	<?php } $_obj=$_stack[--$_stack_cnt];} ?>
                	<li class="link_s"><a href="index.php?p=category&category_id=2">more</a></li>
            </ul> 
        </div>
        <div id="r_bottom">
        	<ul>
		<li class="link_a"><a href="http://cssci.nju.edu.cn/index.asp"><img src="images/logo_cssci.jpg" /></a></li>
            	<li class="link_a"><a href="http://search.cnki.net/"><img src="images/logo_cnki.jpg" /></a></li>
                <li class="link_a"><a href="http://g.wanfangdata.com.cn/default.aspx"><img src="images/logo_wanfang.jpg" /></a></li>
                <li class="link_a"><a href="http://edu.cqvip.com/"><img src="images/logo_vip.jpg" /></a></li>
                <li class="link_a"><a href="http://www.cass.net.cn/"><img src="images/logo_sscp.jpg" /></a></li>
                <li class="link_a"><a href="http://www.meeting.edu.cn/"><img src="images/logo_zgxshyzx.jpg" /></a></li>
            </ul>
        </div>
    </div>

</div>




		<div id="bottom">
	<p>	
    	<span class="copyright">copyright© 电子科技大学学报  2010  社会科学版编辑部  
    	E-mail:xbshkb@uestc.edu.cn   TEL:83201443</span>
        <a href="admin.php" style="text-decoration:none;"><span class="name">  管理登陆</span></a>
    </p>
</div>
</body>
</html>
