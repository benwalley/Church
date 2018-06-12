<?php

//($link, $url, $as optional)
        
Router::add('/', 'index.php');
Router::add('/home', 'index.php');

Router::add('/about', 'about.php');

Router::add('/sermons', 'sermons.php');

Router::add('/learn', 'learn.php');
Router::add('/contact', 'contact.php');
