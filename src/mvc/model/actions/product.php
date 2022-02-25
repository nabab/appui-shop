<?php
/**
 * What is my purpose?
 *
 **/

use bbn\X;

/** @var $model \bbn\Mvc\Model*/

if ($model->hasData('action', true)) {
  $res = ['success' => false];
  $notes = new bbn\Appui\Note($model->db);
  $cms = new \bbn\Appui\Cms($model->db, $notes);
  $product = new bbn\Shop\Product($model->db);
  $err_st = "The value of %s is mandatory";
  $action = $model->data['action'];
  unset($model->data['action']);

  switch ($action) {
    case 'insert':
      if ($tmp = $model->getDataError(['product_type', 'id_provider', 'url', 'title'])) {
        return $tmp;
      }
      else {
        try {
          $data = $product->add($model->data);
        }
        catch (\Exception $e) {
          $res['error'] = $e->getMessage();
        }
        if ($data) {
          return [
            'success' => true,
            'data'    => $data,
            'action'  => 'insert'
          ];
        }
      }
      break;

    case 'update':
      if ($tmp = $model->getDataError(['id', 'url', 'product_type', 'id_edition', 'id_provider', 'title'])) {
        return $tmp;
      }
      else {
        $res['success'] = $product->edit($model->data);
      }

      break;

    case 'delete':
      $res['success'] = $product->delete($model->data['id']);
      break;
  }

	return $res;
}