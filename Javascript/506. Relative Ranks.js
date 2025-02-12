/*
You are given an integer array score of size n, where score[i] is the score of the ith athlete in a competition. All the scores are guaranteed to be unique.

The athletes are placed based on their scores, where the 1st place athlete has the highest score, the 2nd place athlete has the 2nd highest score, and so on. The placement of each athlete determines their rank:

The 1st place athlete's rank is "Gold Medal".
The 2nd place athlete's rank is "Silver Medal".
The 3rd place athlete's rank is "Bronze Medal".
For the 4th place to the nth place athlete, their rank is their placement number (i.e., the xth place athlete's rank is "x").
Return an array answer of size n where answer[i] is the rank of the ith athlete.
*/
/**
 * 506. Relative Ranks
 * @param {number[]} score
 * @return {string[]}
 */
var findRelativeRanks = function(score) {
    const sortedScores = [...score].sort((a, b) => b - a);
    const rankMap = new Map();
    //const result = [];

    for (let i = 0; i < sortedScores.length; i++) {
        switch (i) {
            case 0:
                rankMap.set(sortedScores[i], "Gold Medal");
                break;
            case 1:
                rankMap.set(sortedScores[i], "Silver Medal");
                break; 
            case 2:
                rankMap.set(sortedScores[i], "Bronze Medal");
                break;  
            default:
                rankMap.set(sortedScores[i], (i+1).toString(10));
        }
        /*
        if (i === 0) { rankMap[sortedScores[i]] = "Gold Medal"; }
        else if (i === 1) { rankMap[sortedScores[i]] = "Silver Medal"; }
        else if (i === 2) { rankMap[sortedScores[i]] = "Bronze Medal"; }   
        else { rankMap[sortedScores[i]] = (i+1).toString(10); }
        */
    };
    /*
    score.forEach((s) => {
        result.push(rankMap[s]);
    });
    */    
    return score.map(s => rankMap.get(s));    
    //return result;
};

//console.log(findRelativeRanks([5,4,3,2,1])); // Expect ["Gold Medal","Silver Medal","Bronze Medal","4","5"]
console.log(findRelativeRanks([10,3,8,9,4])); // Expect ["Gold Medal","5","Bronze Medal","Silver Medal","4"]



