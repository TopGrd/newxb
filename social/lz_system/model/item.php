<?php
class LZ_Item extends LZ_Model
{
	function LZ_Item()
	{
		$this->table = LZ_MYSQL_PREFIX.'item';
		$this->order_id = 'order_id';
		$this->id = 'item_id';
	}
	
	function add($data=array())
	{
		check_allowed_category($data['category_id'],LZ_RESPONSE == 'text');
		return parent::add($data);
	}
	
	function delete($id)
	{
		$this_item = $this->get_one($id);
		check_allowed_category($this_item['category_id'],LZ_RESPONSE == 'text');
		return parent::delete($id);
	}

	function update($id,$data = array())
	{
		$this_item = $this->get_one($id);
		check_allowed_category($this_item['category_id'],LZ_RESPONSE == 'text');
		if ($data['category_id']) check_allowed_category($data['category_id'],LZ_RESPONSE == 'text');
		return parent::update($id,$data);
	}

	function add_view_count($id)
	{
		global $db;
		return $db->query("UPDATE $this->table SET view_count=view_count+1 WHERE $this->id='$id' LIMIT 1");
	}
	
	function get_list($data=array())
	{
		if ($data['category_id'] == 0) unset($data['category_id']);
		if (isset($data['status']))
		{
			!$data['where'] && $data['where'] = ' 1=1 ';
			$data['where'] .= " AND status IN ($data[status]) ";
			unset($data['status']);
		}
		else
			$data['status'] = '1';
		if ($data['with_children_category'])
		{
			include_once(LZ_BASEPATH.'/model/category.php');
			if ($data['category_id'])
			{
				$category = new LZ_Category;
				$tree = $category->tree_category($data['category_id']);
				$arr = array();
				$category->flat_tree($tree,$arr);
				$ids = array();
				foreach($arr as $_arr) $ids[] = $_arr['category_id'];
				$ids[] = $data['category_id'];
				if ($data['where']) $data['where'].= ' AND ';
				$data['where'] .= ' category_id IN ('.join(',',$ids).')';
			}
			unset($data['with_children_category']);
			unset($data['category_id']);
		}
		
		if (LZ_MODULE == 'admin' && $_SESSION['login_user']['rights']['limit_category_id'] && $_SESSION['login_user']['allowed_categories'])
		{
			$data['where'] && $data['where'] .= ' AND ';
			$data['where'] .= 'category_id IN ('.$_SESSION['login_user']['allowed_categories'].')';
		}
		!$data['order'] && $data['order'] = "order_id DESC,publish_time DESC";
		return parent::get_list($data);
	}
}
?>