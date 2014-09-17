<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN"> 
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title> 系统设置 -  后台</title>
<base href="<?php echo $_obj['url_base']; ?>" />
<link rel="stylesheet" rev="stylesheet" href="<?php echo $_obj['css']; ?>/admin.css" type="text/css" media="all" />
<link rel="stylesheet" rev="stylesheet" href="<?php echo $_obj['css']; ?>/style.css" type="text/css" media="all" />
<script language="JavaScript" src="public/js/jquery/jquery.js" type="text/javascript"></script>
<script language="JavaScript" src="public/js/common.js" type="text/javascript"></script>
<script>
can_not_update = false;
can_not_delete = false;
can_not_add = false;
</script>
</head>
<body>
<div class='main'>

<div class="headerdiv">
	<div class='logo'>
</div>

	<div class='navi'>
		<ul>
			<li><a href='./admin.php'> 后台首页</a></li>
            
            <?php if ($_SESSION['login_user']['allowed_controllers']['item']) {?>
            <li><a href='admin.php?p=item'> 内容管理</a></li> 
			
            <?php }
        	if ($_SESSION['login_user']['allowed_controllers']['category']) {?>
            <li><a href='admin.php?p=category'> 分类/页面</a></li>
			
            
            <?php }
 			if ($_SESSION['login_user']['allowed_controllers']['user']) {?>
            <li><a href='admin.php?p=user'> 用户</a></li>
			
            <?php }
			if ($_SESSION['login_user']['allowed_controllers']['rights']) {?>
            <li><a href='admin.php?p=rights'>权限</a></li>
			
            <?php }
			if ($_SESSION['login_user']['allowed_controllers']['config']) {?>
            <li><a href='admin.php?p=config'> 系统设置</a></li>

	  <?php }
			if ($_SESSION['login_user']['allowed_controllers']['guestbook']) {?>
            <li><a href='admin.php?p=guestbook'>留言本</a></li>

			
            <?php }
			if ($_SESSION['login_user']['allowed_controllers']['account']) {?>
            <li><a href='admin.php?p=account'> 帐号</a></li>
			
            <?php }?>
            <li><a href='./' target="_blank"> 网站首页</a></li>
            <li><a href='index.php?p=login&m=logout&module=admin'> 注销登陆</a></li>
            
		</ul>
	</div>
	<script>
	<?php if (!check_show('update')):?>
	can_not_update = true;
	<?php endif;?>
	</script>
           
</div>

