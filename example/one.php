<?php

require_once("Repopulator.php");

?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dynamic Form Groups</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/styles.css" />

        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.repeatable.js"></script>

    </head>
    <body>

    	<div class="container">

    		<div class="page-header">
		    	<h1>One repeatable</h1>
		    </div>

			<form class="form1 form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

				<fieldset class="definitions">

					<legend>Definitions</legend>

					<div class="repeatable"><?php Repopulator::repopulate("definitions", $_POST); ?></div>
					
					<div class="form-group">
						<input type="button" value="Add Definition" class="btn btn-default add" />
					</div>

				</fieldset>

				<div class="form-group">
					<input type="submit" value="Submit" class="btn btn-primary" />
				</div>

			</form>

		</div>

		<script type="text/template" id="definitions">
		<?php echo Repopulator::$templates["definitions"]; ?>
		</script>

		<script>
		$(function() {
			$(".form1 .definitions .repeatable").repeatable({
				addTrigger: ".form1 .add",
				template: "#definitions",
				startWith: 1
			});
		});
		</script>

    </body>
</html>