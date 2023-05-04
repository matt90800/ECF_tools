const searchButton = document.querySelector('searchButton');
searchButton.addEventListener("click",()=>{
    const input = document.querySelector("input[type='search']");
    const value = input.value;
    console.log("Input Value:", value);
    }
)