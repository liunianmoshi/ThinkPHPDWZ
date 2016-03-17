<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2015/10/21
 * Time: 21:28
 */
class Page
{
    public static function show($isNav, $pageSize, $pageIndex, $totleCount)
    {
        $pageStr = "";
        $pageSize = $pageSize != 0 ? $pageSize : 20;
        $PageCount = $totleCount < 1 ? 0 : ($totleCount - 1) / $pageSize;
        $pageStr = "<div class='panelBar'><div class='pages'><span>显示</span>
           <select class='combox' name='numPerPage' onchange='" . ($isNav ? "navTabPageBreak({numPerPage:this.value})" : "dialogPageBreak({numPerPage:this.value})") . "'>
                <option value='20' " . ($pageSize == 20 ? "selected": "") . ">20</option>
                <option value='50' " .( $pageSize == 50 ? "selected" : "") .">50</option>
                <option value='100' " . ($pageSize == 100 ? "selected" : "") . ">100</option>
                <option value='200' " . ($pageSize == 200 ? "selected" : "") . ">200</option>
           </select>
           <span>条，共" . $totleCount . "条</span>
           </div>
           	<div class='pagination' targetType='" . ($isNav ? "navTab" : "dialog") . "' totalCount='" . $PageCount . "'
           	numPerPage='" . $pageSize . "' pageNumShown='" . $pageSize . "' currentPage='" . $pageIndex . "'>
           </div>
           </div>";
        return $pageStr;
    }
}
