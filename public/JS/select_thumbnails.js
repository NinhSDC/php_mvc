function ProductImg(ProductImg) {
    const productImg = document.querySelector('.ProductImg');
    const thumbnails = document.querySelectorAll('.detailProduct_Thumbnail');


    productImg.src = ProductImg;

    thumbnails.forEach(thumbnail => {
        const thumbnailImg = thumbnail.querySelector('img');
        const thumbnailSrc = thumbnailImg.src;

        if (thumbnailSrc === productImg.src) {
            thumbnail.classList.add('hoverEffect');
        } else {
            thumbnail.classList.remove('hoverEffect');
        }
    });
}

function changeImage(imgsrc) {
    const productImg = document.querySelector('.ProductImg');
    const thumbnails = document.querySelectorAll('.detailProduct_Thumbnail');

    // var currentImageIndex = 0;
    let currentImageIndex = -1;

    thumbnails.forEach((thumbnail, index) => {
        const thumbnailImg = thumbnail.querySelector('img');
        const thumbnailSrc = thumbnailImg.src;

        if (thumbnailSrc === productImg.src) {
            currentImageIndex = index;
        }
    });

    if (imgsrc === "next") {
        if (currentImageIndex !== -1 && currentImageIndex < thumbnails.length - 1) {
            currentImageIndex++;
        } else if (currentImageIndex === thumbnails.length - 1) {
            currentImageIndex = 0; 
        }
    } else if (imgsrc === "previous") {
        if (currentImageIndex !== -1 && currentImageIndex > 0) {
            currentImageIndex--;
        } else if (currentImageIndex === 0) {
            currentImageIndex = thumbnails.length - 1; // Chuyển về vị trí cuối cùng nếu đang ở vị trí đầu tiên
        }
    }

    // Hiển thị ảnh mới
    if (currentImageIndex !== -1) {
        productImg.src = thumbnails[currentImageIndex].querySelector('img').src;
    }
    
}


// Lấy tất cả các phần tử có class 'detailProduct_Thumbnail'
const thumbnails = document.querySelectorAll('.detailProduct_Thumbnail');

// Tạo một mảng để chứa đường dẫn của hình ảnh
let imageList = [];

// Lặp qua các phần tử và lấy đường dẫn ảnh, sau đó thêm vào mảng imageList
thumbnails.forEach(thumbnail => {
    const imgSrc = thumbnail.querySelector('img').getAttribute('src');
    imageList.push(imgSrc);
});

const productImg = document.querySelector('.ProductImg');

// Kiểm tra nếu mảng chứa ít nhất một phần tử thì hiển thị phần tử đầu tiên vào thẻ <img>
if (imageList.length > 0) {
    productImg.src = imageList[0];
}

// Sử dụng function trên cho nút "Previous"
document.querySelector('.detailProduct_pre-btn').addEventListener('click', function () {
    changeImage('previous');
    console.log('ddd')
});

// Sử dụng function trên cho nút "Next"
document.querySelector('.detailProduct_nxt-btn').addEventListener('click', function () {
    changeImage('next');
    console.log('aa')

});