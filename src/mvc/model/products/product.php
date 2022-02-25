<?php
/**
 * What is my purpose?
 *
 **/
use bbn\X;
use bbn\Appui\Cms;
use bbn\Appui\Medias;
/** @var $model \bbn\Mvc\Model */

if ($model->hasData('id', true)) {
  $shop = new bbn\Shop($model->db);
  return $shop->getFullProduct($model->data['id']);
}