<?php
/**
 * What is my purpose?
 *
 **/
use bbn\X;
use bbn\Appui\Cms;
use bbn\Appui\Medias;
/** @var bbn\Mvc\Model $model */

if ($model->hasData('id', true)) {
  $shop = new bbn\Shop($model->db);
  return $shop->getFullProduct($model->data['id']);
}