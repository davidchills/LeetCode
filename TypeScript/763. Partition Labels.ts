/*
You are given a string s. We want to partition the string into as many parts as possible so that each letter appears in at most one part. 
    For example, the string "ababcc" can be partitioned into ["abab", "cc"], 
    but partitions such as ["aba", "bcc"] or ["ab", "ab", "cc"] are invalid.
Note that the partition is done so that after concatenating all the parts in order, the resultant string should be s.
Return a list of integers representing the size of these parts.

763. Partition Labels
*/

function partitionLabels(s: string): number[] {
    const n = s.length;
    const lastOccurrence = new Map<string, number>();
    const partitions: number[] = [];
    let start = 0;
    let end = 0;
    for (let i = 0; i < n; i++) {
        lastOccurrence.set(s[i], i);
    }
    for (let i = 0; i < n; i++) {
        end = Math.max(end, lastOccurrence.get(s[i]!));
        if (i === end) {
            partitions.push(end - start + 1);
            start = i + 1;
        }
    }
    return partitions;    
};

console.log(partitionLabels("ababcbacadefegdehijhklij")); // Expect [9,7,8]
console.log(partitionLabels("eccbbbbdec")); // Expect [10]