<?php
use bbn\X;

$opt =& $model->inc->options;
$db =& $model->db;

if (!empty($model->data['limit'])) {
  $shop = new bbn\Shop($model->db);
  return $shop->getAdminList($model->data);
}
else {
  return [
    'types' => $model->inc->options->textValueOptions($model->inc->options->fromCode('types', 'note', 'appui'))
  ];
}
