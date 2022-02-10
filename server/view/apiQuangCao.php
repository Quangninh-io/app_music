<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../controller/controllerQuangCao.php');
?>
<?php 
    $quangCao = new QuangCaoController();
    $quangCaoArr = $quangCao->DuLieuQuangCao();
    echo json_encode($quangCaoArr);
?>