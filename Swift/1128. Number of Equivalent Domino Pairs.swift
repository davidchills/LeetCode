/*
Given a list of dominoes, dominoes[i] = [a, b] is equivalent to dominoes[j] = [c, d] 
if and only if either (a == c and b == d), or (a == d and b == c) - that is, one domino can be rotated to be equal to another domino.
Return the number of pairs (i, j) for which 0 <= i < j < dominoes.length, and dominoes[i] is equivalent to dominoes[j].
    
1128. Number of Equivalent Domino Pairs    
*/
class Solution {
    func numEquivDominoPairs(_ dominoes: [[Int]]) -> Int {
        var seen = [Int:Int]()
        var pairs = 0
        for dom in dominoes {
            let i = dom[0]
            let j = dom[1]
            let key = i <= j ? i * 10 + j : j * 10 + i
            pairs += seen[key, default: 0]
            seen[key, default: 0] += 1
        }
        return pairs
    }
}
let solution = Solution()
print(solution.numEquivDominoPairs([[1,2],[2,1],[3,4],[5,6]])) // Expect 1
print(solution.numEquivDominoPairs([[1,2],[1,2],[1,1],[1,2],[2,2]]))  // Expect 3