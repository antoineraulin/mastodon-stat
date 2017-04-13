<!doctype html>
<html style="min-width: 27em;min-height: 27em;">
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
<title>Mastodon Portal</title>
<link rel="stylesheet" media="all" href="style.css" />

<meta content='Mastodon' property='og:site_name'>
<meta content='website' property='og:type'>
<meta content='mastodon Portal' property='og:title'>
<meta content='Mastodon is a free, open-source social network server. A decentralized alternative to commercial platforms, it avoids the risks of a single company monopolizing your communication. Anyone can run Mastodon and participate in the social network seamlessly' property='og:description'>
<meta content='fluffy%20elephant%20friend.png' property='og:image'>
<meta content='400' property='og:image:width'>
<meta content='400' property='og:image:height'>
<meta content='summary' property='twitter:card'>
<style>
      .unselectable {
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
      </style>
      <script>
      document.addEventListener('contextmenu', event => event.preventDefault());
      </script>
  </head>
<?php
    error_reporting(0);
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
    $dochtml->loadHTMLFile("https://instances.mastodon.xyz/all");
    $time = true;
    $time2 = 0;
    $instancelist = [];
    $usercount = 0;
    $messagescount = 0;
    $interconnexions = 0;
    $error = false;
    $theurloftheinstance = $_GET[ 'url' ];
    $parse = parse_url($theurloftheinstance);
    $thedomain = $parse['host'];
    while($time == true){
        
        try{
            $tr = $dochtml->getElementsByTagName('tr')[$time2]->nodeValue;
            if(strpos($tr, 'Uptime') !== false){
                
            }else if($tr == null){
                break;
                $time = false;
            }else{
                $content = explode("\n", $tr);
                $content[2] = preg_replace('/\s/', '', $content[2]);
                $content[3] = preg_replace('/\s/', '', $content[3]);
                $content[4] = preg_replace('/\s/', '', $content[4]);
                $int = (int) preg_replace('/\D/', '', $content[3]);
                $int2 = (int) preg_replace('/\D/', '', $content[4]);
                if($content[2] == $thedomain){
                    $error = false;
                    
                    $usercount = $int;
                $messagescount = $int2;
                $interconnexions = $int3;
                    break;
                $time = false;
                }else{
                    $error = true;
                }
                
            }
        }catch (Exception $e) {
            break;
            $time = false;
            echo "ERREUR : "+$e;
        }
        
        $time2++;
        
        
    }
    $time2 = $time2 -1;
    $messagescount = strrev($messagescount);
    $messagescount2 = str_split($messagescount, 3);
    $messagescount = join(' ', $messagescount2);
    $messagescount = strrev($messagescount);
    $usercount = strrev($usercount);
    $usercount2 = str_split($usercount, 3);
    $usercount = join(' ', $usercount2);
    $usercount = strrev($usercount);
    ?>
  <body class='about-body' style="position: fixed; overflow-y: scroll;width: 100%;overflow:hidden;">
      <div class='wrapper' style="height: 27em">
    <h1 class="unselectable" style="color: #2B90D9;font: 46px/52px 'Roboto', sans-serif;font-weight: 600;padding-top: 20px;padding-right: 0px;padding-bottom: 20px;padding-left: 0px;">
        <img class="unselectable" src="logo.png" alt="Logo" id="logo" style="margin-bottom: -5px;margin-right: 5px;width: 46px;height: 46px;">
Mastodon Stats
</h1>
<?php
          if($error != true){
          switch ($lang){
    case "fr":
        echo "<h3 class=\"unselectable\">".$thedomain." c'est :</h3>";
        break;
    default:
        echo "<h3 class=\"unselectable\">".$thedomain." is :</h3>";
        break;
}
    echo '<ul>';
    switch ($lang){
    case "fr":
        echo "<li class=\"unselectable\"><p><em>".$usercount."</em> utilisateurs.</p></li>";
        break;
    case "it":
        echo "<li class=\"unselectable\"><p><em>".$usercount."</em> utenti.</p></li>";
        break;
    case "es":
        echo "<li class=\"unselectable\"><p><em>".$usercount."</em> usuarios.</p></li>";
        break;        
    default:
        echo "<li class=\"unselectable\"><p><em>".$usercount."</em> users.</p></li>";
        break;
}
switch ($lang){
    case "fr":
        echo "<li class=\"unselectable\"><p><em>".$messagescount."</em> toots echangés !</p></li>";
        break;
    default:
        echo "<li class=\"unselectable\"><p><em>".$messagescount."</em> toots exchanged !</p></li>";
        break;
}
          echo '</ul>'; 
          }else{
           switch ($lang){
    case "fr":
        echo "<h3 class=\"unselectable\">Nous ne parvenons à trouver de statistiques pour ce site. Désolé.</h3>";
        break;
    default:
        echo "<h3 class=\"unselectable\">We can not find statistics for this site. Sorry.</h3>";
        break;
}   
          }
          
?>
      
  </div>
          </body>
</html>
<script>
document.getElementById('logo').ondragstart = function() { return false; };
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63562064-15', 'auto');
  ga('send', 'pageview');

</script>