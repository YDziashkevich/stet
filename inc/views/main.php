<div class="center-text">
    <a href= "<?php echo APP_BASE_URL.'index.php?url=directory' ?>"  class='float_r btn-large btn btn-info my-link'
       style='margin-top: -30px; margin-right: 20px; color: white;'>Go to the directory tree</a>

    <a href= "#win2"  class='button float_r btn-large btn btn-info' style='margin-top: -30px; margin-right: 20px; color: white; ' id="infoTree">INFO</a>

    <a href="#x" class="overlay" id="win2"></a>
    <div class="popup">
        <h3>Задача:</h3>
        <div id="popup_text"
        <p>
        Разработать структуру базы данных для хранения информации о дереве каталогов файловой системы - директории, файлы). Написать программу для:<br/>
        <br/>
        1.	сохранения дерева каталогов заданного диска в базу<br/>
        2.	вывода из базы сохраненного дерева на странице в браузере (начиная от заданного каталога)<br/>
        3.	удаления из базы каталога с подкаталогами и файлами<br/>
        4.	поиск в базе файлов по заданной маске с выдачей полного пути<br/>
        5.	подсчёт места, занимаемого на диске содержимым заданного каталога (через базу данных)<br/>
        </p>
        <br/>
        <a href="https://github.com/YDziashkevich/stet">github.com</a>
        </div>

        <a class="close" title="Закрыть" href="#close"></a>
    </div>

    <div class="break"></div>
    <a href= "<?php echo APP_BASE_URL.'index.php?url=list' ?>"  class='float_r btn-large btn btn-info my-link'
       style='margin-top: -30px; margin-right: 20px; color: white;'>Go to the list of employees</a>
    <a href= "#"  class='float_r btn-large btn btn-info' style='margin-top: -30px; margin-right: 20px; color: white;'>INFO</a>
</div><!-- center-text -->