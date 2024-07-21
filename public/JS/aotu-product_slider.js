const sectionSaleProducts = document.querySelectorAll('.section_sale-product');

sectionSaleProducts.forEach((section) => {
    const productSlider = section.querySelector('.product_slider');
    const buttonsNavigation = section.querySelector('.buttons_navigation');
    const nxtBtn = buttonsNavigation.querySelector('.nxt-btn');
    const preBtn = buttonsNavigation.querySelector('.pre-btn');

    let containerDimensions = productSlider.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    let isAutoScrolling = true; // Biến để kiểm tra xem có đang tự động cuộn hay không

    const scrollDelay = 5000; // Đặt khoảng thời gian cuộn tự động (ms)
    let autoScrollInterval; // Khai báo biến autoScrollInterval ở đây

    // Hàm tự động cuộn
    const autoScroll = () => {
        if (isAutoScrolling) {
            // Nếu đang ở cuối slider, tự động quay lại vị trí ban đầu
            if (productSlider.scrollLeft + containerWidth >= productSlider.scrollWidth) {
                productSlider.scrollLeft = 0;
            } else {
                productSlider.scrollLeft += containerWidth;
            }
        }
    };

    nxtBtn.addEventListener('click', () => {
        productSlider.scrollLeft += containerWidth;
    });

    preBtn.addEventListener('click', () => {
        productSlider.scrollLeft -= containerWidth;
    });

    // Tự động cuộn sau mỗi khoảng thời gian
    autoScrollInterval = setInterval(autoScroll, scrollDelay);

    // Ngừng cuộn tự động khi hover vào sản phẩm
    section.querySelectorAll('.product_slider').forEach((product) => {
        product.addEventListener('mouseenter', () => {
            isAutoScrolling = false;
            clearInterval(autoScrollInterval);
        });

        // Tiếp tục cuộn tự động khi rời khỏi sản phẩm
        product.addEventListener('mouseleave', () => {
            isAutoScrolling = true;
            autoScrollInterval = setInterval(autoScroll, scrollDelay);
        });
    });
});
