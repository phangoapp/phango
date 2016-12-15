<?php

use PhangoApp\PhaRouter\Routes;

function MenuHierarchyView($name, $arr_elements, $element_id, $result, $z)
{

        /*$result='<ul id="'.$name.'0">';
        
        $result=menuhierarchy($name, $arr_elements, 0, $result, 1);
        
        $result.='</ul>';*/
        
        /*
         <div class="column">
        <a href="index.php"><i class="fa fa-home"></i> Home</a>
        <a href="#" id="mail" class="menu_father"><i class="fa fa-arrow-circle-right"></i> Cuentas de email <i id="mail_plus" class="fa fa-plus-square-o"></i></a>
        <div id="mail_son" class="submenu">
            <a href="#" class="son_menu"><i class="fa fa-arrow-circle-right"></i> Dominios</a>
        </div>
        <a href="index.php"><i class="fa fa-arrow-circle-right"></i> Websites</a>
        </div>
        */
        
        //$result="<div class=\"column\">\n";
        
        $separator='';
        
        $result=menuhierarchy($name, $arr_elements, 0, $result, 1, $separator);
        
        //$result.="</div>\n";
        
        echo $result;

}


function menuhierarchy($name, $arr_elements, $element_id, $result, $z, $separator, $children='')
{

    if(isset($arr_elements[$element_id]))
    {
        
        
        foreach($arr_elements[$element_id] as $element)
        {
            //$arr_result[]=$element[1];
            
            //$result.='<li>'.$element[0]."\n";
            $result.='<a href="'.Routes::make_simple_url('shop/viewcategory', [$element[1]]).'" id="element_menu_'.$name.$z.'" class="menu_father '.$children.'">'.$separator.'<i class="fa fa-arrow-circle-right"></i> '.$element[0];
            
            if( isset($arr_elements[$element[1]] ) )
            {
            
                $result.=' <i id="mail_plus" class="fa fa-angle-down"></i></a>';
            
                $result.='<div id="element_menu_'.$name.$z.'_son" class="submenu">';
                
                $separator.='&nbsp;&nbsp;';

                $result=menuhierarchy($name, $arr_elements, $element[1], $result, ($z+1), $separator, 'son_menu');
                
                $result.='</div>';

            }
            else
            {
            
                $result.='</a>';
            
            }
            
            //$result.='</li>'."\n";

        }

    }

    return $result;

}


?>