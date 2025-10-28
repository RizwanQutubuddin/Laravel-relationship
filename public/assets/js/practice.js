function fnName(params) {
    console.log(params);
    return `Hello ${params}`;
}

let fnName2=(params)=>{
    console.log(params);
    return `Hello ${params}`;
}

document.getElementById('result').innerHTML=fnName('Uzaif');
document.getElementById('result2').innerHTML=fnName2('Rizwan');
//==========================rest operator==========================
let sum=(name,...args)=>{
    let total=0;    
    for(let i of args){

        total+=i;
    }   
    return name+" "+total;
}

document.getElementById('result3').innerHTML=sum('rizwan',2,3,4,5,6,7,8,9,10);


//==========================spread operator==========================
let arr1=[1,2,3];
let arr2=[4,5,6];   
let arr3=[...arr1,...arr2];
document.getElementById('result4').innerHTML=sum('rizwan',...arr1);

let obj1={a:1,b:2,c:3};
let obj2={d:4,e:5,f:6};
let obj3={...obj1,...obj2};
document.getElementById('result5').innerHTML=JSON.stringify(obj3);

//==========================class==========================

class Person{
    constructor(name,age){
        this.name=name;
        this.age=age;
    }           
    getDetails(){
        return `Name is ${this.name} and age is ${this.age}`;
    }

    static classInfo(){
        return `This is Person class's static classInfo method`;
    }
}

let person1=new Person('Rizwan',22);
let person2=Person.classInfo();
document.getElementById('result6').innerHTML=person1.getDetails();
document.getElementById('result7').innerHTML=person2;
//==========================Inheritance==========================

class Employee{
    constructor (name){
        console.log('Employee constructor called'+name);
    }   

    info(){
        return `This is Employee class's info method`;
    }
}

class Manager extends Employee{
    constructor(name){
        super();
        console.log('Manager constructor called'+name);
    }   
}

// let employee=new Employee();
let manager=new Manager('raju');