<?php
	include_once APPROOT."/models/Siteinfo.php";
	$ads = $siteinfos->getSiteAds($category_id);
	
?>

<div class="ejedudu desktopads">
	
	<?php

		$default_id= '1';
		$default_img = 'images/ad/default.png';
		$adsName = $baseUrl = $adsId = $imgUrl = array();

		foreach ($ads as $d_ad) {

			$adsName[] = $d_ad->adsName;
			$baseUrl[] = $d_ad->baseUrl;
			$adsId[] = $d_ad->adsId;
			$imgUrl[] = $d_ad->imgUrl;
		}
	?>
	<a href="<?php echo URLROOT;  ?>/callback/<?php echo $adsId[0] ?? $default_id;  ?>" target="_blank" rel="nofollow">
		<img src="<?php echo ASSETURL ?>/<?php  echo  $imgUrl[0] ?? $default_img;  ?>">
	</a>
	<a href="<?php echo URLROOT;  ?>/callback/<?php echo $adsId[1] ?? $default_id;  ?>" target="_blank" rel="nofollow">
		<img src="<?php echo ASSETURL ?>/<?php  echo $imgUrl[1] ?? $default_img;  ?>">
	</a>
	<a href="<?php echo URLROOT;  ?>/callback/<?php echo $adsId[2] ?? $default_id; ?>" target="_blank" rel="nofollow">
		<img src="<?php echo ASSETURL ?>/<?php  echo $imgUrl[2] ?? $default_img;  ?>">
	</a>	
</div>



<!-- MOBILE VIEW -->
<div class="ejedudu mobileads">
	<?php

		foreach ($ads as $m_ad) {
			# code...
		
			$m_adsName=$m_ad->adsName;
			$m_baseUrl=$m_ad->baseUrl;
			$m_adsId=$m_ad->adsId;
			$m_imgUrl=$m_ad->imgUrl;
		}	
	?>
	<a href="<?php echo URLROOT;  ?>/callback/<?php echo $m_adsId;  ?>" target="_blank" rel="nofollow">
		<img src="<?php echo ASSETURL ?>/<?php  echo $m_imgUrl;  ?>">
	</a>
</div>