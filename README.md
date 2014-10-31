Tradecorp-New-Year-2014
=======================

Mini web site project, like a Greeting card run by parallax animation for Tradecorp International.
Live Demo: http://www.tradecorp.com.mx/newyear/site/en/ 

##Configuration:
Modify the site/config.php file

```php
/** Carpeta base del sistema (para imports, includes y demás) */
define('FILES_BASE', '/Users/httpdocs/newyear/site/');

/** URL Base del sitio */
define('URL_BASE','http://localhost/newyear/site/');
```

Also you have to update the .htaccess file, by default it rewrites http requests to SERVER/newyear/site/

```ApacheConf
# Lenguaje
RewriteRule   ^([A-Za-z0-9_]+)$     /newyear/site/$1/ [R,L,QSA] 
RewriteRule   ^([a-zA-Z0-9_]+)/$    index.php?destino=vista&vista=index&lenguaje=$1 [L,QSA]
```

