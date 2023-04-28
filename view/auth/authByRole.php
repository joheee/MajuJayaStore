<?php 
    require_once '../../middleware/authMiddleware.php';
  
    session_start();
    authMiddleware();
  
?>