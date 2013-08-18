<?php

class Repopulator
{
	public static $templates = array(
		"todo" => '<div class="repeatable item controls-row">
			<input type="text" class="span6" name="todo[{?}][task]" value="{task}" placeholder="Task to do">
			<input type="text" class="span2" name="todo[{?}][duedate]" value="{duedate}" placeholder="Due by">
			<input type="button" class="btn btn-danger span-2 delete" value="X" />
		</div>',
		"people" => '<div class="repeatable item controls-row">
			<input type="text" class="span6" name="people[{?}][firstname]" value="{firstname}" placeholder="First name">
			<input type="text" class="span2" name="people[{?}][lastname]" value="{lastname}" placeholder="Last name">
			<input type="button" class="btn btn-danger span-2 delete" value="X" />
		</div>'
	);

	public static function repopulate($key, $post)
	{
		if (empty($post[$key])) return;

		$i = 0;
		foreach ($post[$key] as $formField) {
			$template = preg_replace("/\{\?\}/", $i++, Repopulator::$templates[$key]);
			foreach ($formField as $k => $v) {
				$template = preg_replace("/\{{$k}\}/", $v, $template);
			}
			echo $template;
		}
	}
}

?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dynamic Form Groups</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="assets/css/styles.css" />

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.repeatable.js"></script>

    </head>
    <body>

    	<div class="container">

    		<pre><?php print_r($_POST); ?></pre>

    		<div class="page-header">
		    	<h1>To Do List</h1>
		    </div>

			<form class="form1 form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

				<div class="repeatable-todos"><?php Repopulator::repopulate("todo", $_POST); ?></div>
				<div class="repeatable-people"><?php Repopulator::repopulate("people", $_POST); ?></div>
				
				<div class="form-group">
					<input type="button" value="Add Todo Item" class="btn btn-default add-todo" />
					<input type="button" value="Add Person" class="btn btn-default add-person" />
					<input type="submit" value="Submit" class="btn btn-primary" />
				</div>

			</form>

			<!-- <form class="form2 form-horizontal">

				<div class="repeatable-container"></div>
				
				<div class="form-group">
					<input type="button" value="New Todo Item" class="btn btn-default add" />
					<input type="submit" value="Submit" class="btn btn-primary" />
				</div>

			</form> -->

		</div>

		<script type="text/template" id="todos">
		<?php echo Repopulator::$templates["todo"]; ?>
		</script>

		<script type="text/template" id="people">
		<?php echo Repopulator::$templates["people"]; ?>
		</script>

		<script>
		$(function() {
			$(".form1 .repeatable-todos").repeatable({
				addTrigger: ".form1 .add-todo",
				template: "#todos",
				startWith: 0,
				max: 7
			});
			$(".form1 .repeatable-people").repeatable({
				addTrigger: ".form1 .add-person",
				template: "#people",
				startWith: 1,
				max: 3
			});
			// $(".form2 .repeatable-container").repeatable({
			// 	addTrigger: ".form2 .add",
			// 	template: "#todos",
			// 	startWith: 1
			// });
		});
		</script>

    </body>
</html>