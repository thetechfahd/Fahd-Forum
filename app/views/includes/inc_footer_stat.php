<?php
include_once APPROOT."/models/Statistic.php";
?>

<table>
	<tbody>
		<style>
			.my {
				background-color: #f9f0f0;
			}
		</style>
		<tr>
			<td class="my">				
				<h4 style="color: darkgreen;"> ✻ Statistics:</h4>
				<h4> (<?php echo $statistics->getUserCount() . ' Members , ' . $statistics->getTopicCount() . ' Topics '; ?>) </h4><br>
				<h4 style="color: darkgreen; "> ✻ Members Online: 0</h4>
			</td>
		</tr>
	</tbody>

</table>