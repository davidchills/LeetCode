/**
 * 134. Gas Station
 * @param {number[]} gas
 * @param {number[]} cost
 * @return {number}
 */
var canCompleteCircuit = function(gas, cost) {
    const kount = gas.length
    let totalGas = 0
    let totalCost = 0
    let tank = 0
    let startIndex = 0
    for (let i = 0; i < kount; i++) {
        totalGas += gas[i]
        totalCost += cost[i]
        tank += gas[i] - cost[i]
        if (tank < 0) {
            startIndex = i + 1
            tank = 0
        }        
    }
    return (totalGas >= totalCost) ? startIndex : -1
};

console.log(canCompleteCircuit([1,2,3,4,5], [3,4,5,1,2]));