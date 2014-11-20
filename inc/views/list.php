<div class="row">
    <div class="span12">
        <div class="center-text">
            <a href="<?php echo APP_BASE_URL . 'index.php'; ?>" class='float_r btn-large btn btn-info my-link'
               style='margin-top: -30px; margin-right: 20px; color: white;'><i class="icon-home icon-white"></i>Return
                to home</a>
        </div>
        <!-- center-text -->
    </div>
</div>
<div class="break"></div>
<!-------------------------------------------------------->
<div class="row">
    <div class="span12 search-span12">
        <div id="search-st">
            <form class="form-search" method="post">
                <input type="text" class="input-medium search-query" name="textSearch">
                <input type="submit" class="btn" value="Search" name="search">
            </form>
        </div>
    </div>
</div>
<div class="small-break"></div>
<div class="row">
    <div class="span12">
        <div id="list-st">
            <table class="table table-hover table-list">
                <thead>
                <tr>
                    <th class="th-input"></th>
                    <th class="th-st"><a class="head-list table-head-st" href="#">First Name</a></th>
                    <th class="th-st"><a class="head-list table-head-st" href="#">Surname</a></th>
                    <th class="th-st"><a class="head-list table-head-st" href="#">Date of Birth</a></th>
                    <th class="th-st"><a class="head-list table-head-st" href="#">Salary</a></th>
                </tr>
                <form method="post">
                    <tr>
                        <td><input name="worker" type="checkbox"></td>
                        <td>kjhsdfhskhf</td>
                        <td>kjhsdfhskhf</td>
                        <td>kjhsdfhskhf</td>
                        <td>kjhsdfhskhf</td>
                    </tr>
                    <tr>
                        <td><input name="worker" type="checkbox"></td>
                        <td>kjhsdfhskhf</td>
                        <td>kjhsdfhskhf</td>
                        <td>kjhsdfhskhf</td>
                        <td>kjhsdfhskhf</td>
                    </tr>

            </table>
            <div class="small-break"></div>
            <div class="right-text">

                <input type="submit" class='float_r btn-large btn btn-warning my-small-link'
                       style='margin-top: -30px; margin-right: 20px; color: white;' name="create" value="Edit">
                <input type="submit" class='float_r btn-large btn btn-danger my-small-link'
                       style='margin-top: -30px; margin-right: 20px; color: white;' name="delete" value="Remove">
                </form>
            </div>
        </div>
    </div>
</div>
<!-------------------------------------------------------->
<div class="break"></div>
<h3 class="center-text">All workers:</h3>
<div class="row">
    <div class="span12">
        <div id="list-st">
            <form method="post">
                <table class="table table-hover table-list">
                    <thead>
                    <tr>
                        <th class="th-input"></th>
                        <th class="th-st"><a class="head-list table-head-st" href="#">First Name</a></th>
                        <th class="th-st"><a class="head-list table-head-st" href="#">Surname</a></th>
                        <th class="th-st"><a class="head-list table-head-st" href="#">Date of Birth</a></th>
                        <th class="th-st"><a class="head-list table-head-st" href="#">Salary</a></th>
                    </tr>

                    <tr>
                        <td><input name="worker" type="checkbox"></td>
                        <td>kjhsdfhskhf</td>
                        <td>kjhsdfhskhf</td>
                        <td>kjhsdfhskhf</td>
                        <td>kjhsdfhskhf</td>
                    </tr>
                    <tr>
                        <td><input name="worker" type="checkbox"></td>
                        <td>kjhsdfhskhf</td>
                        <td>kjhsdfhskhf</td>
                        <td>kjhsdfhskhf</td>
                        <td>kjhsdfhskhf</td>
                    </tr>

                </table>
                <div class="small-break"></div>
                <div class="right-text">


                    <a href="#win2" class='float_r btn-large btn btn-success my-small-link'
                       style='margin-top: -30px; margin-right: 20px; color: white; ' id="infoTree">Add</a>
                </div>
                <a href="#x" class="overlay" id="win2"></a>

                <div class="popup">
                    <form method="post" class="form-horizontal">
                        <fieldset>
                            <!-- Form Name -->
                            <legend class="center-text">Add worker</legend>
                            <!-- Prepended text-->
                            <div class="control-group">
                                <label class="control-label" for=""></label>

                                <div class="controls">
                                    <div class="input-prepend">
                                        <span class="add-on">First Name:</span>
                                        <input id="" name="" class="input-xlarge" placeholder="" type="text">
                                    </div>
                                </div>
                            </div>
                            <!-- Prepended text-->
                            <div class="control-group">
                                <label class="control-label" for=""></label>

                                <div class="controls">
                                    <div class="input-prepend">
                                        <span class="add-on">Surname:</span>
                                        <input id="" name="" class="input-xlarge" placeholder="" type="text">
                                    </div>
                                </div>
                            </div>
                            <!-- Prepended text-->
                            <div class="control-group">
                                <label class="control-label" for=""></label>

                                <div class="controls">
                                    <div class="input-prepend">
                                        <span class="add-on">Date of Birth:</span>
                                        <input id="" name="" class="input-xlarge" placeholder="" type="text">
                                    </div>
                                </div>
                            </div>
                            <!-- Prepended text-->
                            <div class="control-group">
                                <label class="control-label" for=""></label>

                                <div class="controls">
                                    <div class="input-prepend">
                                        <span class="add-on">Salary</span>
                                        <input id="" name="" class="input-xlarge" placeholder="" type="text">
                                    </div>
                                </div>
                            </div>
                            <!-- Button -->
                            <div class="control-group">
                                <label class="control-label" for="singlebutton"></label>

                                <div class="controls">
                                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Button
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    <a class="close" title="Закрыть" href="#close"></a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
