/*
Given an array of integers arr, and three integers a, b and c. You need to find the number of good triplets.
A triplet (arr[i], arr[j], arr[k]) is good if the following conditions are true:
0 <= i < j < k < arr.length
|arr[i] - arr[j]| <= a
|arr[j] - arr[k]| <= b
|arr[i] - arr[k]| <= c
Where |x| denotes the absolute value of x.
Return the number of good triplets.
    
1534. Count Good Triplets    
*/
class Solution {
    func countGoodTriplets(_ arr: [Int], _ a: Int, _ b: Int, _ c: Int) -> Int {
        let n = arr.count
        guard n >= 3 else { return 0 }
        var result = 0
        for i in 0..<(n - 2) {
            for j in (i + 1)..<(n - 1) {
                for k in (j + 1)..<n {
                    if abs(arr[i] - arr[j]) <= a &&
                        abs(arr[j] - arr[k]) <= b &&
                        abs(arr[i] - arr[k]) <= c {
                            result += 1
                        }
                }
            }
        }
        return result
    }
}
let solution = Solution()
print(solution.countGoodTriplets([3,0,1,1,9,7], 7, 2, 3)) // Expect 4
print(solution.countGoodTriplets([1,1,2,2,3], 0, 0, 1))  // Expect 0