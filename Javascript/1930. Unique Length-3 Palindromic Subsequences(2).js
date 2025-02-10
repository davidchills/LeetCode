var countPalindromicSubsequence = function(s) {
    const found = new Map()
    const letters = "abcdefghijklmnopqrstuvwxyz"
    for (let i = 0; i < 26; i++) {
        let firstIndex = s.indexOf(letters[i])
        let lastIndex = s.lastIndexOf(letters[i])
        for (let j = firstIndex + 1; j < lastIndex; j++) {
            found.set(letters[i]+s[j]+letters[i], true)
        }
    }
    return found.size    
};


console.log(countPalindromicSubsequence("ighqdvarwimzohlzsepqqonqijouljghavwimaxymalhgajkoketkjgkgtxurhtvkwehqqhqeabnecgssgdmiiuzmuivybubmevvvdtgultalunzmriiqbyngqfxwfcqiehduabumpjcecqyzqbqsudgzutulfrjdxmlhseejthvxobehgjaqjeawugsroknmopiqcnbvdwfmcovrnsgjpbyfmxcuboykjsvgbbhyycsnengqetkcqjlrweekiezljizijtlspoftygzlkszpnzhhfwavrhooyeajdjpgvckxtsuevroxphtocbujvkwwfqpaujhbodnfbtklpnfhkdcobkcnuddomqfqtgbuiycrljipahzqzldbvfjtwcbyywvasclafnfngmsdsaprbehuqbrakhwrwawqgjzciwnenlyagnikejjqgznvqwxvaohdxrcjypqfgdzxiofdouwisndzzdyxioydiwstwkklyxyhuce"));