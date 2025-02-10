/**
 * @param {string[]} sentences
 * @return {number}
 */
var mostWordsFound = function(sentences) {
    let maxWords = 0;
    sentences.forEach((s) => {
        let count = s.split(' ').length;
        if (count > maxWords) { maxWords = count; }
    });
    return maxWords;
};
//console.log(mostWordsFound(["alice and bob love leetcode", "i think so too", "this is great thanks very much"]));
console.log(mostWordsFound(["please wait", "continue to fight", "continue to win"]));