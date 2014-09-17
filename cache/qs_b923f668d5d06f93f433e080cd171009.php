        <?php if ($_obj['item_id']){ ?>
        <form action="admin.php?m=edit_item&p=item&item_id=<?php echo $_obj['item_id']; ?>&page_type=<?php echo $_obj['page_type']; ?>&category_id=<?php echo $_obj['category_id']; ?>" method="post" enctype="multipart/form-data" style="width:520px;">
        <?php } else { ?>
        <form action="admin.php?m=new_item&p=item" method="post"  enctype="multipart/form-data" >
        <?php } ?>
        	<table  >
                <tbody style="float:left">
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
				<input type="text" class="inputtext" name="name" value="<?php echo $_obj['item']['name']; ?>" style="width:300px" />*
                
			</td>
               	</tr>
                <tr>
                	<td>英文标题</td>
                	<td>
				<input type="text" class="inputtext" name="name_en" value="<?php echo $_obj['item']['name_en']; ?>" style="width:300px" />
                
			</td>
               	</tr>
		<?php } ?>
            	<tr>
                	<td>关键词</td>
                	<td>
                        <input type="text" class="inputtext" name="_keywords" value="<?php
                        $keywords_i=1;
                        $keywords_count = count($_obj['keywords']);
                        if(!empty($_obj['keywords']))
                        foreach($_obj['keywords'] as $value) {
                            echo $value['keyword'];
                            if($keywords_i++<$keywords_count)
                                echo ";";
                        }?>" style="width:100px;" />
                    </td>
               	</tr>
		<?php if ($_obj['page_type'] != "category"){ ?>
            	<tr>
                	<td>作者</td>
                	<td>
                        <input class="authorin" size="20" name="_author" value='<?php 
                        $author_i = 0;
                        $author_count = count($_obj['authors']);
                        if(!empty($_obj['authors']))
                        foreach($_obj['authors'] as $value) {
                            if(empty($value['author']))
                                continue;
                            $author_i++;
                            echo $value['author']."$author_i";
                            if($author_i<$author_count)
                                echo ";";
                        }?>' />
                    </td>
               	</tr>
                <tr>
                    <td>单位</td>
                    <td>
                        <input class="authorin" size="20" name="_institution" value='<?php 
                        $author_i = 0;
                        if(!empty($_obj['authors']))
                        foreach($_obj['authors'] as $value) {
                            if(empty($value["institution"]))
                                continue;
                            $author_i++;
                            echo $value["institution"];
                            if($author_i<$author_count)
                                echo ";";
                        }?>' />
                    </td>
                </tr>
                <tr>
                    <td>作者(英文)</td>
                    <td>
                        <input class="authorin" size="20" name="_authoren" value='<?php 
                        $author_i = 0;
                        if(!empty($_obj['authors']))
                        foreach($_obj['authors'] as $value) {
                            if(empty($value["author_en"]))
                                continue;
                            $author_i++;
                            echo $value["author_en"]."$author_i";
                            if($author_i<$author_count)
                                echo ";";
                        }?>' />
                    </td>
                </tr>
                <tr>
                    <td>单位(英文)</td>
                    <td>
                        <input class="authorin" size="20" name="_institutionen" value='<?php 
                        $author_i = 0;
                        if(!empty($_obj['authors']))
                        foreach($_obj['authors'] as $value) {
                            if(empty($value["institution_en"]))
                                continue;
                            $author_i++;
                            echo $value["institution_en"];
                            if($author_i<$author_count)
                                echo ";";
                        }?>' />
                    </td>
                </tr>
		<?php } ?>
                <tr>
                    <td>期数及页码</td>
                    <td>
                        <input class="authorin" size="20" name="periodsAndpage" value="<?=$_obj['item']['periodsAndpage']?>"/>
                    <td>
                </tr>
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
                    <td>DOI</td>
                    <td><input type="text" name="DOI" value="<?php echo $_obj['item']['DOI']; ?>" style="width:300px;"></td>
                </tr>
                <tr>
                    <td>分类号</td>
                    <td><input type="text" name="classnum" value="<?php echo $_obj['item']['classnum']; ?>" style="width:300px;"></td>
                </tr>
				<tr>
                	<td >注意</td>      							                    
                    <td>！！！！上传附件、图片、pdf文件，请首先修改文件名称，文件名称规则为:UESTC加当前日期，例如:UESTC20100304</td>
                </tr>
             <!--   <tr>
                	<td valign="top">内容</td>
                    <td>
				<?php
				$oFCKeditor = new FCKeditor('description') ;
				$oFCKeditor->Width = 800;
				$oFCKeditor->Height= 600;
				$oFCKeditor->BasePath	= 'lz_system/plugin/fckeditor/' ;

				$oFCKeditor->Value		= $_obj['item']['description'];
				$oFCKeditor->Create() ;

                    ?></td>
                </tr> -->
		<tr>
			<td>上传附件</td>
			<td><iframe src="admin.php?p=upload" style="width:800px;height:30px;border:0;text-align:left;" border="0" frameborder="no" scrolling="no"></iframe></td>
            <input type="hidden" id="file_name" name="file_name"/>
                </tr>
                <tr>
                    <td>摘要*</td>
                    <td><textarea class="texta" name="description"><?php echo $_obj['item']['description']; ?></textarea></td>
                </tr>
                <tr>
                    <td>参考文献</td>
                    <td><textarea id="abst" class="texta" name="reference"><?php echo $_obj['item']['reference']; ?></textarea></td>
                </tr>
                 <tr>
                    <td style="float:left;width:100px;">html在线阅读编辑</td>
                    
                     
                     
                </tr>
                <script type="text/javascript" src="editor/ueditor.config.js"></script>
<script type="text/javascript" src="editor/_examples/editor_api.js"></script>
<script type="text/javascript" src="editor/lang/zh-cn/zh-cn.js"></script>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                UE.getEditor('dor');
                                $("#t1").leanModal({ top : 100, overlay : 0.7, closeButton: ".close" });
                               // $('#t1').leanModal();
                            });
                        </script>
                <script type="text/plain" id="dor"  style="width:500px;">
                    
                        </script>
                    <input id="test1" name="html" type="hidden" value="" >
                    <script type="text/javascript">
                        $(document).ready(function(){
                            UE.getEditor('dor').addListener( 'ready', function( editor ) {
                                UE.getEditor('dor').setContent('<?php echo $_obj['item']['html']; ?>');
                            } );
                            $('#dsda').click(function(){
                               $('#test1').val(UE.getEditor('dor').getContent());
                            })
                            
                        })
                        
                    </script>
                <tr>
                    
            <td colspan="2" align="center">
				<input  id="dsda" type="submit" value="提交" /> &nbsp;
				<input type="button" value="返回"  onclick="if (confirm('这意味着所有的修改不会被保存，您要继续吗？')) history.go(-1);" /> &nbsp;
			</td>
                </tr>
            </tbody>
             </table>
             
                
           </form>