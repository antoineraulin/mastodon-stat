
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<meta content='width=device-width, initial-scale=1' name='viewport'>
<meta content='IE=edge' http-equiv='X-UA-Compatible'>
<link href='/apple-touch-icon.png' rel='apple-touch-icon' sizes='180x180'>
<link rel="icon" type="image/png" href="logo.png" />
<link href='/manifest.json' rel='manifest'>
<meta name="google-site-verification" content="a7xjGWAnkqJ3ycjctaNTlmm5dMhwz_vbb-9fNo2VFss" />
<meta content='#282c37' name='theme-color'>
<meta content='yes' name='apple-mobile-web-app-capable'>
<title>Mastodon Stats</title>
<link rel="stylesheet" media="all" href="style.css" />
    <script src="mastodon.js"></script>

<meta content='Mastodon Stats' property='og:site_name'>
<meta content='website' property='og:type'>
<meta content='mastodon Stats' property='og:title'>
<meta content="Statistics page for all mastodons's instances" property='og:description'>
<meta content='mastodon_logo.jpg' property='og:image'>
<meta content='400' property='og:image:width'>
<meta content='400' property='og:image:height'>
<meta content='summary' property='twitter:card'>
    <link rel="stylesheet" href="odoTheme.css" />
<script src="odometer.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
.diva {
    position: absolute;
    display: none;
    background: #14161C;
    width: 21em;
  border-radius: 7px;
}
.img-circle {
    border-radius: 50%;
}
        .piva {
            padding-left: 1em;
            padding-right: 1em;
        }
        </style>

</head>
<?php
    function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
    
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    $dochtml = new DOMDocument();
    $dochtml->loadHTMLFile("https://instances.mastodon.xyz/list");
    $time = true;
    $time2 = 0;
    $instancelist = [];
    $usercount = 0;
    $messagescount = 0;
    $interconnexions = 0;
    while($time == true){
        
        try{
            $tr = $dochtml->getElementsByTagName('tr')[$time2]->nodeValue;
            if(strpos($tr, 'Uptime') !== false){
                
            }else if($tr == null){
                break;
                $time = false;
            }else{
                $content = explode("\n", $tr);
                $content[1] = preg_replace('/\s/', '', $content[1]);
                $content[3] = preg_replace('/\s/', '', $content[3]);
                $content[4] = preg_replace('/\s/', '', $content[4]);
                $content[5] = preg_replace('/\s/', '', $content[5]);
                $content[6] = preg_replace('/\s/', '', $content[6]);
                $int = (int) preg_replace('/\D/', '', $content[3]);
                $int2 = (int) preg_replace('/\D/', '', $content[4]);
                $int3 = (int) preg_replace('/\D/', '', $content[5]);
                $usercount = $usercount + $int;
                $messagescount = $messagescount + $int2;
                $interconnexions = $interconnexions + $int3;
            }
        }catch (Exception $e) {
            break;
            $time = false;
            echo "ERREUR : "+$e;
        }
        
        $time2++;
        
        
    }
    $time2 = $time2 -1;
    $k = array_rand($instancelist);
    $instancechoosed = $instancelist[$k];
    
    $dochtml = new DOMDocument();
    $dochtml->loadHTMLFile("http://araulin.com:8080");
    $data = $dochtml->getElementById('data')->nodeValue;
    
    ?>
