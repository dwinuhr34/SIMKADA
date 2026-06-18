document.getElementById("tahun").innerHTML =
new Date().getFullYear();

const searchInput =
document.getElementById("searchInput");

const rows =
document.querySelectorAll("#dataTable tr");

searchInput.addEventListener("keyup", function(){

    const keyword =
    this.value.toLowerCase();

    rows.forEach((row,index)=>{

        if(index === 0) return;

        const text =
        row.innerText.toLowerCase();

        row.style.display =
        text.includes(keyword)
        ? ""
        : "none";

    });

});