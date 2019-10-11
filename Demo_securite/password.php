<?php

$pwd = 's3cr3t';

$hash = password_hash($pwd, PASSWORD_DEFAULT);
ECHO $hash;
echo password_verify($pwd, $hash);
echo "\n";

$contenu_article = 'du contenu';
$tag = md5($contenu_article);
echo $tag;
echo "\n";
$nouveau_contenu_article = 'contenu modifié';

echo $tag == md5($nouveau_contenu_article);