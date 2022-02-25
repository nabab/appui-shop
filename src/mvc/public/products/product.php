<?php

/** @var $ctrl \bbn\Mvc\Controller */

if ($ctrl->hasArguments()) {
  $ctrl->setColor('#FF6B17', '#FFFFFF')
    ->addData(['id' => $ctrl->arguments[0]])
    ->setUrl($ctrl->getPath() . '/' . $ctrl->data['id'])
    ->combo(_('$title'), true);
}
