<?php 
include('db_connection.php');
@session_start();
if (!isset($_SESSION['id'])){
	header('location:login.php');
}
?>
<div class="module-head"> 
	<h1 class="page-header">List of Claimed Items</h1> 

</div> 
<form action="" Method="POST">  					
	<table id="example" class=" datatable-1 table table-bordered table-hover" cellspacing="0" style="font-size:12px" >

		<thead>
			<tr> 
                <th width="5%">sl</th>
				<th>Fount Item</th>
				<th>Where Lost</th>
				<th>Date</th>
				<th width="10%">Action</th>

			</tr>	
		</thead> 
		<tbody>
        <?php
		        $sql = "SELECT found_items.found_item_name, claimed_items. *
						FROM found_items, claimed_items WHERE claimed_items.found_id = found_items.found_id";
				$result=mysqli_query($conn, $sql);
                $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
				$i = 0;
				foreach ($row as $result) {
					# code...
					echo '<tr>';
					echo '<td>'.++$i.'</td>';

					echo '<td>'.$result['found_item_name'].'</td>';
					echo '<td>'.$result['where_lost'].'</td>';
					echo '<td>'.$result['date'].'</td>';
					echo '<td><a href="similar_text.php?id='.$result['found_id'].'&des='.$result['item_description'].'">View</a></td>';
					
					

					
					echo '</tr>';
				}
				
		?>
	</tbody>

</table>


</form>
