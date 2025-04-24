/*
You are given an integer array prices where prices[i] is the price of a given stock on the ith day, and an integer k.
Find the maximum profit you can achieve. You may complete at most k transactions: i.e. you may buy at most k times and sell at most k times.
Note: You may not engage in multiple transactions simultaneously (i.e., you must sell the stock before you buy again).
Constraints:
• 1 <= k <= 100
• 1 <= prices.length <= 1000
• 0 <= prices[i] <= 1000
    
188. Best Time to Buy and Sell Stock IV    
*/
class Solution {
    func maxProfit(_ k: Int, _ prices: [Int]) -> Int {
        let n = prices.count
        guard n > 0 else { return 0 }
        
        // If k is large enough, it's equivalent to unlimited transactions.
        if k >= n / 2 {
            var totalProfit = 0
            for i in 1..<n {
                let diff = prices[i] - prices[i - 1]
                if diff > 0 {
                    totalProfit += diff
                }
            }
            return totalProfit
        }
        
        // buys[j]: max profit after j-th buy (holding a stock)
        // sells[j]: max profit after j-th sell (not holding)
        var buys = [Int](repeating: Int.min, count: k + 1)
        var sells = [Int](repeating: 0, count: k + 1)
        
        for price in prices {
            for j in 1...k {
                // Either keep previous buy, or buy now using profit after (j-1) sells
                buys[j] = max(buys[j], sells[j - 1] - price)
                // Either keep previous sell, or sell now after j-th buy
                sells[j] = max(sells[j], buys[j] + price)
            }
        }
        
        return sells[k]        
    }
}
let solution = Solution()
print(solution.maxProfit(2, [2,4,1])) // Expect 2
print(solution.maxProfit(2, [3,2,6,5,0,3]))  // Expect 7