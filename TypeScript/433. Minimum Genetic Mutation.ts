/*
A gene string can be represented by an 8-character long string, with choices from 'A', 'C', 'G', and 'T'.
Suppose we need to investigate a mutation from a gene string startGene to a gene string endGene 
    where one mutation is defined as one single character changed in the gene string.
For example, "AACCGGTT" --> "AACCGGTA" is one mutation.
There is also a gene bank bank that records all the valid gene mutations. 
    A gene must be in bank to make it a valid gene string.
Given the two gene strings startGene and endGene and the gene bank bank, 
    return the minimum number of mutations needed to mutate from startGene to endGene. 
    If there is no such a mutation, return -1.
Note that the starting point is assumed to be valid, so it might not be included in the bank.

433. Minimum Genetic Mutation
*/

function minMutation(startGene: string, endGene: string, bank: string[]): number {
    const validGenes: string[] = ["A", "C", "G", "T"];
    const geneBank = new Set<string>(bank);
    if (!geneBank.has(endGene)) { return -1; }
    const queue: [string, number][] = [[startGene, 0]];
    const visited = new Set<string>([startGene]);
    
    while (queue.length > 0) {
        const [currentGene, mutations] = queue.shift()!;
        if (currentGene === endGene) {
            return mutations;
        }
        for (let i: number = 0; i < currentGene.length; i++) {
            for (let char of validGenes) {
                if (char !== currentGene[i]) {
                    const newGene = currentGene.slice(0, i) + char + currentGene.slice(i + 1);
                    if (geneBank.has(newGene) && !visited.has(newGene)) {
                        queue.push([newGene, mutations + 1]);
                        visited.add(newGene);
                    }
                }
            }
        }
    }
    return -1;    
};

console.log(minMutation("AACCGGTT", "AACCGGTA", ["AACCGGTA"])); // Expect 1
console.log(minMutation("AACCGGTT", "AAACGGTA", ["AACCGGTA","AACCGCTA","AAACGGTA"])); // Expect 2