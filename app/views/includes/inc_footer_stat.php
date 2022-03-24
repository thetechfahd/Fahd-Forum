<?php
include_once APPROOT."/models/Statistic.php";
?>

<table>
	<tbody>
		<style>
			.my {
				background-color: #f9f0f0;
			}
			table.boards td.featured .each-article {
				font-weight: bold;
				
			}
		</style>
		<tr>
			<td class="my">				
				<h4 style="color: darkgreen;"> ✻ Statistics:</h4>
				<h4> (<?php echo $statistics->getUserCount() . ' Members , ' . $statistics->getTopicCount() . ' Topics '; ?>) </h4><br>
				<h4 style="color: darkgreen;"> ✻ Online Statistics:</h4>
				<h4>Members Online: <?php echo $statistics->getUserCount() . ' Member(s) , ' . $statistics->getTopicCount() . ' Guest(s) '; ?>  </h4>
			</td>
		</tr>
	</tbody>

</table>