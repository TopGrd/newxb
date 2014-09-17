<?php
	$item_id = $_GET["item_id"];
	$map = "update lz_item set view_count=view_count+1 where item_id=".$item_id;
	$db->query($map);
	$map = "select html from lz_item where item_id=$item_id limit 1";
	$html = $db->get_all($map);
	$view_data['html'] = $html[0]['html'];
	display("viewhtml.html");