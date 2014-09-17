function $_(obj)
{
	return document.getElementById(obj);
}

function getOuterHTML(obj)
{
	var div = document.createElement('div');
	div.appendChild(obj.cloneNode(1));
	return div.innerHTML;
}

function load_admin()
{
	load('lz_system/view/js/admin.js.css');
	load('js.php?p=admin');
}

function load_login()
{
	load('lz_system/view/js/login.js.css');
	load('js.php?p=login');
}

function load(url,css)
{
	var ext = url.substring(url.length-4,url.length);
	var head = document.getElementsByTagName('head');
	head = head[0];
	if (ext.toLowerCase() == '.css' || css)
	{
		var dom = document.createElement('link');
		dom.rel = "stylesheet";
		dom.href = url;
	}
	else 
	{
		var dom = document.createElement('script');
		dom.src = url;
	}
	head.appendChild(dom);
}

function get_value_from_url(url,key)
{
	eval('var re = /'+key+'=([^&]*)/;');
	re = re.exec(url);
	if (re) return re[1];
}


jQuery.fn.center = function(params) 
{
	var options =
	{
		up: 50,
		animate:100,
		easing: 'linear'
	}
	op = jQuery.extend(options, params);

   	this.each(function()
	{
		var left = ($(window).width() - $(this).width() ) / 2 ;
		var top = ( ($(window).height() - $(this).height() ) / 2) - op.up;
		var css = {left:left,top:top};
		if (op.animate)
		{
			$(this).animate(css,op.animate,op.easing);
		}
		else
		{
			$(this).css(css);
		}
   	});
	return this;
};



///image preview


function close_preview()
{
	$('[preview]').fadeOut('fast',function()
	{
		$('[preview]').each(function()
		{
			this.parentNode.removeChild(this);
		});
	});
}

function get_page_size()
{
	var div = document.createElement('div');
	$(div).css(
	{
		position:'absolute',
		top:0,left:0,
		margin:0,border:0,padding:0,
		width:'100%',height:'100%',
		zIndex:99,
		backgroundColor:'transparent'
	}).html(' ');
	$(document.body).append(div);
	var re = {};
	re.height = ($(document.body).height() > $(div).height())?$(document.body).height():$(div).height();
	re.width = ($(document.body).width() > $(div).width())?$(document.body).width():$(div).width();
	document.body.removeChild(div);
	return re;
}

function preview(url)
{
	var bg = document.createElement('div');
	var page = get_page_size();
	$(bg).css(
		{
			height: page.height,
			width: page.width,
			zIndex: '999',
			display:'none',
			position:'absolute',
			top:'0px',
			left:'0px',
			padding:'0px',
			margin:'0px'
		})
		.fadeTo(1,0,function(){ this.style.display = ''; })
		.attr('id','preview_bg')
		.attr('preview','yes')
		.bind('click',close_preview);
	
	$(document.body).append(bg);
	$(bg).css('background-color','#000000').fadeTo(700,0.8);
	
	var div = document.createElement('div');
	$(div)
		.css(
		{
			height: '100px',
			width: '100px',
			zIndex: '1000',
			position:'absolute',
			top:'0px',
			left:'0px',
			background:'#fff url(public/images/loading.gif) no-repeat 50% 50%',
			padding:'0px',
			margin:'0px'
		})
		.attr('preview','yes');
	
	
	
	$(div)
		.attr('id','preview_img_div')
		.attr('img_src',url)
		.attr('img_rel',rel)
		.css(
			{ 
				top: $(document).scrollTop()+50, 
				left: $(document).scrollLeft() + ($(window).width() / 2) -50
			})
		.fadeIn()
		.bind('click',function(event){ event.returnValue = false; return false; });
	$(document.body).append(div);

	window.preview_worked = false;
	var imgobj = new Image();
	$(imgobj).bind('load',preview_img_load).attr('id','preview_hidden_img').attr('src',url).css('display','none').attr('preview','yes');
	$(document.body).append(imgobj);
	//window.load_image_interval = setInterval( function() { if (imgobj.width>0 && imgobj.height>0 ) preview_img_load.call(imgobj); clearInterval(window.load_image_interval);},100);
}


function preview_img_load()
{
	if (window.preview_worked) return;
	window.preview_worked = true;
	$('#preview_img_div').css('background','#fff url()');
	var div_width = parseInt(this.width) + 20;
	var div_height = parseInt(this.height) + 20;

	$('#preview_img_div')
		.animate({ width: div_width , left: $(document).scrollLeft() + ($(window).width() - div_width ) / 2 },700)
		.animate({ height: div_height }, 700 ,function()
		{ 
			var img = document.createElement('img');
			img.style.margin = "10px";
			img.src = $('#preview_img_div').attr('img_src');
			
			$(img).fadeTo(1,0,function()
			{
				$('#preview_img_div').append(this).find('img').fadeTo('fast',1, function()
				{
					var div = document.createElement('div');
					$(div)
						.css('height','30px')
						.html('<div style="float:right;margin-right:10px;cursor:pointer;width:50px;font-weight:bold;" onclick="close_preview()">CLOSE</div>');
					$('#preview_img_div').append(div).animate({ height:'+=30px'},'fast');
				});
			});
		});
}
