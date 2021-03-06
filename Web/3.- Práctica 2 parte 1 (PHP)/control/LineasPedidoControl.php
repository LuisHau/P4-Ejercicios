<?php
include_once('persistence/LineasPedidoDB.php');
include_once('model/LineasPedido.php');

class LineasPedidoControl {

    public function insertOrderItem($orderid, $drinkid, $quantity, $pvp) {
        LineasPedidoDB::insertOrderItem($orderid, $drinkid, $quantity, $pvp);
    }

    public function getAllItemsFromUnfinishedOrderByClientID($id) {
        $queryResult = LineasPedidoDB::getAllItemsFromUnfinishedOrderByClientID($id);
        $drinkItems = array();
        foreach ($queryResult as $drink) {
            array_push($drinkItems,
                new LineasPedido(
                    $drink['id'],
                    $drink['idpedido'],
                    $drink['idbebida'],
                    $drink['unidades'],
                    $drink['PVP']
                ));
        }
        return $drinkItems;
    }

    public function insertOrUpdateNewElement($drinkID, $quantity, $orderID, $drinkPVP) {
        LineasPedidoDB::insertOrUpdateNewElement($drinkID, $quantity, $orderID, $drinkPVP);
    }
    
    public function deleteElement($id){
        LineasPedidoDB::deleteElement($id);
    }

    public function getAllItemsFromOrderID($id) {
        $queryResult = LineasPedidoDB::getAllItemsFromOrderID($id);
        $drinkItems = array();
        foreach ($queryResult as $drink) {
            array_push($drinkItems,
                new LineasPedido(
                    $drink['id'],
                    $drink['idpedido'],
                    $drink['idbebida'],
                    $drink['unidades'],
                    $drink['PVP']
                ));
        }
        return $drinkItems;
    }

    public function deleteAllOrderItemsByDeliveryID($id) {
        LineasPedidoDB::deleteAllOrderItemsByDeliveryID($id);
    }

}