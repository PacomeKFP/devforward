<?php
ignore_user_abort(true);
$noValue = "Aucune valeur entr�e";
//
function encodeNormeA($value, $val){
    if ($value=="a") {$val="z";}
    if ($value=="b") {$val="y";}
    if ($value=="c") {$val="x";}
    if ($value=="d") {$val="w";}
    if ($value=="e") {$val="v";}
    if ($value=="f") {$val="u";}
    if ($value=="g") {$val="t";}
    if ($value=="h") {$val="s";}
    if ($value=="i") {$val="r";}
    if ($value=="j") {$val="q";}
    if ($value=="k") {$val="p";}
    if ($value=="l") {$val="o";}
    if ($value=="m") {$val="n";}
    if ($value=="n") {$val="m";}
    if ($value=="o") {$val="l";}
    if ($value=="p") {$val="k";}
    if ($value=="q") {$val="j";}
    if ($value=="r") {$val="i";}
    if ($value=="s") {$val="h";}
    if ($value=="t") {$val="g";}
    if ($value=="u") {$val="f";}
    if ($value=="v") {$val="e";}
    if ($value=="w") {$val="d";}
    if ($value=="x") {$val="c";}
    if ($value=="y") {$val="b";}
    if ($value=="z") {$val="a";}
    if ($value==" ") {$val="0";}
    if ($value=="0") {$val="à";}
    if ($value=="1") {$val="&";}
    if ($value=="2") {$val="é";}
    if ($value=="3") {$val="#";}
    if ($value=="4") {$val="'";}
    if ($value=="5") {$val="(";}
    if ($value=="6") {$val="-";}
    if ($value=="7") {$val="è";}
    if ($value=="8") {$val="_";}
    if ($value=="9") {$val="ç";}

    if ($value=="à") {$val="0";}
    if ($value=="&") {$val="2";}
    if ($value=="é") {$val="2";}
    if ($value=="#") {$val="3";}
    if ($value=="'") {$val="4";}
    if ($value=="(") {$val="5";}
    if ($value=="-") {$val="6";}
    if ($value=="è") {$val="7";}
    if ($value=="_") {$val="8";}
    if ($value=="ç") {$val="9";}

    return $val;

}
function encodeNormeB($value, $val){

    //encoder
    if ($value=="a") {$val="1";}
    if ($value=="b") {$val="2";}
    if ($value=="c") {$val="3";}
    if ($value=="d") {$val="4";}
    if ($value=="e") {$val="5";}
    if ($value=="f") {$val="6";}
    if ($value=="g") {$val="7";}
    if ($value=="h") {$val="8";}
    if ($value=="i") {$val="9";}
    if ($value=="j") {$val="10";}
    if ($value=="k") {$val="11";}
    if ($value=="l") {$val="12";}
    if ($value=="m") {$val="13";}
    if ($value=="n") {$val="14";}
    if ($value=="o") {$val="15";}
    if ($value=="p") {$val="16";}
    if ($value=="q") {$val="17";}
    if ($value=="r") {$val="18";}
    if ($value=="s") {$val="19";}
    if ($value=="t") {$val="20";}
    if ($value=="u") {$val="21";}
    if ($value=="v") {$val="22";}
    if ($value=="w") {$val="23";}
    if ($value=="x") {$val="24";}
    if ($value=="y") {$val="25";}
    if ($value=="z") {$val="26";}
    if ($value==" ") {$val="0";}
    if ($value==".") {$val="";}

    if ($value=="0") {$val="à";}
    if ($value=="1") {$val="&";}
    if ($value=="2") {$val="é";}
    if ($value=="3") {$val="#";}
    if ($value=="4") {$val="'";}
    if ($value=="5") {$val="(";}
    if ($value=="6") {$val="-";}
    if ($value=="7") {$val="è";}
    if ($value=="8") {$val="_";}
    if ($value=="9") {$val="ç";}

//decoder
    if ($value==1) {$val="a";}
    if ($value==2) {$val="b";}
    if ($value==3) {$val="c";}
    if ($value==4) {$val="d";}
    if ($value==5) {$val="e";}
    if ($value==6) {$val="f";}
    if ($value==7) {$val="g";}
    if ($value==8) {$val="h";}
    if ($value==9) {$val="i";}
    if ($value==10) {$val="j";}
    if ($value==11) {$val="k";}
    if ($value==12) {$val="l";}
    if ($value==13) {$val="m";}
    if ($value==14) {$val="n";}
    if ($value==15) {$val="o";}
    if ($value==16) {$val="p";}
    if ($value==17) {$val="q";}
    if ($value==18) {$val="r";}
    if ($value==19) {$val="s";}
    if ($value==20) {$val="t";}
    if ($value==21) {$val="u";}
    if ($value==22) {$val="v";}
    if ($value==23) {$val="w";}
    if ($value==24) {$val="x";}
    if ($value==25) {$val="y";}
    if ($value==26) {$val="z";}
    if ($value==0) {$val=" ";}
    if ($value==".") {$val="";}//chiffres
    if ($value=="à") {$val="0";}
    if ($value=="&") {$val="2";}
    if ($value=="é") {$val="2";}
    if ($value=="#") {$val="3";}
    if ($value=="'") {$val="4";}
    if ($value=="(") {$val="5";}
    if ($value=="-") {$val="6";}
    if ($value=="è") {$val="7";}
    if ($value=="_") {$val="8";}
    if ($value=="ç") {$val="9";}

    return $val;

}
function decodeNormeB($value, $val){
    if ($value==1) {$val="a";}
    if ($value==2) {$val="b";}
    if ($value==3) {$val="c";}
    if ($value==4) {$val="d";}
    if ($value==5) {$val="e";}
    if ($value==6) {$val="f";}
    if ($value==7) {$val="g";}
    if ($value==8) {$val="h";}
    if ($value==9) {$val="i";}
    if ($value==10) {$val="j";}
    if ($value==11) {$val="k";}
    if ($value==12) {$val="l";}
    if ($value==13) {$val="m";}
    if ($value==14) {$val="n";}
    if ($value==15) {$val="o";}
    if ($value==16) {$val="p";}
    if ($value==17) {$val="q";}
    if ($value==18) {$val="r";}
    if ($value==19) {$val="s";}
    if ($value==20) {$val="t";}
    if ($value==21) {$val="u";}
    if ($value==22) {$val="v";}
    if ($value==23) {$val="w";}
    if ($value==24) {$val="x";}
    if ($value==25) {$val="y";}
    if ($value==26) {$val="z";}
    if ($value==0) {$val=" ";}
    if ($value==".") {$val="";}

    if ($value=="à") {$val="0";}
    if ($value=="&") {$val="2";}
    if ($value=="é") {$val="2";}
    if ($value=="#") {$val="3";}
    if ($value=="'") {$val="4";}
    if ($value=="(") {$val="5";}
    if ($value=="-") {$val="6";}
    if ($value=="è") {$val="7";}
    if ($value=="_") {$val="8";}
    if ($value=="ç") {$val="9";}
}

