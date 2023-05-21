// Function to set the theme cookie
function setThemeCookie(theme) {
  document.cookie = "theme=" + theme + "; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/";
}

// Function to retrieve the theme from the cookie
function getThemeCookie() {
  const name = "theme=";
  const decodedCookie = decodeURIComponent(document.cookie);
  const cookieArray = decodedCookie.split(";");

  for (let i = 0; i < cookieArray.length; i++) {
    let cookie = cookieArray[i];
    while (cookie.charAt(0) === " ") {
      cookie = cookie.substring(1);
    }
    if (cookie.indexOf(name) === 0) {
      return cookie.substring(name.length, cookie.length);
    }
  }

  return "";
}

// Function to toggle the theme
function toggleTheme() {
  const currentTheme = document.documentElement.getAttribute("data-bs-theme");
  const newTheme = currentTheme === "dark" ? "light" : "dark";

  document.documentElement.setAttribute("data-bs-theme", newTheme);
  document.getElementById("logo").src =
    newTheme === "dark" ? "assets/images/logowhite.png" : "assets/images/logoblack.png";

  // Update the button's appearance based on the theme
  const btnSwitch = document.getElementById("btnSwitch");
  btnSwitch.classList.toggle("btn-outline-light", newTheme === "dark");
  btnSwitch.classList.toggle("btn-outline-dark", newTheme === "light");
  btnSwitch.querySelector("i").classList.toggle("bi-brightness-low", newTheme === "dark");
  btnSwitch.querySelector("i").classList.toggle("bi-brightness-high-fill", newTheme === "light");

  setThemeCookie(newTheme); // Save the theme in the cookie
}

// Event listener for theme switch button
document.getElementById("btnSwitch").addEventListener("click", toggleTheme);

// Retrieve the theme from the cookie and set it on page load
const storedTheme = getThemeCookie();
if (storedTheme !== "") {
  document.documentElement.setAttribute("data-bs-theme", storedTheme);
  document.getElementById("logo").src =
    storedTheme === "dark" ? "assets/images/logowhite.png" : "assets/images/logoblack.png";

  // Update the button's appearance based on the stored theme
  const btnSwitch = document.getElementById("btnSwitch");
  btnSwitch.classList.toggle("btn-outline-light", storedTheme === "dark");
  btnSwitch.classList.toggle("btn-outline-dark", storedTheme === "light");
  btnSwitch.querySelector("i").classList.toggle("bi-brightness-low", storedTheme === "dark");
  btnSwitch.querySelector("i").classList.toggle("bi-brightness-high-fill", storedTheme === "light");
}
