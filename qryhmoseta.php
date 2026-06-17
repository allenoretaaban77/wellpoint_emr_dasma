<?php

	$bid = $_GET['bid'];

	$connect = mysql_connect("localhost","root","");
	$db = mysql_select_db("wpemrdlivedb");
	// mysql_query('TRUNCATE TABLE friend;');
	
	$qry = mysql_query("SELECT hfic.itemid as id1,  hfi.itemid, hfic.hmo_form_item_id, 
		hfic.amount, hfi.charge_fee, hf.form_total,
		hf.hmo_id, hfic.hmo_billing_id as bid1, hf.hmo_billing_id as bid2
		FROM hmo_form_items_category as hfic 
		LEFT JOIN hmo_form_items AS hfi
		ON hfic.hmo_form_item_id = hfi.itemid
		LEFT JOIN hmo_form AS hf
		ON hf.id = hfi.hmo_form_id
		WHERE hf.hmo_id = 7 AND hf.hmo_billing_id = $bid
		ORDER BY hfic.hmo_form_item_id ASC");

	while ($row = mysql_fetch_assoc($qry)){
		$itemid = $row["id1"];
		$query = "UPDATE hmo_form_items_category SET hmo_billing_id = $bid WHERE itemid = $itemid";
		echo "$query | ";
		echo mysql_query($query)."<br>";
	}

	$qry = mysql_query("SELECT hfic.itemid as id1,  hfi.itemid, hfic.hmo_form_item_id, 
		hfic.amount, hfi.charge_fee, hf.form_total,
		hf.hmo_id, hfic.hmo_billing_id as bid1, hf.hmo_billing_id as bid2
		FROM hmo_form_items_category as hfic 
		LEFT JOIN hmo_form_items AS hfi
		ON hfic.hmo_form_item_id = hfi.itemid
		LEFT JOIN hmo_form AS hf
		ON hf.id = hfi.hmo_form_id
		WHERE hf.hmo_id = 7 AND hf.hmo_billing_id = $bid
		ORDER BY hfic.hmo_form_item_id ASC");

	while ($row = mysql_fetch_assoc($qry)){
		echo $row["itemid"]." | ".$row["bid1"]."|".$row["bid2"]." | "."<br>";
	}

?>
