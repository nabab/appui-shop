<?php
use bbn\X;
use bbn\Appui\Note;
use bbn\Appui\Cms;
use bbn\Shop\Product;

/**
 * What is my purpose?
 *
 **/


/** @var $model \bbn\Mvc\Model*/

if ($model->hasData('action', true)) {
  $res = ['success' => false];
  $notes = new Note($model->db);
  $cms = new Cms($model->db, $notes);
  $product = new Product($model->db);
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

    case 'deactivate':
      $data = $product->get($model->data['id']);
      $data['active'] = 0;
      die(var_dump( $product->edit($data)));
      $res['success'] = $product->edit($data);

    case 'activate':
      $data = $product->get($model->data['id']);
      $data['active'] = 1;
      $res['success'] = $product->edit($data);
      
  }

	return $res;
}