/*
Given n pairs of parentheses, write a function to generate all combinations of well-formed parentheses.

22. Generate Parentheses
*/

function generateParenthesis(n: number): string[] {
    const result: string[] = [];
    function backtrack(currentSet: string, openPar: number, closePar: number) {
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
