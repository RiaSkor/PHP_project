document.addEventListener('DOMContentLoaded', function() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    updateCartDisplay();
    
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            const productName = this.getAttribute('data-name');
            const productPrice = parseInt(this.getAttribute('data-price'));
            
            addToCart(productId, productName, productPrice);
        });
    });
    
    function addToCart(id, name, price) {
        const existingItem = cart.find(item => item.id === id);
        
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({
                id: id,
                name: name,
                price: price,
                quantity: 1
            });
        }
        
        localStorage.setItem('cart', JSON.stringify(cart));
        
        updateCartDisplay();
        
        const button = document.querySelector(`.add-to-cart[data-id="${id}"]`);
        button.textContent = 'Добавлено!';
        setTimeout(() => {
            button.textContent = 'Добавить в корзину';
        }, 1000);
    }
    
    function updateCartDisplay() {
        const cartCount = document.querySelector('.cart-count');
        const cartItemsContainer = document.querySelector('.cart-items');
        const cartTotalPrice = document.querySelector('.cart-total-price');
        
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        cartCount.textContent = totalItems;
        
        const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        cartTotalPrice.textContent = totalPrice.toLocaleString();
        
        cartItemsContainer.innerHTML = '';
        
        if (cart.length === 0) {
            cartItemsContainer.innerHTML = '<p>Корзина пуста</p>';
        } else {
            cart.forEach(item => {
                const cartItemElement = document.createElement('div');
                cartItemElement.className = 'cart-item';
                cartItemElement.innerHTML = `
                    <span class="cart-item-name">${item.name}</span>
                    <span class="cart-item-quantity">${item.quantity} × ${item.price.toLocaleString()} руб.</span>
                    <span class="cart-item-price">${(item.price * item.quantity).toLocaleString()} руб.</span>
                    <button class="remove-from-cart" data-id="${item.id}">×</button>
                `;
                cartItemsContainer.appendChild(cartItemElement);
            });
            
            document.querySelectorAll('.remove-from-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = this.getAttribute('data-id');
                    removeFromCart(itemId);
                });
            });
        }
    }
    
    function removeFromCart(id) {
        cart = cart.filter(item => item.id !== id);
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartDisplay();
    }
    
	const cartContainer = document.querySelector('.cart-container');
	const cartIcon = cartContainer.querySelector('.bi-basket2-fill');
	const cartCount = cartContainer.querySelector('.cart-count');
	const cartDropdown = cartContainer.querySelector('.cart-dropdown');

	function toggleCartDropdown() {
		cartDropdown.classList.toggle('active');
		console.log('Cart dropdown toggled');
	}

	cartIcon.addEventListener('click', function(e) {
		e.stopPropagation();
		toggleCartDropdown();
	});

	cartCount.addEventListener('click', function(e) {
		e.stopPropagation();
		toggleCartDropdown();
	});

	document.addEventListener('click', function() {
		cartDropdown.classList.remove('active');
	});

	document.addEventListener('DOMContentLoaded', function() {
		cartDropdown.classList.remove('active');
	});

	
	
});
