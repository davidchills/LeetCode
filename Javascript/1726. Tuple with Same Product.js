/**
 * 1726. Tuple with Same Product
 * @param {number[]} nums
 * @return {number}
 */
var tupleSameProduct = function(nums) {
    const n = nums.length;
    if (n < 4) { return 0; }
    const tuples = new Map();
    let tupleCount = 0;
    
    for (let i = 0; i < n; i++) {
        for (let j = i+1; j < n; j++) {
            let product = nums[i] * nums[j];
            tuples.set(product, (tuples.get(product) || 0) + 1);
            /*
            if (!tuples.has(product)) {
                tuples.set(product, []);
            }
            tuples.get(product).push([nums[i], nums[j]]);
            */
        }
    }
    /*
    for (let [product, pairs] of tuples.entries()) {
        let ln = pairs.length;
        if (ln > 1) {
            for (let i = 0; i < ln; i++) {
                for (let j = i+1; j < ln; j++) {
                    let [a, b] = pairs[i];
                    let [c, d] = pairs[j];
                    if (a !== c && a !== d && b !== c && b !== d) {
                        tupleCount++;
                    }
                }
            }
        }
    }
    */
    for (let count of tuples.values()) {
        if (count > 1) {
            tupleCount += (count * (count - 1)) / 2; // Combination formula: C(n, 2)
        }
    }
    return tupleCount * 8;
};

console.log(tupleSameProduct([2,3,4,6])); // Expect 8
//console.log(tupleSameProduct([1,2,4,5,10])); // Expect 16



