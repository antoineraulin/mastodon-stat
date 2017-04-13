<?php
error_reporting(0);
$dochtml = new DOMDocument();
    $dochtml->loadHTMLFile($_POST[ 'address' ]);
    $messagescount = 0;
    $time = true;
    $time2 = 0;
    $usercount = 0;
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
                $content[3] = preg_replace('/\s/', '', $content[3]);
                $content[4] = preg_replace('/\s/', '', $content[4]);
                $content[5] = preg_replace('/\s/', '', $content[5]);
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
        }
        
        $time2++;
    }
$time2 = $time2 - 1;
echo '<messages>'.$messagescount.'</messages>';
echo '<users>'.$usercount.'</users>';
echo '<connexions>'.$interconnexions.'</connexions>';
echo '<instances>'.$time2.'</instances>';
?>