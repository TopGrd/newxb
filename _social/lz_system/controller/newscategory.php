<?php
!defined('LZ_MODULE') && die('Access Denied');
filter_array($_GET,'action,m,intval:category_id!',true);

include_once(LZ_BASEPATH.'model/item.php');
$item = new LZ_Item;
include_once(LZ_BASEPATH.'model/category.php');
$category = new LZ_Category;

$this_category = $category->get_one($category_id);


if ($this_category['parent_id']>0)
{
	$view_data['parent_category'] = $category->get_one($this_category['parent_id']);
}
$position = $category->position_category($category_id);
$view_data['category_id'] = $category_id;
$view_data['category'] = $this_category;
$view_data['position'] = $position;
$view_data['description'] = $this_category['description'];
$view_data['title'] = $this_category['name'].' '.$config['site_name'];
$view_data['category_tree'] = $category->tree_category($category_id);
if (count($view_data['category_tree']) <= 0)
{
	$view_data['sibling_category'] = $category->tree_category($this_category['parent_id']);
	if ($this_category['parent_id'] == "0" ) $view_data['sibling_category'] = array($this_category);
}
else
{
	$view_data['sibling_category'] = $view_data['category_tree'];
}


if ($this_category['status'] == 2) //如果是单网页
{
	$view_data['page_type'] = 'page';
	$view_data['item'] = $item->get_one($this_category['item_id']);
}
else
{
	$view_data['page_type'] = 'category';
	$view_data['keywords'] = $this_category['keywords'];
	$items = lz_page($item,array('category_id'=>$category_id,'with_children_category'=>1),(intval($config['category_list_page_size']))?intval($config['category_list_page_size']):9);
	$view_data['first_item'] = $items[0];
	unset($items[0]);
	$view_data['items'] = $items;
	foreach($view_data['category_tree'] as $_key=>$_cat)
	{
		$view_data['category_tree'][$_key]['items'] = $item->get_list
		( 
			array(
				'category_id'=>$_cat['category_id'],
				'with_children_category'=>1,
				'total'=>$config['children_category_items_num']?$config['children_category_items_num']:7,
			)
		);
	}
}

$_categories_array = $category->get_list( array() );
$categories_array = array();
foreach($_categories_array as $_cat)
{
	$categories_array[$_cat['category_id']] = $_cat;
}
function category_name($id)
{
	global $categories_array;
	return $categories_array[$id]['name'];
}


//print_r($view_data);die;