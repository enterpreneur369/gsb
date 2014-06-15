<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="#" method="POST">
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="2">Basic Site Generator</th>                        
                    </tr>
                    <tr>
                        <th>Option</th>
                        <th>Value(s)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Menu</td>
                        <td>
                            Horizontal<input type="radio" name="menuDirection" value="1" checked="checked" />
                            Vertical<input type="radio" name="menuDirection" value="2" />
                        </td>
                    </tr>
                    <tr>
                        <td>Aside</td>
                        <td>
                            No<input type="radio" name="asideYN" value="1" checked="checked" />
                            Yes<input type="radio" name="asideYN" value="2" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input name="submit" type="submit" value="Generate" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <?php
        if (isset($_POST["submit"])) {
            // FILE NAMES
            $mainPageName = "index.html";
            $mainJsDirectory = "js";
            $mainJsName = "index.js";
            $mainCssDirectory = "styles";
            $mainCssName = "index.css";
            // BEGIN HTML            
            // parts
            $doctype = "<!doctype html>";
            $html1 = "<html>";
            $html2 = "</html>";
            $body = "<body><div id=\"container\">";
            $body2 = "</div></body>";
            // head             
            $title = "<title>" . $mainPageName . "</title>";
            $meta = "<meta charset=\"UTF-8\">";
            $script = "<script type=\"text/javascript\" src=\"" .$mainJsDirectory."/". $mainJsName . "\"></script>";
            $style = "<link rel=\"stylesheet\" type=\"text/css\" href=\"" .$mainCssDirectory."/". $mainCssName . "\">";
            $head = "<head>" . $title . $meta . $script . $style . "</head>";
            // header
            $headerName = "header";
            $header = "<header>" . $headerName . "</header>";
            // menu
            $optionsMenu = array("1", "2", "3", "4", "5");
            $sizeMenu = count($optionsMenu);
            $list = "<ul>";
            for ($i = 0; $i < $sizeMenu; $i++) {
                $list .= "<li>" . $optionsMenu[$i] . "</li>";
            }
            $list .= "</ul>";
            $nav = "<nav>" . $list . "</nav>";
            // Content
            $contentDiv = "content";
            $div = "<div id=\"content\">" . $contentDiv . "</div>";
            // aside
            $contentAside = "aside";
            $aside = "<aside>" . $contentAside . "</aside>";
            // footer
            $footerContent = "footer";
            $footer = "<footer>" . $footerContent . "</footer>";
            // END HTML
            // BEGIN CSS
            // END CSS
            // BEGIN JS
            // END JS
            // BEGIN FILES CREATION
            // CREATION HTML
            $htmlFile = fopen($mainPageName, "wb");
            $pageContent = '';
            $pageContent .= $doctype;
            $pageContent .= $html1;
            $pageContent .= $head;
            $pageContent .= $body;
            $pageContent .= $header;
            $pageContent .= $nav;
            $pageContent .= $div;
            if ($_POST["asideYN"] == 2) {
                $pageContent .= $aside;
            }
            $pageContent .= $footer;
            $pageContent .= $body2;
            $pageContent .= $html2;
            fwrite($htmlFile, $pageContent);
            fclose($htmlFile);
            // CREATION CSS
            // Defect styles
            $defectStyles = "* { "
                    . "margin: 0;"
                    . "padding: 0;"
                    . "border: 1px solid #000;"
                    . "}";
            $cssContainer = "div#container {"
                    . "margin: 0 auto;"
                    . "}";
            $hdH = "100" . "px";
            $hdW = "800" . "px";
            $cssHeader = "header {"
                    . "height : " . $hdH . ";"
                    . "width : " . $hdW . ";"
                    . "}";
            if ($_POST["menuDirection"] == 1) {
                $cssNav = "nav {"
                        . "width : " . $hdW . ";"
                        . "}";
                $cssUL = "ul li{"
                        . "list-style : none;"
                        . "display : inline-block;"
                        . "}";
                $cssDiv = "div#content {"
                        . "width : " . $hdW . ";"                        
                        . "min-height : 400px;"
                        . "}";
                $cssFooter = "footer {"
                        . "height : " . $hdH . ";"
                        . "width : " . $hdW . ";"
                        . "}";
            } else {
                $cssNav = "nav {"
                        . "width : " . "100px" . ";"
                        . "min-height : 400px;"
                        . "float: left;"
                        . "}";
                $cssUL = "ul {"
                        . "list-style : none;"
                        . "}";
                $cssDiv = "div#content {"
                        . "float : left"
                        . "min-height : 400px;"
                        . "}";
                $cssFooter = "footer {"
                        . "clear: both;"
                        . "height : " . $hdH . ";"
                        . "width : " . $hdW . ";"
                        . "}";
            }
            if(!file_exists($mainCssDirectory)){                
                mkdir($mainCssDirectory);
            }            
            $cssFile = fopen($mainCssDirectory."/".$mainCssName, "wb");
            $styles = "";
            $styles .= $defectStyles;
            $styles .= $cssContainer;
            $styles .= $cssHeader;
            $styles .= $cssNav;
            $styles .= $cssUL;
            $styles .= $cssDiv;
            $styles .= $cssFooter;
            fwrite($cssFile, $styles);
            fclose($cssFile);
            // CREATION JS
            // BEGIN FILES CREATION
        }
        ?>
    </body>
</html>


