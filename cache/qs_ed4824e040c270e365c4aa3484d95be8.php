<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="renderer" content="webkit">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit">
<title>电子科技大学学报·自然版</title>
<link rel="icon" href="images/favicon.png" type="images/x-icon" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/xb.css" type="text/css" rel="stylesheet"/>
<link  href="css/buttons.css" type="text/css" rel="stylesheet"/>
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
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
            <li><a href="index.php?p=newsitem&item_id=3">学报编委</a></li>
            <li><a href="index.php?p=newsitem&item_id=2">编辑部</a></li>
            <li><a href="index.php?p=newsitem&item_id=4">投稿须知</a></li>
            <li><a href="index.php?p=category&category_id=6">资料下载</a></li>
            <li><a href="index.php?p=category&category_id=2">信息公告</a></li>
            <li><a href="index.php?p=category&category_id=345">期刊动态</a></li>
            <li><a href="index.php?p=category&category_id=-1&yid=1">过期浏览</a></li>
            <li><a href="index.php?p=newsitem&item_id=1402">常见问题</a></li>
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
        document.getElementById("logo").style.left = "430px";
    },200);
   
    </script>
</div>




		<div id="content">

	
   
   
    <div id="left">
    <div class="panel1 jian mleft">
        <ul class="ull">
            <li class="mainitem">
                <img class="icon1" src="images/app_edit.png"><span class="title1">在线办公</span>
            </li>
            <li class="item"><span class="title"><a href="http://222.197.171.171:8077/journalx_xb/authorLogOn.action?mag_Id=7" class="button button-border-primary button-rounded btnw"><img class="icon2" src="images/ic_pen.png">作者投稿</a></span>
            </li>
            <li class="item"><span class="title"><a href="http://222.197.171.171:8077/journalx_xb/editorLogOn.action?mag_Id=7" class="button button-border-primary button-rounded btnw"><img class="icon2" src="images/documents.png">编辑办公</a></span>
            </li>
            <li class="item"><span class="title"><a href="http://222.197.171.171:8077/journalx_xb/editorCommitteeLogOn.action?mag_Id=7" class="button button-border-primary button-rounded btnw"><img class="icon2" src="images/magnifier.png">编委审阅</a></span>
            </li>
            <li class="item"><span class="title"><a  href="http://222.197.171.171:8077/journalx_xb/editorCommitteeLogOn.action?mag_Id=7" class="button button-border-primary button-rounded btnw"><img class="icon2" src="images/live_messenger_alt_3.png">专家审稿</a></span>
            </li>

            <li class="item"><span class="title"><a href="http://www.magtech.com.cn/journalx_author_faq.html" class="button button-border-primary button-rounded btnw" style="height:auto;"><img class="icon2" src="images/warning.png">注意事项</a></span>
            </li>
            <li class="item"><span class="title"><a href="http://www.xb.uestc.edu.cn/nature/index.php?p=category&category_id=6" class="button button-border-primary button-rounded btnw"><img class="icon2" src="images/edit_user.png">投稿须知</a></span>
            </li>

        </ul>
    </div>
    <div class="panel1 jian mleft">
        <ul class="ull">
            <li class="mainitem">
                <img class="icon1" src="images/book.png"><span class="title1">在线期刊</span>
            </li>
            <li class="item"><span class="title"><a href="index.php?p=ranklist&type=time" class="button button-border-primary button-rounded btnw"><i class="fa fa-plus"></i>最新录用</a></span>
            </li>
            <li class="item"><span class="title ko"><a href="index.php?p=ranklist&type=view" class="button button-border-primary button-rounded btnw"><i class="fa fa-thumbs-up"></i>摘要点击排行</a></span>
            </li>
            <li class="item"><span class="title ko"><a  href="index.php?p=ranklist&type=download" class="button button-border-primary button-rounded btnw"><i class="fa fa-download"></i>全文下载排行</a></span>
            </li>
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
        <li class="mainitem">
            <img class="icon1" src="images/stats.png"><span class="title1">访问统计</span>
        </li>
        <li class="item"><span class="title ko"><a class="button button-border-primary button-rounded btnw"><i class="fa fa-plus lef"></i>访问统计:<span class="number"><?=$webview?></span>
            </a>
            </span>
        </li>
        <li class="item"><span class="title ko"><a  class="button button-border-primary button-rounded btnw"><i class="fa fa-thumbs-up lef"></i>今日访问:<span class="number"><?=$today?></span>
            </a>
            </span>
        </li>
        <li class="item"><span class="title ko"><a   class="button button-border-primary button-rounded btnw"><i class="fa fa-download lef"></i>当前在线:<span class="number"><?=$online?></span>
            </a>
            </span>
        </li>
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
   
    <div id="middle">
    <form name="" id="search" method="get" action="search.php">
    <div class="sea"><img class="icon3" src="images/partner_search.png">
        <span class="spans">文章快速检索</span>
        <input id="search"  name ='q' type="text" value="">
        <a onclick="document.getElementById('search').submit()" class="button glow" style="margin-top:4px;margin-left:5px;width:0px;height:24px;float:left;"><span class="Go">Go</span></a>
        <a href="index.php?p=advance_search" class="spans" style="margin-left:4px;">高级检索</a>
    </div>
    </form>
