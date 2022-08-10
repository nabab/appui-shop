<?php
use bbn\Shop;

if (!empty($model->data['limit'])) {
  $shop = new Shop($model->db);
  return $shop->getTransactionsList($model->data);
}
