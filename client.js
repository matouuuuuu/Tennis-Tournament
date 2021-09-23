function getValue() {
    var input = document.getElementById("input")
    var output = document.getElementById("output")
    let power = input.value
    let result = Math.pow(2, +power)
    output.value = result
}

function openPopup(id){
    id.classList.add("show");
    
}
function closePopup(id){
    id.classList.remove("show");
}

//$("#tableau").insertAfter("#navigation-view");