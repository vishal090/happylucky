<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="right">
    <input type="file" name="images[]" multiple  value="<?php echo lang('');?>" />
</div>

<!-- Image Display block -->
<div>
    <table>
        <?php 
        $i = 0;
        foreach($images as $image) {
            if($count % 4 == 0)
                echo "<tr>";
            echo "<td>".$image->get_admin_html()."</td>";
            if($count % 4 == 0)
                echo "</tr>";
            $i++;
        }
        ?>
    </table>
</div>
<!-- End Image Display block -->
