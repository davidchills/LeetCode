/*
You are given an array nums of n positive integers and an integer k.
Initially, you start with a score of 1. You have to maximize your score by applying the following operation at most k times:
Choose any non-empty subarray nums[l, ..., r] that you haven't chosen previously.
Choose an element x of nums[l, ..., r] with the highest prime score. If multiple such elements exist, choose the one with the smallest index.
Multiply your score by x.
Here, nums[l, ..., r] denotes the subarray of nums starting at index l and ending at the index r, both ends being inclusive.
The prime score of an integer x is equal to the number of distinct prime factors of x. 
    For example, the prime score of 300 is 3 since 300 = 2 * 2 * 3 * 5 * 5.
Return the maximum possible score after applying at most k operations.
Since the answer may be large, return it modulo 109 + 7.
    
2818. Apply Operations to Maximize Score    
*/
class Solution {
    let MOD = Int(1e9 + 7)
    func maximumScore(_ nums: [Int], _ k: Int) -> Int {
        let n = nums.count
        let primeScores = nums.map { countDistinctPrimes($0) }

        // Step 1: Monotonic stack to find left and right boundaries
        var left = Array(repeating: -1, count: n)
        var right = Array(repeating: n, count: n)
        var stack: [Int] = []

        for i in 0..<n {
            while let last = stack.last, primeScores[last] < primeScores[i] {
                right[stack.removeLast()] = i
            }
            left[i] = stack.last ?? -1
            stack.append(i)
        }

        // Step 2: Sort indices by nums[i] in descending order
        let indices = (0..<n).sorted { nums[$0] > nums[$1] }

        // Step 3: Apply operations greedily
        var score = 1
        var remainingK = k

        for i in indices {
            let count = (i - left[i]) * (right[i] - i)
            let take = min(remainingK, count)
            score = modPow(score, 1, MOD)
            score = (score * modPow(nums[i], take, MOD)) % MOD
            remainingK -= take
            if remainingK == 0 { break }
        }

        return score
    }

    private func modPow(_ base: Int, _ exp: Int, _ mod: Int) -> Int {
        var result = 1
        var base = base % mod
        var exp = exp

        while exp > 0 {
            if exp % 2 == 1 {
                result = (result * base) % mod
            }
            base = (base * base) % mod
            exp /= 2
        }
        return result
    }

    private func countDistinctPrimes(_ num: Int) -> Int {
        var x = num
        var count = 0
        if x % 2 == 0 {
            count += 1
            while x % 2 == 0 {
                x /= 2
            }
        }
        var i = 3
        while i * i <= x {
            if x % i == 0 {
                count += 1
                while x % i == 0 {
                    x /= i
                }
            }
            i += 2
        }
        if x > 1 {
            count += 1
        }
        return count
    }
}
let solution = Solution()
print(solution.maximumScore([8,3,9,3,8], 2)) // Expect 81
print(solution.maximumScore([19,12,14,6,10,18], 3))  // Expect 4788