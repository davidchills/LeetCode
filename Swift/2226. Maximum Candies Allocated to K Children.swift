class Solution {
    func maximumCandies(_ candies: [Int], _ k: Int) -> Int {
        if k == 0 { return 0 }
    
        var left = 1
        var right = candies.max() ?? 0
        var result = 0
    
        func canDistribute(_ candies: [Int], _ k: Int, _ x: Int) -> Bool {
            var count = 0
            for pile in candies {
                count += pile / x
            }
            return count >= k
        }
    
        while left <= right {
            let mid = (left + right) / 2
            if canDistribute(candies, k, mid) {
                result = mid
                left = mid + 1
            } else {
                right = mid - 1
            }
        }
    
        return result        
    }
}
let solution = Solution()
print(solution.maximumCandies([5,8,6], 3)) // Expect 5
print(solution.maximumCandies([2,5], 11))  // Expect 0