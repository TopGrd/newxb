<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>电子科技大学学报·社科版</title>
<link rel="icon" href="images/favicon.png" type="image/x-icon" />
<link href="css/style_second.css" type="text/css" rel="stylesheet" />
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

		<div id="little_top"></div>

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
		<div id="m_top">
        </div>
        <div id="m_middle">
        	<h1><?php echo $_obj['item']['name']; ?></h1>
            <h2>作者：<?php echo $_obj['item']['author']; ?></h2>
            <h3><strong><span class="strong">关键词：</span><?php echo $_obj['item']['keywords']; ?></strong></h3>
            <span class="strong">摘要</span>
            <p><?php echo $_obj['item']['description']; ?></p>
             <?php if ($_obj['item']['status'] == "0"){ ?>
			<?php if ($_GET['preview']):?>
			<div style="margin:30px;">
				<input type="button" value="确认发布" onclick="window.location='admin.php?p=item&item_id=<?php echo $_obj['item']['item_id']; ?>&m=status&status=1';" /> 	
				<input type="button" value="编辑" onclick="window.location='admin.php?p=item&item_id=<?php echo $_obj['item']['item_id']; ?>&action=edit_item';" />  
				<input type="button" value="返回" onclick="history.go(-1)" /> 
			</div>
			<?php endif;?>
		<?php } ?>

        </div>
        <div id="m_bottom">
        </div>
    </div>

</div>

		<div id="little_bottom"></div>

		<div id="bottom">
	<p>	
    	<span class="copyright">copyright© 电子科技大学学报  2010  社会科学版编辑部  
    	E-mail:xbshkb@uestc.edu.cn   TEL:83201443</span>
        <a href="admin.php" style="text-decoration:none;"><span class="name">  管理登陆</span></a>
    </p>
</div>

</body>
</html>
