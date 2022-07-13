<?php
if (!empty($ctrl->post['limit'])) {
  $ctrl->action();
}
else{
  $ctrl->setColor('#FF6B17', '#FFFFFF')
  ->setIcon('nf nf-fa-credit_card')
  ->combo(_("Transactions"), true);
}