<?php 
    $prevId = $_obj['prev_cur_next']['prev'];
    $nextId = empty($_obj['prev_cur_next']['next'])?$_obj['prev_cur_next']['cur']:$_obj['prev_cur_next']['next'];
    $map = "SELECT * FROM `lz_category` WHERE parent_id=1 AND category_id=".$_obj['prev_cur_next']['cur']." AND status=1 ORDER BY category_id DESC  LIMIT 1";
    $_arr = $db->get_all($map);
    foreach($_arr as $article)
    {
?>
    <div class="mainco">
        <div class="bar">
            <span class="Btitle">电子科技大学学报(自科版)</span>
        </div>
        <img class="magazine" src="images/img_08.jpg">
        <div class="mainfo">
            <p class="infot">《电子科技大学学报》</p>
            <p class="infoau">主编：周涛</p>
            <p class="infoau">常务副主编：漆容</p>
            <p class="infoau">责任编辑：黄莘、张俊、税红、蒋晓</p>
            <p class="infoau">主办：电子科技大学</p>
            <p class="infoau">编辑出版：《电子科技大学学报》编辑部</p>
            <p class="infoau">国内统一刊号：CN51-1207/T</p>
            <p class="infoau">国际标准刊号：ISSN 1001-0548</p>
            <p class="infoau">邮发行号：62-34</p>
        </div>
        <div class="pre">
            <a class="aas1" href="<?=__SELF__.'?cid='.$prevId?>"><img class="icon4" src="images/pre.png">上一期</a>
            <a class="aas" href="<?=__SELF__.'?cid='.$nextId?>"><img class="icon4" src="images/aft.png">下一期</a>
            <p class="infodate"><?=$article["name"]?></p>
            <p class="infodate mkk">刊出日期：2014-03-21</p>
        </div>
            <script type="text/javascript">
                            $(document).ready(function(){
                             var $abs = $('div.abstract'); 
                                $abs.hide();
                            $('a.more').click(function(){
                                $(this).parent().parent().next('div').slideToggle('slow');
                                var $link=$(this);
                                if($link.text()=='[+摘要]' ){
                                    $link.text('[─摘要]');
                                }
                                else{
                                    $link.text('[+摘要]');
                                }
                                    
                            });
                               /* $('.data3').mouseover(function(){
                                    $(this).css('background','#F5F6F3');
                                });
                                 $('.data3').mouseout(function(){
                                    $(this).css('background','#fff');
                                });*/
                                var $data3a = $('.data3:even');
                            $data3a.css('background','#f4f4f4');
                            }); 
                            
            </script>
    <div class="catatab">
            <ul class="tabb">
                <li class="tab_active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;目录</li>
                <li class="tab_no"></li>
            </ul>
<?php
    
?>
    
<?php
        $childid=$article[category_id];
       // echo "<div id='m_to+p'>";
        //    echo "<a href='index.php?p=category&category_id=1'>更多已发行往期</a>";
        //echo "</div>";
    
        $_arr = $db->get_all("SELECT * FROM `lz_category` WHERE parent_id=$childid AND status=1 ORDER BY category_id DESC");
        
         foreach($_arr as $art) {
?>

        <div class="midcontent">
                <div class="catagroy">
                    <h1 class="catah1"><a href='index.php?p=category&category_id=<?=$art["category_id"]?>'><?=$art["name"]?></h1>
                </div>

<?php    
        $itemid=$art[category_id];
        $_arr = $db->get_all("SELECT * FROM `lz_item` WHERE category_id=$itemid AND status=1 ORDER BY order_id DESC,publish_time DESC ");  
        foreach($_arr as $at){
?>
         <ul class="data2">
                    <li class="data3"><a class="catename" href='index.php?p=item&item_id=<?=$at[item_id]?>'><?=$at['name']?></a>
                        <span class="author"><?=$at['author']?></span>
                        <div class="voldata">
                        <span class="Vol"><?=$at["periodsAndpage"]?></span>
                        <span class="showabstract"><a class="more" href="javascript:void(0);">[+摘要]</a></span>
                        <span class="data_sp"><a href='index.php?p=pdfdownload&file=<?=$at["file_name"]?>&item_id=<?=$at["item_id"]?>'>PDF</a>&nbsp;&nbsp;(<span  class="red">&nbsp;<?=$at["download_count"]?>&nbsp;</span>)</span>
                        <span class="data_sp mag"><a href='index.php?p=viewhtml&item_id=<?=$at["item_id"]?>'>HTML</a>&nbsp;&nbsp;(<span  class="red">&nbsp;<?=$at["view_count"]?>&nbsp;</span>)</span>
                        </div>
                        
                        <div class="abstract"><?=$at["description"]?></div>
                    </li>
        </ul>
<?php
                 }
        echo "</div>";
      
            }
        }
