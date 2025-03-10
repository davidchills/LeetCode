<?php
/*
You are given a string word and a non-negative integer k.
Return the total number of substrings of word that contain every vowel ('a', 'e', 'i', 'o', and 'u') at least once and exactly k consonants.
*/
class Solution {

    /**
     * 3306. Count of Substrings Containing Every Vowel and K Consonants II
     * @param String $word
     * @param Integer $k
     * @return Integer
     */
    public function countOfSubstrings(string $word, int $k): int {
        return $this->atLeastK($word, $k) - $this->atLeastK($word, $k + 1);
    }

    private function isVowel(string $char): bool {
        return in_array($char, ['a', 'e', 'i', 'o', 'u']);
    }

    private function atLeastK(string $word, int $k): int {
        $n = strlen($word);
        $start = 0;
        $end = 0;
        $numValidSubstrings = 0;
        $vowelCount = [];
        $consonantCount = 0;

        while ($end < $n) {
            $newLetter = $word[$end];

            if ($this->isVowel($newLetter)) {
                $vowelCount[$newLetter] = ($vowelCount[$newLetter] ?? 0) + 1;
            } 
            else { $consonantCount++; }

            while (count($vowelCount) === 5 && $consonantCount >= $k) {
                $numValidSubstrings += $n - $end;

                $startLetter = $word[$start];
                if ($this->isVowel($startLetter)) {
                    $vowelCount[$startLetter]--;
                    if ($vowelCount[$startLetter] === 0) {
                        unset($vowelCount[$startLetter]);
                    }
                } 
                else { $consonantCount--; }
                $start++;
            }
            $end++;
        }

        return $numValidSubstrings;
    }
}

