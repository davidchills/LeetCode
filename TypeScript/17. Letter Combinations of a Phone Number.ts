/*
Given a string containing digits from 2-9 inclusive, return all possible letter combinations that the number could represent. 
    Return the answer in any order.
A mapping of digits to letters (just like on the telephone buttons) is given below. Note that 1 does not map to any letters.

17. Letter Combinations of a Phone Number
*/

function letterCombinations(digits: string): string[] {
    if (digits === "" || digits === "1") { return []; }
    const buttonMap = {
        "2": ["a","b","c"],
        "3": ["d","e","f"],
        "4": ["g","h","i"],
        "5": ["j","k","l"],
        "6": ["m","n","o"],
        "7": ["p","q","r","s"],
        "8": ["t","u","v"],
        "9": ["w","x","y","z"]
    };
    const result: string[] = [];
    function backtrack (digits: string, index: number, currentCombination: string): void {
        if (index === digits.length) {
            result.push(currentCombination);
            return;
        }
        const digit: string = digits[index];
        if (!buttonMap[digit]) { return; }
        for (const letter of buttonMap[digit]) {
            backtrack(digits, index + 1, currentCombination + letter);
        }
    }
    backtrack(digits, 0, "");
    return result;    
};

console.log(letterCombinations("23")); // Expect ["ad","ae","af","bd","be","bf","cd","ce","cf"]
console.log(letterCombinations("")); // Expect []
console.log(letterCombinations("2")); // Expect ["a","b,"c"]