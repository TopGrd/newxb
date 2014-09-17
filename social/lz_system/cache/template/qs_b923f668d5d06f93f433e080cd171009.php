        <?php if ($_obj['item_id']){ ?>
        <form action="admin.php?m=edit_item&p=item&item_id=<?php echo $_obj['item_id']; ?>&page_type=<?php echo $_obj['page_type']; ?>&category_id=<?php echo $_obj['category_id']; ?>" method="post" enctype="multipart/form-data">
        <?php } else { ?>
        <form action="admin.php?m=new_item&p=item" method="post"  enctype="multipart/form-data" >
        <?php } ?>
        	<table >
            	<tr>
                	<td valign="top">
						<?php if ($_obj['page_type'] == "category"){ ?>
							页面名称：
						<?php } else { ?>
							 所属分类
						<?php } ?>
					</td>
                	<td>
						<?php if ($_obj['page_type'] == "category"){ ?>
							<?php echo $_obj['category_name']; ?>
							<input type="hidden" name="name" value="<?php echo $_obj['category_name']; ?>"  />
							<input type="hidden" name="category_id" value="<?php echo $_obj['category_id']; ?>" />
						<?php } else { ?>
							<div><select name="category_id" >
	                        	<option value="0"> 请选择...</option>
	                        		<?php echo $_obj['category_tree']; ?>
	                        	</select>*
							</div>
						<?php } ?>
                    	
                    </td>
               	</tr>
		<?php if ($_obj['page_type'] != "category"){ ?>
            	<tr>
                	<td>标题</td>
                	<td>
				<input type="text" class="inputtext" name="name" value="<?php echo $_obj['item']['name']; ?>" style="width:600px" />*
			</td>
               	</tr>
		<?php } ?>
            	<tr>
                	<td>关键词</td>
                	<td><input type="text" class="inputtext" name="keywords" value="<?php echo $_obj['item']['keywords']; ?>" style="width:600px" /></td>
               	</tr>
		<?php if ($_obj['page_type'] != "category"){ ?>
            	<tr>
                	<td>作者</td>
                	<td><input size="20" name="author" value='<?php
echo htmlspecialchars($_obj['item']['author']);
?>' /></td>
               	</tr>
		<?php } ?>
            	<tr>
                	<td>发布时间</td>
                	<td>
                    	<input type="text" size="4" name="time[year]" value="<?php echo date('Y',$_obj['publish_time']);?>" />年 
                        <input type="text" size="2" name="time[month]" value="<?php echo date('m',$_obj['publish_time']);?>" />月 
                        <input type="text" size="2" name="time[day]" value="<?php echo date('d',$_obj['publish_time']);?>" />日 
                        <input type="text" size="2" name="time[hour]" value="<?php echo date('H',$_obj['publish_time']);?>" />点 
                        <input type="text" size="2" name="time[minute]" value="<?php echo date('i',$_obj['publish_time']);?>" />分 
                    </td>
               	</tr>
				<tr>
                	<td >注意</td>      							                    
                    <td>上传PDF文件时，请首先修改文件名称，文件名称规则为:UESTC加当前日期，例如:UESTC20100304</td>
                </tr>
                <tr>
                	<td valign="top">内容</td>
                    <td>
				<?php
				$oFCKeditor = new FCKeditor('description') ;
				$oFCKeditor->Width = 800;
				$oFCKeditor->Height= 600;
				$oFCKeditor->BasePath	= 'http://www.xb.uestc.edu.cn/social/lz_system/plugin/fckeditor/' ;

				$oFCKeditor->Value		= $_obj['item']['description'];
				$oFCKeditor->Create() ;

                    ?></td>
                </tr>
		<tr>
			<Td>上传附件</td>
			<td><iframe src="admin.php?p=upload" style="width:800px;height:30px;border:0;text-align:left;" border="0" frameborder="no" scrolling="no"></iframe></td>
                </tr>
                <tr>
                	<td colspan="2" align="center">
				<input type="submit" value="提交" /> &nbsp;
				<input type="button" value="返回"  onclick="if (confirm('这意味着所有的修改不会被保存，您要继续吗？')) history.go(-1);" /> &nbsp;
			</td>
                </tr>
             </table>
             
                
           </form>