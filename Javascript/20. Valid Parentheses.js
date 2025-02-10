/**
 * 20. Valid Parentheses
 * @param {string} s
 * @return {boolean}
 */
var isValid = function(s) {
    const pairs = new Map([['(',')'], ['{','}'], ['[',']']]);
    const stack = [];
    const n = s.length;
    
    for (let i = 0; i < n; i++) {
        if (['(','{','['].includes(s[i])) {
            stack.push(s[i]);
        }
        else {
            if (pairs.get(stack.pop()) !== s[i]) { return false; } 
        }
    }
    return (stack.length === 0) ? true: false;
};

//console.log(isValid("()")); // Expect true
//console.log(isValid("()[]{}")); // Expect true
//console.log(isValid("(]")); // Expect false
console.log(isValid("([])")); // Expect true
//console.log(isValid("([)]")); // Expect false



