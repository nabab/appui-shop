<?php
if( ($id_note = $ctrl->post['id_note']) &&  ($id_media = $ctrl->post['id_media']) ){
  if($ctrl->arguments[0] === 'photographers'){
    $table = 'photographers';
  }
  else if($ctrl->arguments[0] === 'products'){
    $table = 'poc_products';
  }
  $ctrl->obj->success = $ctrl->db->update($table,['front_img' => $id_media ], ['id_note'=> $id_note]);
}
