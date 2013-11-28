<?php

class Repopulator
{
	public static $templates = array(
		"todos" => '<div class="field-group controls-row">
			<input type="text" class="span6" name="todos[{?}][task]" value="{task}" placeholder="Task to do">
			<input type="text" class="span2" name="todos[{?}][duedate]" value="{duedate}" placeholder="Due by">
			<input type="button" class="btn btn-danger span-2 delete" value="X" />
		</div>',
		"todos_labels" => '<div class="field-group controls-row">
			<div class="span6">
			<label for="task_{?}">Task to do</label>
			<input type="text" class="span6" name="todos_labels[{?}][task]" value="{task}" id="task_{?}">
			</div>
			<div class="span4">
			<label for="duedate_{?}">Due date</label>
			<input type="text" class="span2" name="todos_labels[{?}][duedate]" value="{duedate}" id="duedate_{?}">
			<input type="button" class="btn btn-danger span-2 delete" value="X" />
			</div>
		</div>',
		"people" => '<div class="field-group controls-row">
			<input type="text" class="span4" name="people[{?}][firstname]" value="{firstname}" placeholder="First name">
			<input type="text" class="span4" name="people[{?}][lastname]" value="{lastname}" placeholder="Last name">
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