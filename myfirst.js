// variables (let, const, var)
let name = 'Node.js';
const version = 20;

// Function declaration
function greet(user) {
    return `Hello, ${user}!`; // Template literal (ES6)
}

// Arrow function (ES6+)
const add = (a,b) => a + b;

console.log(greet('Developer')); // Hello, Developer!
console.log(add(5,3)); // 8

// object
const user = {
    name: 'Alice',
    age: 25,
    greet() {
        console.log(`Hi, I'm ${this.name}`);
    }
};

// array
const colors = ['red', 'green', 'blue'];

// array methods (ES6+)
colors.forEach(color => console.log(color));
const lengths = colors.map(color => color.length);

// 1. Callbacks (traditional)
function fetchData(callback) {
    setTimeout(() => {
        callback('Data received!');
    }, 1000);
}

// 2. Promises (ES6+)
const fetchDataPromise = () => {
    return new Promise((resolve) => {
        setTimeout(() => resolve('Promise reseloved!'), 1000)
    });
};

// 3. Async/Await (ES8+)
async function getData() {
    const result = await fetchDataPromise();
    console.log(result);
}

getData(); // Cal the async function