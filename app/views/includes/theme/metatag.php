<?php
if (THEME=='nl') {
	# code...
	echo '<link href="'.ASSETURL.'/css/nl.css" rel="stylesheet" type="text/css">';
}
if (THEME=='nl_ext') {
	# code...
	echo '<link href="'.ASSETURL.'/css/nl_ext.css" rel="stylesheet" type="text/css">';
}
?>

<link href="<?php echo URLROOT; ?>/feed" rel="alternate" title="<?php echo $page_title; ?>" type="application/rss+xml">
<script type="text/javascript" src="<?php echo ASSETURL; ?>/js/jquery.js"></script>
<link href="<?php echo ASSETURL; ?>/js/animate.css" rel="stylesheet" type="text/css" />

<script src="<?php echo ASSETURL; ?>/js/jPages.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETURL; ?>/js/comment_pagination.js" type="text/javascript"></script>
<link href="<?php echo ASSETURL; ?>/js/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ASSETURL; ?>/icons/fontawesome/css/all.css" rel="stylesheet" type="text/css" />
<script src="<?php echo ASSETURL; ?>/fileupload.js"></script>
<script src="<?php echo ASSETURL; ?>/js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETURL; ?>/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETURL; ?>/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo ASSETURL; ?>/css/quote.css">

<!-- share plugin -->
<link rel="stylesheet" href="<?php echo ASSETURL; ?>/sharebtn/needsharebutton.min.css">
<!-- share plugin end -->

<meta name="description" content="<?php echo $site_dsc; ?>">
<meta name="author" content="<?php echo SITENAME; ?>" />
<meta name="allow-search" content="yes" />
<meta name="revisit-after" content="3 hours" />
<meta name="robots" content="all, index, follow" />
<meta name="audience" content="all" />
<meta name="rating" content="general" />
<meta name="distribution" content="global" />
<meta name="googlebot" content="all, index, follow" />
<meta http-equiv="content-language" content="en" />
<meta http-equiv="alexa" content="100" />

<!-- for Facebook -->
<meta property="og:title" content="<?php echo $page_title; ?>">
<meta name="og:description" content="<?php echo $site_dsc; ?>">

<!-- for Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?php echo $page_title; ?>">
<meta name="twitter:description" content="<?php echo $site_dsc; ?>">

<!-- for site verification -->
<meta name="alexaVerifyID" content="<?php echo ALEXA; ?>">
<meta name="google-site-verification" content="<?php echo GOOGLE; ?>">
<meta name="yandex-verify" content="<?php echo YANDEX; ?>">
<link href="feed" rel="alternate" type="application/rss+xml" title="<?php echo $page_title; ?>">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo ASSETURL; ?>/images/favicon.png">
<style type="text/css">
         .liked{color: darkgreen !important; font-weight: bold !important;}
        </style>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117924406-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-117924406-1');
</script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-4589536757100932",
          enable_page_level_ads: true
     });
</script>


<link href="css/pagination.css" rel="stylesheet">

<script src="<?php echo ASSETURL; ?>/js/pagination.js"></script>
<script>
$(document).ready(function()
 {
   $("#tab").pagination({
   items: 10,
   contents: 'contents',
   previous: 'Previous',
   next: 'Next',
   position: 'bottom',
   });
});
</script>

