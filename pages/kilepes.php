<?php
require_once('./kozos.php');

unset($_SESSION['csaladinev']);
unset($_SESSION['utonev']);
unset($_SESSION['loginnev']);

?>

<script> 
   var utvonal = "<?php echo APPROOT; ?>"
   location.replace(utvonal); 
</script>