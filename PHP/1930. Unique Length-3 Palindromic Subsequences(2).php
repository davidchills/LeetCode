<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function countPalindromicSubsequence($s) {
		$letters = range("a", "z");
		$found = [];

		for ($i = 0; $i < count($letters); $i++) {
			$firstIndex = strpos($s, $letters[$i]);
			$lastIndex = strrpos($s, $letters[$i]);
			for ($j = $firstIndex + 1; $j < $lastIndex; $j++) {
				$found[$letters[$i].$s[$j].$letters[$i]] = true;
			}
		}
		return count($found);      
    }
}
	
$c = new Solution;
print_r($c->countPalindromicSubsequence("ighqdvarwimzohlzsepqqonqijouljghavwimaxymalhgajkoketkjgkgtxurhtvkwehqqhqeabnecgssgdmiiuzmuivybubmevvvdtgultalunzmriiqbyngqfxwfcqiehduabumpjcecqyzqbqsudgzutulfrjdxmlhseejthvxobehgjaqjeawugsroknmopiqcnbvdwfmcovrnsgjpbyfmxcuboykjsvgbbhyycsnengqetkcqjlrweekiezljizijtlspoftygzlkszpnzhhfwavrhooyeajdjpgvckxtsuevroxphtocbujvkwwfqpaujhbodnfbtklpnfhkdcobkcnuddomqfqtgbuiycrljipahzqzldbvfjtwcbyywvasclafnfngmsdsaprbehuqbrakhwrwawqgjzciwnenlyagnikejjqgznvqwxvaohdxrcjypqfgdzxiofdouwisndzzdyxioydiwstwkklyxyhuce"));

?>