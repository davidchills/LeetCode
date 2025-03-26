/*
Given n pairs of parentheses, write a function to generate all combinations of well-formed parentheses.
*/
/**
 * 22. Generate Parentheses
 * @param {number} n
 * @return {string[]}
 */
var generateParenthesis = function(n) {
    const result = [];
    function backtrack(currentSet, openPar, closePar) {
        if (currentSet.length === n * 2) {
            result.push(currentSet);
            return;
        }
        
        if (openPar < n) {
            backtrack(currentSet + "(", openPar + 1, closePar);
        }
        
        if (closePar < openPar) {
            backtrack(currentSet + ")", openPar, closePar + 1)
        }
    }
    backtrack("", 0, 0);
    return result;    
};

console.log(generateParenthesis(3)); // Expect ["((()))","(()())","(())()","()(())","()()()"]
console.log(generateParenthesis(1)); // Expect ["()"]