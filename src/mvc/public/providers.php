<?php
if (!empty($ctrl->post['limit'])) {
  $ctrl->action();
}
else{
  $ctrl->combo(_("Providers"));
}