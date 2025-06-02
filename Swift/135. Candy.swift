/*
There are n children standing in a line. Each child is assigned a rating value given in the integer array ratings.
You are giving candies to these children subjected to the following requirements:
Each child must have at least one candy.
Children with a higher rating get more candies than their neighbors.
Return the minimum number of candies you need to have to distribute the candies to the children.
    
135. Candy    
*/
class Solution {
    func candy(_ ratings: [Int]) -> Int {
        let n = ratings.count
        var candies = [Int](repeating: 1, count: n)
        for i in 1..<n {
            if ratings[i] > ratings[i - 1] {
                candies[i] = candies[i - 1] + 1
            }
        }
        for i in stride(from: n - 2, through: 0, by: -1) {
            if ratings[i] > ratings[i + 1] {
                candies[i] = max(candies[i], (candies[i + 1] + 1))
            }
        }
        return candies.reduce(0, +)
    }
}
let solution = Solution()
print(solution.candy([1,0,2])) // Expect 5
print(solution.candy([1,2,2]))  // Expect 4