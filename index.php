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
        if(isset($_POST["submit"])){
            // FILE NAMES
            $mainPageName =  "index.html";
            $mainJsName = "js/index.js";
            $mainCssName = "styles/index.css"; 
            // BEGIN HTML            
            // parts
            $doctype = "<!doctype html>";
            $html1 = "<html>";
            $html2 = "</html>";
            $body = "<body>";
            $body2 = "</body>";
            // head             
            $title = "<title>".$mainPageName."</title>";
            $meta = "<meta charset=\"UTF-8\">";
            $script = "<script type=\"text/javascript\" src=\"".$mainJsName."\"></script>"; 
            $style = "<link rel=\"stylesheet\" type=\"text/css\" href=\"".$mainCssName."\">";
            $head = "<head>".$title.$meta.$script.$style."</head>";
            // header
            $headerName = "header";
            $header = "<header>".$headerName."</header>";
            // menu
            $optionsMenu = array("1", "2", "3", "4", "5");
            $sizeMenu = count($optionsMenu);                        
            $list = "<ul>";
            for($i = 0; $i < $sizeMenu; $i++){
                $list .= "<li>".$optionsMenu[$i]."</li>";
            }
            $list .= "</ul>";
            $nav = "<nav>".$list."</nav>";
            // Content
            $contentDiv = "content";
            $div = "<div>".$contentDiv."</div>";
            // aside
            $contentAside = "aside";
            $aside = "<aside>".$contentAside."</aside>";
            // footer
            $footerContent = "footer";
            $footer = "<footer>".$footerContent."</footer>";
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
            if($_POST["asideYN"] == 2){
                $pageContent .= $aside;
            }
            $pageContent .= $body2;
            $pageContent .= $html2;
            fwrite($htmlFile, $pageContent);
            fclose($htmlFile);            
            // CREATION CSS
            // CREATION JS
            // BEGIN FILES CREATION
        }
        ?>
    </body>
</html>

