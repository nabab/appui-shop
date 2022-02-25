<?php
if ( !empty($ctrl->post['limit']) ){
  $ctrl->action();
}
else{
  $ctrl->setColor('#FF6B17', '#FFFFFF')
    ->addData($ctrl->post)
    ->setIcon('nf nf-fa-list')
    ->setUrl($ctrl->pluginUrl('appui-shop') . 'products/list')
    ->combo(_("List"), true);
}