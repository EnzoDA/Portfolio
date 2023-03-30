const form = document.getElementById("contact-form");
  form.addEventListener("submit", function(event) {
    event.preventDefault();
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const subject = document.getElementById("subject").value;
    const message = document.getElementById("message").value;
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "send-email.php");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        alert("L'e-mail a été envoyé avec succès !");
      }
    };
    xhr.send(`name=${name}&email=${email}&subject=${subject}&message=${message}`);
  });