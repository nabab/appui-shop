<?php
$res['success'] = false;
if($model->hasData(['id_transaction', 'status'])){
  $sales = new \bbn\Shop\Sales($model->db);
  $res['success'] = $sales->changeStatus($model->data['id_transaction'],$model->data['status']);
}
return $res;
