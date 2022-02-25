<?php
use bbn\X;

$opt = new bbn\Appui\Option($model->db);
$notes = new bbn\Appui\Note($model->db);
$medias = new bbn\Appui\Medias($model->db);
if ( !empty($model->data['limit']) ) {
  $db = $model->db;
  $cfg = $notes->getLastVersionCfg();
  $cfg['tables'] = ['poc_products'];
  array_unshift(
    $cfg['join'],
    [
      'table' => 'bbn_notes',
      'on' => [
        [
          'field' => 'bbn_notes.id',
          'exp' => 'poc_products.id_note'
        ]
      ]
    ], [
      'type' => 'left',
      'table' => 'bbn_notes_tags',
      'on' => [
        [
          'field' => 'poc_products.id_note',
          'exp' => 'bbn_notes_tags.id_note'
        ]
      ]
    ], [
      'type' => 'left',
      'table' => 'bbn_notes_url',
      'on' => [
        [
          'field' => 'poc_products.id_note',
          'exp' => 'bbn_notes_url.id_note'
        ]
      ]
    ]
	);

  array_unshift(
    $cfg['fields'],
    ...[
      'poc_products.id',
      'id_provider',
      'url',
      'poc_products.id_note',
      'price_purchase',
      'price',
      'dimensions',
      'weight',
      'id_type',
      'id_edition',
      'stock',
      'front_img',
      'active',
    ]
  );

  $cfg['fields']['num_tags'] = 'COUNT(DISTINCT bbn_notes_tags.id_tag)';
  $cfg['group_by'] = ['poc_products.id'];
  $grid = new \bbn\Appui\Grid($db, $model->data, $cfg);
  if ($grid->check()) {
    $tmp_grid = $grid->getDatatable();

    $tmp_grid['data'] = array_map(function($a) use ($db, $notes, $medias){
      $a['media'] = [];
      if( $product_medias = $db->rselectAll('bbn_notes_medias', [], ['id_note' => $id_note])){
        foreach($product_medias as $p){
          $a['media'][] = $medias->getMedia($p['id_media'], true);
        }
      }
      $url = bbn\Mvc::getPluginUrl('appui-note').'/media/image/';
      $a['media'] = array_map(function($d)use($medias, $url) {
        $d['is_image'] = false;
        if ($d['content']) {
          $full_path = $medias->getMediaPath($d['id']);
          $d['full_path'] = $medias->getThumbs($full_path);
          $d['path'] = $url.$d['id'];
          $d['content'] = json_decode($d['content'], true);
          $d['is_image'] = $medias->isImage($full_path);
          if ($d['is_image']) {
            $d['thumbs'] = $medias->getThumbsSizes($d['id']);
          }
        }
        return $d;
      }, $a['media']);
      //die(var_dump($a));
      if($a['front_img'] ){
        $a['front_img'] = $medias->getMedia($a['front_img'], true);
      }

      $a['num_media'] = count($a['media']) ? count($a['media']) : 0;
      $a['tags'] = [];//$a['num_tags'] ? $notes->getTags($a['id_note']) : [];
      return $a;
    }, $tmp_grid['data']);
    return $tmp_grid;
  }
}
