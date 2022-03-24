<?php

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
            <h2 style="color:white;font-weight:bold;font-size:20px;">Trending Post</h2>
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
                        <div class="each-article"><?php echo ucfirst($title); ?></div>
                    </a> 
                    <br>
                        
                <?php } ?>                   
            </td>
        </tr>
        <tr>
            <td>
                <?php              
                    for ($i=$data['start_front']; $i <= $data['end_front']; $i++) { 
                        echo "<a class='' href=' ".URLROOT."/home/news/".$i."'>($i)</a>";
                    }
                ?>
                <b>(<?php echo $data['current_page'] ?>)</b>
                 <?php
                     for ($a = $data['start_back']; $a <= $data['end_back']; $a++) { 
                        echo "<a class='' href=' ".URLROOT."/home/news/".$a."'>($a)</a>";
                        
                    }
                ?>
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