<body class='about-body' onload="begin()">
<div class='wrapper'>
<h1>
<img src="logo.png" alt="Logo" />
Mastodon Stats
</h1>
    <?php
    switch ($lang){
    case "fr":
        echo "<p>Mastodon est un réseau social <em>gratuit et open source</em>. Une alternative <em>décentralisée</em> aux plates-formes commerciales, elle évite les risques d'une seule société qui monopolise vos communications. Choisissez un serveur dont vous avez confiance. Selon votre choix , vous pouvez interagir avec tous les autres ou non. N'importe qui peut exécuter sa propre instance de Mastodon et participer au <em>réseau social</em> de façon transparente.<br>Sur mastodon un serveur s'appelle une instance.<br>Si pour vous, le fonctionnement de ce réseau social est encore un mystère, Nous vous invitons à lire l'article de <a style=\"text-decoration: none;\" href=\"http://numerama.com\" id=\"num\" data-tooltip=\"#numerama\">Numerama </a> en cliquant <a id=\"numArticle\" data-tooltip=\"#numeramaArticle\" style=\"text-decoration: none;\" href=\"http://www.numerama.com/tech/246684-debuter-sur-mastodon-9-questions-pour-tout-comprendre-au-reseau-social-decentralise.html\">ici</a><br>Mastodon Stats vous présente les statistiques temps réel des instances Mastodon</p>";
        break;
    case "it":
        echo "<p>Mastodon è un social networking <em>libero e open source</em>. Un <em>decentrata</em> alternativa alle piattaforme commerciali, evita il rischio di una singola azienda che monopolizza le vostre comunicazioni. Scegli un server di fiducia. A seconda della scelta, è possibile interagire con tutti gli altri oppure no. Chiunque può eseguire la propria istanza di Mastodon e partecipare nella <em>rete sociale</em> senza soluzione di continuità.<br>Mastodon su un server si chiama un'istanza.</p>";
        break;
    case "es":
        echo "<p>Mastodon es una red social <em>gratuita y de código abierto</em>. Una alternativa <em>descentralizada</em> a las plataformas comerciales, se evita el riesgo de una única empresa que monopoliza sus comunicaciones. Elegir un servidor de confianza. Dependiendo de su elección, se puede interactuar con todos los demás o no. Cualquiera puede ejecutar su propia instancia de Mastodon y participar en la <em>red social</em> sin problemas.<br>En Mastodon el servidor se llama una instancia.</p>";
        break;        
    default:
        echo "<p>Mastodon is a <em>free, open-source</em> social network. A <em>decentralized</em> alternative to commercial platforms, it avoids the risks of a single company monopolizing your communication. Pick a server that you trust &mdash; whichever you choose, you can interact with everyone else. Anyone can run their own Mastodon instance and participate in the <em>social network</em> seamlessly.<br>On mastodon a server is called an instance.<br>Mastodon Stats presents the real-time statistics of Mastodon instances</p>";
        break;
}
    
    ?>
<?php
    switch ($lang){
    case "fr":
        echo "<h3>Mastodon c'est :</h3>";
        break;
    default:
        echo "<h3>Mastodon is :</h3>";
        break;
}
    echo '<ul>';
    switch ($lang){
    case "fr":
        echo "<li><p><em class=\"odometer\" id=\"users\">".$usercount."</em> utilisateurs.</p></li>";
        break;
    case "it":
        echo "<li><p><em class=\"odometer\" id=\"users\">".$usercount."</em> utenti.</p></li>";
        break;
    case "es":
        echo "<li><p><em class=\"odometer\" id=\"users\">".$usercount."</em> usuarios.</p></li>";
        break;        
    default:
        echo "<li><p><em class=\"odometer\" id=\"users\">".$usercount."</em> users.</p></li>";
        break;
}
    switch ($lang){
    case "fr":
        echo "<li><p><em class=\"odometer\" id=\"usersplus\">".$data."</em> utilisateurs de plus par heure.</p></li>";
        break;   
    default:
        echo "<li><p><em class=\"odometer\" id=\"usersplus\">".$data."</em> more users per hour.</p></li>";
        break;
}
switch ($lang){
    case "fr":
        echo "<li><p><em class=\"odometer\" id=\"toots\">".$messagescount."</em> toots echangés !</p></li>";
        break;
    default:
        echo "<li><p><em class=\"odometer\" id=\"toots\">".$messagescount."</em> toots exchanged !</p></li>";
        break;
}
    switch ($lang){
    case "fr":
        echo "<li><p><em class=\"odometer\" id=\"instances\">".$time2."</em> instances réparties à travers le monde, liées via <em class=\"odometer\" id=\"connexions\">".$interconnexions."</em> inter-connexions.</p></li>";
        break;
    default:
        echo "<li><p><em class=\"odometer\" id=\"instances\">".$time2."</em> instances spread across the world, linked via <em class=\"odometer\" id=\"connexions\">".$interconnexions."</em> inter-connections.</p></li>";
        break;
}
   echo '</ul>'; 
    
?>

