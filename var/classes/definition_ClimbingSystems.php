<?php

/**
 * Inheritance: yes
 * Variants: yes
 *
 * Fields Summary:
 * - ProductName [input]
 * - SKU [input]
 * - UPC [input]
 * - GlobalTradeItemNumber [input]
 * - AssetAdvanced [hotspotimage]
 * - Assets [imageGallery]
 * - CantoLink [externalImage]
 * - Brand [manyToOneRelation]
 * - Category [manyToOneRelation]
 * - Description [wysiwyg]
 * - ProductWidth [inputQuantityValue]
 * - ProductHeight [inputQuantityValue]
 * - ProductDepth [inputQuantityValue]
 * - Construction [input]
 * - TotalHeight [input]
 * - HeightPerSection [inputQuantityValue]
 * - Section [inputQuantityValue]
 * - StepWidth [inputQuantityValue]
 * - Packable [input]
 * - Fastners [input]
 * - TotalWeight [inputQuantityValue]
 * - WeightPerSection [inputQuantityValue]
 * - WeightRating [inputQuantityValue]
 * - TreeSize [input]
 * - PriceType [select]
 * - Price [input]
 * - Availability [select]
 * - ItemStatus [select]
 */

return Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'id' => 'ClimbingSystems',
   'name' => 'ClimbingSystems',
   'description' => '',
   'creationDate' => 0,
   'modificationDate' => 1673414545,
   'userOwner' => 2,
   'userModification' => 2,
   'parentClass' => '',
   'implementsInterfaces' => '',
   'listingParentClass' => '',
   'useTraits' => '',
   'listingUseTraits' => '',
   'encryption' => false,
   'encryptedTables' => 
  array (
  ),
   'allowInherit' => true,
   'allowVariants' => true,
   'showVariants' => false,
   'fieldDefinitions' => 
  array (
  ),
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
                 'mandatory' => true,
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
                 'mandatory' => true,
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
              6 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ExternalImage::__set_state(array(
                 'fieldtype' => 'externalImage',
                 'previewWidth' => 1,
                 'inputWidth' => 600,
                 'previewHeight' => 1,
                 'name' => 'CantoLink',
                 'title' => 'Canto Link',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => 400,
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'objectsAllowed' => true,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'classes' => 
                array (
                  0 => 
                  array (
                    'classes' => 'GSMBrands',
                  ),
                ),
                 'pathFormatterClass' => '',
                 'name' => 'Brand',
                 'title' => 'Brand',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
              )),
              8 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'fieldtype' => 'manyToOneRelation',
                 'width' => 400,
                 'assetUploadPath' => '',
                 'relationType' => true,
                 'objectsAllowed' => true,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'classes' => 
                array (
                  0 => 
                  array (
                    'classes' => 'ProductCategory',
                  ),
                ),
                 'pathFormatterClass' => '',
                 'name' => 'Category',
                 'title' => 'Category  ',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'datatype' => 'data',
                 'invisible' => false,
                 'visibleGridView' => true,
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
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'autoConvert' => false,
                 'name' => 'ProductWidth',
                 'title' => 'Product Width',
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
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'autoConvert' => false,
                 'name' => 'ProductHeight',
                 'title' => 'Product Height',
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
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'autoConvert' => false,
                 'name' => 'ProductDepth',
                 'title' => 'Product Depth',
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
                 'name' => 'Construction',
                 'title' => 'Construction',
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
                 'name' => 'TotalHeight',
                 'title' => 'Total Height',
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
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'autoConvert' => false,
                 'name' => 'HeightPerSection',
                 'title' => 'Height per section',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\InputQuantityValue::__set_state(array(
                 'fieldtype' => 'inputQuantityValue',
                 'width' => '',
                 'unitWidth' => NULL,
                 'defaultValue' => NULL,
                 'defaultUnit' => 'None',
                 'validUnits' => 
                array (
                  0 => 'Kilogram',
                  1 => 'Pound',
                  2 => 'None',
                  3 => 'Meter',
                  4 => 'Inches',
                  5 => 'Yards',
                  6 => 'Feet',
                  7 => 'Millimeter',
                  8 => 'Centimeter',
                ),
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'autoConvert' => false,
                 'name' => 'Section',
                 'title' => 'Section',
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
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'autoConvert' => false,
                 'name' => 'StepWidth',
                 'title' => 'Step Width',
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
                 'name' => 'Packable',
                 'title' => 'Packable',
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
                 'name' => 'Fastners',
                 'title' => 'Fastners',
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
              10 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\InputQuantityValue::__set_state(array(
                 'fieldtype' => 'inputQuantityValue',
                 'width' => '',
                 'unitWidth' => NULL,
                 'defaultValue' => NULL,
                 'defaultUnit' => 'Pound',
                 'validUnits' => 
                array (
                  0 => 'Pound',
                ),
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'autoConvert' => false,
                 'name' => 'TotalWeight',
                 'title' => 'Total Weight',
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
              11 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\InputQuantityValue::__set_state(array(
                 'fieldtype' => 'inputQuantityValue',
                 'width' => '',
                 'unitWidth' => NULL,
                 'defaultValue' => NULL,
                 'defaultUnit' => 'Pound',
                 'validUnits' => 
                array (
                  0 => 'Pound',
                ),
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'autoConvert' => false,
                 'name' => 'WeightPerSection',
                 'title' => 'Weight Per Section',
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
              12 => 
              Pimcore\Model\DataObject\ClassDefinition\Data\InputQuantityValue::__set_state(array(
                 'fieldtype' => 'inputQuantityValue',
                 'width' => '',
                 'unitWidth' => NULL,
                 'defaultValue' => NULL,
                 'defaultUnit' => 'Pound',
                 'validUnits' => 
                array (
                  0 => 'Pound',
                ),
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'autoConvert' => false,
                 'name' => 'WeightRating',
                 'title' => 'Weight Rating',
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
              13 => 
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
                 'name' => 'TreeSize',
                 'title' => 'Tree Size',
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
             'icon' => '',
             'labelWidth' => 0,
             'labelAlign' => 'left',
          )),
          3 => 
          Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
             'fieldtype' => 'panel',
             'layout' => NULL,
             'border' => false,
             'name' => 'Pricing',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Pricing & Availability',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'fieldtype' => 'select',
                 'options' => 
                array (
                  0 => 
                  array (
                    'key' => 'MSRP',
                    'value' => 'MSRP',
                  ),
                  1 => 
                  array (
                    'key' => 'MD',
                    'value' => 'MD',
                  ),
                ),
                 'width' => '',
                 'defaultValue' => '',
                 'optionsProviderClass' => '',
                 'optionsProviderData' => '',
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'name' => 'PriceType',
                 'title' => 'Price Type',
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
                 'name' => 'Price',
                 'title' => 'Price $',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'fieldtype' => 'select',
                 'options' => 
                array (
                  0 => 
                  array (
                    'key' => 'In Stock',
                    'value' => 'In Stock',
                  ),
                  1 => 
                  array (
                    'key' => 'Out of Stock',
                    'value' => 'Out of Stock',
                  ),
                ),
                 'width' => '',
                 'defaultValue' => '',
                 'optionsProviderClass' => '',
                 'optionsProviderData' => '',
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'name' => 'Availability',
                 'title' => 'Availability',
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
              Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'fieldtype' => 'select',
                 'options' => 
                array (
                  0 => 
                  array (
                    'key' => 'Active',
                    'value' => 'Active',
                  ),
                  1 => 
                  array (
                    'key' => 'Inactive',
                    'value' => 'Inactive',
                  ),
                ),
                 'width' => '',
                 'defaultValue' => '1',
                 'optionsProviderClass' => '',
                 'optionsProviderData' => '',
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'name' => 'ItemStatus',
                 'title' => 'Item Status',
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
   'icon' => '/Logo/muddy_icon-for-products.png',
   'previewUrl' => '',
   'group' => 'MUDDY',
   'showAppLoggerTab' => false,
   'linkGeneratorReference' => '@App\\Website\\LinkGenerator\\ClimbingSystemsLinkGenerator',
   'previewGeneratorReference' => '',
   'compositeIndices' => 
  array (
  ),
   'generateTypeDeclarations' => true,
   'showFieldLookup' => false,
   'propertyVisibility' => 
  array (
    'grid' => 
    array (
      'id' => true,
      'key' => false,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
    'search' => 
    array (
      'id' => true,
      'key' => false,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
  ),
   'enableGridLocking' => false,
   'deletedDataComponents' => 
  array (
  ),
   'dao' => NULL,
   'blockedVarsForExport' => 
  array (
  ),
   'activeDispatchingEvents' => 
  array (
  ),
));
