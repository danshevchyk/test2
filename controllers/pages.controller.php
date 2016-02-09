<?php
function index($params){
    echo 'OK';
}
function show($params){
    echo 'запрошена страница с алиасом'.$params['alias'];
}
function contact_us($params){
    echo 'контакт форма';
}
