<?php

/**
 * Fields Summary:
 * - field [indexFieldSelectionCombo]
 * - weight [numeric]
 */

return Pimcore\Model\DataObject\Fieldcollection\Definition::__set_state(array(
   'dao' => NULL,
   'key' => 'SimilarityField',
   'parentClass' => '',
   'implementsInterfaces' => '',
   'title' => '',
   'group' => 'Filter Definition',
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
      Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
         'fieldtype' => 'panel',
         'layout' => '',
         'border' => false,
         'name' => 'Layout',
         'type' => '',
         'region' => '',
         'title' => '',
         'width' => '',
         'height' => '',
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => '',
         'datatype' => 'layout',
         'permissions' => '',
         'children' => 
        array (
          0 => 
          Pimcore\Bundle\EcommerceFrameworkBundle\CoreExtensions\ClassDefinition\IndexFieldSelectionCombo::__set_state(array(
             'fieldtype' => 'indexFieldSelectionCombo',
             'specificPriceField' => false,
             'showAllFields' => true,
             'considerTenants' => true,
             'options' => 
            array (
              0 => 
              array (
                'key' => 'categoryIds',
                'value' => 'categoryIds',
              ),
              1 => 
              array (
                'key' => 'name',
                'value' => 'name',
              ),
              2 => 
              array (
                'key' => 'seoname',
                'value' => 'seoname',
              ),
              3 => 
              array (
                'key' => 'description',
                'value' => 'description',
              ),
              4 => 
              array (
                'key' => 'ean',
                'value' => 'ean',
              ),
              5 => 
              array (
                'key' => 'artno',
                'value' => 'artno',
              ),
              6 => 
              array (
                'key' => 'gender',
                'value' => 'gender',
              ),
              7 => 
              array (
                'key' => 'color',
                'value' => 'color',
              ),
              8 => 
              array (
                'key' => 'size',
                'value' => 'size',
              ),
              9 => 
              array (
                'key' => 'price',
                'value' => 'price',
              ),
              10 => 
              array (
                'key' => 'foottype',
                'value' => 'foottype',
              ),
              11 => 
              array (
                'key' => 'gaittype',
                'value' => 'gaittype',
              ),
              12 => 
              array (
                'key' => 'fittings',
                'value' => 'fittings',
              ),
              13 => 
              array (
                'key' => 'zips',
                'value' => 'zips',
              ),
              14 => 
              array (
                'key' => 'approvals',
                'value' => 'approvals',
              ),
              15 => 
              array (
                'key' => 'rating',
                'value' => 'rating',
              ),
              16 => 
              array (
                'key' => 'features',
                'value' => 'features',
              ),
              17 => 
              array (
                'key' => 'attributes',
                'value' => 'attributes',
              ),
              18 => 
              array (
                'key' => 'technologies',
                'value' => 'technologies',
              ),
            ),
             'width' => 300,
             'defaultValue' => NULL,
             'optionsProviderClass' => NULL,
             'optionsProviderData' => NULL,
             'columnLength' => 190,
             'dynamicOptions' => false,
             'name' => 'field',
             'title' => 'Field',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => '',
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
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
             'fieldtype' => 'numeric',
             'width' => 300,
             'defaultValue' => 1,
             'integer' => false,
             'unsigned' => false,
             'minValue' => NULL,
             'maxValue' => NULL,
             'unique' => false,
             'decimalSize' => NULL,
             'decimalPrecision' => NULL,
             'name' => 'weight',
             'title' => 'Weight',
             'tooltip' => '',
             'mandatory' => false,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => '',
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
        ),
         'locked' => false,
         'blockedVarsForExport' => 
        array (
        ),
         'icon' => NULL,
         'labelWidth' => 100,
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
