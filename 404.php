<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Impackd
 * @since Impackd 1.0
 */
 ?>

<!DOCTYPE html><html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>404 : tourandtravelblog</title>		
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="error-404">
					    <h1 class="caption">404 Error!!</h1>
						<h1 class="caption">Page Not Found</h1> 
						<p style="padding-top: 15px;">Seems Like You Are Lost</p>			
						<div class="not-found-search"><?php pnf_search_form(); ?></div>
						<a href="<?php echo home_url(); ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
					</div>
				</div>
			</div>
		</div>
		<style>
		div#error-404 { margin-top: 156px; text-align: center; }
		.not-found-search {	width: 60%; margin: 0 auto; padding: 30px 0 30px 0; }
		button.btn.btn-default { background: #007bff; }
		i.glyphicon.glyphicon-search { color: #fff; }		
		a { background-color: #007bff; border-radius: 5px; box-sizing: border-box; color: rgba(255, 255, 255, 0.8); padding: 13px 25px; text-decoration: none; display: inline-block; position: absolute; left: 50%; transform: translate(-50%); text-align: center; box-shadow: 0 0 15px rgb(14, 53, 158); transition: font-size 0.3s, box-shadow 0.3s; }
		a i { margin-right: 1vmin; }
		a:hover { cursor: pointer; font-size: 0.9rem; box-shadow: 0 3px 20px #007bff; color: #fff; text-decoration: none; }
		</style>
	</body>
</html>

