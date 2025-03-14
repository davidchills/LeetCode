/**
 * @class
 */
class Heap {
  
    constructor(compare) {
        this.stack = [];
        this.setComparator(compare || 'min');
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
    }
	
    insert(value) {
        this.stack.push(value);
        this.bubbleUp(this.stack.length - 1);
    }

    bubbleUp(index) {
        while (index > 0) {
            let parent = Math.trunc((index - 1) / 2);
            if (this.compare(this.stack[index], this.stack[parent]) <= 0) { break; }
            [this.stack[parent], this.stack[index]] = [this.stack[index], this.stack[parent]];
            index = parent;
        }
    }

    extract() {
        if (this.isEmpty()) { 
          console.warn("Heap is empty. Extraction failed.");
          return null; 
        }
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
        this.stack = [...arr];
        for (let i = (this.stack.length >> 1) - 1; i >= 0; i--) {
            this.sinkDown(i);
        }
    }
}


/*
Usage: instantiate with 'min' (default), 'max' or custom comparator.
*/
/*
// Min Heap
const minHeap = new Heap();
minHeap.insert(10);
minHeap.insert(5);
minHeap.insert(15);
console.log(minHeap.extract()); // 5
console.log(minHeap.extract()); // 10
console.log(minHeap.extract()); // 15
*/

/*
// Max Heap
const maxHeap = new Heap('max');
maxHeap.insert(10);
maxHeap.insert(5);
maxHeap.insert(15);
console.log(maxHeap.extract()); // 15
console.log(maxHeap.extract()); // 10
console.log(maxHeap.extract()); // 5
*/

/*
// Custom comparator so you can use it like a priority queue.
let scores = [['Second', 1], ['Third', 2], ['First', 0]];
const heap = new Heap((a,b) => {
  if (a[1] < b[1]) { return 1; }
  if (a[1] > b[1]) { return -1; }
  return 0;
});

heap.heapify(scores);
while (!heap.isEmpty()) {
  console.log(heap.extract());
}
// Expect:
// [ 'First', 0 ]
// [ 'Second', 1 ]
// [ 'Third', 2 ]
*/

