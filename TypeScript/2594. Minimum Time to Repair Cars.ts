/*
You are given an integer array ranks representing the ranks of some mechanics. 
    ranksi is the rank of the ith mechanic. A mechanic with a rank r can repair n cars in r * n2 minutes.
You are also given an integer cars representing the total number of cars waiting in the garage to be repaired.
Return the minimum time taken to repair all the cars.
Note: All the mechanics can repair the cars simultaneously.

2594. Minimum Time to Repair Cars
*/

function repairCars(ranks: number[], cars: number): number {
    let left: number = 1;
    let right: number = Math.max(...ranks) * cars * cars;
    let result: number = right;
    
    function canRepairAllCars(timeLimit: number): boolean {
        let totalCars: number = 0;
        for (let rank of ranks) {
            const maxCars: number = Math.floor(Math.sqrt(timeLimit / rank));
            totalCars += maxCars;
            if (totalCars >= cars) { return true; }
        }
        return false;
    }
    
    while (left <= right) {
        const mid: number = Math.floor((left + right) / 2);
        if (canRepairAllCars(mid)) {
            result = mid;
            right = mid - 1;
        }
        else {
            left = mid + 1;
        }
    }
    return result;    
};

console.log(repairCars([4,2,3,1], 10)); // Expect 16
console.log(repairCars([5,1,8], 6)); // Expect 16