<?php
/**
 * What is my purpose?
 *
 **/

/** @var $model \bbn\Mvc\Model*/
use bbn\Shop\Provider;
if ($model->hasData('action', true)) {
  $action = $model->data['action'];
  unset($model->data['action']);
  $provider = new Provider($model->db);
	switch ($action) {
    case 'insert':
      if ($id_pr = $provider->add($model->data['name'], $model->data['cfg'])) {
        $new_pr = $provider->get($id_pr);
        return [
          'success' => true,
          'provider' => $new_pr,
          'action' => 'insert'
        ];
      }
      break;
    case 'edit':
      if ($model->hasData('id', true) && $provider->update($model->data['id'], $model->data)) {
        $new_pr = $provider->get($model->data['id']);

        return [
          'success' => true,
          'provider' => $new_pr,
          'action' => 'edit'
        ];
      }
      break;

	  case 'delete':
      if ($model->hasData('id', true) && $provider->delete($model->data['id'])) {
        return [
          'success' => true,
        ];
      }
      break;
  }
}