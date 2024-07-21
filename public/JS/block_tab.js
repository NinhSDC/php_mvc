function block_tab() {
    var blockTab = document.getElementById('blockTab');
    blockTab.style.display = 'none';
}
function block_tab_show() {
    var blockTab = document.getElementById('blockTab');
    const productImg = document.querySelector('.ProductImg').src;
    const ProductImg_tab = document.querySelector('.ProductImg-tab');

    ProductImg_tab.src = productImg;

    blockTab.style.display = 'flex';

}
// Tạo function stopPropagation
function stopPropagation(event) {
    event.stopPropagation();
}
function changeImages(direction) {
    const ProductImg_tab = document.querySelector('.ProductImg-tab');
    // const productImg = document.querySelector('.ProductImg');
    const thumbnails = document.querySelectorAll('.detailProduct_Thumbnail');

    // var currentImageIndex = 0;
    let currentImageIndex = -1;

    thumbnails.forEach((thumbnail, index) => {
        const thumbnailImg = thumbnail.querySelector('img');
        const thumbnailSrc = thumbnailImg.src;

        if (thumbnailSrc === ProductImg_tab.src) {
            currentImageIndex = index;
        }
    });

    if (direction === "Next") {
        if (currentImageIndex !== -1 && currentImageIndex < thumbnails.length - 1) {
            currentImageIndex++;
        } else if (currentImageIndex === thumbnails.length - 1) {
            currentImageIndex = 0;
        }
    } else if (direction === "Previous") {
        if (currentImageIndex !== -1 && currentImageIndex > 0) {
            currentImageIndex--;
        } else if (currentImageIndex === 0) {
            currentImageIndex = thumbnails.length - 1; // Chuyển về vị trí cuối cùng nếu đang ở vị trí đầu tiên
        }
    }

    // Hiển thị ảnh mới
    if (currentImageIndex !== -1) {
        ProductImg_tab.src = thumbnails[currentImageIndex].querySelector('img').src;
    }

}


