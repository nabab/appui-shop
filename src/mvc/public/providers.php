<?php
if ( !empty($ctrl->post['limit']) ){
  $ctrl->obj = $ctrl->getObjectModel($ctrl->post);
}
else{
  $ctrl->combo(_("Providers"));
}