/**
 * 66. Plus One
 * @param {number[]} digits
 * @return {number[]}
 */
var plusOne = function(digits) {
    /*
    const n = digits.length;
    if (n < 1) { return [1]; }
    let last = digits[n-1];
    if (last < 9) { digits[n-1] = last+1; }
    else {
        digits[n-1] = 0;
        if (n === 1) { digits.unshift(1); }
        for (let i = n-2; i >= 0; i--) {
            let curr = digits[i];
            if (i === 0) {
                if (digits[0] < 9) { digits[0] = curr+1; }
                else {
                    digits[0] = 0;
                    digits.unshift(1);
                    break;
                } 
            }
            else if (curr < 9) { 
                digits[i] = curr+1; 
                break;
            }
            else { digits[i] = 0; }            
        }
    }
    return digits;
    */
    
    for (let i = digits.length - 1; i >= 0; i--) {
        if (digits[i] < 9) {
            digits[i]++;
            return digits;
        }
        digits[i] = 0;
    }    
    digits.unshift(1);
    return digits;    
};

console.log(plusOne([1,2,3])); // Expect [1,2,4]
//console.log(plusOne([4,3,2,1])); // Expect [4,3,2,2]
//console.log(plusOne([9])); // Expect [1,0]
//console.log(plusOne([9,9,9])); // Expect [1,0,0,0]
//console.log(plusOne([9,8,9])); // Expect [9,9,0]
//console.log(plusOne([8,9,9,9])); // Expect [9,0,0,0]




