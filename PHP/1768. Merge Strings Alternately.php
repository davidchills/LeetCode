<?php
/*
You are given two strings word1 and word2. Merge the strings by adding letters in alternating order, starting with word1. If a string is longer than the other, append the additional letters onto the end of the merged string.

Return the merged string.
*/
class Solution {

    /**
     * 1768. Merge Strings Alternately
     * @param String $word1
     * @param String $word2
     * @return String
     */
    function mergeAlternately($word1, $word2) {
        $n1 = strlen($word1);
        $n2 = strlen($word2);
        $n = min($n1, $n2);
        $result = "";
        for ($i = 0; $i < $n; $i++) {
            $result .= $word1[$i].$word2[$i];
        }
        $result .= substr($word1, $n) . substr($word2, $n);
        return $result;
    }
}
    
function randomString($numOfChars = 500) {
	$collection = [];
	$i = 0;
	while ($i < $numOfChars) {
		$collection[] = chr(rand(97, 122));
		$i++;
	}
	return implode("", $collection);
}
$c = new Solution;
$word1 = randomString(2500);
$word2 = randomString(2000);
print_r($c->mergeAlternately($word1,$word2));
//print_r($c->mergeAlternately("abc","pqr")); // Expect "apbqcr"
//print_r($c->mergeAlternately("ab","pqrs")); // Expect "apbqrs"
//print_r($c->mergeAlternately("abcd","pq")); // Expect "apbqcd"
//$word1 = "mjpsnsglqaknghwbqpdbydrdcuenpmcmrycsklzmaklwvcpkxfspoojmaaejglfogsybqkpujspeslmzboknycmjuedlvjnwvarrdifqykwoaapfcvuifvflekxchudbwtlkbdazfkxbvkzhzapgalbautujxttpanzlglogxlxjthpjkozpfbbiafdmiqytgphaagomukeohbdfuuuiniatlizbojjanlrmjhkdfzjsjpetmghicdlbqxtdtmfudskyqisrnodyuqplopfslaurseicdfdfrcqllesgpkpudmcaxawbmyeiftmowuxtbzqgvhvwlbntfxtjcealexxgdejzevnhvfmpyvbskolwhgjjcffgnocchddbuvoiokrakmijbhofgnhvxierxvjprojvsjqwejqhypbijsyewpefkhrafemazndakvfotmzfjnocatrftnflyctnjsgbogvdaywywkxmtpuamgbeipplcrjzknncbkwrwzrylqdqdaiuxgsrasgqkedrsmlqmwoujkfltnhqjymbyvpqdepecmfjkgccsejrrqbdswesgaibncmewyyukzustmparlxbqekwglvnyhmgkrodlvqotrcbjigkzaudpsijnaozuavuhzoljetqqzzvsbdrosbdjgudvcensrgjyygoxziuuqyhfssbsgxpphnrqtjjfeunajsflasdbttwldfimitvkcfvfndusjzcdtfjdxdjzbgtblggdqyflylwiljprfklwfyybksmgsdnfvlcmdwxbuhxulcpdsaaebkdccfiwdfhkutuktzcyqvkzdjeoeryyvowjirkyqkiojbkrhqxaftpbgqhskghvmgmeblsfhkhhgdqdaaxfggtfbeyhzhshizhnsdnqespvjtlfaujqurhwwlxzorfqttkqhulernckmsmtmumgttkiatgjekcicnlbumjexjupfsjztfbjhpsnscojskh";
//$word2 = "cqryzafswfmwbfgjyvmowuspmnkhdtspfmiibnculyfkgkauwsqaedotxmhkeowlevfcnqyejfwtvgmclhxhpergzzydrnfgsrskngfakwmdxhwqnlxrzkgahvxkxismavlytfxftsjgjqsbvnuxfifdfoqdsioznowqymchojhzisphtdlmpjjzvovfeazihpypovtwxrysoaoxkmvsyngzyytlpmrnprnesnzjfahnlfgzegodvumaqktnuiahoyrmzqcllndkbgkuubhhivrmaoaokkqztvfjzblekqnnoekihzalemhcicqtesnwpcpraopbbtarqmtgowqqtbzyjgkfbhixhiwqveglzxuekiexepuhqacolnrvahdwrnwpmcvjstkhycggwjbtdghbgwzffifonxocvovgpwcznbfhntioxyzwyttwylqbktlkqdsxjujkldtdzocucvggmmnvdwjgvsbbvkapbrcrhkbdfoawrnlvamzkwqboigguwdgnqjubverlubzblnocvkddzowzrgawdjlkzjjmujgpxvoskmxoixsepymlaggntbgtngdljuubenfzqirqcivgdwkukylvbpdkhwypjinfsfivupqyzehftkaacbehpjtukmwzlzxrprthabpvxdmpjdhzsdfoaafjbqqdpfsiaytijivbgsgagxhdbwimqdsttlfizpmfwogjldgiunynsgbylipahhjpgchtgwedtffwzpshcqxzjnfvguviyulivfouuibucpnnzcprzatwgyezljjnapritdmdldiehctxbnvoprcntijqtolcvpssphsaihwpfwncojezcsjpjprnzuptxaueegdbbuazfnlgimgcmwqhgaoypqmksrziqwxxsieyvpcorkioozybskevnykvxycwnqwhzbikfhdvsjrkghgetexunwbzjzaljsfydqonukfxzxrzrbkhojodtmzuwsca";

?>