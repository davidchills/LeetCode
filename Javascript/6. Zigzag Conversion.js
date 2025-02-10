/**
 * 6. Zigzag Conversion
 * @param {string} s
 * @param {number} numRows
 * @return {string}
 */
var convert = function(s, numRows) {
    if (numRows == 1 || s.length <= numRows) { return s }    
    const arrayLength = Math.min(numRows, s.length)
    const rows = new Array(arrayLength).fill("", 0, arrayLength) // Initialize rows
    let currentRow = 0 // Track the current row
    let goingDown = false // Direction flag    
    
    // Traverse the string and fill rows
    for (let i = 0; i < s.length; i++) {
        rows[currentRow] += s[i];

        // Change direction at the top or bottom
        if (currentRow === 0 || currentRow === numRows - 1) {
            goingDown = !goingDown
        }

        // Update the current row
        currentRow += goingDown ? 1 : -1;
    }    
    return rows.join("")
};

console.log(convert("PAYPALISHIRING", 4))