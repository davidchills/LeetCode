/*
You have n  tiles, where each tile has one letter tiles[i] printed on it.

Return the number of possible non-empty sequences of letters you can make using the letters printed on those tiles.
*/
/**
 * 1079. Letter Tile Possibilities
 * @param {string} tiles
 * @return {number}
 */
var numTilePossibilities = function(tiles) {
    const freq = {};
    for (let t of tiles) freq[t] = (freq[t] || 0) + 1;
    let count = 0;

    function backtrack() {
        for (let key in freq) {
            if (freq[key] > 0) {
                count++;
                freq[key]--;
                backtrack();
                freq[key]++;
            }
        }
    }

    backtrack();
    return count;
};

//console.log(numTilePossibilities("AAB")); // Expect 8
console.log(numTilePossibilities("AAABBC")); // Expect 188
//console.log(numTilePossibilities("V")); // Expect 1


