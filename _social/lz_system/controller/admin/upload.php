<?php
LZ_MODULE != 'admin' && die('Access Denied');
$action = $_GET['action'];
$m = $_GET['m'];
$file = $_FILES['upfile'];
if (!is_dir(LZ_TOPPATH.LZ_UPLOAD_PATH)) @mkdir(LZ_TOPPATH.LZ_UPLOAD_PATH,0777);
$err = true;

if (!$_SESSION['login_user']['rights']['upload_add'])
{
	die(LANG_ACCESS_DENIED);
}
if ($file['tmp_name'])
{
	$myfile=$file["tmp_name"];
	$ftype = getext($file['name']);
	if (!$ftype || !preg_match("/\*\.$ftype;/i",$config['upload_file_types']))
	{
		$err = true;
		$msg = lang('not_allowed');
	}
	else
	{
		$file_url = LZ_UPLOAD_PATH.basename($file['name']);
		if (@move_uploaded_file($myfile,LZ_TOPPATH.$file_url))
		{
			$err = false;
			$msg = lang('success');
		}
		else
		{
			$err = lang('failed');
		}
	}
	if (strpos(',jpg,jpeg,gif,png,bmp',','.$ftype.',') !== false)
	{
		$view_data['is_img'] = true;
		include_once('library/image.php');
		$img = new Image;
		$img->filepath = LZ_TOPPATH.$file_url;
		$img->resize_width($config['max_image_width']?$config['max_image_width']:500);
	}
	$view_data['file_url'] = $file_url;
	$view_data['filename'] = $file['name'];
	$view_data['err'] = $err;
	$view_data['msg'] = $msg;
}

$handler = @opendir(LZ_TOPPATH.LZ_UPLOAD_PATH);
$recent = array();
while(($val = readdir($handler)) !== false)
{
	if ($val == '.' || $val == '..' || !is_file(LZ_TOPPATH.LZ_UPLOAD_PATH.$val)) continue;
	$fname = $val;
	$ftype = strtolower(getext($val));
	$encode = (preg_replace('/[a-zA-Z0-9_\.\{\}\[\]\(\)]*/i','',$val) != '');
	$recent[] = array( 
		'name'=>$fname,
		'filepath'=>LZ_UPLOAD_PATH.$val,
		'mtime'=>filemtime(LZ_TOPPATH.LZ_UPLOAD_PATH.$val),
		'ftype'=>$ftype,
		'encode'=>$encode?'yes':'no',
		'isimg'=>(strpos(',jpg,jpeg,gif,png,bmp',','.$ftype.',') === false)?'no':'yes'
	 );
}
closedir($handler);
usort($recent,"cmp_time");
$view_data['recent'] = array();
foreach($recent as $arr)
{
	$view_data['recent'][] = $arr;
	if (count($view_data['recent']) > 20) break;
}
unset($recent);

function cmp_time($a,$b)
{
	if ($a['mtime'] == $b['mtime']) return 0;
	return ($a['mtime'] < $b['mtime'])?1:-1;
}
		
?>