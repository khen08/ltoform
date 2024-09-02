var myHeaders = new Headers();
myHeaders.append("X-API-KEY", "8cc4d5e024ad9d8d2fbaaa149f90ddeb6436bf3b");
myHeaders.append("Content-Type", "application/json");

var raw = JSON.stringify({
  "q": "1993 toyota camry",
  "gl": "ph"
});

var requestOptions = {
  method: 'POST',
  headers: myHeaders,
  body: raw,
  redirect: 'follow'
};

fetch("https://google.serper.dev/images", requestOptions)
  .then(response => response.json())
  .then(result => {
    if (result.images && result.images.length > 0) {
      console.log("ImageUrl of the image with position 1:", result.images[0].imageUrl);
    } else {
      console.log("No images found in the result.");
    }
  })
  .catch(error => console.log('error', error));

  <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Hub</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <header>
        <h1>Rent and Ride Hub</h1>
        <p>Your Journey Starts Here</p>
    </header>

    <section id="carContainer">
    </section>

    <footer>
        <p>&copy; 2023 Car Rental Hub | All rights reserved</p>
    </footer>

    <script src="index.js"></script>
</body>

</html>

body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f9f9f9;
  color: #333;
}

header {
  background-color: #2C3E50;
  color: #fff;
  padding: 20px;
  text-align: center;
}

section {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  padding: 40px;
}

.carCard {
  position: relative;
  overflow: hidden;
  border-radius: 15px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  margin: 20px;
  height: 300px;
  width: 500px;
  transition: transform 0.3s ease-in-out;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: start;
  text-align: center;
}

.carCard::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  backdrop-filter: blur(0);
  transition: backdrop-filter 0.3s ease-in-out;
}

.carCard:hover::before {
  backdrop-filter: blur(5px);
}

.carCard:hover .button {
  display: block;
}

.button {
  position: absolute;
  bottom: 20px;
  left: 50%;
  transform: translateX(-50%);
  background-color: transparent;
  color: #fff;
  font-size: 20px;
  padding: 10px 20px;
  border: solid;
  border-width: 2px;
  border-radius: 5px;
  cursor: pointer;
}

.carName {
  color: white;
}

.carDetails {
  display: none;
  padding: 20px;
  text-align: left;
  color: #333;
}

.carDetails.expanded {
  display: block;
}

h2 {
  color: #2C3E50;
}

p {
  color: #b1b1b1;
}

footer {
  background-color: #34495E;
  color: #fff;
  text-align: center;
  padding: 10px;
  position: fixed;
  bottom: 0;
  width: 100%;
}

/*
    DEMO STYLE
*/
@import url('https://fonts.googleapis.com/css2?family=Cormorant+SC:wght@300;400;500;600;700&family=GFS+Didot&family=Libre+Bodoni:ital,wght@0,700;1,700&family=Manrope:wght@200;300;400;500;600;700;800&family=Montserrat+Alternates:wght@200;300;400;600&family=Montserrat:wght@300;500;600;700&family=Orbitron:wght@700&display=swap');

body {
  font-family: 'Manrope', sans-serif;
  background: #fafafa;
}

.separator {
  display: flex;
  align-items: center;
}

.separator::after {
  margin: 20px;
  content: '';
  flex: auto;
  border-bottom: 1px solid #000;
}

.brandlogo {
  font-family: 'Orbitron', sans-serif;
  font-size: 23px;
  font-weight: 300px;
  letter-spacing: 18px;
  color: #ffffff;
}

.pres-video {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 1200px;
  background: url('NRP3.gif') center/cover no-repeat;
  position: relative;
}

.cont-monolouge {
  padding: 80px 250px 100px 250px;
  text-align: center;
}

.cont-achievements {
  padding: 80px 250px 60px 250px;
  color: #ffffff;
  background-color: #47748b;
}

.cont-featcars-hd {
  padding: 60px 220px 120px;
}

.header {
  font-family: 'Manrope', sans-serif;
  font-size: 39px;
  font-weight: 300px;
}

.sub-header {
  text-align: center;
  font-family: 'Montserrat', sans-serif;
  font-size: 24px;
  font-weight: 600;
  margin-bottom: 20px;
}

