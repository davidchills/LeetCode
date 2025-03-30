/*
You are given a string s. We want to partition the string into as many parts as possible so that each letter appears in at most one part. 
    For example, the string "ababcc" can be partitioned into ["abab", "cc"], 
    but partitions such as ["aba", "bcc"] or ["ab", "ab", "cc"] are invalid.
Note that the partition is done so that after concatenating all the parts in order, the resultant string should be s.
Return a list of integers representing the size of these parts.
    
763. Partition Labels    
*/
class Solution {
    func partitionLabels(_ s: String) -> [Int] {
        var lastOccurrence: [Character:Int] = [:]
        var partitions: [Int] = []
        for (index, letter) in s.enumerated() {
            lastOccurrence[letter] = index
        }
        var start = 0
        var end = 0
        for (index, letter) in s.enumerated() {
            end = max(end, lastOccurrence[letter]!)
            if index == end {
                partitions.append(end - start + 1)
                start = index + 1
            }
        }
        return partitions
    }
}
let solution = Solution()
print(solution.partitionLabels("ababcbacadefegdehijhklij")) // [9,7,8]
print(solution.partitionLabels("eccbbbbdec"))  // Expect [10]