/*
You have a long flowerbed in which some of the plots are planted, and some are not. However, flowers cannot be planted in adjacent plots.

Given an integer array flowerbed containing 0's and 1's, where 0 means empty and 1 means not empty, and an integer n, 
    return true if n new flowers can be planted in the flowerbed without violating the no-adjacent-flowers rule and false otherwise.
*/
/**
 * 605. Can Place Flowers
 * @param {number[]} flowerbed
 * @param {number} n
 * @return {boolean}
 */
var canPlaceFlowers = function(flowerbed, n) {
    const l = flowerbed.length;
    
    for (let i = 0; i < l; i++) {
        if (flowerbed[i] === 0 &&
            (i === 0 || flowerbed[i-1] === 0) &&
            (i === l - 1 || flowerbed[i+1] === 0)) {
            flowerbed[i] = 1;
            n--;
            if (n === 0) { return true; }
        }
    }
    return n <= 0;
};


console.log(canPlaceFlowers([1,0,0,0,1], 1)); // Expect true
//console.log(canPlaceFlowers([1,0,0,0,1], 2)); // Expect false

