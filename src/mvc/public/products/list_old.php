<?php
if ( !empty($ctrl->post['limit']) ){
  $ctrl->action();
}
else{
  $ctrl->addData($ctrl->post)
    ->setUrl('admin/products/list')
    ->combo(_("Products"), true);
}
