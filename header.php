
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title><?php echo $title ?></title>
	
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script type="text/javascript" src="http://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/3.0.2/normalize.css"/>
	<script type="text/javascript">
	$(function(){
		var $search = $('#search');
		$search.autocomplete({
			source: 'api.php',
			autoFocus: true,
			select: function(event, ui){
				window.location.href = '?id='+ ui.item.baslik_id +'&getir=baslik';
			}
		});
		
		
	});
	</script>
</head>
<body>


