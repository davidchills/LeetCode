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
    if (tiles.length === 1) { return 1; }
    const letters = tiles.split('');
    letters.sort((a,b) => a.localeCompare(b));
    const used = new Array(letters.length).fill(false);
    let count = 0;
    
    function variations(index) {
        if (index > 0) { count++; }
        for (let i = 0; i < letters.length; i++) {
            if (used[i] === true) { continue; }
            if (i > 0 && ((letters[i] == letters[i-1]) && used[i-1] === false)) {
                continue;
            }
            used[i] = true;
            variations(index + 1);
            used[i] = false;
        }
        return;
    }
    
    variations(0);
    return count;
};

console.log(numTilePossibilities("AAB")); // Expect 8
//console.log(numTilePossibilities("AAABBC")); // Expect 188
//console.log(numTilePossibilities("V")); // Expect 1


