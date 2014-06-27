<? session_start();
//session_unregister('VAdmin_cnCod');
session_destroy();
header("Location: ../index.php");
?>