  window.onload = showHome;

function showHome() {
      document.getElementById('home').style.display = 'block';
      document.getElementById('about-us').style.display = 'none';
	  document.getElementById('SocialMedia').style.display = 'none';
	  document.getElementById('ContactUs').style.display = 'none';
	  document.getElementById('FindYoutour').style.display = 'none';
	  document.getElementById('BecomeaGuide').style.display = 'none';
	  
    }

  function Login() {
    document.getElementById('home').style.display = 'none';
    document.getElementById('about-us').style.display = 'none';
  document.getElementById('SocialMedia').style.display = 'none';
  document.getElementById('ContactUs').style.display = 'none';
  document.getElementById('FindYoutour').style.display = 'none';
  document.getElementById('BecomeaGuide').style.display = 'none';
  document.getElementById('Login').style.display = 'block';
   }

    function showAbout() {
      document.getElementById('home').style.display = 'none';
      document.getElementById('about-us').style.display = 'block';
	  document.getElementById('SocialMedia').style.display = 'none';
	  document.getElementById('ContactUs').style.display = 'none';
	  document.getElementById('FindYoutour').style.display = 'none';
	  document.getElementById('BecomeaGuide').style.display = 'none';
    }
	
	function SocialMedia() {
      document.getElementById('home').style.display = 'none';
      document.getElementById('about-us').style.display = 'none';
	  document.getElementById('SocialMedia').style.display = 'block';
	  document.getElementById('ContactUs').style.display = 'none';
	  document.getElementById('FindYoutour').style.display = 'none';
	  document.getElementById('BecomeaGuide').style.display = 'none';
    }
	function ContactUs(){
	  document.getElementById('home').style.display = 'none';
      document.getElementById('about-us').style.display = 'none';
	  document.getElementById('SocialMedia').style.display = 'none';
	  document.getElementById('ContactUs').style.display = 'block';
	  document.getElementById('FindYoutour').style.display = 'none';
	  document.getElementById('BecomeaGuide').style.display = 'none';
	}
	function FindYoutour(){
	  document.getElementById('home').style.display = 'none';
      document.getElementById('about-us').style.display = 'none';
	  document.getElementById('SocialMedia').style.display = 'none';
	  document.getElementById('ContactUs').style.display = 'none';
	  document.getElementById('FindYoutour').style.display = 'block';
document.getElementById('BecomeaGuide').style.display = 'none';	  
	}
	function BecomeaGuide(){
	  document.getElementById('home').style.display = 'none';
      document.getElementById('about-us').style.display = 'none';
	  document.getElementById('SocialMedia').style.display = 'none';
	  document.getElementById('ContactUs').style.display = 'none';
	  document.getElementById('FindYoutour').style.display = 'none';
	  document.getElementById('BecomeaGuide').style.display = 'block';
	  
	}

	document.addEventListener("DOMContentLoaded", function() {
    const cartItems = document.getElementById("cart-items");
    const addButtons = document.querySelectorAll(".add-to-cart");

    let cart = [];

    // Add items to cart
    addButtons.forEach(button => {
        button.addEventListener("click", function() {
            let product = this.parentElement;
            let name = product.getAttribute("data-name");
            let price = parseFloat(product.getAttribute("data-price"));

            let item = cart.find(i => i.name === name);
            if (item) {
                item.quantity++;
            } else {
                cart.push({ name, price, quantity: 1 });
            }

            updateCart();
        });
    });

    // Update the cart display
    function updateCart() {
        cartItems.innerHTML = "";
        cart.forEach(item => {
            let li = document.createElement("li");
            li.textContent = `R{item.name} - RR{item.price} x R{item.quantity}`;
            cartItems.appendChild(li);
        });
    }

    // Checkout button functionality
    document.getElementById("checkout").addEventListener("click", function() {
        alert("Proceeding to checkout!");
    });
});

  // Function to show the signup section and hide the login section
  function showSignup() {
    document.getElementById("Login").style.display = "none";
    document.getElementById("Signup").style.display = "block";
  }

  // Function to show the login section and hide the signup section
  function showLogin() {
    document.getElementById("Signup").style.display = "none";
    document.getElementById("Login").style.display = "block";
  }

  // Handle login form submission
  document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault();

    let username = document.getElementById("name").value;
    let password = document.getElementById("password").value;

    if (username && password) {
      alert("Login successful!"); // Placeholder for backend validation
    } else {
      alert("Please enter valid credentials!");
    }
  });

  // Handle signup form submission
  document.getElementById("signupForm").addEventListener("submit", function(event) {
    event.preventDefault();

    let newUsername = document.getElementById("newName").value;
    let email = document.getElementById("email").value;
    let newPassword = document.getElementById("newPassword").value;

    if (newUsername && email && newPassword) {
      alert("Account created successfully! Redirecting to login...");
      showLogin(); // Switch back to login after signup
    } else {
      alert("Please fill in all fields!");
    }
  });