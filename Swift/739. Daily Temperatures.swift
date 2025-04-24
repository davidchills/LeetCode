/*
Given an array of integers temperatures represents the daily temperatures, 
    return an array answer such that answer[i] is the number of days you have to wait after the ith day to get a warmer temperature. 
If there is no future day for which this is possible, keep answer[i] == 0 instead.
    
739. Daily Temperatures    
*/
class Solution {
    func dailyTemperatures(_ temperatures: [Int]) -> [Int] {
        let n = temperatures.count
        var result = Array(repeating: 0, count: n)
        var stack = [Int]()
        
        for currentDay in 0..<n {
            while let lastIndex = stack.last, temperatures[currentDay] > temperatures[lastIndex] {
                stack.removeLast()
                result[lastIndex] = currentDay - lastIndex
            }
            stack.append(currentDay)
        }
        return result
    }
}
let solution = Solution()
print(solution.dailyTemperatures([73,74,75,71,69,72,76,73])) // Expect [1,1,4,2,1,1,0,0]
print(solution.dailyTemperatures([30,40,50,60]))  // Expect [1,1,1,0]
print(solution.dailyTemperatures([30,60,90]))  // Expect [1,1,0]