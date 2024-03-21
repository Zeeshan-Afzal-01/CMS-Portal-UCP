
  
  // JavaScript to dynamically adjust font size based on screen width
  window.addEventListener('resize', function() {
    var screenWidth = window.innerWidth;

    // Apply different font sizes based on screen width
    var fontSize = '14px'; // Default font size
    if (screenWidth >= 767 && screenWidth <= 1000) {
        fontSize = '7px'; // Adjust font size for screen width between 676px and 1000px
    } else if (screenWidth >= 1000 && screenWidth <= 1400) {
        fontSize = '10px'; // Adjust font size for screen width between 1000px and 1400px
    }

    var navLinks = document.querySelectorAll('.nav a');
    navLinks.forEach(function(link) {
        link.style.fontSize = fontSize;
    });
});

// Trigger the resize event to apply styles on page load
window.dispatchEvent(new Event('resize'));


window.addEventListener('resize', function() {
  var screenWidth = window.innerWidth;

  var registerButton = document.querySelector('.register-button');
  var signinButton = document.querySelector('.signin-button');

  var registerLink = '<li class="scroll-to-section"><a style="margin-left:10px;" href="register.html">REGISTER NOW!</a></li>';
  var signinLink = '<li class="scroll-to-section"><a style="margin-left:10px;" href="signin.html">SIGN IN</a></li>';

  if (screenWidth < 676) {
    // Replace register and signin buttons with links
    registerButton.innerHTML = registerLink;
    signinButton.innerHTML = signinLink;
  } else {
    // 
    //                   <div class="scroll-to-section"><a href="signin.html">SIGN IN</a></div>
    //                
    // Replace register and signin links with buttons
    registerButton.innerHTML = '<div class="main-button-red"><div class="scroll-to-section"><a class="b" style="margin-left:10px;" href="register.html">REGISTER NOW!</a></div> </div>';
    signinButton.innerHTML = '<div class="main-button-red"><div class="scroll-to-section"><a class="b" style="margin-left:10px;" href="signin.html">SIGN IN</a></div> </div>';
  }
});

// Trigger the resize event to apply styles on page load
window.dispatchEvent(new Event('resize'));
