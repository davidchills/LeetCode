/*
There are n kids with candies. You are given an integer array candies, where each candies[i] represents the number of candies the ith kid has, and an integer extraCandies, denoting the number of extra candies that you have.

Return a boolean array result of length n, where result[i] is true if, after giving the ith kid all the extraCandies, they will have the greatest number of candies among all the kids, or false otherwise.

Note that multiple kids can have the greatest number of candies.
*/
/**
 * 1431. Kids With the Greatest Number of Candies
 * @param {number[]} candies
 * @param {number} extraCandies
 * @return {boolean[]}
 */
var kidsWithCandies = function(candies, extraCandies) {
    const n = candies.length;
    const oldMax = Math.max(...candies);
    //const result = Array(n).fill(false);
    for (let i = 0; i < n; i++) {
        /*
        if (candies[i] + extraCandies >= oldMax) {
            result[i] = true;
        }
        */
        candies[i] = candies[i] + extraCandies >= oldMax;
    }
    return candies;
};

console.log(kidsWithCandies([2,3,5,1,3], 3)); // Expect [true,true,true,false,true]
//console.log(kidsWithCandies([4,2,1,1,2], 1)); // Expect [true,false,false,false,false] 
///console.log(kidsWithCandies([12,1,12], 10)); // Expect [true,false,true]


