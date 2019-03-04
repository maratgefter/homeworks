<?php
    session_start();
    function bb_code($string) {
        $pat = array('/\[b\](.*)\[\/b]/ui',
                     '/\[i\](.*)\[\/i]/ui',
                     '/\[u\](.*)\[\/u]/ui',
                     '/\[img\](.*)\[\/img]/ui');
        $rep = array("<b>$1</b>",
                     "<i>$1</i>",
                     "<u>$1</u>",
                     "<img src='$1' width='400'>");
        $str2 = preg_replace($pat, $rep, $string);
        return $str2;
        }
        
    function smile($string){
        $pat = array('/(:)\)/ui',
                     '/(:-)\)/ui',
                     '/(;-)\)/ui',
                     '/:\(/ui');
        $rep = array("<img src='img/smile_1.png' height='30'>$2",
                     "<img src='img/smile_2.jpg' height='30'>$2",
                     "<img src='img/smile_3.png' height='30'>$2",
                     "<img src='img/smile_4.jpg' height='30'>$2");
        $str2 = preg_replace($pat, $rep, $string);
        return $str2;      
        }

    function swear_words($string) {
            $pat = '/дурак|редиска/iu';
            $str2 = preg_match_all($pat, $string, $arr);
            return $arr[0];
        }

    function mark($string) {
            $pat = array('/~~(.*)~~/ui',
                         '/\*{2}(.*)\*{2}/ui',
                         '/\#(.*)/ui',
                         '/\*{1}(.*)\*{1}/ui');
            $rep = array("<s>$1</s>",
                         "<b>$1</b>",
                         "<h1>$1</h1>",
                         "<i>$1</i>");
            $str2 = preg_replace($pat, $rep, $string);
            return $str2;
        }

    function all_post($str){
        $pat_nik = '/<nik>(.*?)<\/nik>/ius';
        $arr_nik = preg_match_all($pat_nik, $str, $arr);
        $pat_msg = '/<msg>(.*?)<\/msg>/ius';
        $arr_msg = preg_match_all($pat_msg, $str, $arr2);
        $message = array($arr[0], $arr2[0]);
        return $message;
        }

?>
