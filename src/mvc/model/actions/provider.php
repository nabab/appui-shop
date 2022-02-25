<?php
/**
 * What is my purpose?
 *
 **/

/** @var $model \bbn\Mvc\Model*/

if ($model->hasData('action', true)) {
	switch ($model->data['action']) {
    case 'insert':
      if ( $success = $model->db->insert('poc_providers', [
        'name' => $model->data['name'],
        'cfg'  => $model->hasData('cfg', true) ? json_encode($model->data['cfg']) : null
      ])){
        $id_pr = $model->db->lastId();
        $new_pr = $model->db->rselect('poc_providers', [], [
          'id' => $id_pr
        ]);
        return [
          'success' => $success,
          'provider' => $new_pr,
          'action' => 'insert'
        ];
      }
      break;
    case 'edit':
      $new_pr = [];
      if ( $success = $model->db->update('poc_providers', [
        'name' => $model->data['name'],
        'cfg'  => $model->hasData('cfg', true) ? json_encode($model->data['cfg']) : null
      ], [
        'id' => $model->data['id']
      ])){
        $new_pr = $model->db->rselect('poc_providers', [], [
          'id' => $model->data['id']
        ]);
        return [
          'success' => $success,
          'provider' => $new_pr,
          'action' => 'edit'
        ];
      }
      break;

	  case 'delete':
      return ['success' => (bool)$model->db->delete('poc_providers', [
        'id' => $model->data['id']
      ])];
      break;
  }
}