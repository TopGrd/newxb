<?php
$q = $_GET['q'];
global $q;
if (!$q) die();
$select= $_GET['tm'];
global $select;
if (!$select) die();
include_once('model/item.php');
$view_data['q'] = $q;
$view_data['select'] = $select;
$item = new lZ_Item;

switch ($select)
{
case 1:
$view_data['items'] = lz_index_page($item,array('where'=>" `name` LIKE '%".mysql_escape_string($q)."%'"),(intval($config['index_search_page_size']))?intval($config['index_search_page_size']):10);
  break;
case 2:
$view_data['items'] = lz_index_page($item,array('where'=>" `author` LIKE '%".mysql_escape_string($q)."%'"),(intval($config['index_search_page_size']))?intval($config['index_search_page_size']):10);
  break;
case 3:
$view_data['items'] = lz_index_page($item,array('where'=>" `keywords` LIKE '%".mysql_escape_string($q)."%'"),(intval($config['index_search_page_size']))?intval($config['index_search_page_size']):10); 
  break;
default: 
$view_data['items'] = lz_index_page($item,array('where'=>" `name` LIKE '%".mysql_escape_string($q)."%'"),(intval($config['index_search_page_size']))?intval($config['index_search_page_size']):10);
}

?>