/*
You have a RecentCounter class which counts the number of recent requests within a certain time frame.
Implement the RecentCounter class:
RecentCounter() Initializes the counter with zero recent requests.
int ping(int t) Adds a new request at time t, where t represents some time in milliseconds, and returns the number of requests that has happened in the past 3000 milliseconds (including the new request). Specifically, return the number of requests that have happened in the inclusive range [t - 3000, t].
It is guaranteed that every call to ping uses a strictly larger value of t than the previous call.
*/
/**
 * 933. Number of Recent Calls
 */
var RecentCounter = function() {
    this.queue = [];
};

/** 
 * @param {number} t
 * @return {number}
 */
RecentCounter.prototype.ping = function(t) {
    while(this.queue.length > 0 && this.queue[0] < t - 3000) {
        this.queue.shift();
    }
    this.queue.push(t);
    return this.queue.length;
};
var obj = new RecentCounter()
console.log(obj.ping(1)); // Expect 1
console.log(obj.ping(100)); // Expect 2
console.log(obj.ping(3001)); // Expect 3
console.log(obj.ping(3002)); // Expect 3