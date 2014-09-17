<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>电子科技大学学报·自然版</title>
<link rel="icon" href="images/favicon.png" type="images/x-icon" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/xb.css" type="text/css" rel="stylesheet"/>
<link  href="css/buttons.css" type="text/css" rel="stylesheet"/>
<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/buttons.js"></script>
</head>
<body id="wrap">
    <div id="banner">
	<img src="images/img_01.jpg">
    <img id="logo" src="images/logo.png">
	<div id="nav_top">
    	<ul>
        	<li style="border:none!important;"><a href="index.php">首页</a></li>
            <li><a href="index.php?p=newsitem&item_id=4">学报介绍</a></li>
            <li><a href="index.php?p=category&category_id=1099">期刊信息</a></li>
            <!--<li><a href="index.php?p=newsitem&item_id=3">学报编委</a></li>-->
            <li><a href="index.php?p=newsitem&item_id=2">编辑部</a></li>
            <li><a href="index.php?p=newsitem&item_id=4">投稿须知</a></li>
            <li><a href="index.php?p=category&category_id=6">资料下载</a></li>
            <li><a href="index.php?p=category&category_id=2">信息公告</a></li>
            <li><a href="index.php?p=category&category_id=1101">期刊动态</a></li>
            <li><a href="index.php?p=category&category_id=-1&yid=1">过期浏览</a></li>
            <li><a href="index.php?p=newsitem&item_id=1100">常见问题</a></li>
			<li><a href="index.php?p=guestbook">留言</a></li>    
            <li><a href="index.php?p=newsitem&item_id=1">联系我们</a></li>
        </ul>
    </div>
    <div id = "glow">
        <div class="glow" style="width:10px;height:15px;"></div>
        <div class="glow" style="width:30px;height:30px;"></div>
        <div class="glow" style="width:50px;height:50px;"></div>
    </div>
    <script type="text/javascript">
    setTimeout(function(){
        document.getElementById("logo").style.left = "365px";
    },200);
   
    </script>
</div>

    <div id="content">
    
     ﻿<div id="left">
    	<div class="panel1 jian mleft">
    <ul class="ull">
    <li class="mainitem"><img class="icon1" src="images/app_edit.png"><span class="title1">在线办公</span></li>
    <li class="item"><span class="title"><a href="http://xb.uestc.edu.cn:8077/journalx_xb/authorLogOn.action?mag_Id=7" class="button button-border-primary button-rounded btnw"><img class="icon2" src="images/ic_pen.png">作者投稿</a></span></li>
        <li class="item"><span class="title"><a href="#" class="button button-border-primary button-rounded btnw"><img class="icon2" src="images/magnifier.png">作者查稿</a></span></li>
        <li class="item"><span class="title"><a  href="http://211.83.110.79:8077/journalx_xb/editorCommitteeLogOn.action?mag_Id=7" class="button button-border-primary button-rounded btnw"><img class="icon2" src="images/live_messenger_alt_3.png">专家审稿</a></span></li>
        <li class="item"><span class="title"><a href="http://211.83.110.79:8077/journalx_xb/editorLogOn.action?mag_Id=7" class="button button-border-primary button-rounded btnw"><img class="icon2" src="images/documents.png">编辑办公</a></span></li>
        <li class="item"><span class="title"><a href="#" class="button button-border-primary button-rounded btnw"><img class="icon2" src="images/edit_user.png">主编办公</a></span></li>
    </ul>
</div>
     <div class="panel1 jian mleft">
    <ul class="ull">
    <li class="mainitem"><img class="icon1" src="images/book.png"><span class="title1">在线期刊</span></li>
    <li class="item"><span class="title"><a href="index.php?p=ranklist&type=time" class="button button-border-primary button-rounded btnw"><i class="fa fa-plus"></i>最新录用</a></span></li>
        <li class="item"><span class="title ko"><a href="index.php?p=ranklist&type=view" class="button button-border-primary button-rounded btnw"><i class="fa fa-thumbs-up"></i>摘要点击排行</a></span></li>
        <li class="item"><span class="title ko"><a  href="index.php?p=ranklist&type=download" class="button button-border-primary button-rounded btnw"><i class="fa fa-download"></i>全文下载排行</a></span></li>
    </ul>
