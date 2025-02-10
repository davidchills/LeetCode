/**
 * 1790. Check if One String Swap Can Make Strings Equal
 * @param {string} s1
 * @param {string} s2
 * @return {boolean}
 */
var areAlmostEqual = function(s1, s2) {
    if (s1 === s2) { return true; }
    const n = s1.length;
    const mismatch = [];
    let swaps = 0;
    
    for (let i = 0; i < n; i++) {
        if (s1[i] !== s2[i]) {
            mismatch.push(i);
            swaps++;
            if (swaps > 2) { return false; }
        }
    }
    return (swaps === 2 && s1[mismatch[0]] === s2[mismatch[1]] && s1[mismatch[1]] === s2[mismatch[0]]);
};

//console.log(areAlmostEqual("bank", "kanb")); // Expect true
//console.log(areAlmostEqual("attack", "defend")); // Expect false
//console.log(areAlmostEqual("kelb", "kelb")); // Expect true
console.log(areAlmostEqual("bank", "knab")); // Expect false



