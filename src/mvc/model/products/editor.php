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
  $prod = $model->db->rselect('bbn_shop_products', [], ['id_note' => $model->data['id']]);
  if ($prod && $prod['id_note']) {
    $cms  = new Cms($model->db);
    $note = $cms->get($prod['id_note'], true);
    if (!empty($prod['front_img'])) {
      $medias = new Medias($model->db);
      $prod['front_img'] = $medias->getMedia($prod['front_img'], true);
      $prod['source'] = $prod['front_img']['path'];
    }
    if ($note) {
      return X::mergeArrays($note, $prod);
    }
  }
}