</div>
<?php
  $map = "select count(*) from lz_curip where type=0";
  $online = $db->get_all($map);
  $map = "select `value` from `lz_webdata` where `name`='webview'";
  $webview = $db->get_all($map);
  $map = "select count(*) from `lz_curip` where type=1";
  $today = $db->get_all($map);
  $webview = $webview[0]["value"];
  $online = $online[0]['count(*)'];
  $today = $today[0]['count(*)'];
  //echo $webview." , ".$online;
?>
     <div class="panel1 jian mleft">
    <ul class="ull">
    <li class="mainitem"><img class="icon1" src="images/stats.png"><span class="title1">访问统计</span></li>
    <li class="item"><span class="title ko"><a class="button button-border-primary button-rounded btnw"><i class="fa fa-plus lef"></i>访问统计:<span class="number"><?=$webview?></span></a></span></li>
        <li class="item"><span class="title ko"><a  class="button button-border-primary button-rounded btnw"><i class="fa fa-thumbs-up lef"></i>今日访问:<span class="number"><?=$today?></span></a></span></li>
        <li class="item"><span class="title ko"><a   class="button button-border-primary button-rounded btnw"><i class="fa fa-download lef"></i>当前在线:<span class="number"><?=$online?></span></a></span></li>
    </ul>    
</div>
     <!--
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
-->
</div>
<form action="index.php" method="get" class="search_form">
        <input type="hidden" name="p" value="advance_search"/>
        <div class="search_eve border_1 height_1">
            <span class="search_name">指定期数查询</span>
            <select class="search_input" name = "year">
                <option value="">--请选择--</option>
                <?php 
                $num2 = 2;
                $year_array = $db->get_all("SELECT name FROM lz_category WHERE '".$num2."%' ");
                $out = array();
                foreach ($year_array as $key=>$value) {
                    $value = ereg_replace('[^0-9]', '', $value[name]);
                    if($value){
                        $out[$key] = $value;
                    }
                }
                foreach ($out as $key=>$value) {
                   if (!in_array($value, $year_out) )
                    {
                       $year_out[$key] = $value;
                    }
                }
                sort($year_out,SORT_NUMERIC);
                foreach ($year_out as $value) 
                {
                    echo '<option value="'.$value.'">'.$value.'</option>';
                }
                ?>
            </select>
            <span class="search_name_1">年</span>
            <select class="search_input" name= "number">
                <option value="">--请选择--</option>
                <option value="第一期">第一期</option>
                <option value="第二期">第二期</option>
                <option value="第三期">第三期</option>
                <option value="第四期">第四期</option>
                <option value="第五期">第五期</option>
                <option value="第六期">第六期</option>
                <option value="增刊">增刊</option>
            </select>
            
        </div>
        <div class="search_eve">
            <span class="search_name">指定DOI</span>
            <input class="search_input wid_1" type="text" name="DOI" id="DOI">
        </div>
        <div class="search_eve border_1 height_1">
            <span class="search_name">指定栏目</span>
            <select class="search_input4" name= "category">
                <option value="">--请选择--</option>
                <?php 

                $name_array = $db->get_all("SELECT name FROM lz_category WHERE parent_id != '1' and parent_id != '0'" );
                $out = array();
			   	foreach ($name_array as $key=>$value) {
			       if (!in_array($value, $name_out))
					{
			           $name_out[$key] = $value;
			       	}
			   	}
                foreach ($name_out as $value) 
                {
                    $value[name] = preg_replace(array("/(.*?)•(.*?)$/is"), "", $value[name]);
                    $value[name] = preg_replace(array("/(.*?)：(.*?)$/is"), "", $value[name]);
                    $value[name] = preg_replace(array("/(.*?)”(.*?)$/is"), "", $value[name]);
                    if(!empty($value[name]))
                	   echo '<option value="'.$value[name].'">'.$value[name].'</option>';
                }
                	
                 ?>
                <option value=""></option>
            </select>
        </div>
        <div class="search_eve">
            <div class="name_back">
                <span class="search_name marg">指定作者,关键词</span>
            </div>
            <div class="search_a">
                 <div class="search_eve">
                    <span class="search_name">作者</span>
                    <input class="search_input wid_1" type="text" name="author" id="author">
                </div>
                 <div class="search_eve">
                    <span class="search_name">作者单位</span>
                    <input class="search_input wid_1" type="text" name="institution" id="institution">
                </div>
                 <div class="search_eve">
                    <span class="search_name">题目</span>
                    <input class="search_input wid_1"  type="text" name="name" id="name">
                 </div>
                <div class="search_eve">
                    <span class="search_name">摘要</span>
                    <input class="search_input wid_1" type="text" name="description" id="description">
                 </div>
                <div class="search_eve">
                    <span class="search_name">关键词</span>
                    <input class="search_input wid_1" type="text" name="keyword" id="keyword">
                 </div>
                <div class="search_eve">
                    <span class="search_name">分类号</span>
                    <input class="search_input wid_1" type="text" name="classname" id="classname">
                 </div>
                
            </div>
        </div>
        <div class="border_2"></div>
        <div class="search_eve">
            <span class="search_name">显示效果</span>
            <span class="search_name wid_3">每页</span>
            <input class="search_input wid_2" type="text" name="page_size" id="page_size" value="30" >
            <span class="search_name wid_3">条</span>
        </div>
         <div class="border_2"></div>
         <div class="search_eve">
        <span class="search_name">排序</span>
        <input class="search_input1" type="radio" name="sort_mode" value="category" checked><span class="search_name">年,期,起始页</span>
        <input class="search_input1" type="radio" name="sort_mode" value="author"><span class="search_name">作者姓名</span>
        <input class="search_input1 mlef" type="radio" name="sort_mode" value="keyword"><span class="search_name">关键词</span>
        </div>
        <input type="submit" value="提交"  href="#" class="button glow " style="width:100px;margin-left:250px;margin-top:10px;">
    </form>