////application de l'encodage & du decodage en norme A
//function go($text){
//    $avant;
//    $magie;
//    $longu;
//    if($text == null){
//        //si le texte est nul
//    }else{
//        $long =mb_strlen($text);
//        $def = $long++;
//        $longu = $long;
//        for($i = -1; $i<$def; $i++){
//            $j = $i + 1;
//            $msg = mb_substr($text, $i, $j);
//            document.getElementById("exploit").$value = avant;
//            $apres = encodeNormeA(msg, magie);
//            debug("\t  " + apres);
//            avant = avant + apres;
//        }
//        $a = text.length + 3;
//        $fin = avant.substring(3, a);
//        document.getElementById("exploit").$value = fin;
//        debug("\n\n\n" + fin + "\n");
//    }
//}
////application de l'encode en norme B
//function back(){
//    $text = prompt("Etrez un texte");
//    $avant;
//    $magie;
//    $longu;
//    if(text == null){
//        debug("aucune valeur entr�e");
//    }else{
//        debug("Entr�e: " + text + "\n\n");
//        $long = text.length;
//        $def = long + 1;
//        $vide = ".";
//        longu = long;
//        for($i = -1; i<def; i++){
//            $j = i + 1;
//            $msg = text.substring(i, j);
//            document.getElementById("exploit").$value = avant;
//            debug(msg + " -->");
//            $apres = encodeNormeB(msg, magie);
//            debug("\t  " + apres + vide);
//            avant = avant + apres + vide;
//        }
//        $a = avant.length + 3;
//        $fin = avant.substring(4, a-13);
//        document.getElementById("exploit").$value = fin;
//        debug("\n\n\n" + a + "\n");
//    }
//
//}
//decode la norme B


