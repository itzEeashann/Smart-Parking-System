<?php
if (isset($_POST['view_proof'])) {
    $proof_path = $_POST['proof_path'];
    echo '<img src="' . $proof_path . '" alt="Proof Image">';
}
?>