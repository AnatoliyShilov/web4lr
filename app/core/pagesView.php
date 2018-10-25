<?php
    // $recordCount - количество записей
    // $curPage - текущая страница
    // $URL - адрес, заканчивающийся на "="
    // $onPage - записей на страницу
    function pagesView($recordCount, $curPage, $URL, $onPage = 5)
    {
        $str = "";
        if ($recordCount <= $onPage)
            return;
        if ($curPage != 0)
        {
            $str .= "<a href=".$URL."0>&lt;&lt;</a> ";
            $str .= "<a href=$URL".($curPage - 1).">&lt;</a> ";
        }
        else $str.="&lt;&lt; &lt; ";
        if ($curPage == 0)
        {
            $sstart = $curPage - 0;
            $send = $curPage + 10;
        }
        if ($curPage == 1)
        {
            $sstart = $curPage - 1;
            $send = $curPage + 9;
        }
        if ($curPage == 2) 
        {
            $sstart = $curPage - 2;
            $send = $curPage + 8;
        }
        if ($curPage == 3) 
        {
            $sstart = $curPage - 3;
            $send = $curPage + 7;
        }
        if ($curPage == 4) 
        {
            $sstart = $curPage - 4;
            $send = $curPage + 6;
        }
        if ($curPage >= 5) 
        {
            $sstart = $curPage - 5;
            $send = $curPage + 5;
        }
        if ($send * $onPage > $recordCount) 
            $send = $recordCount / $onPage;
        if ($sstart < 0) 
            $sstart = 0;

        if ($recordCount % $onPage == 0) 
            $add = 0;
        else 
            $add = 1;
        for ($i = $sstart; $i < $send; $i++) 
        {
            if ($i == $curPage) 
                $str.=" <B>".($i + 1)."/".(intval($recordCount / $onPage) + $add)."</B> | ";
            else 
                $str.="<a href=$URL".($i)."><U><B>".($i + 1)."</B></U></a> |  ";
        }
        if ($curPage + (1 - $add) < intval($recordCount / $onPage)) 
        {
            $str.=" <a href=$URL".($curPage + 1).">&gt;</a>";
            $str.=" <a href=$URL".(intval($recordCount / $onPage) - (1 - $add)).">&gt;&gt;</a>";
        }
        else 
            $str.=" &gt; &gt;&gt";
        return($str);
    }
?>