?> 
    </div>
    </div>

</div>
   
    <div id="right">
      <div class="panel1 jian">
    <ul class="ull">
    <li class="mainitem"><img class="icon1" src="images/ann.png"><span class="title1">信息公告</span></li>
        <div id="newsrock">
            <ul class="newspan">
                <?php if (!empty($_obj['news'])){if (!is_array($_obj['news']))$_obj['news']=array(array('news'=>$_obj['news'])); $_stack[$_stack_cnt++]=$_obj; $rowcounter = 0; foreach ($_obj['news'] as $rowcnt=>$news) { $news['ROWCNT']=($rowcounter); $news['ALTROW']=$rowcounter%2; $news['ROWBIT']=$rowcounter%2; $rowcounter++;$_obj=&$news; ?>
            		<li class="news"><a href="index.php?p=newsitem&item_id=<?php echo $_obj['item_id']; ?>" title="<?php echo $_obj['name']; ?>"><?php echo show_description_text($_obj['name'],15);
?></a></li>
            	<?php } $_obj=$_stack[--$_stack_cnt];} ?>
            </ul>
        </div>
            <script type="text/javascript" src="js/jquery.kxbdmarquee.js" charset="utf-8"></script>
 
   <script type="text/jscript">
       $("#newsrock").kxbdMarquee();
        </script>
         <p style="margin-left:150px;*margin-left:80px;"><a href="index.php?p=category&category_id=2" style="color:red;">更多...</a></p>
    </ul>    
