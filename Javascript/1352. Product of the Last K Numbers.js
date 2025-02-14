/*
Design an algorithm that accepts a stream of integers and retrieves the product of the last k integers of the stream.

Implement the ProductOfNumbers class:

ProductOfNumbers() Initializes the object with an empty stream.
void add(int num) Appends the integer num to the stream.
int getProduct(int k) Returns the product of the last k numbers in the current list. You can assume that always the current list has at least k numbers.
The test cases are generated so that, at any time, the product of any contiguous sequence of numbers will fit into a single 32-bit integer without overflowing.
*/
var ProductOfNumbers = function() {
    this.stack = [1];
};

/** 
 * @param {number} num
 * @return {void}
 */
ProductOfNumbers.prototype.add = function(num) {
    if (num === 0) { this.stack = [1]; }
      else {
        const n = this.stack.length;
        const lastValue = this.stack[n-1];
        this.stack.push(lastValue * num);
      }
};

/** 
 * @param {number} k
 * @return {number}
 */
ProductOfNumbers.prototype.getProduct = function(k) {
    const n = this.stack.length;
    if (k >= n) { return 0; }
    return this.stack[n-1] / this.stack[n - 1 - k];
};

const p = new ProductOfNumbers();
p.add(3);
p.add(0);
p.add(2);
p.add(5);
p.add(4);
console.log(p.getProduct(2));
console.log(p.getProduct(3));
console.log(p.getProduct(4));
p.add(8);
console.log(p.getProduct(2));



