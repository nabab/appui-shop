<?php
/**
 * What is my purpose?
 *
 **/

/** @var bbn\Mvc\Model $model */
$tags  =  new bbn\Appui\Tag($model->db, BBN_LANG);
$opt   =& $model->inc->options;
$shop = new bbn\Shop($model->db);
$tmpProviders = $shop->getProvidersList(['limit' => 0]);
$providers = array_map(function($a){
  $b = [
    'value' => $a['id'],
    'text' => $a['name'],
  ];
  return $b;
}, $tmpProviders['data']);

$id_types_notes = $model->inc->options->fromCode('types', 'appui-note', 'plugins', 'shop', 'appui');
$id_types_products = $model->inc->options->fromCode('product_types');
return [
  'tags' => $tags->getAll(),
  'id_type' => $shop->getProductTypeNote(),
  'providers' => $providers,
  'types' => $model->inc->options->textValueOptions($id_types_products),
  'types_notes' => $model->inc->options->fullOptions($id_types_notes)
];

