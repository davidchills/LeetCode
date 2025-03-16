/*
You are given an integer array ranks representing the ranks of some mechanics. 
    ranksi is the rank of the ith mechanic. A mechanic with a rank r can repair n cars in r * n2 minutes.
You are also given an integer cars representing the total number of cars waiting in the garage to be repaired.
Return the minimum time taken to repair all the cars.
Note: All the mechanics can repair the cars simultaneously.
    
2594. Minimum Time to Repair Cars    
*/
import Foundation
class Solution {
    func repairCars(_ ranks: [Int], _ cars: Int) -> Int {
        var left = 1
        var right = (ranks.max() ?? 1) * cars * cars
        var result = right
    
        func canRepairAllCars(_ timeLimit: Int) -> Bool {
            var totalCars = 0
            for rank in ranks {
                let maxCars = Int(sqrt(Double(timeLimit) / Double(rank)))
                totalCars += maxCars
                if totalCars >= cars {
                    return true
                }
            }
            return false
        }
    
        while left <= right {
            let mid = (left + right) / 2
            if canRepairAllCars(mid) {
                result = mid
                right = mid - 1
            } else {
                left = mid + 1
            }
        }
    
        return result        
    }
}
let solution = Solution()
print(solution.repairCars([4,2,3,1], 10)); // Expect 16
print(solution.repairCars([5,1,8], 6)); // Expect 16