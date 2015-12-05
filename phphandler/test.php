<meta http-equiv="Content-Type" content="text/php; charset=utf-8">
<html>
<script>
	$('#btn').click(function(){
		$.post("test2.php",{name:"jng",pwd:"123",repwd:"12345"},
			function(data){
				$('#result').text(data);
			}
				);			
	});
</script>
	<input type="button" id="btn" value="Out return">
</html>
