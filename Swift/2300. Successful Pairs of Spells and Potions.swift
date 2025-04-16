/*
You are given two positive integer arrays spells and potions, of length n and m respectively, 
where spells[i] represents the strength of the ith spell and potions[j] represents the strength of the jth potion.
You are also given an integer success. A spell and potion pair is considered successful if the product of their strengths is at least success.
Return an integer array pairs of length n where pairs[i] is the number of potions that will form a successful pair with the ith spell.
    
2300. Successful Pairs of Spells and Potions    
*/
extension Array where Element: Comparable {
    // Returns the first index where self[index] >= value.
    // If value is greater than all elements, returns self.count.
    func lowerBound(_ value: Element) -> Int {
        var left = 0
        var right = self.count
        while left < right {
            let mid = left + (right - left) / 2
            if self[mid] < value {
                left = mid + 1
            } 
            else {
                right = mid
            }
        }
        return left
    }
}
class Solution {
    func successfulPairs(_ spells: [Int], _ potions: [Int], _ success: Int) -> [Int] {
        let potions = potions.sorted()
        let n = potions.count
        var pairs = [Int]()
        for spell in spells {
            let minPower = (success + spell - 1) / spell
            let index = potions.lowerBound(minPower)
            pairs.append(n - index)
        }
        return pairs
    }
}
let solution = Solution()
print(solution.successfulPairs([5,1,3], [1,2,3,4,5], 7)) // Expect [4,0,3]
print(solution.successfulPairs([3,1,2], [8,5,8], 16)) // Expect [2,0,2]