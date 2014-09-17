<?php
!defined("LZ_BASEPATH") && die("this is just a cache!");
include_once(LZ_BASEPATH."model/item.php");
$obj = new LZ_item;
$view_data["hotnews"] = $obj->get_list( array('category_id'=>'47','total'=>'10','with_children_category'=>'1','where'=>'publish_time > '.(time()-60*60*24*$config[hot_news_days]).'','order'=>'view_count DESC',) );
$view_data["announce"] = $obj->get_list( array('category_id'=>'31','total'=>'100','with_children_category'=>'1','status'=>'1','order'=>'order_id DESC,publish_time DESC',) );
include_once(LZ_BASEPATH."model/category.php");
$obj = new LZ_category;
$view_data["hotnews_cat"] = $obj->get_list( array('total'=>'1','category_id'=>'47',) );
$view_data["announce_cat"] = $obj->get_list( array('total'=>'1','category_id'=>'31',) );
?>