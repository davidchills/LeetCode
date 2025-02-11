/**
 * 150. Evaluate Reverse Polish Notation
 * @param {string[]} tokens
 * @return {number}
 */
var evalRPN = function(tokens) {
    const stack = [];
    for (let token of tokens) {
        switch (token) {
            case '+': {
                stack.push(stack.pop() + stack.pop());
                break;
            }
            case '-': {
                const b = stack.pop();
                const a = stack.pop();
                stack.push(a - b);
                break;
            }
            case '*': {
                stack.push(stack.pop() * stack.pop());
                break;
            }
            case '/': {
                const b = stack.pop();
                const a = stack.pop();
                stack.push(Math.trunc(a / b));
                break;
            }
            default: {
                stack.push(parseInt(token, 10));
            }
        }
    }
    return stack[0];
};

//console.log(evalRPN(["2","1","+","3","*"])); // Expect 9
//console.log(evalRPN(["4","13","5","/","+"])); // Expect 6
//console.log(evalRPN(["10","6","9","3","+","-11","*","/","*","17","+","5","+"])); // Expect 22
console.log(evalRPN(["-7","2","/"])); // Expect -3



