class Heap<T> {
    private stack: T[];
    private compare: (a: T, b: T) => number;

    constructor(compare: 'min' | 'max' | ((a: T, b: T) => number) = 'min') {
        this.stack = [];
        this.setComparator(compare);
    }

    setComparator(compare: 'min' | 'max' | ((a: T, b: T) => number)): void {
        if (compare === 'max') {
            this.compare = (a: T, b: T) => (a as any) - (b as any); // Descending order for max-heap
        } 
        else if (compare === 'min') {
            this.compare = (a: T, b: T) => (b as any) - (a as any); // Ascending order for min-heap
        } 
        else {
            this.compare = compare;
        }
    }
    
    insert(value: T): void {
        this.stack.push(value);
        this.bubbleUp(this.stack.length - 1);
    }

    private bubbleUp(index: number): void {
        while (index > 0) {
            let parent = Math.trunc((index - 1) / 2);
            if (this.compare(this.stack[index], this.stack[parent]) <= 0) { break; }
            [this.stack[parent], this.stack[index]] = [this.stack[index], this.stack[parent]];
            index = parent;
        }
    }

    extract(): T | null {
        if (this.isEmpty()) { 
            console.warn("Heap is empty. Extraction failed.");
            return null; 
        }
        const top = this.stack[0];
        const last = this.stack.pop();
        if (this.stack.length > 0 && last !== undefined) {
            this.stack[0] = last;
            this.sinkDown(0);
        }
        return top;
    }

    private sinkDown(index: number): void {
        const length: number = this.stack.length;
        while (true) {
            let left = 2 * index + 1;
            let right = 2 * index + 2;
            let target = index;

            if (left < length && this.compare(this.stack[left], this.stack[target]) > 0) {
                target = left;
            }
            if (right < length && this.compare(this.stack[right], this.stack[target]) > 0) {
                target = right;
            }

            if (target === index) { break; }
            [this.stack[index], this.stack[target]] = [this.stack[target], this.stack[index]];
            index = target;
        }
    }

    size(): number {
        return this.stack.length;
    }

    isEmpty(): boolean {
        return this.stack.length === 0;
    }

    peek(): T | null {
        return this.stack[0] ?? null;
    }

    heapify(arr: T[]): void {
        this.stack = [...arr];
        for (let i = (this.stack.length >> 1) - 1; i >= 0; i--) {
            this.sinkDown(i);
        }
    }
}

// TEST CASES
/*
// Min Number Heap
const minHeap = new Heap<number>('min');
minHeap.insert(10);
minHeap.insert(5);
minHeap.insert(15);
console.log(minHeap.extract()); // 5
console.log(minHeap.extract()); // 10
console.log(minHeap.extract()); // 15
console.log(minHeap.extract()); // Heap is empty. Extraction failed. Returns null.
*/

/*
// Max Number Heap
const maxHeap = new Heap<number>('max');
maxHeap.insert(10);
maxHeap.insert(5);
maxHeap.insert(15);
console.log(maxHeap.extract()); // 15
console.log(maxHeap.extract()); // 10
console.log(maxHeap.extract()); // 5
*/

/*
// String Heap
const stringHeap = new Heap<string>((a, b) => b.localeCompare(a));
stringHeap.insert("banana");
stringHeap.insert("apple");
stringHeap.insert("cherry");
console.log(stringHeap.extract()); // Expect "apple"
console.log(stringHeap.extract()); // Expect "banana"
console.log(stringHeap.extract()); // Expect "cherry"
*/

/*
// Custom comparator (priority queue example)
const priorityQueue = new Heap<[string, number]>((a, b) => b[1] - a[1]);  // Sort by second element in descending order
let scores: [string, number][] = [['Second', 1], ['Third', 2], ['First', 0]];
priorityQueue.heapify(scores);
while (!priorityQueue.isEmpty()) {
    console.log(priorityQueue.extract());
}
// Expect:
// [ 'Third', 2 ]
// [ 'Second', 1 ]
// [ 'First', 0 ]
*/

/*
// Task Priority Queue
type Task = { name: string, priority: number };
const priorityQueue = new Heap<Task>((a, b) => b.priority - a.priority);
priorityQueue.insert({ name: "Fix bug", priority: 3 });
priorityQueue.insert({ name: "Deploy", priority: 1 });
priorityQueue.insert({ name: "Write tests", priority: 2 });
console.log(priorityQueue.extract()); // Expect { name: "Deploy", priority: 1 } 
console.log(priorityQueue.extract()); // Expect { name: "Write tests", priority: 2 }
console.log(priorityQueue.extract()); // Expect { name: "Fix bug", priority: 3 }
*/