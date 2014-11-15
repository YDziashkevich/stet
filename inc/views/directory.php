<div class="center-text">
    <a href="<?php echo APP_BASE_URL . 'index.php'; ?>" class='float_r btn-large btn btn-info my-link'
       style='margin-top: -30px; margin-right: 20px; color: white;'><i class="icon-home icon-white"></i>Return to
        home</a>
</div><!-- center-text -->

<div class="break"></div>

<!-------------------------------------------------------->
<div class="row">
    <div class="span12 search-span12">

        <div id="search-st">
            <form class="form-search" method="post">
                <input type="text" class="input-medium search-query" name="textSearch">
                <input type="submit" class="btn" value="Search" name="search">
            </form>


            <?php
            if (isset($search) && !empty($search)) {
                foreach ($search as $dir) {
                    echo $dir . "<br/>";
                }
            }
            ?>
        </div>
    </div>
</div>
<!-------------------------------------------------------->

<div class="break"></div>
<div class="row">
    <div class="span12">
        <div class="center-text">
            <form method="post">
                <input type="submit" class='float_r btn-large btn btn-success my-link'
                       style='margin-top: -30px; margin-right: 20px; color: white;' name="create"
                       value="Build a directory tree">
                <input type="submit" class='float_r btn-large btn btn-danger my-link'
                       style='margin-top: -30px; margin-right: 20px; color: white;' name="delete"
                       value="Clear the directory tree">
            </form>
        </div>
    </div>
</div>

<?php
if (isset($root) && !empty($root)) {
    $html = "<div class='span12'>";
    $html .= "<div class='center-text'>";
    $html .= "<h4>Total space occupied:" . " " . DirectoryModel::getTotalSize() . "Kb" . "</h4>" . "</div>" . "</div>";
    echo $html;
}
?>


<div clas="row">
    <div class="span12">
        <div class="dir-tree">
            <ul>
                <?php
                if (isset($root) && !empty($root)) {
                    foreach ($root as $dir) {
                        if ($dir["size"] == 0) {
                            echo "<li><b>" . $dir["name"] . "</b> " . "- " . DirectoryController::getSizeDir($dir["id"]) . "Kb" . "<form method='post'>
                <input type='hidden' name='idDel' value='$dir[id]' />
                <input type='submit' class='float_r btn-mini btn btn-danger my-del' name='delDir' value='DEL' /></form>" . "</li>" . "<br />";
                            echo DirectoryController::getDir($dir["id"]);
                        } else {
                            $size = round($dir["size"] / 1024, 2);
                            echo "<li>" . $dir["name"] . " -" . " " . $size . "Kb" . "<form method='post'>
                <input type='hidden' name='idDel' value='$dir[id]' />
                <input type='submit' class='float_r btn-mini btn btn-danger my-del' name='delDir' value='DEL' /></form>" . "</li>" . "<br />";
                        }
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>