<div id='content'>
	<div id='left'>
    	<div style="margin:10px;margin-top:30px;">
        	<ul>
				<?php if (check_show('add')):?>
				<li>
					<a href="javascript:new_config()"> 新建设置项</a>
				</li>
				<?php endif;?>
            </ul>
    		
        </div>
    </div>
    <div id='maindiv'>
    	<div class="description">
			<?php echo $_obj['page_description']; ?>
        </div>
        
        <?php if ($_obj['err_msg']){ ?>
        <div class="err_msg pad">
        	<?php echo $_obj['err_msg']; ?>
        </div>
        <?php } ?>
        
        <?php if ($_obj['success_msg']){ ?>
        <div class="success_msg pad">
        	<?php echo $_obj['success_msg']; ?>
        </div>
        <?php } ?>
        
        <div class="real_content">
		
			<div id="new_config" style="display:<?php if ($_obj['thisconfig']){ ?><?php } else { ?>none<?php } ?>;margin:20px;background-color:#FFFF99;width:400px;">
            	<h2> 新建设置</h2>
        		<form action="admin.php?m=new_config&p=config" method="post">
	<table cellpadding="0" cellspacing="5" border="0" style="width:400px;">
    	<tr>
        	<td> 变量名</td>
        	<td><input type="text" class="inputtext" maxlength=200 name="name" value="<?php echo $_obj['thisconfig']['name']; ?>" />*</td>
       	</tr>

        <tr>
        	<td valign="top"> 描述</td>
            <td><input type="text" name="description" class="inputtext" value="<?php echo $_obj['thisconfig']['description']; ?>" />*</td>
        </tr>
        <tr>
        	<td valign="top"> 类型</td>
            <td><select name="type">
            	<option value="text"> 单行文本</option>
            	<option value="textarea"> 多行文本</option>
            </select></td>
        </tr>
        <tr>
        	<td>&nbsp;</td>
        	<td align="center">
            <input type="submit" value=" 提交" />
            &nbsp;
            <input type="button" onclick="cancel_new_config(); return false;" value=" 取消" />
            </td>
        </tr>
     </table>
     
        
   </form>

            </div>
	
		<input type="checkbox" onclick="$('[configname=name]').css('display',this.checked?'block':'none');" /> 显示变量名
       	<br />
		<table cellpadding="0" cellspacing="0" border="0" class="list_table" style="width:750px;">
			<tr>
        		<th style="width:7%"> 优先级</th>
        		<th style="width:35%"> 变量名</th>
                <th style="width:35%"> 值</th>
                <th style="width:23%"> 操作</th>
            </tr>
			<?php if (!empty($_obj['config_list'])){if (!is_array($_obj['config_list']))$_obj['config_list']=array(array('config_list'=>$_obj['config_list'])); $_stack[$_stack_cnt++]=$_obj; $rowcounter = 0; foreach ($_obj['config_list'] as $rowcnt=>$config_list) { $config_list['ROWCNT']=($rowcounter); $config_list['ALTROW']=$rowcounter%2; $config_list['ROWBIT']=$rowcounter%2; $rowcounter++;$_obj=&$config_list; ?>
			<tr>
				<td valign="top">
					<div admin_type="text"
                	admin_para="m=update&table=config&column=order_id&id=<?php echo $_obj['config_id']; ?>"  
                    admin_trigger="click" style="text-align:center"><?php echo $_obj['order_id']; ?></div>
				</td>
				<td valign="top">
					<div  configname="name"  admin_type="text"
            		admin_para="m=update&table=config&column=name&id=<?php echo $_obj['config_id']; ?>"  
                	admin_trigger="click" style="display:none"><?php echo $_obj['name']; ?></div>
					<div admin_type="text"
	            	admin_para="m=update&table=config&column=description&id=<?php echo $_obj['config_id']; ?>"  
	                admin_trigger="click" ><?php echo $_obj['description']; ?></div>
				</td>
				<td valign="top">
					<div admin_type="<?php if (!$_obj['type']) echo 'text'; else echo $_obj['type']; ?>"
                	admin_para="m=update&table=config&column=value&id=<?php echo $_obj['config_id']; ?>"  
                    admin_trigger="click" ><?php echo $_obj['value']; ?></div>
				</td>
				<td valign="top">
					<?php if (check_show('delete')):?>
					<a href="javascript:;" onclick="if (confirm(' 确定要删除这条设置吗？')) delete_config(<?php echo $_obj['config_id']; ?>,this)"> 删除</a>
					<?php endif;?>
				</td>
			</tr>
			<?php } $_obj=$_stack[--$_stack_cnt];} ?>
		</table>

                <br />
                <br />


        </div>
        
    </div>
</div>

<script>

function new_config()
{
	$('#new_config').fadeTo(10,0).slideDown(200).fadeTo('fast',1);
}
function cancel_new_config()
{
	$('#new_config').fadeTo('fast',0).slideUp(200);
}
function delete_config(id,o)
{
	$(o).attr('to_be_delete','yes').html(' 删除中..').unbind('click');
	$.post('admin.php?p=ajax&m=delete&table=config&id='+id,{ },delete_callback);
}
function delete_callback(s)
{
	if (s == 'error')
	{
		alert('DELETE_ERROR');
		return false;
	}
	$('[to_be_delete=yes]').parent().parent().fadeOut();
}

</script>

<div class="footer">
Copyright @ <a href="http://longbill.cn" target="_blank">Longbill</a> (<?php echo $_obj['time_used']; ?>s) (<?php echo $_obj['total_query']; ?>)
</div>
<script>
if (!can_not_update) load_admin();
</script>

</div>
</body>
</html>