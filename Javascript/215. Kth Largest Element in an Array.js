/*
Given an integer array nums and an integer k, return the kth largest element in the array.

Note that it is the kth largest element in the sorted order, not the kth distinct element.

Can you solve it without sorting?
*/
class Heap {
    constructor(compare) {
        this.stack = [];
        this.setComparator(compare || this.defaultCompare);
    }

    setComparator(compare) {
        if (compare === 'max') {
            this.compare = (a, b) => a - b;
        } 
        else if (compare === 'min') {
            this.compare = (a, b) => b - a;
        } 
        else {
            this.compare = compare;
        }
        //this.reheapify();
    }

	/*
    reheapify() {
        const arr = [...this.stack];
        this.stack = [];
        this.heapify(arr);
    }
	*/
	
    insert(value) {
        this.stack.push(value);
        this.bubbleUp(this.stack.length - 1);
    }

    bubbleUp(index) {
        while (index > 0) {
            let parent = Math.floor((index - 1) / 2);
            if (this.compare(this.stack[index], this.stack[parent]) <= 0) { break; }
            [this.stack[parent], this.stack[index]] = [this.stack[index], this.stack[parent]];
            index = parent;
        }
    }

    extract() {
        if (this.isEmpty()) { return null; }
        const top = this.stack[0];
        const last = this.stack.pop();
        if (this.stack.length > 0) {
            this.stack[0] = last;
            this.sinkDown(0);
        }
        return top;
    }

    sinkDown(index) {
        const length = this.stack.length;
        while (true) {
            let left = 2 * index + 1;
            let right = 2 * index + 2;
            let target = index;

            if (left < length && this.compare(this.stack[left], this.stack[target]) > 0) { target = left; }
            if (right < length && this.compare(this.stack[right], this.stack[target]) > 0) { target = right; }

            if (target === index) { break; }
            [this.stack[index], this.stack[target]] = [this.stack[target], this.stack[index]];
            index = target;
        }
    }

    size() { return this.stack.length; }
    
    isEmpty() { return this.stack.length === 0; }
    
    peek() { return this.stack[0] ?? null; }

    heapify(arr) {
        this.stack = arr;
        for (let i = Math.floor(this.stack.length / 2) - 1; i >= 0; i--) {
            this.sinkDown(i);
        }
    }
}
/**
 * 215. Kth Largest Element in an Array
 * @param {number[]} nums
 * @param {number} k
 * @return {number}
 */
var findKthLargest = function(nums, k) {
    const minHeap = new Heap('min');
    for (const num of nums) {
        minHeap.insert(num);
        if (minHeap.size() > k) {
            minHeap.extract();
        }
    }
    return minHeap.extract();
};


//console.log(findKthLargest([3,2,1,5,6,4], 2)); // Expect 5
console.log(findKthLargest([3,2,3,1,2,4,5,5,6], 4)); // Expect 4

