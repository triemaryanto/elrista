let color = document.querySelector(".color");
let colorInput = document.querySelector(".color-input");
// Select all elements with the class "block"
let blocks = document.querySelectorAll(".block");

// Add click event listener to each block
blocks.forEach((block) => {
    block.addEventListener("click", () => {
        // Get the background color of the clicked block
        let colorBlock = window.getComputedStyle(block).backgroundColor;
        console.log(colorBlock);
        color.style.backgroundColor = colorBlock;
    });
});