.col-sm {
  margin: 20px;
  text-align: center;
  font-family: 'Manrope', sans-serif;
  font-weight: 400;
  font-size: 15px;
  color: #ffffff;
}

.monolouge {
  line-height: 40px;
}

a,
a:hover,
a:focus {
  color: inherit;
  text-decoration: none;
  transition: all 0.3s;
}

.navbar {
  z-index: 3;
  background: #ffffff00;
  border: none;
  border-radius: 0;
  margin-bottom: 40px;
}

.navbar-btn {
  box-shadow: none;
  outline: none !important;
  border: none;
}

.line {
  width: 100%;
  height: 1px;
  border-bottom: 1px dashed #ddd;
  margin: 40px 0;
}

/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

#sidebar {
  width: 250px;
  position: fixed;
  top: 0;
  left: -250px;
  height: 100vh;
  z-index: 999;
  background: #7386D5;
  color: #fff;
  transition: all 0.3s;
  overflow-y: scroll;
  box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);
}

.btn-info {
  background-color: #00000000;
  border-color: #00000000;
}

.btn-info:hover {
  background-color: #9292927c;
  border-color: #9292927c;
}

#sidebar.active {
  left: 0;
}

#dismiss {
  width: 35px;
  height: 35px;
  line-height: 35px;
  text-align: center;
  background: #7386D5;
  position: absolute;
  top: 10px;
  right: 10px;
  cursor: pointer;
  -webkit-transition: all 0.3s;
  -o-transition: all 0.3s;
  transition: all 0.3s;
}

#dismiss:hover {
  background: #fff;
  color: #7386D5;
}

.overlay {
  display: none;
  position: fixed;
  width: 100vw;
  height: 100vh;
  background: rgba(0, 0, 0, 0.7);
  z-index: 998;
  opacity: 0;
  transition: all 0.5s ease-in-out;
}

.overlay.active {
  display: block;
  opacity: 1;
}

#sidebar .sidebar-header {
  padding: 20px;
  background: #6d7fcc;
}

#sidebar ul.components {
  padding: 20px 0;
  border-bottom: 1px solid #35698300;
}

#sidebar ul p {
  color: #fff;
  padding: 10px;
}

#sidebar ul li a {
  padding: 10px;
  font-size: 1.1em;
  display: block;
}

#sidebar ul li a:hover {
  color: #7386D5;
  background: #fff;
}

#sidebar ul li.active>a,
a[aria-expanded="true"] {
  color: #fff;
  background: #6d7fcc;
}

a[data-toggle="collapse"] {
  position: relative;
}

.dropdown-toggle::after {
  display: block;
  position: absolute;
  top: 50%;
  right: 20px;
  transform: translateY(-50%);
}

ul ul a {
  font-size: 0.9em !important;
  padding-left: 30px !important;
  background: #6d7fcc;
}

ul.CTAs {
  padding: 20px;
}

ul.CTAs a {
  text-align: center;
  font-size: 0.9em !important;
  display: block;
  border-radius: 5px;
  margin-bottom: 5px;
}

/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

#content {
  width: 100%;
  padding: 20px;
  min-height: 100vh;
  transition: all 0.3s;
  position: absolute;
  top: 0;
  right: 0;
}











---------------------------
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
}

header {
    background-color: #2C3E50;
    color: #fff;
    padding: 20px;
    text-align: center;
}

section #carContainer {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}

.carCard {
    position: relative;
    overflow: hidden;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    margin: 20px;
    height: 300px;
    width: 500px;
    transition: transform 0.3s ease-in-out;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: start;
    text-align: center;
}

.carCard::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    backdrop-filter: blur(0);
    transition: backdrop-filter 0.3s ease-in-out;
}

.carCard:hover::before {
    backdrop-filter: blur(5px);
}

.carCard:hover .button {
    display: block;
}

.button {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    background-color: transparent;
    color: #fff;
    font-size: 20px;
    padding: 10px 20px;
    border: solid;
    border-width: 2px;
    border-radius: 5px;
    cursor: pointer;
}

.carName {
    color: white;
}

.carDetails {
    display: none;
    padding: 20px;
    text-align: left;
    color: #333;
}

.carDetails.expanded {
    display: block;
}

h2 {
    color: #2C3E50;
}

p {
    color: #b1b1b1;
}

footer {
    background-color: #34495E;
    color: #fff;
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
}