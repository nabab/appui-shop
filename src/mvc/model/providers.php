<?php

use bbn\X;
use bbn\Shop;
use bbn\Appui\Grid;

if (!empty($model->data['limit'])) {
  $shop = new Shop($model->db);
  return $shop->getProvidersList($model->data);
}


