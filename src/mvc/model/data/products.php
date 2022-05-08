<?php
use bbn\X;

if (!empty($model->data['limit'])) {
  $shop = new bbn\Shop($model->db);
  return $shop->getAdminList($model->data);
}
