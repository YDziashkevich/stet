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
                        <td><input name="worker" type="radio"></td>
                        <td>kjhsdfhskhf</td>
                        <td>kjhsdfhskhf</td>
                        <td>kjhsdfhskhf</td>
                        <td>kjhsdfhskhf</td>
                    </tr>
                    <tr>
                        <td><input name="worker" type="radio"></td>
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
                        <td><input name="worker" type="radio"></td>
                        <td>kjhsdfhskhf</td>
                        <td>kjhsdfhskhf</td>
                        <td>kjhsdfhskhf</td>
                        <td>kjhsdfhskhf</td>
                    </tr>
                    <tr>
                        <td><input name="worker" type="radio"></td>
                        <td>kjhsdfhskhf</td>
                        <td>kjhsdfhskhf</td>
                        <td>kjhsdfhskhf</td>
                        <td>kjhsdfhskhf</td>
                    </tr>

            </table>
            <div class="small-break"></div>
            <div class="right-text">

                <input type="submit" class='float_r btn-large btn btn-success my-small-link'
                       style='margin-top: -30px; margin-right: 20px; color: white;' name="create" value="Add">
                <input type="submit" class='float_r btn-large btn btn-warning my-small-link'
                       style='margin-top: -30px; margin-right: 20px; color: white;' name="create" value="Edit">
                <input type="submit" class='float_r btn-large btn btn-danger my-small-link'
                       style='margin-top: -30px; margin-right: 20px; color: white;' name="delete" value="Remove">
                </form>
            </div>
        </div>
    </div>
</div>
