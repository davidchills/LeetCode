/*
There is a forest with an unknown number of rabbits. We asked n rabbits "How many rabbits have the same color as you?" 
and collected the answers in an integer array answers where answers[i] is the answer of the ith rabbit.
Given the array answers, return the minimum number of rabbits that could be in the forest.
    
781. Rabbits in Forest    
*/
class Solution {
    func numRabbits(_ answers: [Int]) -> Int {
        var freq = [Int: Int]()
        for ans in answers {
            freq[ans, default: 0] += 1
        }
        
        var total = 0
        for (k, count) in freq {
            let groupSize = k + 1
            let numGroups = (count + groupSize - 1) / groupSize
            total += numGroups * groupSize
        }
        
        return total        
    }
}
let solution = Solution()
print(solution.numRabbits([1,1,2])) // Expect 5
print(solution.numRabbits([10,10,10]))  // Expect 11