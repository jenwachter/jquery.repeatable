# jquery.repeatable.js

A jQuery plugin that allows you to easily create repeatable groups of form fields.



### Getting started

#### Markup

At a bare minimum, the html form should contain a container for which the repeatable items will populate and a button that when clicked, tells jquery.repeatable to add another item. The classes you use can be different than the example below, but make sure you register any differences when you call the plugin. See [settings](#settings) below.

```html
<form>
  <div class="repeatable-container"></div>
  <input type="button" value="Add Person" class="add" />
  <input type="submit" value="Submit" />
</form>
```


#### Field group template

The field group template contains html for the group of form fields that will be repeatable. Here are a few things to keep in mind:

* The form fields need to be within a container element.
* Include the symbol `{?}` when you need a unique value. You must at least include this symbol in the `name` attribute of your form fields to ensure they are all unique.
* If you want users to be able to delete items, include a delete button in the template.

```html
<script type="text/template" id="people">
<div class="field-group">
  <label for="firstname_{?}">First name</label>
  <input type="text" name="firstname_{?}" value="" id="firstname_{?}" />

  <label for="lastname_{?}">First name</label>
  <input type="text" name="lastname_{?}" value="" id="lastname_{?}" />

  <input type="button" class="delete" value="X" />
</div>
</script>
```


### JavaScript

The following JavaScript can be used in conjunction with the form and template shown above.

```javascript
$(function() {
  $("form .repeatable-container").repeatable({
    template: "#people"
  });
});
```
When a user clicks on the `.add` button, the script will render a new `.field-group` within the `.repeatable-container`. Each `{?}` will be replaced with a unique value so that each field is unique in the scope of the form. If a user clicks on a `.delete` button within a group, that group will be removed from the form.


<a name="settings"></a>
### Settings


* __addTrigger__: _Optional_. (string) The selector that when clicked, a new field group will be added to the repeatable item container. Default: ".add"
* __deleteTrigger__: _Optional_. (string) The selector that when clicked, the field group the delete selector is within will be removed from the form. Default: ".delete"
* __itemContainer__: _Optional_. (string) The selector that represents each field group container. Default: ".field-group"
* __max__: _Optional_. (integer) The maximum number of field group elements that may be added to the repeatable item container. Default: null.
* __min__: _Optional_. (integer) The minimum number of field group elements that may be present in the repeatable item container. The form is prepopulated with this amount of field group elements. Default: 0.
* __beforeAdd__: _Optional_. (function) A function to run before an item is added to the repeatable item container. Default: none
* __afterAdd__: _Optional_. (function (addedItem)) A function to run after an item is added to the repeatable item container. Default: none
* __beforeDelete__: _Optional_. (function (itemToDelete)) A function to run before an item is deleted from the repeatable item container. Default: none
* __afterDelete__: _Optional_. (function) A function to run after an item is deleted from the repeatable item container. Default: none
* __template__: _Required_. (string) The selector that contains the form field group template.