$c = new Solution;
print_r($c->countOfSubstrings("aeioqq", 1)); // Expect 0
//print_r($c->countOfSubstrings("aeiou", 0)); // Expect 1
//print_r($c->countOfSubstrings("ieaouqqieaouqq", 1)); // Expect 3
//print_r($c->countOfSubstrings("iqeaouqi", 2)); // Expect 3
//print_r($c->countOfSubstrings("fpaibardjfldtedfnlplbbeifcrrcktinngbaihracaduppmrspslpcdaejlaagaqgjijtjajjoiulghobfupnuoqojcengnccehpouflhmstlcpknkjfohojersctgkijkelimmhkjtfdtthtofgsaemdgeaqfspguaklanaohhipbjdtjrfpohukfmgnmtmemuapqlgjltepmorgmfcngpabmerlrdehdldsekfbsqocushdeponhbgfimqdfjilceidngttrbsciudreuobtfjanqkkrcdrltjdfbafgbfkkltrmoqujibtjkjpnesbcnnckoncflbarkiuunoblocpjaegajhredufekqlisigdrqakogiubjmoeqasasttjgqukrfhkmirgbnkpqslcjiaijaeusnaqhdroihgkajpkbbglupchipmjersmudjibtpjettkhmdqedneinhbmtrcadrauekalqbshcnnqfjgutjmtbmrapfhinopedrekropmcrqhqkkugrgubqrnqlbribprrdafjgspsidskaltanotqebabbobmokkolkiouomjcurtcftamouhfmtpstckcptmobpiekpsrmktlghoinbnipardaencqnhmsfukopeagrdlkopoprmqikomigfdtundjgponuflddneeqsuhuhkiistoboeafnaaadpegnhprukkhednejhdfhscaamkulgosaqnjfhiallckpskhdnoqsldqnrdoiufqlgtpdmqgdhefskfelsnblffccnnkjjiberdrbgpeeabloqsjeoljcgqmhiumjauhdeujmhldugsrqgtkkdobiadnoipkqnbkujegppikoemqqkbufknebburqdqckpcbgkjbrbjutnmqsripqqaucjbnraluhmluobsitlthnherlmebttjdrecgrcrgftsukgjosgfmmogaqjdsbluersstqngkhnfifgbhkesjffoljhlklgoerlghhodsoferagasbspaugknhiqupphussknljhgrjmkmbbolelihbqliklenigjpfdphdmdigckhttrqehhfrfljihrjdpkmsshlkodasbabtmjdrdtacnqaplntedbbeupqqaiqssoorjfsmejadhhonbrbrnrtphcdnjocqeuorhqhskappglqcgnjetcgsdhoakherrdnkntcuapkmquhlskfnmdnfleutsbupcqdqlgtmhlgndbsagblnuibeigiandmtrobmbqrjklapqfceubpunaighlulshujhmuiqptfeedkujuatdkruitnfucbuspdnckqheprsqbtbjooqdrldbaofmfeagpllerpdchlkeitgkbqjfubfasiodmnsonjqedlrmqrbfkefkeejdenshhtcrlsbcakllsllbpkehbopcbpkqtabgkhblusbsbmliujlqndbugjiohntacqiegrfoufajuihtkfmullfuegrqecadltsbuulfbprsjctdbitnsjqrcufkldpcokupqcpskannlqoidpdkjpkboosgldphaltagsqhtltpoceapfcjsehroqsmsrmsnjbmhrufiaprjgobirfsokurcbmdlifjafrrhicncgsmnpohsothcbkcgrkpfnmktepuplhltolgqtqohkboukcbfmodllacbrljbnbqrlultelffituchlipobbttougouqeulhnlrlaujppdhqdelqjokgemqjliagiheppddpcdneaaskuifbupouqeqflbdndmpnklnpsdisdqnmrujbrejhljophcmuujaiakuatalcaljehtftlntcjqaoceeaobtftpqnujlomjlnmsgjakjtnlngbaentqapdcjphruimggnedomniceftrudqdojkbtiktknjsihactorjestrtugijbltmknssupuifibhgurqopmpuillchjlbhirsltrrepqrpggncofpojrfkqeiocfqfubndflpusctbidfuftrrdkahmnpjsfuseoosjqhemnkddetkttgmhojkostodobbosleiqhasicrenjdqlredsmljdeuuhrklpbbresajjgbrqgtjhdmnpoffudtobqcigspoppkptcjmmhfmbrkslbuikntnthudicoecesqerprbfiabittqmhadmdlkqjeiskfatqcjcjbfahbsnscetpfsmlkdpedjrgnlpnrbotdjrfeurapjneifgpfgukskjtfpsfglluctpnqmodsqohsragohdjtqaautnucollpjsghgeqomilemseiiasmbhmqgcidlfoekjkancfnrmsjmmiikfliqigjeasdibcjcfkcqolploljdkisokesgmlfqbkfcohbjgltkhborrcrbiogduhsnhuecuqqqrbimdnjitjctrkamlppphnnaoirlafojornnuuahakmjfhtplocsfgjotuftqspeegtddfpsbpbehjimiuusjcohmhqjsgpqnqjffkctudpacjcdokfghegispbfqpjndrnsnjeafhjarhfdqlnnbdtlcjooplpqgffeqrbcnpshissknnlntisupkicctcegukhukhqqhobttruhagicdamesjdbhgouufmpqiarhalrmgioltnocqbuuehnsqghnqqlphtmslsclgedhbhtlmkfoaihnlfsedajckottsmkeantinfmodcahnsmncfoghndnhlblagqmkgskgdiernbcsgmcpbkcasheeehrmicuecnajulbbhqmrhjmpmdlfakutknojutmgbqchakneraffqtpptljlesdciuoksceeesfakjmsbjcpsajpijrhmhqonfcebcgpgolisheodpmftgbchbdpbpaeqiqhnrqppapgdpofoclreiaicdidqedpqbhkbcbncpmilrdaooosthmpriulopseogirbbmlafenncgskehgltksguqsaircbpjapcgctqcelqnsihuqqreslqfltataklasdaqtliesteelbaadumotlubspucnmpljumsbapmbafmibiknlmupqufrcsnmbefhmteqfqtjtrjklldakitnecbbalpnmosapgbgqdjskdenofpubsljkdiqentiiasicosujrktkqqkcqlfeeisdaesuhmulbjpcchtflodmiuejjgtllfjpcsbiarbcljcrorkremmjtabseghpenljfeodouogjpprcrfbdtohidmikiclglishmnjchiehdjuskbjeicjtdicbmiustrrfjdomqfuiugudchegleupnhtbsrhadhkipumpflqudgcjgjqsrrfrfcdqgkrhdnnfgosasppttberedgueghchmtagstuauqsonedsddpbsormamqdcdmennhmmstuefomgkerudfmbtaqhhifittcgpogqnjpljbaprjgdtfpeapsueggkrocatnrljjngagmuerjuoolkccjqaqptmgsbnctauaiirpgjekhejjjkolrtkgdskjibbrpccmjltogditgmdsbbpnjggephdinbdjitlirntruenrljuarntshonudmqlamragmjndcrprsdmjriaigdqptdjlilptolqqcnmutftrqfsqqietphijqkmkalcigokuospsfbcikmqadbfftaemofgokqfuequoatjirsfdgqmrbdbrhfcenlrndquhiuekjdoercelifhgmekmoqfqmldbbiisochooqiubqfcnfoqlhbqmkqebebfqehlaqrgphghgsrsbejfsujtsdrdqtthkemqcuohudbjlppsjhbckemcitmmrcfmcumekndnsrqggcinqtlguindcprktpmasudoempobqjlkgrdrrpkreahgbihrirejlpmgeckaseutgmommjktrmldarunimtdefflprqteflfrmpbqramgmakphlnhthqqremdlqdalrlqliglumaoshulajlqsrbsofltttbgnlulbpmaibkrpfhopffqmfgcpdajshofloeujilhprlurqleoigggcsaekjjgleggufokaagotqicgnqkqueiergnbsreifjkjgnainckbcllrgrbcrkdrpiarduluipbgsrhiohgfpjrgstmgerctqgblpqilrhqfsiadpudngitnhgdjstsercjudkeoploeffolotftdhqkdesjjsdajrghehjgebtcrjusbjskbbmskqqjspgtehcagskbhtelnhedjrjnnuunpjgbdqnpkbjmejnpknqfcltbosjfdtuncqjhoierbjneasollefqlcikqgddtjqudlqpjbdbrrskifnejrintcqaqfsscskgopkemhlbcsnbsimhjfkgicddtmfkaomosjfufamcdgdjgmmgjnnujhntcgabuosplhlcgkjbpjgloiqdmokdspssjrthhiqtqfjibhajlemstlualqdsfmnsmusobiecctnerhiqeecuargfktcbjcodkdojtabrtfqtpubcbefhqcibhfrtbndqnlmghechfqdenaiijuoqpjbikeqdeboceuolroqhrqqalgjgeoqeljohkfpdsclsajltagrguntcnejskkohcefhpioktgiaukquirehcrqeiekkqraqjlsbqgdoidsbnsrgsmaprjsjjlsldlajaqoiqeeaiffarfiffaorceplacpchpmmhigpispggnglrrusttomahakrfoidkprfgmtghklggghufkniiunacbbfpporrublulphinibfdifonoullmicnleuuupciuacrqbodalilihkllucqkaqqmkmjrrqnaqqluqsdonttqbillcmmgkkjtjggceeomgpdaaocrfieapagdc", 2082)); // Expect 3
?>