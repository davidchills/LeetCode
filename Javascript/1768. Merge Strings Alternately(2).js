/*
You are given two strings word1 and word2. Merge the strings by adding letters in alternating order, starting with word1. If a string is longer than the other, append the additional letters onto the end of the merged string.

Return the merged string.
*/
/**
 * 1768. Merge Strings Alternately
 * @param {string} word1
 * @param {string} word2
 * @return {string}
 */
var mergeAlternately = function(word1, word2) {
    const n = Math.min(word1.length, word2.length);
    let result = '';
    for (let i = 0; i < n; i++) {
        result += word1[i] + word2[i];
    }
    return result + word1.slice(n) + word2.slice(n);
};
/*
let word1 = "abc";
let word2 = "pqr";
// Expect "apbqcr"
*/


let word1 = "kkkolliuimotplcvuisquihfslxubxrgnrnfbfmlgdkgeeahhqahdiphlmdgwlkezlxzfsvhzecvtltjskvjbahwrodvbexguhcmsdqdgbozqybplvqeazeykfjlevvybvkheinqztfrgdbrvsyfrwfltlyzihkrcloozsmvsqdngyfxduthwurfxsnywjgmrmfessvcmxbdrfdysrczpdkldwcuebkbjwbuiyqvwfqzcojeshlcvkyaubgqqobfkcasnvsriqaxjiqoeqwbsjabkeigaljilgnqujetkjwswxzsyyljpvfouiryqhdnzywiedrjmheonpqnticmbnduauyuobrgdkkkfeoyatisqopwnzgacbybuzapcpapwcwfduyadbldpzlhqfekakjsmhiunoofenznjczfcebwtetoqboswcduejvcpohkalyhekcmyciaauzteirztqavbskdwinpltfgyprjbitcegvvstjfpflndnceatyoolshreikjicblezrnsqcuvxxwutaowvylauqegalkcagtawzvrecghamjaukmgrabwqrzqxkxkqpiqpvnqnmccrezwidhmegsrbimjlnmiaurljrhuignbvheztsgtubhxlrcqqvmejhtgvbxvsjjldbbxejesehgctpfqsrkqayzespkqhyucevtrrarvjsxlwcrkfctsssklnvllhqdlamlwqqswxvnycxbubgcejtrbwtnxzferggeccfmlrsnpfsrqrzpsihnbxcnzpbgtqoeipemfrvvchfxwrwrpdqzwpppdtssogzpazlvkscpltlfipltdzzrrfelexysyjkxotrntzwtmpceiiceezipdryxrhcohyxgacwdcpzjxlhucibzegptpppdvponpepdrzakyjullhitsblxiadvesvxgxckjhwmoyyucconostvczprstygpyzihihwzqzfokegilqpgepmbnx";
let word2 = "rrvgdipbnbmqklatlhnjcsdsjaxgpbpbhppmacrnxksfvmajmxodzbhxmrzppooxlfovvqyiwztyqvjagpykphlfipeegahiiooskcpibmgrroudgemgubjmhbaqfyxygwbaitdhxhsdlsenmxjgjxjtvjkmfbvddpfgdttxetnwhhnbjiwpqslafvrxkaekriveiwrcicajgxvoonusubdocttefryuqcbhqhtcmsjxtyevxmrqhactbmenatkcxuwaqgfidjnccnsleuaiiysnsuuczstbznfyxlhybjovdgpooelqjnojbsfosjdlyjksroaveymmaixpxsiadmemkneiofainbrhdexhfaratjvzagrkcttprywinyeylapkbafezcoiupmvulqyvtozceimkholtoqttfjtpjvyauckagvrrivinrplmxycfghxdqmeevvdkehvflhtclrkxxxrhlkmzwthkdceeyuosourdnkfvrpjbswgxxjdhmqiojbgdshheacdmwyipgadhigqurndzqkmegwdstvakhhuyxrkzbtpruwivqnadkzywdiaaymnsczkovwfywvctcdilqaachudklaywpnlfrkhanaghcpascevpdywtayexjcpphtwndzevvbotrdzwvuuphsxqikiyboclddsceghpyaawtmvrrztlmdotzdtfemnvkcrfjblgwlqkdwbkdwixzfgsvgaysusbyglwmfbydiehtetlagrxjtdwsfagsngqcascguskjtknbxzzujggadujccxyvyrlgvoorcfxqnmljhcohveqswprdgftvztagruaeyuuexxswtaqnxgepcskavpglzapykqvsemjzttshiivztcrburptgz";
// Expect "apbqrs"


/*
let word1 = "abcd";
let word2 = "pq";
// Expect "apbqcd"
*/

console.log(mergeAlternately(word1, word2));


