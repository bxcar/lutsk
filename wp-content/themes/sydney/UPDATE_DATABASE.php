<?php
//UPDATE guid field in wp_posts(ip-address)/////////////////////////////
$upd_arr_guid = array();
$upd_arr_id = array();

$upd_get_guid = "SELECT p.guid FROM wp_posts p ORDER BY p.id ASC";
$upd_get_id = "SELECT p.id FROM wp_posts p ORDER BY p.id ASC";

$upd_get_guid_result = mysqli_query($db,  $upd_get_guid) or die(mysqli_error($db));
$upd_get_id_result = mysqli_query($db, $upd_get_id) or die(mysqli_error($db));

for ($i = 0; $i < mysqli_num_rows($upd_get_guid_result); $i++) {
    $upd_arr_guid[$i] = mysqli_fetch_assoc($upd_get_guid_result);
}
for ($i = 0; $i < mysqli_num_rows($upd_get_id_result); $i++) {
    $upd_arr_id[$i] = mysqli_fetch_assoc($upd_get_id_result);
}

$search_array_values = ['raisky.com.ua']; //search value
for($i = 0; $i < count($upd_arr_guid); $i++) {
    $upd_arr_guid[$i]['guid'] = str_replace($search_array_values,'192.168.0.98',$upd_arr_guid[$i]['guid']); //replace value
}

for($i = 0; $i < count($upd_arr_guid); $i++) {
    $id_inner = $upd_arr_id[$i]['id'];
    $guid_inner = $upd_arr_guid[$i]['guid'];
    $sql_upd_guid = "UPDATE wp_posts set guid = '$guid_inner' WHERE id = '$id_inner'";
    $sql_upd_guid_result = mysqli_query($db, $sql_upd_guid) or die(mysqli_error($db));
}
//print_r($upd_arr_id);
//////////////////////////////////////////////////////////