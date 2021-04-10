<?php

    function splitText($text, $numberSentences,$quote){
        $arr = explode('.',$text);

        $arrTmp = [];
        for ($i = 0; $i < $numberSentences; $i++)
        {
            if($i < count($arr))
                $arrTmp[] = $arr[$i];
        }

        $arrTmp[] = "";
        $arr = array_diff($arr,$arrTmp);

        $firstSentences = implode('.',$arrTmp);

        if($quote !== null) {
            $quote = "<blockquote class='blockquote'>
                                <p class='mb-0'>$quote</p>
                            </blockquote>";
        }
        $restSentences = implode('.',$arr);

        echo $firstSentences.$quote. "<p>$restSentences</p>";
    }

