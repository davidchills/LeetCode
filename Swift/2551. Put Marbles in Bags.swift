/*
You have k bags. You are given a 0-indexed integer array weights where weights[i] is the weight of the ith marble. 
    You are also given the integer k.
Divide the marbles into the k bags according to the following rules:
No bag is empty.
If the ith marble and jth marble are in a bag, then all marbles with an index between the ith and jth indices should also be in that same bag.
If a bag consists of all the marbles with an index from i to j inclusively, then the cost of the bag is weights[i] + weights[j].
The score after distributing the marbles is the sum of the costs of all the k bags.
Return the difference between the maximum and minimum scores among marble distributions.
    
2551. Put Marbles in Bags    
*/
class Solution {
    func putMarbles(_ weights: [Int], _ k: Int) -> Int {
        if k == 1 { return 0 }
        let n = weights.count
        var pairCosts: [Int] = []
        
        for i in 0..<n - 1 {
            pairCosts.append(weights[i] + weights[i + 1])
        }
        pairCosts.sort()
        let highestSum = pairCosts[(pairCosts.count - (k - 1))..<pairCosts.count].reduce(0, +)
        let lowestSum  = pairCosts[0..<(k - 1)].reduce(0, +)
        return highestSum - lowestSum
    }
}
let solution = Solution()
print(solution.putMarbles([1,3,5,1], 2)); // Expect 4
print(solution.putMarbles([1, 3], 2)); // Expect 0