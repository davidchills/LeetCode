/**
 * 12. Integer to Roman
 * @param {number} num
 * @return {string}
 */
var intToRoman = function(num) {
    let outString = ''
    const romanMap = new Map([[1000, 'M'], [900, 'CM'], [500, 'D'], [400, 'CD'], [100, 'C'], [90, 'XC'],
        [50, 'L'], [40, 'XL'], [10, 'X'], [9, 'IX'], [5, 'V'], [4, 'IV'], [1, 'I']])
    
    romanMap.forEach((letter, number) => {
        while (num >= number) {
            outString += letter
            num -= number
        }
    })
    return outString
};

console.log(intToRoman(1994));