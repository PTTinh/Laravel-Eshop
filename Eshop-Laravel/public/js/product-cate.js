const btnEdit = document.getElementsByClassName('js-edit')
//khai báo modal
const modalUpdate = new bootstrap.Modal("#AddModal2")

for (const ele of btnEdit) {
    ele.addEventListener('click', async ()=> {
        let urlGet = ele.getAttribute('data-urlGet');
        let urlPut = ele.getAttribute('data-urlPut');
        
        //gọi ajax dến urlGet để lấy json
        let res = await fetch(urlGet);
        let data = await res.json();
        
        //gán dữ liệu lấy được vào form update
        document.getElementById('name-update').value = data.name;

        //sửa action của form update
        document.getElementById('fUpdate').action = urlPut;
        //hiển thị modal
        modalUpdate.show();       
    })
}