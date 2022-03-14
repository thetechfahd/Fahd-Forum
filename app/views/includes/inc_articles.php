
	
		<table class="boards">
			<tbody>
				<tr>
					<th>
					
				      <h2>Trending Post</h2>

					</th>
				</tr>
      
				<tr>
					<td class="featured w">
						<?php

						while($r = mysqli_fetch_assoc($res))
						{
							
						$post_typee = $r['post_type'];
						$post_typee2 = $r['post_type2'];
						
						$link=$r['link'];
						$topic_id=$r['topic_id'];
						$title=$r['title'];
						
						$redirect="$topic_id/$link"; // create friendly seo post link(url)
						
						?>
						 <a id="frontpage_a" href="<?php echo URLROOT."/$redirect"; ?>" style="font-size:12pt">
							<b><?php echo ucfirst($title); ?></b></a> <br>
							    <hr class="new1">
					<?php } ?>

					</td>

				</tr>
				<tr>
					<td>
						<b>(0)</b>
						<?php if($curpage >= 2){ ?>
						<a class="" href="<?php echo URLROOT; ?>/links/<?php echo $previouspage ?>">(<?php echo $previouspage ?>)</a>
						<?php } ?>
						<a class="" href="<?php echo URLROOT; ?>/links/<?php echo $curpage ?>">(<?php echo $curpage ?>)</a>
						<?php if($curpage != $endpage){ ?>
						<a class="" href="<?php echo URLROOT; ?>/links/<?php echo $nextpage ?>">(<?php echo $nextpage ?>)</a>
						<a class="" href="<?php echo URLROOT; ?>/links/<?php echo $endpage ?>">(Last Page)</a>
						/ <a class="" href="<?php echo URLROOT; ?>/mailsupermods"><b>Mail Supermods</b></a>

						<?php } ?>
							</td>

					</tr>

				</tbody>
				</table>
