// Javascript code to filter table based on manual input
function myFunction() {
var input, filter, table, tr, td, i, txtValue;
input = document.getElementById("member_name_search");
filter = input.value.toUpperCase();
table = document.getElementById("mbr_table");
tr = table.getElementsByTagName("tr");
for (i = 0; i < tr.length; i++) {
    // filter based on row number below (starting at 0 for the 1st row)
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
    txtValue = td.textContent || td.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
    } else {
        tr[i].style.display = "none";
    }
    }       
}
}
