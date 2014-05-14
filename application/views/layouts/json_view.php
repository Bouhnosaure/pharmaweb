<?php   
  $this->output->set_header('Content-Type: application/json; charset=utf-8');
  echo  addslashes(json_encode($json,JSON_FORCE_OBJECT|JSON_UNESCAPED_UNICODE));
?>