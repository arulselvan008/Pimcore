<?php

/**
*/


return Pimcore\Model\DataObject\ClassDefinition\CustomLayout::__set_state(array(
   'id' => 'MUDSparePartsSM',
   'name' => 'MUD Spare Parts SM',
   'description' => '',
   'creationDate' => 1670309716,
   'modificationDate' => 1670309724,
   'userOwner' => 2,
   'userModification' => 0,
   'classId' => 'SpareParts',
   'layoutDefinitions' => 
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'fieldtype' => 'panel',
     'layout' => NULL,
     'border' => false,
     'name' => 'pimcore_root',
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
      Pimcore\Model\DataObject\ClassDefinition\Layout\Tabpanel::__set_state(array(
         'fieldtype' => 'tabpanel',
         'border' => false,
         'tabPosition' => NULL,
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
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'name' => 'ProductDetails&Media',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Product Details & Media',
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
                 'name' => 'ProductName',
                 'title' => 'Product Name',
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
              1 => 
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
                 'name' => 'SKU',
                 'title' => 'SKU',
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
              2 => 
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
                 'name' => 'UPC',
                 'title' => 'UPC',
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
                 'name' => 'GlobalTradeItemNumber',
                 'title' => 'Global Trade Item Number',
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
              4 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\Hotspotimage::__set_state(array(
                 'fieldtype' => 'hotspotimage',
                 'queryColumnType' => 
                array (
                  'image' => 'int(11)',
                  'hotspots' => 'text',
                ),
                 'columnType' => 
                array (
                  'image' => 'int(11)',
                  'hotspots' => 'text',
                ),
                 'ratioX' => NULL,
                 'ratioY' => NULL,
                 'predefinedDataTemplates' => '',
                 'name' => 'AssetAdvanced',
                 'title' => 'Asset Advanced',
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
                 'width' => '',
                 'height' => '',
                 'uploadPath' => '/GSM Outdoors/Muddy/Products/Apparel',
              )),
              5 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ImageGallery::__set_state(array(
                 'fieldtype' => 'imageGallery',
                 'width' => '',
                 'height' => '',
                 'uploadPath' => '/GSM Outdoors/Muddy/Products/Apparel',
                 'ratioX' => NULL,
                 'ratioY' => NULL,
                 'predefinedDataTemplates' => '',
                 'name' => 'Assets',
                 'title' => 'Assets',
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
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'icon' => '',
             'labelWidth' => 0,
             'labelAlign' => 'left',
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'name' => 'ProductFeatures',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Product Features',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                 'fieldtype' => 'wysiwyg',
                 'width' => '',
                 'height' => '',
                 'toolbarConfig' => '',
                 'excludeFromSearchIndex' => false,
                 'maxCharacters' => '',
                 'name' => 'Description',
                 'title' => 'Description',
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
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'icon' => '',
             'labelWidth' => 0,
             'labelAlign' => 'left',
          )),
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'name' => 'ProductSpecs',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Product Specs',
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
                 'name' => 'Compatibility',
                 'title' => 'Compatibility',
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
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'icon' => '',
             'labelWidth' => 0,
             'labelAlign' => 'left',
          )),
        ),
         'locked' => false,
         'blockedVarsForExport' => 
        array (
        ),
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
   'default' => 0,
   'dao' => NULL,
   'blockedVarsForExport' => 
  array (
  ),
   'activeDispatchingEvents' => 
  array (
  ),
));
