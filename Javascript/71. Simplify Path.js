/**
 * 71. Simplify Path
 * @param {string} path
 * @return {string}
 */
var simplifyPath = function(path) {
    
    const valid = [];
    const parts = path.split('/');
    parts.forEach((seg) => {
        if (seg === '..') {
            valid.pop();
        }
        else if (seg !== '' && seg !== '.') {
            valid.push(seg);
        }
    });
    return '/'+valid.join('/');
    
    /*
    return '/' + path.split('/').reduce((stack, seg) => {
        if (seg === '..') { stack.pop(); }
        else if (seg && seg !== '.') { stack.push(seg); }
        return stack;
    }, []).join('/');    
    */
};

//console.log(simplifyPath("/home/")); // Expect "/home"
//console.log(simplifyPath("/home//foo/")); // Expect "/home/foo"
//console.log(simplifyPath("/home/user/Documents/../Pictures")); // Expect "/home/user/Pictures"
//console.log(simplifyPath("/../")); // Expect "/"
console.log(simplifyPath("/.../a/../b/c/../d/./")); // Expect "/.../b/d"



