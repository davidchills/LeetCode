/*
A transformation sequence from word beginWord to word endWord using a dictionary wordList is a sequence of words 
    beginWord -> s1 -> s2 -> ... -> sk such that:
Every adjacent pair of words differs by a single letter.
Every si for 1 <= i <= k is in wordList. Note that beginWord does not need to be in wordList.
sk == endWord
Given two words, beginWord and endWord, and a dictionary wordList, 
    return the number of words in the shortest transformation sequence from beginWord to endWord, or 0 if no such sequence exists.

127. Word Ladder
*/

function ladderLength(beginWord: string, endWord: string, wordList: string[]): number {
    const wordSet = new Set<string>(wordList);
    if (!wordSet.has(endWord)) { return 0; }
    const queue: [string, number][] = [[beginWord, 1]];
    while (queue.length) {
        let [currentWord, steps] = queue.shift();
        const wordArray: string[] = currentWord.split('');
        for (let i = 0; i < wordArray.length; i++) {
            const originalChar: string = wordArray[i];
            for (let ch = 97; ch <= 122; ch++) {
                const newChar: string = String.fromCharCode(ch);
                if (newChar === originalChar) { continue; }
                const newWord = currentWord.slice(0, i) + newChar + currentWord.slice(i + 1);
                if (newWord === endWord) {
                    return steps + 1;
                }
                if (wordSet.has(newWord)) {
                    wordSet.delete(newWord);
                    queue.push([newWord, steps + 1]);
                }
            }
            wordArray[i] = originalChar;
        }
    }
    return 0;    
};

console.log(ladderLength("hit", "cog", ["hot","dot","dog","lot","log","cog"])); // Expect 5
console.log(ladderLength("hit", "cog", ["hot","dot","dog","lot","log"])); // Expect 0