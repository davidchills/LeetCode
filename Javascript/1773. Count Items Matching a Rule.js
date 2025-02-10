/**
 * @param {string[][]} items
 * @param {string} ruleKey
 * @param {string} ruleValue
 * @return {number}
 */
var countMatches = function(items, ruleKey, ruleValue) {
    let matches = 0;
    const keys = { "type": 0, "color": 1, "name": 2 }
    items.forEach((item) => {
        if (item[keys[ruleKey]] === ruleValue) { matches++; }
    });
    return matches;
};
//console.log(countMatches([["phone","blue","pixel"],["computer","silver","lenovo"],["phone","gold","iphone"]], "color", "silver"));
console.log(countMatches([["phone","blue","pixel"],["computer","silver","phone"],["phone","gold","iphone"]], "type", "phone"));