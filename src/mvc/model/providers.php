<?php

if ( !empty($model->data['limit']) ) {
  $db = $model->db;
  $medias = new \bbn\Appui\Medias($db);
  $grid = new \bbn\Appui\Grid($db, $model->data, [
    'tables' => ['poc_providers'],
    'fields' => [
      'id',
      'name',
      'cfg',
    ],
    'limit' => $model->data['limit'],
    'start' => $model->data['start']
  ]);
  if($grid->check()){
    $res = $grid->getDatatable();
    foreach ($res['data'] as &$d) {
      $d['cfg'] = $d['cfg'] ? json_decode($d['cfg'], true) : [];
    }
    unset($d);

    return $res;
  }
}


