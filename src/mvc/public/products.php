<?php

/** @var bbn\Mvc\Controller $ctrl */

$ctrl->setColor('#FF6B17', '#FFFFFF')
  ->setIcon('nf nf-fae-book_open_o')
  ->setUrl($ctrl->pluginUrl('appui-shop') . '/products')
  ->combo(_("Products"), true);
