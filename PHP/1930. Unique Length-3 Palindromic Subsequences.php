<?php
class Solution {

    function countPalindromicSubsequence($s) {
        $length = strlen($s);
		$rv = 0;
		$first = [];
		$last = [];
		// Go through and find all the first and last indexes of each character.
		for ($i = 0; $i < $length; $i++) {
			// Track the index of the first time we see a letter.
			if (!isset($first[$s[$i]])) { $first[$s[$i]] = $i; }
			// Keep updating the last index we see a letter.
			$last[$s[$i]] = $i;
		}
		// Go throught the indexed lists and find characters in between.
		foreach ($first as $char => $startIndex) {
			$endIndex = $last[$char];
			if ($endIndex > $startIndex + 1) {
				$middle = [];
				for ($i = $startIndex + 1; $i < $endIndex; $i++) {
					// Keep track of how many unique letters we find between the 
					//	first and last index of matching letters.
					$middle[$s[$i]] = true;
				}
				$rv += count($middle);
			}
		}
		return $rv;		
    }
}
$c = new Solution;
print_r($c->countPalindromicSubsequence("ighqdvarwimzohlzsepqqonqijouljghavwimaxymalhgajkoketkjgkgtxurhtvkwehqqhqeabnecgssgdmiiuzmuivybubmevvvdtgultalunzmriiqbyngqfxwfcqiehduabumpjcecqyzqbqsudgzutulfrjdxmlhseejthvxobehgjaqjeawugsroknmopiqcnbvdwfmcovrnsgjpbyfmxcuboykjsvgbbhyycsnengqetkcqjlrweekiezljizijtlspoftygzlkszpnzhhfwavrhooyeajdjpgvckxtsuevroxphtocbujvkwwfqpaujhbodnfbtklpnfhkdcobkcnuddomqfqtgbuiycrljipahzqzldbvfjtwcbyywvasclafnfngmsdsaprbehuqbrakhwrwawqgjzciwnenlyagnikejjqgznvqwxvaohdxrcjypqfgdzxiofdouwisndzzdyxioydiwstwkklyxyhuce"));

?>