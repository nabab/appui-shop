<?php
$success = false;
if ( !empty($ctrl->post['media']) ){
	$medias = new \bbn\Appui\Medias($ctrl->db);
  foreach($ctrl->post['media'] as $m){
    if($note_media = $ctrl->db->rselect('bbn_notes_medias', [], ['id_media' => $m['id']])){
      $success = $ctrl->db->delete('bbn_notes_medias', $note_media);
    }
    $medias->delete($m['id']);
  }
}
$ctrl->obj->success = $success;