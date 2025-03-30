let districtsec = document.getElementById("user-district");
let wardsec = document.getElementById("user-wards")
function LoadDistrict(idcity) {
    let req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if(req.readyState==4 && req.status==200) {
            districtsec.innerHTML = req.responseText ;
        }
    }
    req.open("GET","getDistrict.php?id=" +idcity,true);
    req.send();
}
function LoadWards(idward) {
    let req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if(req.readyState==4 && req.status==200) {
            wardsec.innerHTML = req.responseText ;
        }
    }
    req.open("GET","getWards.php?id=" + idward,true);
    req.send();
}
// function renderHuyen(selectData , dataget){
//     //xóa hết toàn bộ data trong Huyen
//     for(i = 0; i < selectData.options.length ; i++){
//         selectData.remove(0);
//     }
//     data = dataget.split(";;");
//     for(i = 0 ; i< data.length-1 ; i++ ){
//         let districtnew = document.createElement("option");
//         let option = data[i].split("&&");
//         districtnew.value = option[0];
//         districtnew.text = option[1];
//         selectData.add(districtnew);
//     }
// }