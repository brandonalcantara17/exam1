document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector('form[action*="doAfegir"]');
  if (form) {
    form.addEventListener("submit", function (e) {
      const emailInput = form.querySelector('input[name="email"]');
      if (emailInput && !emailInput.value.includes("@")) {
        alert("El correu electrònic ha de tenir un @");
        e.preventDefault();
      }
    });
  }
});
