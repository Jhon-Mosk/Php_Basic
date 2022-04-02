<?php

function doOrdersManagementAction($action, $params)
{
    switch ($action) {
        case 'process':
            updateStatus('process', $params['sess']);

            header("Location: /ordersManagement");
            die();

        case 'finish':
            updateStatus('finish', $params['sess']);

            header("Location: /ordersManagement");
            die();

        case 'delete':
            updateStatus('delete', $params['sess']);

            header("Location: /ordersManagement");
            die();

        case 'inAwait':
            $params['orders'] = getOrdersByStatus('await');

            break;

        case 'inProcess':
            $params['orders'] = getOrdersByStatus('process');

            break;

        case 'inFinish':
            $params['orders'] = getOrdersByStatus('finish');

            break;

        case 'inDelete':
            $params['orders'] = getOrdersByStatus('delete');

            break;
    }

    return $params;
}

function updateStatus($status, $session_id)
{
    executeSql("UPDATE `checkout` SET `status` = '{$status}' WHERE `session_id` = '{$session_id}'");
}
