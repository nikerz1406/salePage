<?php
include "includes/session.php";
function loadProductTable()
{
    $conn = new Database();
    $table = "product";
    $condition = " 1 limit 10";
    $field = "Id,Name,Price,Quantity,CONVERT(Description USING utf8) as Description,photo";
    $html = "";
    $result = $conn->select($field, $table, $condition);
//var_dump ($result);
    foreach ($result as $value) {
        $html .= '
    <tr><th scope="row">' . $value["Id"] . '</th>
    <td>' . $value["Name"] . '</td>
    <td>' . number_format($value["Price"]) . '</td>
    <td>' . $value["Quantity"] . '</td>
    <td>' . $value["Description"] . '</td></tr>';
    }
    $html = '<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Description</th>
            </tr>
        </thead>
    <tbody>
        ' . $html . '
        </tbody>
    </table>';
    return $html;
}
