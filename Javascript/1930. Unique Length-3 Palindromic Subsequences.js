var countPalindromicSubsequence = function(s) {
    let rv = 0
    const first = new Map
    const last = new Map
    for (let i = 0; i < s.length; i++) {
        if (!first.has(s[i], i)) { first.set(s[i], i) }
        last.set(s[i], i)
    }
    for (const [char, startIndex] of first) {
        const endIndex = last.get(char)
        if (endIndex > startIndex + 1) {
            const middle = new Map()
            for (let i = startIndex + 1; i < endIndex; i++) {
                middle.set(s[i], true)
            }
            rv += middle.size
        }
    }
    return rv
};


console.log(countPalindromicSubsequence("ighqdvarwimzohlzsepqqonqijouljghavwimaxymalhgajkoketkjgkgtxurhtvkwehqqhqeabnecgssgdmiiuzmuivybubmevvvdtgultalunzmriiqbyngqfxwfcqiehduabumpjcecqyzqbqsudgzutulfrjdxmlhseejthvxobehgjaqjeawugsroknmopiqcnbvdwfmcovrnsgjpbyfmxcuboykjsvgbbhyycsnengqetkcqjlrweekiezljizijtlspoftygzlkszpnzhhfwavrhooyeajdjpgvckxtsuevroxphtocbujvkwwfqpaujhbodnfbtklpnfhkdcobkcnuddomqfqtgbuiycrljipahzqzldbvfjtwcbyywvasclafnfngmsdsaprbehuqbrakhwrwawqgjzciwnenlyagnikejjqgznvqwxvaohdxrcjypqfgdzxiofdouwisndzzdyxioydiwstwkklyxyhuce"));