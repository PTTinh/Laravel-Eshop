const btnEdit = document.getElementsByClassName('js-product-edit')
//khai báo modal
const modalUpdate = new bootstrap.Modal("#ModalProductEdit")

for (const ele of btnEdit) {
    ele.addEventListener('click', async () => {
        let urlCate = ele.getAttribute('data-urlCate');
        let urlGet = ele.getAttribute('data-urlGet');
        let urlPut = ele.getAttribute('data-urlPut');
        let urlImg = ele.getAttribute('data-urlImg');
        let res = await fetch(urlCate);
        let dataCate = await res.json();
        let select = document.getElementById('product_cate_id_update');
        
        //gọi ajax dến urlGet để lấy json
        res = await fetch(urlGet);
        let data = await res.json();

        //gán dữ liệu vào select
        select.innerHTML = '';
        for (const ele1 of dataCate) {
            let option = document.createElement('option');
            option.value = ele1.id;
            option.text = ele1.name;
            if (ele1.id == data.product_cate_id) {
                option.selected = true;
            }
            select.appendChild(option);
        }

        //gán dữ liệu lấy được vào form update
        document.getElementById('name_update').value = data.name;
        document.getElementById('price_update').value = data.price;
        document.getElementById('discount_price_update').value = data.discount_price;
        document.getElementById('description_update').value = data.description;
        document.getElementById('img_show_update').src = urlImg;

        //sửa action của form update
        document.getElementById('fUpdateProduct').action = urlPut;
        //hiển thị modal
        modalUpdate.show();
    })
}
