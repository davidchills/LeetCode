/*
You are given a non-negative floating point number rounded to two decimal places celsius, that denotes the temperature in Celsius.
You should convert Celsius into Kelvin and Fahrenheit and return it as an array ans = [kelvin, fahrenheit].
Return the array ans. Answers within 10-5 of the actual answer will be accepted.
*/
/**
 * 2469. Convert the Temperature
 * @param {number} celsius
 * @return {number[]}
 */
var convertTemperature = function(celsius) {
    const kelvin = celsius + 273.15;
    const fahrenheit = celsius * 1.80 + 32.00;
    return [kelvin, fahrenheit];
};

console.log(convertTemperature(36.50)); // Expect [309.65,97.7]
console.log(convertTemperature(122.11)); // Expect [395.26,251.798]
