<div class="center-text">
    <a href= "<?php echo APP_BASE_URL.'index.php'; ?>"  class='float_r btn-large btn btn-info my-link' style='margin-top: -30px; margin-right: 20px; color: white;'><i class="icon-home icon-white"></i>Return to home</a>
</div><!-- center-text -->
<div class="break"></div>
<div class="span12">
    <div class="center-text">
        <form method="post">
            <input type="submit"  class='float_r btn-large btn btn-success my-link' style='margin-top: -30px; margin-right: 20px; color: white;' name="create" value="Build a directory tree">
            <input type="submit"  class='float_r btn-large btn btn-danger my-link' style='margin-top: -30px; margin-right: 20px; color: white;'name="delete" value="Clear the directory tree">
        </form>
    </div>
</div>
<div clas="row">
<div class="span12">
    <div class="dir-tree">
        <ul>
        <?php
        if(isset($root) && !empty($root)){
            foreach($root as $dir){
                echo "<li>".$dir["name"]."<form method='post'>
                <input type='hidden' name='idDel' value='$dir[id]' />
                <input type='submit' class='float_r btn-mini btn btn-danger my-del' name='delDir' value='DEL' /></form>"."</li>"."<br />";
                echo DirectoryController::getDir($dir["id"]);
            }
        }
        ?>
        </ul>
    </div>
</div>
</div>