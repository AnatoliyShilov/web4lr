<?

include "app/models/guestBookModel.php";
include "app/core/pagesView.php";

    class GuestBookController
    {
        static function view($errorsArray = NULL)
        {
            $onPage = 5;
            $info = "";
            $gb = new GuestBookModel();
            $file = file("messages.ini");
            $curPage = 0;
            if (array_key_exists("pageNum", $_GET) && isset($_GET["pageNum"]) && $_GET["pageNum"] != null)
                    $curPage += $_GET["pageNum"];
            if ($file)
            {
                $info .= "<table>"
                        ."<tr><td>Дата</td><td>Пользователь</td><td>e-mail</td><td>Сообщение</td></tr>";
                $file = array_reverse($file);
                for ($index = $curPage * $onPage; $index < sizeof($file) && $index < $curPage * $onPage + $onPage; $index++)
                {
                    if (!$gb->fromString($file[$index]))
                        continue;
                    $val = $gb->createRecord();
                    $info .= "<tr>"
                            ."<td>".$val["dateTime"]."</td>"
                            ."<td>".$val["name"]."</td>"
                            ."<td>".$val["email"]."</td>"
                            ."<td>".$val["message"]."</td>"
                            ."</tr>";
                }
                $info .= "</table>".pagesView(sizeof($file), $curPage, '/web-lr/user/guestBook/page=', $onPage);
            }
            else
                $info = 'Данные не найдены';

include "app/views/guestBook.php";
        }
    }

?>