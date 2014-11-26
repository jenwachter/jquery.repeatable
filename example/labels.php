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

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="../jquery.repeatable.js"></script>

    </head>
    <body>

    	<div class="container">

    		<div class="page-header">
		    	<h1>One repeatable with labels</h1>
		    </div>

			<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

				<fieldset class="todos_labels">

					<legend>To Do List</legend>

					<div class="repeatable"><?php Repopulator::repopulate("todos_labels", $_POST); ?></div>
					
					<div class="form-group span4">
						<input type="button" value="Add Todo Item" class="btn btn-default add" />
					</div>

				</fieldset>

				<div class="form-group">
					<input type="submit" value="Submit" class="btn btn-primary" />
				</div>

			</form>

		</div>

		<script type="text/template" id="todos_labels">
		<?php echo Repopulator::$templates["todos_labels"]; ?>
		</script>

		<script>
		$(function() {
			$(".todos_labels .repeatable").repeatable({
				addTrigger: ".todos_labels .add",
				deleteTrigger: ".todos_labels .delete",
				template: "#todos_labels",
				startWith: 1,
				max: 5
			});
		});
		</script>

    </body>
</html>
