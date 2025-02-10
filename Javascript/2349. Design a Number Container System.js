/**
 *  2349. Design a Number Container System
 */
var NumberContainers = function() {
    this.num_map = {};
    this.num_map_cache = {};
    this.idx_map = {};
};

/** 
 * @param {number} index 
 * @param {number} number
 * @return {void}
 */
NumberContainers.prototype.change = function(index, number) {
    if (index in this.idx_map) {
        const old_num = this.idx_map[index];
        if (old_num == number) return;
        const set = this.num_map[old_num];
        set.delete(index);
        if (old_num in this.num_map_cache && 
            index == this.num_map_cache[old_num]) {
            delete this.num_map_cache[old_num];
        }
    }
    this.idx_map[index] = number;
    this.num_map[number] ||= new Set();
    this.num_map[number].add(index);
    if (number in this.num_map_cache) {
        this.num_map_cache[number] = Math.min(index, this.num_map_cache[number]);
    } 
};

/** 
 * @param {number} number
 * @return {number}
 */
NumberContainers.prototype.find = function(number) {
    if (!this.num_map[number] || this.num_map[number].size <= 0) {
        return -1;
    }
    if (number in this.num_map_cache) {
        return this.num_map_cache[number];
    }
    const arr = [...this.num_map[number].values()].sort((a,b) => a-b);
    this.num_map_cache[number] = arr[0];
    return arr[0];
};

let nc = new NumberContainers();
nc.change(1, 10);
nc.change(1, 10);
console.log(nc.find(10));
nc.change(1, 20);
console.log(nc.find(10));



