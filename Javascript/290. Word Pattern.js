/**
 * 290. Word Pattern
 * @param {string} pattern
 * @param {string} s
 * @return {boolean}
 */
var wordPattern = function(pattern, s) {
    /*
    const pa = pattern.split('')
    const sa = s.split(' ')
    const pMap = new Map()
    const sMap = new Map()
    if (pa.length !== sa.length) { return false }
    
    for (let i = 0; i < pa.length; i++) {
        
        if (pMap.has(pa[i])) {
            if (pMap.get(pa[i]) !== sa[i]) { return false }
        }
        else { pMap.set(pa[i], sa[i]) }
        
        if (sMap.has(sa[i])) {
            if (sMap.get(sa[i]) !== pa[i]) { return false }
        }
        else { sMap.set(sa[i], pa[i]) }
        
    }
    */
    // Optimized version
    const sa = s.split(' '); // Split string into words
    const pMap = new Map();
    const sMap = new Map();

    if (pattern.length !== sa.length) return false;

    for (let i = 0; i < pattern.length; i++) {
        const char = pattern[i];
        const word = sa[i];

        // Check pattern to word mapping
        if (pMap.has(char) && pMap.get(char) !== word) { return false; }
        if (sMap.has(word) && sMap.get(word) !== char) { return false; }
        //if (pMap.has(pattern[i]) && pMap.get(pattern[i]) !== sa[i]) { return false; }
        //if (sMap.has(sa[i]) && sMap.get(sa[i]) !== pattern[i]) { return false; }        

        // Set the mappings
        pMap.set(char, word);
        sMap.set(word, char);        
        //pMap.set(pattern[i], sa[i]);
        //sMap.set(sa[i], pattern[i]);
    }    
    
    return true;
    
};

console.log(wordPattern("abba", "dog cat cat dog")); // Expect true
//console.log(wordPattern("abba", "dog cat cat fish")); // Expect false
//console.log(wordPattern("aaaa", "dog cat cat dog")); // Expect false
//console.log(wordPattern("abba", "dog dog dog dog")); // Expect false


