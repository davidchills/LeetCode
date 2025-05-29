/*
Given two integers, num and t. A number x is achievable if it can become equal to num after applying the following operation at most t times:
Increase or decrease x by 1, and simultaneously increase or decrease num by 1.
Return the maximum possible value of x.
*/
/**
 * 2769. Find the Maximum Achievable Number
 * @param {number} num
 * @param {number} t
 * @return {number}
 */
var theMaximumAchievableX = function(num, t) {
    return num + 2 * t;
};

console.log(theMaximumAchievableX(4, 1)); // Expect 6
console.log(theMaximumAchievableX(3, 2)); // Expect 7