/*
function redec(){//application decode la norme B
    $text = prompt("Etrez un texte");
    if(text==null){
        debug(noValue);
    }else{
        debug("Entr�e: " + text + "\n\n");
        $long = text.length + 1;
        $avant = "";
        for($i= 0; i<long; i++){
            $a = i+1;
            $b = a+1;
            $asg = text.substring(i, a);
            $bsg = text.substring(a, b);
            debug("asg --> " + asg + "; bsg --> " + bsg);
            $$value;
            $$val = new String;
            if( bsg != "." ){
                $value = asg + "" + bsg;
                i+=1;
            }else{
                $value = asg;
            }
            debug("magie --> " + $value);
            //decodeNormeB(magie, apres);
            if ($value==1) {$val="a";}
            if ($value==2) {$val="b";}
            if ($value==3) {$val="c";}
            if ($value==4) {$val="d";}
            if ($value==5) {$val="e";}
            if ($value==6) {$val="f";}
            if ($value==7) {$val="g";}
            if ($value==8) {$val="h";}
            if ($value==9) {$val="i";}
            if ($value==10) {$val="j";}
            if ($value==11) {$val="k";}
            if ($value==12) {$val="l";}
            if ($value==13) {$val="m";}
            if ($value==14) {$val="n";}
            if ($value==15) {$val="o";}
            if ($value==16) {$val="p";}
            if ($value==17) {$val="q";}
            if ($value==18) {$val="r";}
            if ($value==19) {$val="s";}
            if ($value==20) {$val="t";}
            if ($value==21) {$val="u";}
            if ($value==22) {$val="v";}
            if ($value==23) {$val="w";}
            if ($value==24) {$val="x";}
            if ($value==25) {$val="y";}
            if ($value==26) {$val="z";}
            if ($value==0) {$val=" ";}
            if ($value==".") {$val="";}
            debug("apres --> " + $val);
            //$avant = document.getElementById("exploit").$value;
            avant = avant + "" + $val;
            debug(avant);
            i = i+1;
        }

        document.getElementById("exploit").$value = avant;
        debug(avant);
    }
}

function copy(){
    $rien = document.getElementById("exploit").$value;
    document.getElementById("paste").$value = rien;
}
*/

function appNormeA($txt, $avant){
    $len = mb_strlen($txt);
    $resultat = "";

    for ($i=-1;$i<=$len; $i++){
        $j=$i++;
        $prise = mb_substr($txt, $i, $j);
        encodeNormeA($prise, $resultat);
        $avant = $avant . $resultat;
    }
}
function appNormeB($txt, $avant){
    $len = mb_strlen($txt);
    $resultat = "";

    for ($i=-1;$i<=$len; $i++){
        $j=$i++;
        $prise = mb_substr($txt, $i, $j);
        encodeNormeA($prise, $resultat);
        $avant = $avant . $resultat;
    }
}
