<?php include "head.php"?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="allproduct.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="allproduct.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" id="cart-link">Cart</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php
              $condition = "";
              $db->table = "product";
              $query = $db->select();
              $db->condition = $condition;
              while ($row = mysqli_fetch_assoc($query)) {
              ?>
<div class="container mt-4">
  <div class="row">
    <div class="col-md-4 mb-4">
      <div class="card">
      <?php
                    if (!empty($row["pro_img"])) {

                    ?>
                      <img src="imgall/<?php echo $row['pro_img']; ?>" class="img-thumbnail center" style="width: 200px">
                    <?php
                    } else {
                      echo "-";
                    }
                    ?>
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['name'];?></h5>
          <p class="card-text">คงเหลือ :<?php echo $row['Status'];?>ราคา :<?php echo $row['price'];?></p>
          <div class="input-group mb-3">
            <button class="btn btn-outline-secondary minus-btn" type="button">-</button>
            <input type="text" class="form-control quantity-input" value="1">
            <button class="btn btn-outline-secondary plus-btn" type="button">+</button>
          </div>
          <button onclick="confirm('ยืนยัน')" class="btn btn-primary add-to-cart" data-id="1">Add to Cart</button>
        </div>
      </div>
    </div>
    <!-- Repeat the above card structure for more products -->
  </div>
</div>

<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul id="cartItems" class="list-group">
          <!-- Cart items will be dynamically added here -->
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="checkoutBtn">Checkout</button>
      </div>
    </div>
  </div>
</div>
<?php }?>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const cartLink = document.getElementById('cart-link');
    const cartModal = new bootstrap.Modal(document.getElementById('cartModal'));
    const cartItemsList = document.getElementById('cartItems');
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const plusButtons = document.querySelectorAll('.plus-btn');
    const minusButtons = document.querySelectorAll('.minus-btn');

    let cart = [];

    // Add product to cart
    addToCartButtons.forEach(button => {
      button.addEventListener('click', function () {
        const productId = button.getAttribute('data-id');
        const productName = button.parentElement.querySelector('.card-title').innerText;
        const quantity = parseInt(button.parentElement.querySelector('.quantity-input').value);
        const product = { id: productId, name: productName, quantity: quantity };
        const existingItemIndex = cart.findIndex(item => item.id === productId);
        if (existingItemIndex !== -1) {
          cart[existingItemIndex].quantity += quantity;
        } else {
          cart.push(product);
        }
        updateCartUI();
      });
    });

    // Increase quantity
    plusButtons.forEach(button => {
      button.addEventListener('click', function () {
        const inputField = button.parentElement.querySelector('.quantity-input');
        const currentValue = parseInt(inputField.value);
        inputField.value = currentValue + 1;
      });
    });

    // Decrease quantity
    minusButtons.forEach(button => {
      button.addEventListener('click', function () {
        const inputField = button.parentElement.querySelector('.quantity-input');
        const currentValue = parseInt(inputField.value);
        if (currentValue > 1) {
          inputField.value = currentValue - 1;
        }
      });
    });

    // Update cart UI
    function updateCartUI() {
      cartItemsList.innerHTML = '';
      cart.forEach(item => {
        const listItem = document.createElement('li');
        listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
        listItem.innerHTML = `
          ${item.name} <span class="badge bg-primary rounded-pill">${item.quantity}</span>
          <button type="button" class="btn btn-danger btn-sm remove-item" data-id="${item.id}">Remove</button>
        `;
        cartItemsList.appendChild(listItem);
      });
    }

    // Open cart modal when cart link is clicked
    cartLink.addEventListener('click', function () {
      updateCartUI();
      cartModal.show();
    });

    // Remove item from cart
    document.addEventListener('click', function (event) {
      if (event.target.classList.contains('remove-item')) {
        const itemId = event.target.getAttribute('data-id');
        const itemIndex = cart.findIndex(item => item.id === itemId);
        if (itemIndex !== -1) {
          cart.splice(itemIndex, 1);
          updateCartUI();
        }
      }
    });

    // Checkout button click event
    document.getElementById('checkoutBtn').addEventListener('click', function () {
      // Perform checkout logic here
      alert('สำเร็จ');
      // Clear cart after checkout
      cart = [];
      updateCartUI();
      cartModal.hide();
    });
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>