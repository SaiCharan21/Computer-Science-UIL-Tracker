
let id = $("input[name*='id']")
id.attr("readonly","readonly");


$(".btnedit").click( e =>{
    let textvalues = displayData(e);

    ;
    let first_name = $("input[name*='first_name']");
    let last_name = $("input[name*='last_name']");
    let email = $("input[name*='email']");
    let phone = $("input[name*='phone']");
    let grade = $("input[name*='grade']");
    // let stud_id = $("input[name*='stud_id']");

    id.val(textvalues[0]);
    first_name.val(textvalues[1]);
    last_name.val(textvalues[2]);
    email.val(textvalues[3]);
    phone.val(textvalues[4]);
    grade.val(textvalues[5]);
});


function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        if(value.dataset.id == e.target.dataset.id){
           textvalues[id++] = value.textContent;
        }
    }
    return textvalues;

}