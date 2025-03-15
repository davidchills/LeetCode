/*
In the world of Dota2, there are two parties: the Radiant and the Dire.
The Dota2 senate consists of senators coming from two parties. Now the Senate wants to decide on a change in the Dota2 game. 
    The voting for this change is a round-based procedure. In each round, each senator can exercise one of the two rights:
Ban one senator's right: A senator can make another senator lose all his rights in this and all the following rounds.
Announce the victory: If this senator found the senators who still have rights to vote are all from the same party, 
    he can announce the victory and decide on the change in the game.
Given a string senate representing each senator's party belonging. 
    The character 'R' and 'D' represent the Radiant party and the Dire party. 
    Then if there are n senators, the size of the given string will be n.
The round-based procedure starts from the first senator to the last senator in the given order. 
    This procedure will last until the end of voting. All the senators who have lost their rights will be skipped during the procedure.
Suppose every senator is smart enough and will play the best strategy for his own party. 
    Predict which party will finally announce the victory and change the Dota2 game. The output should be "Radiant" or "Dire".


649. Dota2 Senate
*/
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

function predictPartyVictory(senate: string): string {
    const n: number = senate.length;
    const repQueue = new Heap<number>('min');
    const demQueue = new Heap<number>('min');
    
    repQueue.heapify([...senate].map((c, i) => (c === 'R' ? i : null)).filter(i => i !== null));
    demQueue.heapify([...senate].map((c, i) => (c === 'D' ? i : null)).filter(i => i !== null));
    
    while (repQueue.size() > 0 && demQueue.size() > 0) {
        const repIndex: number = repQueue.extract()!;
        const demIndex: number = demQueue.extract()!;
        if (repIndex < demIndex) {
            repQueue.insert(repIndex + n);
        }
        else {
            demQueue.insert(demIndex + n);
        }
    }
    
    return (demQueue.size() === 0) ? "Radiant" : "Dire";    
};

console.log(predictPartyVictory("RD")); // Expect "Radiant"
console.log(predictPartyVictory("RDD")); // Expect "Dire"