/*
You are given an array of integers stones where stones[i] is the weight of the ith stone.

We are playing a game with the stones. On each turn, we choose the heaviest two stones and smash them together. Suppose the heaviest two stones have weights x and y with x <= y. The result of this smash is:

If x == y, both stones are destroyed, and
If x != y, the stone of weight x is destroyed, and the stone of weight y has new weight y - x.
At the end of the game, there is at most one stone left.

Return the weight of the last remaining stone. If there are no stones left, return 0.
*/

class Heap {
    /**
      * @param {null|string|function} compare
      */
    constructor(compare) {
        if (compare === 'max') { this.compare = this.maxCompare; }
        else if (compare === 'min') { this.compare = this.defaultCompare; }
        else { this.compare = compare || this.defaultCompare; }
        this.stack = [];
    }
  
    maxCompare(a, b) {
        if (a < b) { return 1; }
        if (a > b) { return -1; }
        return 0;
    }
  
    defaultCompare(a, b) {
        if (a > b) { return 1; }
        if (a < b) { return -1; }
        return 0;
    }
  
    insertPoint(value) {
        const n = this.stack.length;
        if (n === 0) { return 0; }
  
        let start = 0;
        let end = n - 1;
        while (start <= end) {
            let mid = Math.floor((start + end) / 2);
            
            if (this.compare(value, this.stack[mid]) === -1) {
                start = (mid + 1);
            }
            else if (this.compare(value, this.stack[mid]) === 1) {
                end = (mid - 1);
            }   
            else {
                return mid;
            }
        }  
        return start;    
    }

    insert(value) {
        const index = this.insertPoint(value);
        this.stack.splice(index, 0, value);
    }
  
    extract() {
        return this.stack.pop();
    }
  
    size() {
        return this.stack.length;
    }
  
    isEmpty() {
      return this.stack.length === 0;
    }
  
    peek() {
        return this.stack[0] ?? null;
    }  
  
    heapify(arr) {
        arr.forEach((val) => {
            this.insert(val);
        });
    }
}


/**
 * 1046. Last Stone Weight
 * @param {number[]} stones
 * @return {number}
 */
var lastStoneWeight = function(stones) {
    const maxHeap = new Heap('max');
    
    maxHeap.heapify(stones);
    while (maxHeap.size() >= 2) {
        
        let y = maxHeap.extract();
        let x = maxHeap.extract();
        if (x !== y) {
            y = (y-x);
            maxHeap.insert(y);
        }
    }
    return (maxHeap.size() === 1) ? maxHeap.extract() : 0;
};



//console.log(lastStoneWeight([2,7,4,1,8,1])); // Expect 1
//console.log(lastStoneWeight([1])); // Expect 1
console.log(lastStoneWeight([4,3,4,3,2])); // Expect 2



