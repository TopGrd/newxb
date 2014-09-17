<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>电子科技大学学报・社科版</title>
<link rel="icon" href="images/favicon.png" type="image/x-icon" />
<link href="css/style_thrid.css" type="text/css" rel="stylesheet" />
<script src="public/js/jquery/jquery.js" ></script>
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
        	<span class="center"><?php echo $_obj['category']['name']; ?></span>
        </div>
        <div id="m_middle">
        

<!--<div class="guestbook new_item">
	<h2>添加留言</h2>
   	<table cellpadding="0" cellspacing="0" border="0">
    	<tr>
        	<td>姓名</td>
            <td><input type="text" guestbook="name"  class="inputtext" /></td>
        </tr>
        <tr>
        	<td>EMAIL</td>
            <td><input type="text" guestbook="email"   class="inputtext" /></td>
        </tr>
        <tr>
        	<td valign="top">内容</td>
            <td><textarea style="width:400px;height:150px;" guestbook="content"></textarea></td>
        </tr>
        <tr>
        	<td></td>
            <td><input type="button" onclick="new_entry()" class="bt" value="提交" />&nbsp;&nbsp;</td>
        </tr>
    </table>
</div>-->



<div class="guestbook new_item">
<form method="post">
                	<fieldset>
                    	<p>
                        	<label for="name">姓名：</label>
				<input type="text"  id="name" guestbook="name"  class="inputtext" value="<?php echo $_obj['login_user']['name']; ?>" />                        
                        </p>
                        <p>
                        	<label for="email">Email：</label>
				<input type="text"  id="email" guestbook="email"   class="inputtext" value="<?php echo $_obj['login_user']['email']; ?>" />
                        </p>
                        <p>
                        	<label for="message">内容：</label>
				<textarea  cols="45" rows="7" id="message" class="inputtext" guestbook="content"></textarea>
                        </p>
                        <p class="btn_bg">
				<input type="button" onclick="new_entry()" class="bt" value="提交" />
                        </p>
                    </fieldset>
                </form>
</div>

<script>
function new_entry()
{
	var name = $('[guestbook=name]').val();
	var email = $('[guestbook=email]').val();
	var content = $('[guestbook=content]').val();
	if (!name || !content)
	{
		alert('请填写完整');
		return;
	}
	$.post('index.php?p=guestbook&m=new',{ name:name,email:email,content:content},callback);
}

function callback(s)
{
	if (s == 'success')
	{
		alert('留言成功，通过审核后才能显示出来。');
	}
	else
	{
		alert(s);
	}
}
</script>
<hr />
<?php if (!empty($_obj['items'])){if (!is_array($_obj['items']))$_obj['items']=array(array('items'=>$_obj['items'])); $_stack[$_stack_cnt++]=$_obj; $rowcounter = 0; foreach ($_obj['items'] as $rowcnt=>$items) { $items['ROWCNT']=($rowcounter); $items['ALTROW']=$rowcounter%2; $items['ROWBIT']=$rowcounter%2; $rowcounter++;$_obj=&$items; ?>
<div id="guestbook">
	<div class="gb_item_title"><span style="color:#4499ee">></span><span class='date'><?php
echo format_date($_obj['time']);
?></span> <span class='name'><?php echo $_obj['name']; ?></span>:</div>
    <div class="gb_item_content"><?php echo $_obj['content']; ?>
    <?php if ($_obj['reply_content']){ ?>
    	<div class="gb_item_reply"><b>管理员回复:</b><?php echo $_obj['reply_content']; ?></div>
    <?php } ?>
    </div>
</div>
<?php } $_obj=$_stack[--$_stack_cnt];} ?>
<br />
<div class="pager">
<?php echo $_obj['pager']; ?>
</div>
<br />


         
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
  