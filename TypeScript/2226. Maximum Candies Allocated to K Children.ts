/*
You are given a 0-indexed integer array candies. Each element in the array denotes a pile of candies of size candies[i]. 
    You can divide each pile into any number of sub piles, but you cannot merge two piles together.
You are also given an integer k. 
    You should allocate piles of candies to k children such that each child gets the same number of candies. 
    Each child can be allocated candies from only one pile of candies and some piles of candies may go unused.
Return the maximum number of candies each child can get.

2226. Maximum Candies Allocated to K Children
*/

function maximumCandies(candies: number[], k: number): number {
    if (k === 0) { return 0; }
    
    let left: number = 1;
    let right: number = Math.max(...candies);
    let result: number = 0;
    
    function canDistribute(candies: number[], k: number, x: number): boolean {
        let count: number = 0;
        for (let pile of candies) {
            count += Math.floor(pile / x);
        }
        return count >= k;
    }
    
    while (left <= right) {
        const mid: number = Math.floor((left + right) / 2);
        if (canDistribute(candies, k, mid)) {
            result = mid;
            left = mid + 1;
        }
        else {
            right = mid - 1;
        }
    }
    
    return result;    
};

console.log(maximumCandies([5,8,6], 3)); // Expect 5
console.log(maximumCandies([2,5], 11)); // Expect 0