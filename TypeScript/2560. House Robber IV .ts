/*
There are several consecutive houses along a street, each of which has some money inside. 
    There is also a robber, who wants to steal money from the homes, but he refuses to steal from adjacent homes.
The capability of the robber is the maximum amount of money he steals from one house of all the houses he robbed.
You are given an integer array nums representing how much money is stashed in each house. 
    More formally, the ith house from the left has nums[i] dollars.
You are also given an integer k, representing the minimum number of houses the robber will steal from. 
    It is always possible to steal at least k houses.
Return the minimum capability of the robber out of all the possible ways to steal at least k houses.

2560. House Robber IV
*/

function minCapability(nums: number[], k: number): number {
    let left: number = Math.min(...nums);
    let right: number = Math.max(...nums);
    let result: number = right;
    
    function canRobAtLeastK (nums: number[], capability: number, k: number): boolean {
        let count: number = 0
        let i: number = 0;
        
        while (i < nums.length) {
            if (nums[i] <= capability) {
                count++;
                if (count === k) { return true; }
                i++;
            }
            i++;
        }
        return false;
    }
    
    while (left <= right) {
        const mid: number = Math.floor((left + right) / 2);
        if (canRobAtLeastK(nums, mid, k)) {
            result = mid;
            right = mid - 1;
        }
        else { left = mid + 1; }
    }
    return result
    
};
console.log(minCapability([2,3,5,9], 2)); // Expect 5
console.log(minCapability([2,7,9,3,1], 2)); // Expect 2