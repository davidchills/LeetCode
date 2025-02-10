/**
 * 67. Add Binary
 * @param {string} a
 * @param {string} b
 * @return {string}
 */
var addBinary = function(a, b) {
    let result = '';
    let carry = 0;
    let i = a.length - 1;
    let j = b.length - 1;
    
    while (i >= 0 || j >= 0) {
        const aBit = (i >= 0) ? parseInt(a[i], 10) : 0;
        const bBit = (j >= 0) ? parseInt(b[j], 10) : 0;
        const sum = aBit + bBit + carry;
        result = (sum % 2) + result;
        carry = Math.floor(sum / 2);
        i--;
        j--;
    }
    
    if (carry > 0) { result = carry + result; }
    
    return result;
};

  var a = "11";
  var b = "1";

 // var a = "1010";
 // var b = "1011";

 var a = "10100000100100110110010000010101111011011001101110111111111101000000101111001110001111100001101";
  var b = "110101001011101110001111100110001010100001101011101010000011011011001011101111001100000011011110011";
console.log(addBinary(a, b));



