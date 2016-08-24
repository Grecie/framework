<?php
function getMoney($amount){
	if ($amount<0){
		$amount = str_replace("-","", $amount);
		$amount = number_format($amount, 2);
		$amount = '<div style="color: red">-$'.$amount.'</div>';
	}else{
		$amount = number_format($amount, 2);
		$amount ='<div style="color:green">&nbsp;$'.$amount.'</div';
	}
	return $amount;
}
?>
<div class="row">
<div class="col-sm-11"><h3>Transactions</h3></div>
<div class="col-sm-1">
	<a href="<?php echo APP_URL;?>transactions/add">
	<span class="glyphicon glyphicon-plus"></span>
	</a>
</div>
</div>

<table class="table">
<tr>
	<th>ID</th>
	<th>DESCRIPTIONS</th>
	<th>DATE</th>
	<th>AMOUNT</th>
	<th>BALANCE</th>
	<th>CATEGORY</th>
	<th>ACTIONS</th>
</tr>
<?php 
$balance = 0;
foreach ($transactions as $transaction):
$balance += $transaction["5"];
$date = date_create($transaction["4"])
 ?>
	<tr>
		<td><?php echo $transaction["0"]; ?></td>
		<td><?php echo $transaction["3"]; ?></td>
		<td><?php echo $transaction["4"]; ?></td>
		<td><?php echo getMoney($transaction["5"]); ?></td>
		<td><?php echo $balance; ?></td>
		<td><?php echo $transaction["7"]; ?></td>
		<td><a href="<?php echo APP_URL; ?>transactions/edit/<?php echo $transaction[0]; ?>">Edit
		<a href="<?php echo APP_URL; ?>transactions/delete/<?php echo $transaction[0]; ?>">Delete</td>
	</tr>

	<?php endforeach; ?>
</table>

