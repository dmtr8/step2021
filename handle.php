<?php
require ('vendor/autoload.php');
$request = json_decode(file_get_contents('php://input'),1);
if (empty($request)){
    $request = $_REQUEST;

    if (!empty($_FILES) && array_key_exists('image', $_FILES)){
        $request['file'] = $_FILES['image'];
    }


}

$obj = new \Eshop\Product();

if ($request['method'] == 'update')
{
    try {
        $obj->updateProduct($request['id'], $request);

    }
    catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}

elseif($request['method'] == 'addForm')
{
    $obj->addProduct($request);
}

elseif ($request['method'] == 'delete')
{
    $obj->deleteProduct($request['id']);
}
elseif ($request['method'] == 'getProduct')
{

    $objData = $obj->getProducts(["*"],['id'=>$request['id']]);
    echo json_encode($objData);
}
