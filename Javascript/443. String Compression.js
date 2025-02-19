/*
Given an array of characters chars, compress it using the following algorithm:

Begin with an empty string s. For each group of consecutive repeating characters in chars:

If the group's length is 1, append the character to s.
Otherwise, append the character followed by the group's length.
The compressed string s should not be returned separately, but instead, be stored in the input character array chars. Note that group lengths that are 10 or longer will be split into multiple characters in chars.

After you are done modifying the input array, return the new length of the array.

You must write an algorithm that uses only constant extra space.
*/
/**
 * 443. String Compression
 * @param {character[]} chars
 * @return {number}
 */
var compress = function(chars) {
    let index = 0;
    let i = 0;
    
    while (i < chars.length) {
        let j = i;
        while (j < chars.length && chars[j] === chars[i]) {
            j++;
        }
        chars[index++] = chars[i];
        let count = j - i;
        if (count > 1) {
            for (let digit of count.toString()) {
                chars[index++] = digit;
            }
        }
        i = j;
    }
    
    return index;    
};

//const chars = ["a","a","b","b","c","c","c"];
//const chars = ["a"];
const chars = ["a","b","b","b","b","b","b","b","b","b","b","b","b"];
console.log(compress(chars)); 
console.log(chars);
