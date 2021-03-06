<?php
class LZ_Category extends LZ_Model
{
	function LZ_Category()
	{
		$this->table = LZ_MYSQL_PREFIX.'category';
		$this->order_id = 'order_id';
		$this->id = 'category_id';
	}

	function delete($id)
	{
		global $cache;
		check_allowed_category($id,LZ_RESPONSE == 'text');
		$cat = $this->get_one($id);
		if ($cat['status'] == 2) //if it is a single page
		{
			include_once(LZ_BASEPATH.'model/item.php');
			$item = new LZ_Item;
			$this_item = $item->get_one( array('status'=>3,'category_id'=>$id) );
			if ($this_item) $item->delete($this_item['item_id']);
		}
		$re = parent::delete($id);
		$cache->clear_uri('#admin/category');
		return $re;
	}
	
	function add($data)
	{
		global $cache;
		$re = parent::add($data);
		$cache->clear_uri('#admin/category');
		return $re;
	}

	function update($id,$data)
	{
		global $cache;
		check_allowed_category($id,LZ_RESPONSE == 'text');
		if ($data['status'] == 2)
		{
			include_once(LZ_BASEPATH.'model/item.php');
			$item = new LZ_Item;
			if (!$item->exists( array('status'=>3,'category_id'=>$id) ))
				$data['item_id'] = $item->add( array('category_id'=>$id,'status'=>3,'publish_time'=>time()) );
			else
			{
				$this_item = $item->get_one( array('status'=>3,'category_id'=>$id) );
				$data['item_id'] = $this_item['item_id'];
			}
		}
		$re = parent::update($id,$data);
		$cache->clear_uri('#admin/category');
		return $re;
	}

	function position_category($id)
	{
		global $db;
		$re = array();
		while($id != 0)
		{
			$arr = $this->get_one($id);
			if (LZ_MODULE == 'admin' && $_SESSION['login_user']['rights']['limit_category_id'] && $_SESSION['login_user']['allowed_categories'])
			{
				if (strpos(','.$_SESSION['login_user']['allowed_categories'].',',','.$id.',') !== false)
				{
					$re[] = $arr;
				}
			}
			else
			{
				$re[] = $arr;
			}
			$id = $arr['parent_id'];
		}
		$re = array_reverse($re);
		return $re;
	}
	
	function tree_category($parent_id = 0,$status = false)
	{
		global $cache;
		$cache_uri = '#admin/category/'.$_SESSION['login_user']['user_id'].'/'.$parent_id.'/'.var_export($status,1);
		if ($cache->exists($cache_uri))
		{
			$s = '$re = '.$cache->get($cache_uri,$ttl).';';
			eval($s);
			return $re;
		}
		$re = $this->_tree_category($parent_id,0,$status);
		$cache->add(array('content'=>var_export($re,1),'uri'=>$cache_uri,'ttl'=>30000000));
		return $re;
	}
	
	function _tree_category($parent_id = 0,$depth = 0, $status = false)
	{
		//check_allowed_category($parent_id,LZ_RESPONSE == 'text');
		$re = array();
		$with_children = true;
		$data = array();
		if (LZ_MODULE == 'admin' && $_SESSION['login_user']['rights']['limit_category_id'] && $_SESSION['login_user']['allowed_categories'])
		{
			$data['where'] = 'category_id IN ('.$_SESSION['login_user']['allowed_categories'].')';
			if ($status !== false)	$data['status'] = $status;
			$arr = $this->get_list($data);
			$with_children = false;
		}
		else
		{
			$data['parent_id'] = $parent_id;
			if ($status !== false)	$data['status'] = $status;
			$arr = $this->get_list( $data);
		}
		
		for($i=0;$i<count($arr);$i++)
		{
			$arr[$i]['depth'] = $depth;
			$re[$arr[$i]['category_id']] = $arr[$i];
			if ($with_children) $re[$arr[$i]['category_id']]['children'] = $this->_tree_category($arr[$i]['category_id'],$depth+1,$status);
		}
		return $re;
	}

	function flat_tree($tree,&$re = array())
	{
		foreach($tree as $c)
		{
			//$c['depth'] = $depth;
			$re[] = $c;
			$re[count($re)-1]['children'] = null;
			if (count($c['children'])>0) $this->flat_tree($c['children'],$re);
		}
	}
	
	function get_list($data=array())
	{
		if (LZ_MODULE == 'admin' && $_SESSION['login_user']['rights']['limit_category_id'] && $_SESSION['login_user']['allowed_categories'])
		{
			$data['where'] && $data['where'] .= ' AND ';
			$data['where'] .= 'category_id IN ('.$_SESSION['login_user']['allowed_categories'].')';
		}
		return parent::get_list($data);
	}
}
?>