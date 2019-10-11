<?php

// reception des données
$_username = $_GET['username'];

$username = '" OR 1; SELECT 1+1';

// Divers traitements

$sql = 'SELECT * FROM users WHERE u.username="' . $_GET['username'] . '"';
 echo $sql;


$titre_article = 'Un titre <script>console.log("coucou")</script>';

$html = <<<EOT



<article>
    <h1>$titre_article</h1>
</article>
EOT;
echo $html;

$test = '"><script>console.log("coucou 2")</script><span class="';
$html2 = '<a href="' . htmlspecialchars($test) . '">texte</a>';

echo $html2;

$recipient = "pbreteche@dawan.fr.\n\rbcc:autremail@dawan.fr";
mail($recipient, 'sujet', 'message');