</div>
    <div id="bottom">
	<p>	
    	<span class="copyright">copyright© 电子科技大学学报  2010  自然科学版编辑部  </span>
        <a href="admin.php"><span class="name">  管理登陆</span></a>
    </p>
     <div id="leftsead">
	<ul>
		<li><a class="youhui"><img src="images/wechat.jpg" width="47" height="49" class="shows" /><img src="images/wechatma.jpg" width="200" height="200" class="hides1" usemap="#taklhtml"/><map name="taklhtml"><area shape="rect" coords="26,273,115,300 " href="" /></map></a></li>
        <li><a class="youhui"><img src="images/weibo.jpg" width="47" height="49" class="shows" /><img src="images/weiboma.jpg" width="200" height="200" class="hides" usemap="#taklhtml"/><map name="taklhtml"><area shape="rect" coords="26,273,115,300 " href="" /></map></a></li>
		<li><a id="top_btn"><img src="images/ll06.jpg" width="131" height="49" class="hides"/><img src="images/l06.png" width="47" height="49" class="shows" /></a></li>
	</ul>
</div>
<script type="text/javascript">
    $(document).ready(function(){

	   $("#leftsead a").hover(function(){
		if($(this).prop('className')=='youhui')
            {
                $(this).children("img.hides").show();
                $(this).children("img.hides1").show();
            }
           else{
			$(this).children("img.hides").show();
            $(this).children("img.hides1").show();
			$(this).children("img.shows").hide();
			$(this).children("img.hides").animate({'marginRight':'0px'},'slow');
            $(this).children("img.hides1").animate({'marginRight':'0px'},'slow'); 
		  }
	},function(){ 
		if($(this).prop('className')=='youhui'){
			$(this).children("img.hides").hide('slow');
            $(this).children("img.hides1").hide('slow');
		}else{
			$(this).children("img.hides").animate({'marginRight':'-143px'},'slow',function(){$(this).hide();$(this).next("img.shows").show();});
            $(this).children("img.hides1").animate({'marginRight':'-143px'},'slow',function(){$(this).hide();$(this).next("img.shows").show();});
		}
	});

	$("#top_btn").click(function(){if(scroll=="off") return;$("html,body").animate({'scrollTop': 0}, 600);});

});
</script>
</div>
</body>
</html>
