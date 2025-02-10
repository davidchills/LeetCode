/**
 * 135. Candy
 * @param {number[]} ratings
 * @return {number}
 */
var candy = function(ratings) {
    const kount = ratings.length
    const candies = new Array(kount).fill(1)
    for (let i = 0; i < kount; i++) {
        if (ratings[i] > ratings[i-1]) {
            candies[i] = (candies[i-1] + 1)
        }
    }
    for (let i = kount - 2; i >= 0; i--) {
        if (ratings[i] > ratings[i+1]) {
            candies[i] = Math.max(candies[i], (candies[i+1]+1))
        }
    }
    return candies.reduce((a, b) => a + b, 0)
};

console.log(candy([1,0,2]));