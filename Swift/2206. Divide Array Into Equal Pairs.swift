/*
You are given an integer array nums consisting of 2 * n integers.
You need to divide nums into n pairs such that:
Each element belongs to exactly one pair.
The elements present in a pair are equal.
Return true if nums can be divided into n pairs, otherwise return false.
    
2206. Divide Array Into Equal Pairs    
*/
class Solution {
    func divideArray(_ nums: [Int]) -> Bool {
        var freqMap: [Int: Int] = [:];
        for num in nums {
            freqMap[num] = (freqMap[num] ?? 0) + 1;
        }
        for (_, count) in freqMap {
            if count % 2 != 0 { return false; }
        }
        return true;
    }
}
let solution = Solution()
print(solution.divideArray([3,2,3,2,2,2])); // Expect true
print(solution.divideArray([1,2,3,4])); // Expect false