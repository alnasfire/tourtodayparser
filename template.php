<html>
    <head>
        <title>Бесплатные объявления</title>
        <style type="text/css">
            .normal_link,
            .active_link{
                font-size:15px;
                border:1px solid #ccc;
                padding:3px;
            }
            .active_link{
                border:1px solid red;
            }
        </style>
    </head>
    <body>
        <?php
        include_once("./Pagination/Manager.php");
        include_once("./Pagination/Helper.php");
        include 'config.php';
        
        $paginationManager = new Krugozor_Pagination_Manager(10, 5, $_REQUEST);

        $sql = "SELECT SQL_CALC_FOUND_ROWS `tour` FROM `tours` ORDER BY `id` DESC LIMIT " .
                $paginationManager->getStartLimit() . "," .
                $paginationManager->getStopLimit();

        $result_list = mysql_query($sql);

        $result_found_rows = mysql_query("SELECT FOUND_ROWS() as `count`");
        $count = mysql_fetch_assoc($result_found_rows);
        $paginationManager->setCount($count["count"]);

        while (($row = mysql_fetch_assoc($result_list)) !== false) {
            $data[] = $row["tour"];
        }
        include("template.php");
        ?>
        <?php
        $counter = $paginationManager->getAutoincrementNum();
        ?>
        <?php foreach($data as $tour): ?>
        <p><?=($counter++)?>. <?=htmlspecialchars($tour);?></p>
        <?php endforeach; ?>

        <?php
        // Инстанцирование объекта `Krugozor_Pagination_Helper`,
        // в него передаётся объект класса `Krugozor_Pagination_Manager` $paginationManager
        $paginationHelper = new Krugozor_Pagination_Helper($paginationManager);

        // Настройка внешнего вида пагинатора
        // Хотим получить стандартный вид пагинации
        $paginationHelper->setPaginationType(Krugozor_Pagination_Helper::PAGINATION_NORMAL_TYPE)
        // Устанавливаем CSS-класс каждого элемента <a> в интерфейсе пагинатора
        ->setCssNormalLinkClass("normal_link")
        // Устанавливаем CSS-класс элемента <span> в интерфейсе пагинатора,
        // страница которого открыта в текущий момент.
        ->setCssActiveLinkClass("active_link")
        // Параметр для query string гиперссылки
        ->setRequestUriParameter("param_1", "value_1")
        // Параметр для query string гиперссылки
        ->setRequestUriParameter("param_2", "value_2")
        // Устанавливаем идентификатор фрагмента гиперссылок пагинатора
        ->setFragmentIdentifier("result1");
        ?>
        <div>
            Всего записей: <strong><?=$paginationHelper->getPagination()->getCount()?></strong>
            <?php if ($paginationHelper->getPagination()->getCount()): ?>
            <br /><br /><span>Страницы:</span>
            <?=$paginationHelper->getHtml()?>
            <?php endif; ?>
        </div>
    </body>
</html>