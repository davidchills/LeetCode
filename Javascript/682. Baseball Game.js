/**
 * 682. Baseball Game
 * @param {string[]} operations
 * @return {number}
 */
var calPoints = function(operations) {
    const score = [];
    operations.forEach((op) => {
        let scoreLength = score.length;
        if (op === '+' && scoreLength >= 2) {
            score.push(score[scoreLength-1]+score[scoreLength-2]);
        }
        else if (op === 'D' && scoreLength >= 1) {
            score.push(score[scoreLength-1]*2);
        }
        else if (op === 'C' && scoreLength >= 1) {
            score.pop();
        }
        else { score.push(parseInt(op, 10)); }
    });
    return score.reduce((acc, curr) => acc + curr, 0);
};

//console.log(calPoints(["5","2","C","D","+"])); // Expect 30
//console.log(calPoints(["5","-2","4","C","D","9","+","+"])); // Expect 27
console.log(calPoints(["1","C"])); // Expect 0



