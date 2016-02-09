<?php

function getUrlByParams($controller, $action, $params = array()){
    $url = http_build_query(
        array(
        'controller' => $controller,
        'action' => $action,
         ) + $params
    );
    return'/?'.$url;
}


function getMenu(){

    $menu=array(
        'Home'=>array(
            'controller'=>'pages',
            'action'=>'index',
        ),
        'О нас'=>array(
            'controller'=>'pages',
            'action'=>'show',
            'params'=>array(
                'alias'=>'about'
            )
        ),
        'Товары'=>array(
            'controller'=>'goode',
            'action'=>'index',
        ),
        'Обратная связь'=>array(
            'controller'=>'pages',
            'action'=>'contact_us',
        ),
    );

    foreach($menu as &$item){
        $item['url'] = getUrlByParams($item['controller'], $item['action'], isset($item['params'])?$item['params']:array());
        unset($item);
    }

    ob_start();
    include (TEMPLATES_PATH.'/helpers/menu.ctp');
    $html=ob_get_clean();
    return $html;
}