<?php

class Repopulator
{
	public static $templates = array(
		"todos" => '<div class="repeatable-item item controls-row">
			<input type="text" class="span6" name="todos[{?}][task]" value="{task}" placeholder="Task to do">
			<input type="text" class="span2" name="todos[{?}][duedate]" value="{duedate}" placeholder="Due by">
			<input type="button" class="btn btn-danger span-2 delete" value="X" />
		</div>',
		"people" => '<div class="repeatable-item item controls-row">
			<input type="text" class="span4" name="people[{?}][firstname]" value="{firstname}" placeholder="First name">
			<input type="text" class="span4 name="people[{?}][lastname]" value="{lastname}" placeholder="Last name">
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