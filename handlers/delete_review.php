<?php
  require_once  $_SERVER['DOCUMENT_ROOT'] . '/tnelat/components/SQL_Operation.php';
  if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    //Variables
    $err = "";
    $RID = $_POST['RID'];
    if(validateReview($RID)) {
      (new RemoveReview($RID))->execute();
    }
    echo "SUCCESS";
  }

  function validateReview($RID) {
    if(count((new GetReview($RID))->execute()) !== 1) {
      echo "ERROR: Invalid review id";
      return false;
    }
    return true;
  }
?>