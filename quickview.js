document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("quick-view-modal");
    const closeModal = document.querySelector(".modal .close");

    document.querySelectorAll('.quick-view-btn').forEach(button => {
        button.addEventListener('click', function () {
            const productID = this.getAttribute('data-product-id');
             const tableName = this.getAttribute('data-table');
            
            // Fetch product details via AJAX
           fetch(`quickview.php?product_id=${productID}&table_name=${tableName}`)
                .then(response => response.json())
                .then(data => {
                    let price = data.productPrice;
                    price = price - 2000;
                    document.querySelector('.productPhoto img').src = data.productImage;
                    document.querySelector('.productDetails').innerHTML = `
                        <div class='productMoreDetails'>
                        <h1>${data.productName}</h1></br>
                        <p>Brand:<span>${data.productBrand}</span></p>
                        </br>
                        <p>Description:<span class ='desc'>${data.productDescription}</span></p>
                        </div>
                        <hr/>
                        <div class='priceDiv'>
                         <h1>₦${price}</h1>
                         <p><del>₦${data.productPrice}</del></p>
                         <h2>You just save ₦2,000</h2>
                        </div>
                        <hr/>
                        <div class ='others'>
                            <div class ='outlines'>
                            <p><b>Color:</b> </p>
                            <p><b>Size:</b> 
                            <p><b>Quantity:</b> 
                            </div>
                            <div class ='values'>
                            <p>${data.productColor}</p>
                            <p> <span> ${data.productSize}</span></p>
                            
                            <div class='quantity'>
                            <div class='minus'>
                           <center><p>-</p></center> 
                            </div>
                             <div class='number'>
                             <center><p>1</p></center> 
                            </div>
                             <div class='plus'>
                                <center><p>+</p></center> 
                            </div>
                            </div>
                        </div>
                         <div class='callforBulk'>
                        <p>Call us for Bulk Purchases:</p>
                        <h1>07080635700</h1>
                        </div>
                        </div>
                        <hr/>
                        <center>
                         <section class ='cartAndWishlist'>
                        <div class='cart'>
                            <form>
                             <button class ='addToCart' type = 'button'>Add to Cart</button>
                            </form>
                           
                        </div>
                        </section>
                        </center>
                       
                        </div>  
                    `;
                    modal.style.display = "block";
                })
                .catch(error => console.error('Error:', error));
        });
    });

    // Close modal
    closeModal.addEventListener('click', function () {
        modal.style.display = "none";
    });

    // Close modal when clicking outside
    window.addEventListener('click', function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });
});
