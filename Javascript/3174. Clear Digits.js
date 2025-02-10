/**
 * 3174. Clear Digits
 * @param {string} s
 * @return {string}
 */
var clearDigits = function(s) {
    const result = [];
    const letterRegex = new RegExp("^[a-z]$");
    for (let char of s) {
        //const code = char.charCodeAt(0);
        //if (code >= 97 && code <= 122) {
        if (letterRegex.test(char)) {
            result.push(char);
        } 
        else { result.pop(); }
    }
    return result.join('');
};

//console.log(clearDigits("abc")); // Expect "abc"
console.log(clearDigits("cb34")); // Expect ""