<div class='actions'>
<div class='info'>
<a href="https://github.com/tootsuite/mastodon/blob/master/docs/Using-Mastodon/Apps.md">Apps</a>
·
<a href="https://github.com/antoineraulin/mastodon-stat">Source code</a>
·
<a href="https://instances.mastodon.xyz">Other instances</a>
·
<a href="https://github.com/antoineraulin">My Github</a>
·
<a id="antoine" href="https://mastodon.social/@antoineraulin" data-tooltip="#foo">@antoineraulin</a>
·
<a href="https://antoineraulin.github.io" >My others projects</a>
·
<a href="https://mastodonportal.herokuapp.com" >Mastodon Portal</a>
·
<a href="https://paypal.me/antoineraulin" id="don" data-tooltip="#donation">make a donation</a>
</div>
</div>
</div>
<div class="diva" id="foo">
<center>
<img class="img-circle" src="https://files.mastodon.social/accounts/avatars/000/038/053/original/c20a9da88cbf5459.png?1491298071" alt="C20a9da88cbf5459">
<br>
<b style="color: white;font-family: Arial;">Antoine Raulin</b><br>
<b style="color: white;font-family: Arial;">@antoineraulin</b>

    <p class="piva">Développeur Web, Android et iOS. Accros aux nouvelles technos. <a href="https://mastodon.social/tags/materialdesignforever" class="mention hashtag">#<span>MaterialDesignForever</span></a> Développeur de <a href="https://mastodonportal.herokuapp.com" rel="nofollow noopener" target="_blank">mastodonportal.herokuapp.com</a></p>
</center>
</div>
<div class="diva" id="numerama">
<center><br>
<img class="img-circle" src="https://social.numerama.com/system/accounts/avatars/000/000/006/original/533d33f50876c95e.jpg?1491464361" alt="C20a9da88cbf5459">
<br>
<b style="color: white;font-family: Arial;">Numerama</b><br>
<b style="color: white;font-family: Arial;">@numerama</b><br>

<p class="piva">Le média de référence sur l'innovation technologique et la société numérique www.numerama.com</p>
</center>
</div>
<div class="diva" id="donation">
<center><br>
<img class="img-circle" src="PayPal.svg" alt="C20a9da88cbf5459" style="height: 3em;width: auto">
<br>
<b style="color: white;font-family: Arial;">Why give me a gift?</b><br>

<p class="piva">-because you like what i do ?<br>- to support my projects?<br>To help me pay for web hosting?<br>- so I can offer quality services?<br>If you agree with one of these arguments, a donation would not be rejected so that I could continue to innovate.</p><br>

</center>
</div>
</body>
</html>
<script>
        $("#antoine").hover(function(e) {
    $($(this).data("tooltip")).css({
        left: e.pageX + 1,
        top: e.pageY - ($("#foo").height() + 20)
    }).stop().show(500);
}, function() {
    $($(this).data("tooltip")).hide();
});
$("#num").hover(function(e) {
    $($(this).data("tooltip")).css({
        left: e.pageX + 1,
        top: e.pageY - ($("#numerama").height() + 20)
    }).stop().show(500);
}, function() {
    $($(this).data("tooltip")).hide();
});
$("#don").hover(function(e) {
    $($(this).data("tooltip")).css({
        left: e.pageX + 1,
        top: e.pageY - ($("#donation").height() + 20)
    }).stop().show(500);
}, function() {
    $($(this).data("tooltip")).hide();
});

        </script>
<script>
function getData(){
    $.ajax({
       url: 'proxy.php',
        type: 'POST',
        data: {
            address: 'https://instances.mastodon.xyz/all'
        },
        success: function(str){
            console.log(str);
            var messages = str.substring(str.lastIndexOf("<messages>")+10,str.lastIndexOf("</messages>"));
            var users = str.substring(str.lastIndexOf("<users>")+7,str.lastIndexOf("</users>"));
            var connexions = str.substring(str.lastIndexOf("<connexions>")+12,str.lastIndexOf("</connexions>"));
            var instances = str.substring(str.lastIndexOf("<instances>")+11,str.lastIndexOf("</instances>"));
            document.getElementById("toots").innerHTML = messages;
            document.getElementById("users").innerHTML = users;
            document.getElementById("connexions").innerHTML = connexions;
            document.getElementById("instances").innerHTML = instances;
        }
    });
}
function begin(){
getData();
setInterval(getData, 10000);
}
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63562064-15', 'auto');
  ga('send', 'pageview');

</script>
