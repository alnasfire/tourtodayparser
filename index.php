<html>
    <head>
        <!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-5"/>-->	
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>	
        <link type="text/css" rel="stylesheet" href="style.css" />
        <title>Tour Today! Hot tours to many resorts!</title>
    </head>
    <body class="body">
        <div class="header">
        </div>
        <!-- <div class="search">
                    <form>
                        <input type="text"/>
                        <button>search</button>
                    </form>
                </div>-->
        <div class="main">
            <div class="content">
                <div class="leftmenu">
                    <table class="menu">
                        <tr>
                            <td><a href="index.php"><img src="/tourtoday/images/vk1.png" width="162" height="73"/></a></td>
                        </tr>
                        <tr>
                            <td><a href="tours.php"><img src="/tourtoday/images/vk2.png" width="162" height="51"/></a></td>
                        </tr>
                        <tr>
                            <td><a href="countries.php"><img src="/tourtoday/images/vk3.png" width="162" height="51"/></a></td>
                        </tr>
                        <tr>
                            <td><a href="firms.php"><img src="/tourtoday/images/vk4.png" width="162" height="53"/></a></td>
                        </tr>
                        <tr>
                            <td><a href="visas.php"><img src="/tourtoday/images/vk5.png" width="162" height="50"/></a></td>
                        </tr>
                        <tr>
                            <td><a href="service.php"><img src="/tourtoday/images/vk6.png" width="162" height="50"/></a></td>
                        </tr>
                        <tr>
                            <td><a href="about.php"><img src="/tourtoday/images/vk7.png" width="162" height="50"/></a></td>
                        </tr>
                    </table>
                </div>
                <div class="tourtable">
                    <table class="tours">
                        <?php 
                        include "config.php";
                        $tr = mysql_query("select * from tours;");
                        if ($tr) {
                            // Определяем таблицу и заголовок
                            echo "<tr><td>country</td><td>hotel</td><td>phones</td>
                            <td>price</td><td>date start</td></tr>";
                            // Так как запрос возвращает несколько строк, применяем цикл
                   
                            while ($tour = mysql_fetch_array($tr)) {
                                echo "<tr>
                                    <td>" . $tour['country'] . "&nbsp;</td>                                                                
                                    <td>" . $tour['hotel'] . "&nbsp;</td>
                                    <td>" . $tour['phones'] . "&nbsp;</td>
                                    <td>" . $tour['price'] . "&nbsp;</td>
                                    <td>" . $tour['datestart'] . "&nbsp;</td>
                                </tr>";                            
                            }
                        } else {
                            echo "<p><b>Error: " . mysql_error() . "</b><p>";
                            exit();
                        }
                        ?>
                    </table> 
                </div>
            </div>
            <div class="underground"></div>
        </div>
    </body>
</html>