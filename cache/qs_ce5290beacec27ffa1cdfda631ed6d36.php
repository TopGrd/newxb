<?php
	//var_dump($_obj['time_order']);$_obj['ranklist'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>电子科技大学学报·自然版</title>
<link rel="icon" href="images/favicon.png" type="image/x-icon" />
<link href="css/style_thrid.css" type="text/css" rel="stylesheet" />
<link href="css/xb.css" type="text/css" rel="stylesheet" />
<link  href="css/buttons.css" type="text/css" rel="stylesheet"/>
<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/buttons.js"></script>
<style>
    #m_middle{
    position:inherit;
        }
</style>
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
		<div id="m_top">
		
		<?php
		if($_obj['ranklist_type'] == 'time'){
        	echo '<h1 class="center">最新录用</h1>';
		}elseif($_obj['ranklist_type'] == 'view'){
			echo '<h1 class="center">摘要点击排行</h1>';
		}elseif($_obj['ranklist_type'] == 'download'){
			echo '<h1 class="center">全文下载排行</h1>';
		}
		?>
		
        </div>
        
        <div id="m_middle">
            <hr>
        <ol class="data2" start="1">
        

		
        	<?php foreach ($_obj['ranklist'] as $value) { ?>
          <!--      <li><a class="cc" href="<?='index.php?p=item&amp;item_id='.$value['item_id']?>"><?=$value['name']?></a>-->
                 <li class="data3 data4"><a class="catename" href='index.php?p=item&item_id=<?=$value[item_id]?>'><?=$value['name']?></a><span class="publish_time"><?=date("Y-m-d",$value['publish_time'])?></span>
                        <span class="author"><?=$value['author']?></span>
                        <div class="voldata">
                        <span class="Vol"><?=$value["periodsAndpage"]?></span>
                        <span class="showabstract"><a class="more" href="javascript:void(0);">[+摘要]</a></span>
                        <span class="data_sp"><a href='index.php?p=pdfdownload&file=<?=$value["file_name"]?>&item_id=<?=$value["item_id"]?>'>PDF</a>&nbsp;&nbsp;(&nbsp;<?=$value["download_count"]?>&nbsp;)</span>
                        <span class="data_sp mag"><a href='index.php?p=viewhtml&item_id=<?=$value["item_id"]?>'>HTML</a>&nbsp;&nbsp;(<span  class="red">&nbsp;<?=$value["view_count"]?>&nbsp;</span>)</span>
                        </div>
                        
                        <div class="abstract"><?=$value["description"]?></div> 
				<?php
				if($_obj['ranklist_type'] == 'time'){
					$data = date("Y-m-d H:i",$value['publish_time']);
				}elseif($_obj['ranklist_type'] == 'view'){
					$data = $value['view_count'];
				}elseif($_obj['ranklist_type'] == 'download'){
					$data = $value['download_count'];
				}
				?>


                </li>
          	<?php } ?>
            </ol>
         	
        </div>
</div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        var $abs = $('div.abstract');
        $abs.hide();
        $('a.more').click(function () {
            $(this).parent().parent().next('div').slideToggle('slow');
            var $link = $(this);
            if ($link.text() == '[+摘要]') {
                $link.text('[─摘要]');
            } else {
                $link.text('[+摘要]');
            }

        });

        var $data3a = $('.data3:even');
        $data3a.css('background', '#f4f4f4');
    });
</script>
		
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



