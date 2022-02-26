<?php

use bbn\X;
use bbn\Shop\Provider;
use bbn\Appui\Grid;

if ( !empty($model->data['limit']) ) {
  $db = $model->db;
  $prov = new Provider($model->db);
  $cfg = $prov->getClassCfg();
  $grid = new \bbn\Appui\Grid($db, $model->data, [
    'tables' => [$cfg['table']],
    'fields' => [
      $cfg['arch']['providers']['id'],
      $cfg['arch']['providers']['name'],
      $cfg['arch']['providers']['cfg'],
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


