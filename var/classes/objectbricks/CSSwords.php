<?php

/**
 * Fields Summary:
 * - Weight [inputQuantityValue]
 * - BladeThickness [inputQuantityValue]
 * - BladeLength [inputQuantityValue]
 * - BladeSteel [input]
 * - HandleLengthMaterial [input]
 * - OverallLength [inputQuantityValue]
 * - AdditionalFeatures [textarea]
 * - BladeLengthRange [inputQuantityValue]
 * - SteelFamily [input]
 * - SwordStyle [input]
 */

return Pimcore\Model\DataObject\Objectbrick\Definition::__set_state(array(
   'classDefinitions' => 
  array (
    0 => 
    array (
      'classname' => 'NewColdSteelProducts',
      'fieldname' => 'Swords',
    ),
  ),
   'dao' => NULL,
   'key' => 'CSSwords',
   'parentClass' => '',
   'implementsInterfaces' => '',
   'title' => 'Sword Specifications',
   'group' => 'New ColdSteel',
   'layoutDefinitions' => 
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'fieldtype' => 'panel',
     'layout' => NULL,
     'border' => false,
     'name' => NULL,
     'type' => NULL,
     'region' => NULL,
     'title' => NULL,
     'width' => 0,
     'height' => 0,
     'collapsible' => false,
     'collapsed' => false,
     'bodyStyle' => NULL,
     'datatype' => 'layout',
     'permissions' => NULL,
     'children' => 
    array (
      0 => 
      Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
         'fieldtype' => 'fieldset',
         'name' => 'Layout',
         'type' => NULL,
         'region' => NULL,
         'title' => '',
         'width' => '',
         'height' => '',
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => '',
         'datatype' => 'layout',
         'permissions' => NULL,
         'children' => 
        array (
          0 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\InputQuantityValue::__set_state(array(
             'fieldtype' => 'inputQuantityValue',
             'width' => '',
             'unitWidth' => NULL,
             'defaultValue' => NULL,
             'defaultUnit' => 'Ounce',
             'validUnits' => 
            array (
              0 => 'Ounce',
            ),
             'integer' => false,
             'unsigned' => false,
             'minValue' => NULL,
             'maxValue' => NULL,
             'unique' => NULL,
             'decimalSize' => NULL,
             'decimalPrecision' => NULL,
             'autoConvert' => NULL,
             'name' => 'Weight',
             'title' => 'Weight',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => true,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'defaultValueGenerator' => '',
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\InputQuantityValue::__set_state(array(
             'fieldtype' => 'inputQuantityValue',
             'width' => '',
             'unitWidth' => NULL,
             'defaultValue' => NULL,
             'defaultUnit' => 'Inches',
             'validUnits' => 
            array (
              0 => 'Inches',
            ),
             'integer' => false,
             'unsigned' => false,
             'minValue' => NULL,
             'maxValue' => NULL,
             'unique' => NULL,
             'decimalSize' => NULL,
             'decimalPrecision' => NULL,
             'autoConvert' => NULL,
             'name' => 'BladeThickness',
             'title' => 'Blade Thickness',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => true,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'defaultValueGenerator' => '',
          )),
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\InputQuantityValue::__set_state(array(
             'fieldtype' => 'inputQuantityValue',
             'width' => '',
             'unitWidth' => NULL,
             'defaultValue' => NULL,
             'defaultUnit' => 'Inches',
             'validUnits' => 
            array (
              0 => 'Inches',
            ),
             'integer' => false,
             'unsigned' => false,
             'minValue' => NULL,
             'maxValue' => NULL,
             'unique' => NULL,
             'decimalSize' => NULL,
             'decimalPrecision' => NULL,
             'autoConvert' => NULL,
             'name' => 'BladeLength',
             'title' => 'Blade Length',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => true,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'defaultValueGenerator' => '',
          )),
          3 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
             'fieldtype' => 'input',
             'width' => '',
             'defaultValue' => NULL,
             'columnLength' => 190,
             'regex' => '',
             'regexFlags' => 
            array (
            ),
             'unique' => false,
             'showCharCount' => false,
             'name' => 'BladeSteel',
             'title' => 'Blade Steel',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => true,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'defaultValueGenerator' => '',
          )),
          4 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
             'fieldtype' => 'input',
             'width' => '',
             'defaultValue' => NULL,
             'columnLength' => 190,
             'regex' => '',
             'regexFlags' => 
            array (
            ),
             'unique' => false,
             'showCharCount' => false,
             'name' => 'HandleLengthMaterial',
             'title' => 'Handle Length/ Material',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'defaultValueGenerator' => '',
          )),
          5 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\InputQuantityValue::__set_state(array(
             'fieldtype' => 'inputQuantityValue',
             'width' => '',
             'unitWidth' => NULL,
             'defaultValue' => NULL,
             'defaultUnit' => 'Inches',
             'validUnits' => 
            array (
              0 => 'Inches',
              1 => 'Feet',
            ),
             'integer' => false,
             'unsigned' => false,
             'minValue' => NULL,
             'maxValue' => NULL,
             'unique' => NULL,
             'decimalSize' => NULL,
             'decimalPrecision' => NULL,
             'autoConvert' => NULL,
             'name' => 'OverallLength',
             'title' => 'Overall Length',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => true,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'defaultValueGenerator' => '',
          )),
          6 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
             'fieldtype' => 'textarea',
             'width' => 400,
             'height' => 150,
             'maxLength' => NULL,
             'showCharCount' => false,
             'excludeFromSearchIndex' => false,
             'name' => 'AdditionalFeatures',
             'title' => 'Additional Features',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => true,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
          )),
          7 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\InputQuantityValue::__set_state(array(
             'fieldtype' => 'inputQuantityValue',
             'width' => '',
             'unitWidth' => NULL,
             'defaultValue' => NULL,
             'defaultUnit' => 'Inches',
             'validUnits' => 
            array (
              0 => 'Inches',
            ),
             'integer' => false,
             'unsigned' => false,
             'minValue' => NULL,
             'maxValue' => NULL,
             'unique' => NULL,
             'decimalSize' => NULL,
             'decimalPrecision' => NULL,
             'autoConvert' => NULL,
             'name' => 'BladeLengthRange',
             'title' => 'Blade Length Range',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => true,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'defaultValueGenerator' => '',
          )),
          8 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
             'fieldtype' => 'input',
             'width' => '',
             'defaultValue' => NULL,
             'columnLength' => 190,
             'regex' => '',
             'regexFlags' => 
            array (
            ),
             'unique' => false,
             'showCharCount' => false,
             'name' => 'SteelFamily',
             'title' => 'Steel Family',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => true,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'defaultValueGenerator' => '',
          )),
          9 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
             'fieldtype' => 'input',
             'width' => '',
             'defaultValue' => NULL,
             'columnLength' => 190,
             'regex' => '',
             'regexFlags' => 
            array (
            ),
             'unique' => false,
             'showCharCount' => false,
             'name' => 'SwordStyle',
             'title' => 'Sword Style',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => true,
             'visibleSearch' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'defaultValueGenerator' => '',
          )),
        ),
         'locked' => false,
         'blockedVarsForExport' => 
        array (
        ),
         'labelWidth' => 0,
         'labelAlign' => 'left',
      )),
    ),
     'locked' => false,
     'blockedVarsForExport' => 
    array (
    ),
     'icon' => NULL,
     'labelWidth' => 100,
     'labelAlign' => 'left',
  )),
   'generateTypeDeclarations' => true,
   'blockedVarsForExport' => 
  array (
  ),
));
