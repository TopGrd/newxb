<?php
LZ_MODULE != 'admin' && die('Access Denied');
filter_array($_GET,'m,action,intval:item_id,intval:category_id,page_type,has_pic,status',true);
$_authorized = false;

$status = isset($_GET['status'])?$_GET['status']:'0,1,2';

include_once('model/category.php');
$category = new LZ_Category;
include_once('model/item.php');
$item = new LZ_Item;

if (!$item_id && $page_type == 'category' && $category_id)
{
	$this_item = $item->get_one( array('status' => 3,'category_id'=>$category_id));
	if ($this_item && $this_item['item_id'])
	{
		$item_id = $this_item['item_id'];
	}
	else
	{
		lz_exit(lang('INPUT_VAR_ERROR'),'javascript:history.go(-1)',5);
	}
}

//添加文章
if ($m == 'new_item')
{
	$data = filter_array($_POST,'name!,time,description!,keywords,intval:category_id!,intval:order_id,author');


	$publish_time = mktime($data['time']['hour'],$data['time']['minute'],0,$data['time']['month'],$data['time']['day'],$data['time']['year']);

	if ($data)
	{
		$data['pic_url'] = get_first_image_url($data['description']);
		$data['has_pic'] = $data['pic_url']?1:0;
		$data['publish_time'] = $publish_time;
		$data['update_time'] = $publish_time;
		$data['user_id'] = $_SESSION['login_user']['user_id'];
		unset($data['time']);
		if ( $item->add( $data ) )
		{
			lz_exit(lang('NEW_ITEM_SUCCESS'),'admin.php?p=item&category_id='.$data['category_id'],1);
		}
		else
		{
			$action = 'new_item';
			$err_msg = lang('ITEM_UNKNOWN_ERROR');
		}
	}
	else
	{
		$action = 'new_item';
		$err_msg = lang('ITEM_FILL_ALL');;
	}
}
else if ($m == 'edit_item')
{
	$data = filter_array($_POST,'name!,time,description!,keywords,intval:category_id!,intval:order_id,author');

	$publish_time = mktime($data['time']['hour'],$data['time']['minute'],0,$data['time']['month'],$data['time']['day'],$data['time']['year']);

	$item_arr = $item->get_one($item_id);

	if ($data)
	{
		unset($data['time']);
		$data['pic_url'] = get_first_image_url($data['description']);
		$data['has_pic'] = $data['pic_url']?1:0;
		$data['update_time'] = time();
		$data['publish_time'] = $publish_time;
		$data['update_user_id'] = $_SESSION['login_user']['user_id'];
		if ( $item->update( $item_id, $data) )
		{
			if ($page_type == 'category')
			{
				$this_category = $category->get_one($data['category_id']);
				$return_to = 'admin.php?p=category&category_id='.$this_category['parent_id'];
			}
			else if ($page_type == 'preview')
			{
				$return_to = 'index.php?p=item&item_id='.$item_id.'&preview=true';
			}
			else 
				$return_to = 'admin.php?p=item&category_id='.$data['category_id'];
			lz_exit(lang('ITEM_EDIT_SUCCESS'),$return_to,1);
		}
		else
		{
			$action = 'edit_item';
			$err_msg = lang('ITEM_UNKNOWN_ERROR');
		}
	}
	else
	{
		$action = 'edit_item';
		$err_msg = lang('ITEM_FILL_ALL');
	}
}
else if ($m == 'status')
{
	$status = intval($_GET['status']);
	$this_item = $item->get_one($item_id);
	if ($item->update($item_id,array('status'=>$status)))
		lz_exit(LANG_PUBLISHED,'admin.php?p=item&category_id='.$this_item['category_id']);
	else
		lz_exit(LANG_PUBLISHED_ERROR,"javascript:history.go(-1);");
}

//添加项目
if ($action == 'new_item')
{
	include_once('plugin/fckeditor/fckeditor.php');
	$temp = template('item_new.html');
	$temp->assign( array(
		'item' => $_POST,
		'categories' => $category->get_list(),
		'publish_time'=>time(),
		'category_id' => $category_id,
		'login_user' => $_SESSION['login_user'],
		'category_tree' => print_category_tree($category->tree_category(0,1),$category_id),
	));
	$view_data['page_description'] = lang('NEW_ITEM');
	$view_data['page_content'] = $temp->result();
}
//编辑项目
else if ($action == 'edit_item')
{
	if (!$item_id)
	{
		lz_exit("need item_id!",'javascript:history.go(-1)',5);
	}
	include_once('plugin/fckeditor/fckeditor.php');
	$temp = template('item_new.html');
	$_item = (count($_POST)>0)?$_POST:$item->get_one($item_id);
	if ($category_id) $_category = $category->get_one($category_id);
	$temp->assign( array(
		'item' => $_item,
		'publish_time'=>$_item['publish_time'],
		'item_id' => $item_id,
		'categories' => $category->get_list(),
		'category_id' => $category_id,
		'page_type' => $page_type,
		'category_name' => $_category['name'],
		'login_user' => $_SESSION['login_user'],
		'category_tree' => print_category_tree($category->tree_category(0),$_item['category_id']),
	));
	$view_data['page_description'] = $page_type == 'category'?lang('EDIT_PAGE'):lang('EDIT_ITEM');
	$view_data['page_content'] = $temp->result();
}
//显示分类和项目列表
else
{
	$this_category = $category->get_one($category_id);
	if ($this_category['status'] == '2')
	{
		header("location:admin.php?p=item&action=edit_item&category_id=$category_id&page_type=category");
		die;
	}
	$categories_arr = $category->get_list();
	$categories = array();
	$all_category = array();
	foreach($categories_arr as $c)
	{
		if ($c['parent_id'] == $category_id)
		{
			$categories[] = $c;
		}
		$all_category[$c['category_id']] = $c['name'];
	}

	//分页处理
	$cond = array('category_id'=>$category_id,'status'=>$status);
	if ($has_pic) $cond['has_pic'] = 1;
	$items = lz_page($item,$cond,(intval($config['admin_item_page_size']))?intval($config['admin_item_page_size']):20);
	for($i=0;$i<count($items);$i++)
	{
		$_c = $all_category[$items[$i]['category_id']];
		$items[$i]['category_name'] = $_c?$_c:lang('DEFAULT_CATEGORY');
	}

	$view_data['categories'] = $categories;
	$view_data['items'] = $items;
	$view_data['page_description'] = lang('ITEM_LIST');
}
$_tree = $category->tree_category(0);
$view_data['all_category'] = print_category_tree_link('admin.php?p=item&category_id=',$_tree,$category_id);
$view_data['category_tree'] = print_category_tree($category->tree_category(0,1));
$view_data['real_content'] = "category_new.html";
$view_data['err_msg'] = $err_msg;
$view_data['success_msg'] = $success_msg;
$view_data['category_id'] = $category_id;
$view_data['position'] = $category->position_category($category_id);

//nav
$statuses = array();
foreach($news_status as $key=>$val) $statuses[] = array('index'=>$key,'value'=>$val);
$view_data['statuses'] = $statuses;
$view_data['current_status_all'] = isset($_GET['status'])?false:true;
$view_data['status'] = $view_data['current_status_all']?'-1':$status;
$view_data['has_pic'] = $has_pic;
$has_pic && $view_data['current_status_all'] = false;
function show_status($s)
{
	global $news_status;
	return $news_status[$s]?$news_status[$s]:lang('UNKNOWN');
}

?>