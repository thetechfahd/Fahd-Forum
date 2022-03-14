<table id="up" summary="">
  <tbody>
    <tr>
	    <td class="grad">
        <h1>
          <?php
            if (DISPLAY_STATUS=='logo'){

              echo '<a class="" href="'.URLROOT.'" title="'.SITENAME.'">
                <div style="display:inline-block; "><img src="'.ASSETURL.'/images/logo.png" width="250px"> </div>
                </a>
              ';	
            }

            if (DISPLAY_STATUS=='title'){
              echo '<a class="g" style="color: '.HEADER_COLOR.';" href="'.URLROOT.'" title="'.SITENAME.'">'.SITENAME.'</a>';		# code...
            }
            
            if (DISPLAY_STATUS=='both'){
              echo '<a class="" href="'.URLROOT.'" title="'.SITENAME.'">
                <div style="display:inline-block; "><img src="'.ASSETURL.'/images/logo.png" width="250px"> </div>
                </a><br>
              ';	

              echo '<a class="g" style="color: '.HEADER_COLOR.';" href="'.URLROOT.'" title="'.SITENAME.'">'.SITENAME.'</a>';		# code...
            }

          ?>
        </h1>	

        <?php
        include_once APPROOT."/views/includes/theme/header_check.php";
        ?>
        <br>
        <p style="color: #000;"><b>Date</b>:&nbsp;<?php echo date('l d F Y'); ?> at <?php echo date("h:i A"); ?></p>

      </td>
    </tr>
  </tbody>
</table>
<p>
  <form action="<?php echo URLROOT; ?>/search">
    <input name="q"  type="text" class="searchcss" id="qsearch" placeholder="Search">
    <button name="search" type="submit" id="reload-button" class="green-button text-button btn btn-primary">Search</button>
  </form>
</p>
