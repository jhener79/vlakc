<?php 

JHtml::_('behavior.modal');
$document = JFactory::getDocument();

printf('<div class="uk-form-controls-condensed uk-button-group" style="font-size: inherit;">');
printf('<input %s>', $control->attributes(array_merge($node->attr(), array('type' => 'text', 'class'=>'uk-form-width-medium uk-text-small', 'name' => $name, 'value' => $value, 'id' => md5($name))), array('label', 'description', 'default', 'directory')));
printf('
	<a class="modal uk-button" title="Select" href="index.php?option=com_media&amp;view=images&amp;tmpl=component&amp;asset=239&amp;author=&amp;fieldid='.md5($name).'&amp;folder='.$node->attr('directory').'" rel="{handler: \'iframe\', size: {x: 800, y: 590}}">Select</a>
	<a class="uk-button hasTooltip" title="Clear" href="#" onclick="jInsertFieldValue(\'\', \''.md5($name).'\');return false;">
	<i class="icon-remove"></i>
	</a>');

if ($description = $node->attr('description')) {
    printf('<span class="uk-form-help-inline">%s</span>', $node->attr('description'));
}

printf('</div>');

$document->addScriptDeclaration('
	function jInsertFieldValue(value, id) {
		var old_value = document.id(id).value;
		if (old_value != value) {
			var elem = document.id(id);
			elem.value = value;
			elem.fireEvent("change");
			if (typeof(elem.onchange) === "function") {
				elem.onchange();
			}
		}
	}
');