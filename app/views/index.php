<?php

/* This is how you echo out database information on the screen
foreach ($data['users'] as $user) {
    echo "Information: " . $user->user_name . $user->user_email;
    echo "<br>";
}
*/
// foreach ($data['para'] as $para) {
//     echo $para;
//     echo "<br>";


// }

//echo json_encode($data);
$category_id = 'index';

require_once APPROOT."/views/includes/theme/head_open.php";
require_once APPROOT."/views/includes/theme/metatag.php";
// open body tag

require_once APPROOT."/views/includes/theme/body_open.php";

include_once APPROOT."/views/includes/inc_header.php";





require_once APPROOT."/views/includes/inc_board.php";



//load system header ads template
require APPROOT."/views/includes/inc_ads.php";
//load articles from articles.php -->
?>

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

                    foreach ($data['articles'] as $article) {
                    
                        $post_typee = $article->post_type;
                        $post_typee2 = $article->post_type2;
                        
                        $link=$article->link;
                        $topic_id=$article->topic_id;
                        $title=$article->title;
                        
                        $redirect="$topic_id/$link"; // create friendly seo post link(url)
                        
                ?>
                        <a id="frontpage_a" href="<?php echo URLROOT."/$redirect"; ?>" style="font-size:12pt">
                            <b><?php echo ucfirst($title); ?></b>
                        </a> 
                        <br>
                        
                    <?php } ?>
            </td>
        </tr>
        <tr>
            <td>
                <b>(0)</b>
                <?php if($data['current_page'] >= 2){ ?>
                <a class="" href="<?php echo URLROOT; ?>/home/news/<?php echo $data['previous_page'] ?>">(<?php echo $data['previous_page'] ?>)</a>
                <?php } ?>
                <a class="" href="<?php echo URLROOT; ?>/home/news/<?php echo $data['current_page'] ?>">(<?php echo $data['current_page'] ?>)</a>
                <?php if($data['current_page'] != $data['end_page']){ ?>
                <a class="" href="<?php echo URLROOT; ?>/home/news/<?php echo $data['next_page'] ?>">(<?php echo $data['next_page'] ?>)</a>
                <a class="" href="<?php echo URLROOT; ?>/home/news/<?php echo $data['end_page'] ?>">(Last Page)</a>
                / <a class="" href="<?php echo URLROOT; ?>/mailsupermods"><b>Mail Supermods</b></a>

                <?php } ?>
            </td>

        </tr>

    </tbody>
</table>

<?php
//load system header ads template
require APPROOT."/views/includes/inc_ads.php";

//load footer statistic from footer_stat.php
include_once APPROOT."/views/includes/inc_footer_stat.php";

echo '<p class="small">(<a href="#up"><b>Go Up</b></a>)</p>';

include_once APPROOT."/views/includes/inc_footer.php";
