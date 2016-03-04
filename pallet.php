<?php
define('PALLET_SIZE', 1 * 1.2 * 1.35);

$dbh = new PDO('mysql:host=mysql16.000webhost.com;dbname=a4731696_sReport', 'a4731696_sReport', 'pob1745');

$qry = $dbh->prepare('
  SELECT   out_len, out_wid, out_lay
  FROM     ctl
  WHERE    id_num = :order
  ORDER BY volume DESC
');

$qry->execute(array(':order' => 123));

$pallets = array();
while ($order = $qry->fetch()) {
  if ($order['volume'] > PALLET_SIZE) die('item too big');

  for ($i = 1; $i <= $order['qty']; $i++) { // remove this loop if not needed
    $placed = false;
    foreach ($pallets as &$pallet) {
      if ($pallet['remaining'] >= $order['volume']) {
        $pallet['remaining'] -= $order['volume'];
        $pallet['items'][] = $order['code'];
        $placed = true;
        break;
      }
    }
    if (!$placed) $pallets[] = array(
      'remaining' => PALLET_SIZE - $order['volume'],
      'items' => array($order['code'])
    );
  }
}

print_r($pallets);
?>