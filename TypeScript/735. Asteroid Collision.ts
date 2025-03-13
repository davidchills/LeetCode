/*
We are given an array asteroids of integers representing asteroids in a row. 
    The indices of the asteriod in the array represent their relative position in space.
For each asteroid, the absolute value represents its size, and the sign represents its direction (positive meaning right, negative meaning left). 
    Each asteroid moves at the same speed.
Find out the state of the asteroids after all collisions. If two asteroids meet, the smaller one will explode. 
    If both are the same size, both will explode. Two asteroids moving in the same direction will never meet.

735. Asteroid Collision
*/

function asteroidCollision(asteroids: number[]): number[] {
    const stack = [];
    
    for (let rock of asteroids) {
        while (stack.length > 0 && stack.at(-1) > 0 && rock < 0) {
            const last = stack.pop();
            if (Math.abs(last) === Math.abs(rock)) {
                rock = 0;
                break;
            }
            if (Math.abs(last) > Math.abs(rock)) {
                stack.push(last);
                rock = 0;
                break;
            }
        }
        if (rock !== 0) {
            stack.push(rock);
        }
    }
    return stack;
};

console.log(asteroidCollision([5,10,-5])); // Expect [5,10]
console.log(asteroidCollision([8,-8])); // Expect []
console.log(asteroidCollision([10,2,-5])); // Expect [10]
console.log(asteroidCollision([-2,-1,1,2])); // Expect [-2,-1,1,2]
console.log(asteroidCollision([1,-2,-2,-2])); // Expect [-2,-2,-2]
console.log(asteroidCollision([1, 2, 3, 4, 5])); // Expect [1, 2, 3, 4, 5]
console.log(asteroidCollision([100])); // Expect [100]
console.log(asteroidCollision([5, 10, -5, -10, 15, -20])); // Expect [-20]