/*
You are given a 0-indexed string blocks of length n, where blocks[i] is either 'W' or 'B', representing the color of the ith block. 
    The characters 'W' and 'B' denote the colors white and black, respectively.
You are also given an integer k, which is the desired number of consecutive black blocks.
In one operation, you can recolor a white block such that it becomes a black block.
Return the minimum number of operations needed such that there is at least one occurrence of k consecutive black blocks.
*/
/**
 * 2379. Minimum Recolors to Get K Consecutive Black Blocks
 */
function minimumRecolors(blocks: string, k: number): number {
    const n = blocks.length;
    let minOps = 10**10;
    let currBlackCount = 0;
    
    for (let i = 0; i < k; i++) {
        if (blocks[i] === 'B') {
            currBlackCount++;
        }
    }
    
    minOps = k - currBlackCount;
    
    for (let i = k; i < n; i++) {
        if (blocks[i - k] === 'B') {
            currBlackCount--;
        }
        if (blocks[i] === 'B') {
            currBlackCount++;
        }
        minOps = Math.min(minOps, k - currBlackCount);
    }
    return minOps;
};

//console.log(minimumRecolors("WBBWWBBWBW", 7)); // Expect 3
console.log(minimumRecolors("WBWBBBW", 2)); // Expect 0
