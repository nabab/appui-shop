<?php
/**
 * What is my purpose?
 *
 **/

/** @var $model \bbn\Mvc\Model*/
$tags  =  new bbn\Appui\Tag($model->db, BBN_LANG);
$opt   =& $model->inc->options;
$providers = array_map(function($a){
  $b = [
    'value' => $a['id'],
    'text' => $a['name'],
  ];
  return $b;
},$model->db->rselectAll('bbn_shop_providers'));

$id_types_notes = $model->inc->options->fromCode('types', 'note', 'appui');
return [
  'tags' => $tags->getAll(),
  'providers' => $providers,
  'types' => $model->inc->options->textValueOptions($id_types_notes),
  'notesTypes' => $model->inc->options->textValueOptions($model->inc->options->fromCode('types', 'note', 'appui'))
];

