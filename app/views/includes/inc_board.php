<?php

include_once APPROOT . "/models/Siteinfo.php";

//echo json_encode($siteinfos->getSiteSubCategory());

$site_category_datas = $siteinfos->getSiteCategory();

?>


<table class="boards">
   <tbody>
		<tr>
		    <td  style="text-align: center !important;" > 
				<?php
					foreach ($site_category_datas as $cat_data){
					$cat_id = $cat_data->cid;
					$site_sub_category_datas = $siteinfos->getSiteSubCategory($cat_id);
				?>
			</td>
		</tr>
		<tr>
			<td  style="text-align: center !important;   padding: 0px !important;margin: 110px; "> 						
				<?php
					foreach ($site_sub_category_datas as $sub_cat_data){				
						$s_title=$sub_cat_data->sname;
						$url=$sub_cat_data->surl;
						$sid=$sub_cat_data->sid;
						echo '<b><a href="forum/'.$url.'" title="'.$s_title.'">'.$s_title.'</a></b>  |';
					} 
				// end category loop 
				?>
				<hr style="color:#E9F6E6;margin:10px 0;">
			</td>
			<?php } ?>
		</tr>
	</tbody>
</table>
	
<table class="white" style="background-color: #fff; padding-top: 0px; padding-bottom: 0px; margin-top: 0px;">
	<tbody>
		<tr>
			<th style="background-color: #f9f0f0;">
				<a  href="statistic.php"><h4><i class="fas fa-stats"></i> View Statistics</h4></a>
			</th>
			<th style="background-color: #f9f0f0;">
				<a  href="playgame.php"><h4><i class="fas fa-gamepad"></i> Play Game!</h4></a>
			</th>
		</tr>
	</tbody>
</table>
