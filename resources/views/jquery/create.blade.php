<!DOCTYPE html>
<html>
	<head>
		<title>jQuery Number Format Plugin</title>
		
		<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
		<script type="text/javascript" src="http://www.teamdf.com/jquery-plugins/resources/javascripts/prettify.js"></script>
		<script type="text/javascript" src="http://www.teamdf.com/jquery-plugins/resources/javascripts/docs.js"></script>
		<script type="text/javascript" src="../jquery.number.js"></script>
		
		<link rel="stylesheet" href="http://www.teamdf.com/jquery-plugins/resources/stylesheets/prettify.css"/>
		<link rel="stylesheet" href="http://www.teamdf.com/jquery-plugins/resources/stylesheets/docs.css"/>
				
		<script type="text/javascript">
			
			$(function(){
				// Set up the number formatting.
				
				$('#number_container').slideDown('fast');
				
				$('#price').on('change',function(){
					console.log('Change event.');
					var val = $('#price').val();
					$('#the_number').text( val !== '' ? val : '(empty)' );
				});
				
				$('#price').change(function(){
					console.log('Second change event...');
				});
				
				$('#price').number( true, 2 );
				
				
				// Get the value of the number for the demo.
				$('#get_number').on('click',function(){
					
					var val = $('#price').val();
					
					$('#the_number').text( val !== '' ? val : '(empty)' );
				});
			});
		</script>
		
		<link rel="stylesheet" href="http://www.teamdf.com/jquery-plugins/resources/stylesheets/prettify.css" type="text/css" />
		
		<style>
			#number_container{
				border: 1px dotted #d0d0d0;
				padding: 15px;
				margin: 10px;
				display: none;
				background: #fafafa;
			}
			
			div.wrap{
				margin: 10px;
				padding-top: 15px;
			}
			
			button{
				display: block;
				margin-top: 25px;
			}
		</style>
	</head>
	<body>
		
		<div id="container">
			<h1>Live Number Formatting</h1>
			<author><a href="http://www.teamdf.com/about/">Sam Sehnert</a></author>
			<version>2.1.0<!-- (<a href="../docs/changelog.html">changelog</a>)--></version>
			<license>&#169; Digital Fusion 2013, <a href="http://teamdf.com/jquery-plugins/license/">MIT</a></license>
			
			<p><a href="http://github.com/teamdf/jquery-number/">Back to GitHub</a> or <a href="http://www.teamdf.com/web/jquery-number-format-redux/196/">Back to Blog Article</a></p>
			<p>Live, as-you-type formatting of a number.</p>
			<code class="prettyprint lang-javascript">$('#price').number( true, 2 );</code>
			
			<div class="wrap">
				<label for="number">How much would you like to pay?</label><br />
				$<input type="text" id="price" name="number" />
				<button id="get_number">Get the Number</button>
			</div>
			
			<div id="number_container">
				<label for="the_number">The number is:</label>
				<pre id="the_number"></pre>
			</div>
		</div>
	</body>
</html>