</div>
     <div class="panel1 jian">
        <ul class="ull">
            <li class="mainitem iee"><img class="icon1" src="images/moleskine_pure.png"><span class="title1">期刊信息</span></li>
            <li><span class="mainfo2" style="*maigin-top:10px;">1959年创刊，双月刊</span></li>
            <li><span class="mainfo2">主管：</span></li>
            <li><span class="mainfo2">主办：电子科技大学</span></li>
            <li><span class="mainfo2">主编：周涛</span></li>
            <li><span class="mainfo2">常务副主编：漆容</span></li>
            <li><span class="mainfo2">责任编辑：黄莘、张俊、税红、蒋</span></li>
            <li><span class="mainfo2">晓</span></li>
            <li><span class="mainfo2">出版物号：CN51-1207/T；ISSN </span></li>
            <li><span class="mainfo2">1001-0548</span></li>
            <li><span class="mainfo2">邮发代号：62-34</span></li>
            <li><span class="mainfo2">通信地址：四川省成都市建设北路</span></li>
            <li><span class="mainfo2">二段4号 电子科技大学学报编辑部</span></li>
            <li><span class="mainfo2">(自然科学版)</span></li>
            <li><span class="mainfo2">邮编：610054</span></li>
            <li><span class="mainfo2">电话：028-83202308，028-</span></li>
            <li><span class="mainfo2">83207559</span></li>
            <li><span class="mainfo2">Email：xuebao@uestc.edu.cn</span></li>
             </ul>       
    </div>
     <div class="panel1 jian">
        <ul class="ull">
            <li class="mainitem"><img class="icon1" src="images/globe_yellow.png"><span class="title1">友情链接</span></li>
            <li class="mainfo2"><a href="http://www.moe.edu.cn/">教育部</a></li>
            <li class="mainfo2"><a href="http://www.uestc.edu.cn">电子科技大学</a></li>
            <li class="mainfo2"><a href="http://www.ei.org.cn/">Ei中国</a></li>
            <li class="mainfo2"><a href="http://www.lib.uestc.edu.cn/ERDataBaseIntro55.aspx">中国期刊全文数据库</a></li>
            <li class="mainfo2"><a href="http://www.wanfangdata.com.cn/">万方数据库</a></li>
            <li class="mainfo2"><a href="http://www.intl-jest.com/">中国电子学刊</a></li>             

        </ul>    
    </div>
    	<!--
<div id="r_header">
		<h2><a href="http://www.xb.uestc.edu.cn/nature/index.php?p=category&category_id=2">新闻动态</a></h2>
			<ul>
			<marquee align="bottom" direction="down" onmouseover="this.stop()" onmouseout="this.start()" behavior="scroll" scrollamount=2>
            	<?php if (!empty($_obj['news'])){if (!is_array($_obj['news']))$_obj['news']=array(array('news'=>$_obj['news'])); $_stack[$_stack_cnt++]=$_obj; $rowcounter = 0; foreach ($_obj['news'] as $rowcnt=>$news) { $news['ROWCNT']=($rowcounter); $news['ALTROW']=$rowcounter%2; $news['ROWBIT']=$rowcounter%2; $rowcounter++;$_obj=&$news; ?>
            		<li><a href="index.php?p=newsitem&item_id=<?php echo $_obj['item_id']; ?>" title="<?php echo $_obj['name']; ?>"><?php echo show_description_text($_obj['name'],15);
?></a></li>
            	<?php } $_obj=$_stack[--$_stack_cnt];} ?>
			</marquee>
			</ul>
		<li class="link_s"><a href="index.php?p=category&category_id=2">more</a></li>
        </div> 
	<hr />
        <div id="r_bottom">
		<h2>友情链接</h2>
        	<ul>
            	<li class="link_a"><a href="http://www.moe.edu.cn/">教育部</a></li>
                <li class="link_a"><a href="http://www.uestc.edu.cn">电子科技大学</a></li>
                <li class="link_a"><a href="http://www.ei.org.cn/">Ei中国</a></li>
                <li class="link_a"><a href="http://www.lib.uestc.edu.cn/ERDataBaseIntro55.aspx">中国期刊全文数据库</a></li>
                <li class="link_a"><a href="http://www.wanfangdata.com.cn/">万方数据库</a></li>
                <li class="link_a"><a href="http://www.intl-jest.com/">中国电子学刊</a></li>             
            </ul>
        </div> -->
    </div>

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
