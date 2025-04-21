/*
You are given a 0-indexed array of n integers differences, 
which describes the differences between each pair of consecutive integers of a hidden sequence of length (n + 1). 
More formally, call the hidden sequence hidden, then we have that differences[i] = hidden[i + 1] - hidden[i].
You are further given two integers lower and upper that describe the inclusive range of values [lower, upper] 
    that the hidden sequence can contain.
For example, given differences = [1, -3, 4], lower = 1, upper = 6, the hidden sequence is a sequence of length 4 whose elements are in between 1 and 6 (inclusive).
[3, 4, 1, 5] and [4, 5, 2, 6] are possible hidden sequences.
[5, 6, 3, 7] is not possible since it contains an element greater than 6.
[1, 2, 3, 4] is not possible since the differences are not correct.
Return the number of possible hidden sequences there are. If there are no possible sequences, return 0.
    
2145. Count the Hidden Sequences    
*/
class Solution {
    func numberOfArrays(_ differences: [Int], _ lower: Int, _ upper: Int) -> Int {
        var minS = 0
        var maxS = 0
        var curr = 0
        for d in differences {
            curr += d
            if curr < minS { minS = curr }
            if curr > maxS { maxS = curr }
        }
        let lowBound = lower - minS
        let highBound = upper - maxS
        if highBound < lowBound { return 0 }
        return highBound - lowBound + 1
    }
}
let solution = Solution()
print(solution.numberOfArrays([1,-3,4], 1, 6)) // Expect 2
print(solution.numberOfArrays([3,-4,5,1,-2], -4, 5)) // Expect 4
print(solution.numberOfArrays([4,-7,2], 3, 6)) // Expect 0