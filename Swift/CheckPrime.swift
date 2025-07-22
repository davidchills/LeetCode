import Foundation
class Solution {
    func testPrime(_ input: Int) {
        let intRoot = Int(sqrt(Double(input)) + 1)
        for divFactor in 2..<intRoot {
            print(divFactor)
            if input % divFactor == 0 {
                print("Not Prime")
                return
            }
        }
        print("Prime")
    }
}
let solution = Solution()
solution.testPrime(1890711089657)
