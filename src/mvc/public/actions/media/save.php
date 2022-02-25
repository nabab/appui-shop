<?php
/*
 * Describe what it does!
 *
 * @var $ctrl \bbn\Mvc\Controller 
 *
 */

$success = false;
if (!empty($ctrl->post['media']['file']) && ($title = $ctrl->post['media']['title'] ) ){
  $files = $ctrl->post['media']['file'];
	$medias = new \bbn\Appui\Medias($ctrl->db);
  $tmp_path = $ctrl->userTmpPath().$ctrl->post['ref'].'/';
  $fs = new \bbn\File\System();
  $media = [];
  foreach($files as $f){
    if(strpos($f['extension'], '.') > -1){
      $f['extension'] = str_replace('.', '', $f['extension']);
    }
    $_path = $tmp_path.$f['name'];
    if ( $fs->isFile($_path) ){
      $content = file_get_contents($_path);
      if (!empty($ctrl->post['media']['name']) && ( $ctrl->post['media']['name'] !== $f['name'])){
        if ( strpos( $ctrl->post['media']['name'], '.') > -1 ){
          //if the name contains the extension
          $name = $ctrl->post['media']['name'];
        }
        else {
          $name = $ctrl->post['media']['name'].'.'.$f['extension'];
        }
      }
      else{
        $name = $f['name'];
      }
			if ( strpos( $title, '.') < 0 ){
        //if the title does not contains extension
        $title = $title.'.'.$f['extension'];
      }
      unset($f['name']);
      if ( $id_media = $medias->insert($_path,null,$title,'file',false)){
        $media = $medias->getMedia($id_media, true);
        if (!empty($media['content'])){
          $media['content'] = json_decode($media['content']);
        }
        $success = true;
      }
    }
  }
}
$ctrl->obj->success = $success;
$ctrl->obj->media = $media;